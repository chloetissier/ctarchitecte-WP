# Met à jour une extension WordPress depuis wordpress.org, avec retour arrière automatique.
# Usage : .\tools\update-plugin.ps1 <slug> [-Theme]
# L'ancienne version est conservée dans /home/ctarchq/old-plugins/<slug>-<date> (hors www).
param([Parameter(Mandatory)][string]$Slug, [switch]$Theme)

$ErrorActionPreference = 'Stop'
$sftp  = Join-Path $PSScriptRoot 'sftp.ps1'
$kind  = if ($Theme) { 'themes' } else { 'plugins' }
$dir   = "/home/ctarchq/www/wp-content/$kind"
$old   = "/home/ctarchq/old-$kind/$Slug-$(Get-Date -Format yyyyMMdd-HHmm)"
$work  = Join-Path (Split-Path $PSScriptRoot) "audit\wp-update\$Slug"
$site  = 'https://ctarchitectedinterieur.fr'

function Test-Site {
    foreach ($p in '/', '/contact/', '/wp-login.php') {
        $code = curl.exe -s -o NUL -w '%{http_code}' -m 60 "$site$p"
        if ($code -ne '200') { return "$p -> $code" }
    }
    return $null
}

# 1. Téléchargement de la version officielle
Remove-Item $work -Recurse -Force -ErrorAction SilentlyContinue
New-Item -ItemType Directory -Force $work | Out-Null
$zipUrl = if ($Theme) {
    (Invoke-RestMethod "https://api.wordpress.org/themes/info/1.2/?action=theme_information&request[slug]=$Slug").download_link
} else { "https://downloads.wordpress.org/plugin/$Slug.latest-stable.zip" }
curl.exe -s -L -o "$work\pkg.zip" $zipUrl
Expand-Archive "$work\pkg.zip" $work -Force
if (-not (Test-Path "$work\$Slug")) { throw "Archive inattendue pour $Slug" }

$before = Test-Site
if ($before) { throw "Le site était déjà en erreur avant la mise à jour ($before) — rien n'a été modifié." }

# 2. Envoi à côté, puis échange
& $sftp "option batch continue" "mkdir /home/ctarchq/old-$kind" | Out-Null
& $sftp "put $work\$Slug $dir/$Slug.new" | Out-Null
if ($LASTEXITCODE -ne 0) { throw "Échec de l'envoi — site inchangé." }
& $sftp "mv $dir/$Slug $old" "mv $dir/$Slug.new $dir/$Slug" | Out-Null

# 3. Vérification, retour arrière si besoin
Start-Sleep -Seconds 3
$after = Test-Site
if ($after) {
    & $sftp "mv $dir/$Slug $dir/$Slug.failed" "mv $old $dir/$Slug" | Out-Null
    $rolled = Test-Site
    throw "ÉCHEC $Slug ($after) — ancienne version restaurée. Site après restauration : $(if ($rolled) { $rolled } else { 'OK' })"
}
"OK $Slug mis à jour (ancienne version dans $old)"
