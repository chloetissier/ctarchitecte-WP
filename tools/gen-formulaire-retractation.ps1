$ErrorActionPreference = 'Stop'
$ap = [char]0x2019
$od = "$env:USERPROFILE\OneDrive - CT Architecte d'intérieur"
$src = "$od\Conditions Générales de Vente_CT Architecte d'intérieur.docx"
$dir = "$od\MICRO\ADMIN\CONTRATS"
$out = "$dir\Formulaire de rétractation_CT Architecte d'intérieur.docx"
$pdf = [IO.Path]::ChangeExtension($out, '.pdf')
Remove-Item $out, $pdf -ErrorAction SilentlyContinue
Copy-Item $src $out

$TXT = 2435640      # brun #382A25
$w = New-Object -ComObject Word.Application
$w.Visible = $false
try {
    $d = $w.Documents.Open($out)
    # gabarit du bandeau beige (tableau de titre d'article)
    $tpl = $w.Documents.Add()
    $tpl.Content.FormattedText = $d.Tables.Item(1).Range.FormattedText

    # titre
    $r = $d.Paragraphs.Item(2).Range; [void]$r.MoveEnd(1, -1); $r.Text = "Formulaire de rétractation"
    # tout supprimer après le titre (et la ligne vide qui suit)
    $d.Range($d.Paragraphs.Item(3).Range.End, $d.Content.End).Delete() | Out-Null

    $lg = $d.InlineShapes.Item(1); $lg.LockAspectRatio = -1; $lg.Width = $lg.Width * 0.7
    $largeur = $d.PageSetup.PageWidth - $d.PageSetup.LeftMargin - $d.PageSetup.RightMargin

    function Para($text, [int]$size = 11, [bool]$bold = $false, [bool]$italic = $false, [int]$align = 3, [double]$after = 6, [bool]$ligne = $false, [double]$before = 0) {
        $d.Content.InsertParagraphAfter()
        $p = $d.Paragraphs.Last
        $p.Range.InsertBefore($text)
        $p.Shading.BackgroundPatternColor = -16777216
        $f = $p.Range.Font; $f.Name = 'Montserrat'; $f.Size = $size; $f.Bold = [int]$bold; $f.Italic = [int]$italic; $f.Color = $TXT
        $p.Alignment = $align; $p.SpaceAfter = $after; $p.SpaceBefore = $before; $p.LineSpacingRule = 0
        $p.LeftIndent = 0; $p.FirstLineIndent = 0
        $p.TabStops.ClearAll()
        if ($ligne) { [void]$p.TabStops.Add($largeur, 2, 1) }
        return $p
    }
    function Bandeau($text) {
        $d.Content.InsertParagraphAfter()
        $d.Paragraphs.Last.Range.FormattedText = $tpl.Tables.Item(1).Range.FormattedText
        $t = $d.Tables.Item($d.Tables.Count)
        $c = $t.Cell(1, 1).Range; [void]$c.MoveEnd(1, -1); $c.Text = $text; $c = $t.Cell(1, 1).Range; $c.Font.Name = 'Montserrat'; $c.Font.Size = 11; $c.Font.Bold = 1; $c.Font.Color = $TXT; $c.ParagraphFormat.SpaceAfter = 4; $c.ParagraphFormat.SpaceBefore = 4
    }

    [void](Para "(à compléter et renvoyer uniquement si vous souhaitez vous rétracter du contrat)" 10 $false $true 1 6)

    Bandeau "Destinataire"
    [void](Para "CT Architecte d${ap}Intérieur – Chloé Tissier" 11 $true $false 0 0 $false 4)
    [void](Para "57 rue d${ap}Anini, 69400 Gleizé" 11 $false $false 0 0)
    [void](Para "contact@ctarchitectedinterieur.fr" 11 $false $false 0 12)

    Bandeau "Notification de rétractation"
    [void](Para "Je / Nous (*) vous notifie / notifions (*) par la présente ma / notre (*) rétractation du contrat portant sur la prestation de services ci-dessous :" 11 $false $false 3 10 $false 4)
    foreach ($champ in "Prestation concernée :", "Devis n° :", "Commandé le (date de signature du devis) :", "Nom du (des) client(s) :", "Adresse du (des) client(s) :", "", "Date :") {
        $lib = if ($champ) { "$champ `t" } else { "`t" }; [void](Para $lib 11 $false $false 0 6 $true)
    }
    [void](Para "Signature du (des) client(s) (uniquement en cas d${ap}envoi du présent formulaire sur papier) :" 11 $false $false 0 30)
    [void](Para "(*) Rayez la mention inutile." 9 $false $true 0 12)

    Bandeau "Délai et modalités d${ap}envoi"
    [void](Para "Le client particulier dispose d${ap}un délai de 14 jours à compter de la signature du devis pour exercer son droit de rétractation, sans avoir à motiver sa décision (article L221-18 du Code de la consommation)." 9 $false $false 3 3 $false 4)
    [void](Para "Le formulaire peut être envoyé par courrier ou par e-mail. Toute autre déclaration dénuée d${ap}ambiguïté exprimant la volonté de se rétracter est également valable." 9 $false $false 3 3)
    [void](Para "Si la prestation a commencé avant la fin de ce délai à la demande expresse du client, le montant correspondant à la prestation déjà réalisée reste dû." 9 $false $false 3 0)
    # lignes vides parasites (hors tableaux) sous les bandeaux
    for ($i = $d.Paragraphs.Count; $i -ge 4; $i--) { $p = $d.Paragraphs.Item($i); if (-not $p.Range.Information(12) -and $p.Range.Text -match '^\s*$') { $prev = $d.Paragraphs.Item($i - 1); if ($prev.Range.Information(12)) { $p.Range.Delete() | Out-Null } } }
    # pas de dernier paragraphe vide superflu
    $last = $d.Paragraphs.Last; if ($last.Range.Text.Trim() -eq '') { $last.Range.Delete() | Out-Null }

    # pied de page : formulation CFAI + mention d'annexe
    foreach ($s in $d.Sections) {
        foreach ($i in 1, 2, 3) {
            $ft = $s.Footers.Item($i)
            if (-not $ft.Exists) { continue }
            foreach ($pair in @(@("Reconnue qualifiée architecte CFAI", "Architecte d${ap}intérieur qualifiée CFAI"), @("Version mise à jour : Octobre 2025", "Annexe aux Conditions Générales de Vente"))) {
                $rg = $ft.Range
                [void]$rg.Find.Execute($pair[0], $false, $false, $false, $false, $false, $true, 0, $false, $pair[1], 2)
            }
        }
    }
    $tpl.Close(0)
    $d.Save()
    $d.ExportAsFixedFormat($pdf, 17)
    "pages : " + $d.ComputeStatistics(2)
    "pied : " + $d.Sections.Item(1).Footers.Item(1).Range.Text
    $d.Close(0)
} finally { $w.Quit() }
$out; $pdf
