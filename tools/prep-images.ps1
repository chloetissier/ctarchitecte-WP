# Prépare des images pour le web : rotation EXIF, 1600 px max, JPEG qualité 82, métadonnées supprimées.
# Usage : .\tools\prep-images.ps1 -Liste liste.csv -Sortie dossier   (CSV : source;nom-sortie.jpg)
param([Parameter(Mandatory)][string]$Liste, [Parameter(Mandatory)][string]$Sortie, [int]$Max = 1600)
Add-Type -AssemblyName System.Drawing
New-Item -ItemType Directory -Force $Sortie | Out-Null
$enc = [System.Drawing.Imaging.ImageCodecInfo]::GetImageEncoders() | Where-Object MimeType -eq 'image/jpeg'
$p = New-Object System.Drawing.Imaging.EncoderParameters 1
$p.Param[0] = New-Object System.Drawing.Imaging.EncoderParameter ([System.Drawing.Imaging.Encoder]::Quality), 82L
foreach ($l in (Get-Content $Liste -Encoding UTF8 | Where-Object { $_ -match ';' })) {
    $src, $nom = $l -split ';', 2
    if (-not (Test-Path -LiteralPath $src)) { "ABSENT : $src"; continue }
    $img = [System.Drawing.Image]::FromFile($src)
    if ($img.PropertyIdList -contains 274) {
        switch ($img.GetPropertyItem(274).Value[0]) { 3 { $img.RotateFlip('Rotate180FlipNone') } 6 { $img.RotateFlip('Rotate90FlipNone') } 8 { $img.RotateFlip('Rotate270FlipNone') } }
    }
    $r = [math]::Min([double]1, [double]$Max / [math]::Max($img.Width, $img.Height))
    $w = [int]($img.Width * $r); $h = [int]($img.Height * $r)
    $bmp = New-Object System.Drawing.Bitmap $w, $h
    $g = [System.Drawing.Graphics]::FromImage($bmp)
    $g.Clear([System.Drawing.Color]::White)
    $g.InterpolationMode = 'HighQualityBicubic'; $g.SmoothingMode = 'HighQuality'; $g.PixelOffsetMode = 'HighQuality'
    $g.DrawImage($img, 0, 0, $w, $h)
    $bmp.Save((Join-Path $Sortie $nom), $enc, $p)
    $g.Dispose(); $bmp.Dispose(); $img.Dispose()
    "{0,-40} {1}x{2}  {3:N0} Ko" -f $nom, $w, $h, ((Get-Item (Join-Path $Sortie $nom)).Length / 1KB)
}
