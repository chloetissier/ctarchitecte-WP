# Crée une planche-contact (miniatures numérotées) à partir d'une liste d'images.
# Usage : .\tools\planche-contact.ps1 -Sortie planche.jpg -Images @('a.jpg','b.png') [-Colonnes 4]
param([Parameter(Mandatory)][string]$Sortie, [Parameter(Mandatory)][string[]]$Images, [int]$Colonnes = 4, [int]$Taille = 300)
Add-Type -AssemblyName System.Drawing
$imgs = $Images | Where-Object { Test-Path -LiteralPath $_ }
$lignes = [math]::Ceiling($imgs.Count / $Colonnes)
$bmp = New-Object System.Drawing.Bitmap ($Colonnes * $Taille), ($lignes * ($Taille + 22))
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.Clear([System.Drawing.Color]::White); $g.InterpolationMode = 'HighQualityBicubic'
$font = New-Object System.Drawing.Font 'Arial', 9
for ($i = 0; $i -lt $imgs.Count; $i++) {
    try {
        $src = [System.Drawing.Image]::FromFile($imgs[$i])
        # Orientation EXIF (photos de téléphone)
        if ($src.PropertyIdList -contains 274) {
            switch ($src.GetPropertyItem(274).Value[0]) { 3 { $src.RotateFlip('Rotate180FlipNone') } 6 { $src.RotateFlip('Rotate90FlipNone') } 8 { $src.RotateFlip('Rotate270FlipNone') } }
        }
        $r = [math]::Min($Taille / $src.Width, $Taille / $src.Height)
        $w = [int]($src.Width * $r); $h = [int]($src.Height * $r)
        $x = ($i % $Colonnes) * $Taille + [int](($Taille - $w) / 2)
        $y = [math]::Floor($i / $Colonnes) * ($Taille + 22) + [int](($Taille - $h) / 2)
        $g.DrawImage($src, $x, $y, $w, $h)
        $g.DrawString(("{0}. {1}" -f ($i + 1), [IO.Path]::GetFileName($imgs[$i])), $font, [System.Drawing.Brushes]::Black, ($i % $Colonnes) * $Taille + 4, [math]::Floor($i / $Colonnes) * ($Taille + 22) + $Taille + 3)
        $src.Dispose()
    } catch { }
}
$bmp.Save($Sortie, [System.Drawing.Imaging.ImageFormat]::Jpeg); $g.Dispose(); $bmp.Dispose()
"{0} images -> {1}" -f $imgs.Count, $Sortie
