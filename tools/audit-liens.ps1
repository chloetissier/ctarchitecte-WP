# Relève tous les liens et boutons des pages du site et vérifie leur destination.
param([string]$Site = 'https://ctarchitectedinterieur.fr')
$pages = @('/', '/a-propos/', '/mes-prestations/', '/methode/', '/mes-realisations-2/', '/faq/', '/contact/', '/mentions-legales/', '/politique-de-confidentialite/')
$vus = @{}
$out = foreach ($p in $pages) {
    $h = (curl.exe -s -m 60 "$Site$p`?v=$(Get-Random)") -join "`n"
    # Zone de contenu, en-tête et pied de page : toutes les balises <a>
    foreach ($m in [regex]::Matches($h, '<a\s[^>]*>([\s\S]*?)</a>')) {
        $tag = $m.Value
        $href = [regex]::Match($tag, 'href="([^"]*)"').Groups[1].Value
        $classe = [regex]::Match($tag, 'class="([^"]*)"').Groups[1].Value
        $texte = ([regex]::Replace($m.Groups[1].Value, '<[^>]+>', ' ') -replace '\s+', ' ').Trim()
        if (-not $texte) { $texte = '(' + [regex]::Match($tag, 'aria-label="([^"]*)"').Groups[1].Value + ')' }
        $zone = if ($classe -match 'menu-link') { 'menu' } elseif ($classe -match 'button|btn') { 'BOUTON' } else { 'lien' }
        [pscustomobject]@{ Page = $p; Zone = $zone; Texte = $texte.Substring(0, [Math]::Min(45, $texte.Length)); Href = $href }
    }
}
# Statut HTTP de chaque destination interne (une seule fois)
foreach ($o in $out) {
    $u = $o.Href
    $statut = if (-not $u -or $u -eq '#') { 'VIDE' }
              elseif ($u -match '^(tel|mailto):') { $u.Split(':')[0] }
              elseif ($u -match '^https?://(?!ctarchitectedinterieur\.fr)') { 'externe' }
              else {
                  $abs = if ($u -match '^https?://') { $u } else { "$Site$u" }
                  if (-not $vus.ContainsKey($abs)) { $vus[$abs] = curl.exe -s -o NUL -w '%{http_code}' -m 30 -L $abs }
                  $vus[$abs]
              }
    $o | Add-Member Statut $statut -PassThru
}
