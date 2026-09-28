# Exécute des commandes WinSCP sur l'hébergement OVH (SFTP).
# Usage : .\tools\sftp.ps1 "ls /home/ctarchq/www" "get /home/ctarchq/www/wp-config.php C:\tmp\"
# Le mot de passe est lu dans ~/.ovh_netrc (jamais écrit dans les commandes ni affiché).
param([Parameter(ValueFromRemainingArguments = $true)][string[]]$Commands)

$winscp  = "$env:LOCALAPPDATA\Programs\WinSCP\WinSCP.com"
$hostkey = "ssh-ed25519 255 19oK1hYJKhS20e/dDvc9ZPL9dr7UO3o7veGKM3UcBCg"
$pw      = ((Get-Content "$HOME\.ovh_netrc") -split ' ')[-1]
$url     = "sftp://ctarchq:$([uri]::EscapeDataString($pw))@ftp.cluster100.hosting.ovh.net:22/"

$script = [IO.Path]::GetTempFileName()
try {
    $lines = @("option batch abort", "option confirm off", "open $url -hostkey=`"$hostkey`"") + $Commands + @("exit")
    [IO.File]::WriteAllLines($script, $lines, (New-Object Text.UTF8Encoding $false))
    & $winscp /ini=nul "/script=$script" |
        Where-Object { $_ -notmatch [regex]::Escape($pw) -and $_ -notmatch '^(Recherche|Connexion|Authenti|Utilisation|Démarrage|Session)' }
    $code = $LASTEXITCODE
} finally {
    Remove-Item $script -Force -ErrorAction SilentlyContinue
}
exit $code
