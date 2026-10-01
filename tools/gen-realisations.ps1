# Génère contenus/realisations.html à partir de la liste des projets ci-dessous.
$agence = "Projet conçu et suivi par Chloé Tissier, au sein de l'agence Cadea."
$projets = @(
  @{ cat='pro'; titre='Golf du Gouverneur'; meta='Accueil, restaurant et salles de séminaire · Conception et suivi de travaux'; agence=$true
     texte=@("Rénovation de trois espaces d'un complexe golfique : l'accueil, les coins VIP du restaurant ainsi que l'espace lounge, et les salles de séminaire avec leur hall.", "L'enjeu : moderniser l'image du lieu et fluidifier l'accueil de la clientèle, tout en conservant le caractère du bâtiment et ses grandes arches.")
     # Comparateurs synchronisés : chaque ligne = un point de vue, dans l'ordre des colonnes
     compare=@(
       @{ titre='Accueil'; cols=@('Avant','Visuel 3D','Réalisé'); vues=@(
          @('golf-acc-1-avant.jpg','golf-acc-1-3d.jpg','golf-acc-1-apres.jpg','Accueil vu de face'),
          @('golf-acc-2-avant.jpg','golf-acc-2-3d.jpg','golf-acc-2-apres.jpg','Accueil côté grandes arches'),
          @('golf-acc-3-avant.jpg','golf-acc-3-3d.jpg','golf-acc-3-apres.jpg','Accueil vers l{apos}escalier')) }
       @{ titre='Hall et salles de séminaire'; cols=@('Avant','Visuel 3D','Réalisé'); vues=@(
          @('golf-sem-1-avant.jpg','golf-sem-1-3d.jpg','golf-sem-1-apres.jpg','Hall face aux salles'),
          @('golf-sem-2-avant.jpg','golf-sem-2-3d.jpg','golf-sem-2-apres.jpg','Hall et îlot central'),
          @('golf-sem-3-avant.jpg','golf-sem-3-3d.jpg','golf-sem-3-apres.jpg','Salle de séminaire')) }
       @{ titre='Lounge et coins VIP du restaurant'; cols=@('Avant','Réalisé'); vues=@(
          @('golf-res-1-avant.jpg','golf-res-1-apres.jpg','Espace lounge'),
          @('golf-res-2-avant.jpg','golf-res-2-apres.jpg','Coin VIP'),
          @('golf-res-3-avant.jpg','golf-res-3-apres.jpg','Claustra bois')) }
     ) }
  @{ cat='pro'; titre='Vinci Facilities'; meta='Bureaux dans un bâtiment neuf à ossature bois · Conception et suivi de travaux'; agence=$true
     texte=@("Aménagement intérieur de plusieurs plateaux de bureaux : open spaces, salles de réunion, espaces de convivialité et « rue intérieure » reliant les services.", "Claustras végétaux, sols en damier et mobilier coloré structurent les grands volumes et créent des espaces de travail chaleureux.")
     img=@(@('vinci-avant.jpg','Avant','Plateau de bureaux Vinci Facilities pendant la construction'), @('vinci-avant-2.jpg','Avant','Structure bois du bâtiment avant aménagement'), @('vinci-3d.jpg','Visuel 3D','Visuel 3D de la rue intérieure'),
           @('vinci-apres.jpg','Réalisé','Rue intérieure bordée de claustras végétaux'), @('vinci-apres-2.jpg','Réalisé','Claustras ajourés séparant les espaces de travail'), @('vinci-apres-3.jpg','Réalisé','Espace de réunion informel en mange-debout'),
           @('vinci-apres-4.jpg','Réalisé','Coin détente sous l{apos}escalier'), @('vinci-apres-5.jpg','Réalisé','Salle de réunion'), @('vinci-apres-6.jpg','Réalisé','Salle de réunion avec papier peint graphique')) }
  @{ cat='pro'; titre='RB Système'; meta='Bureaux · Conception et visuels 3D'; agence=$true
     texte=@("Réaménagement de bureaux : open space, bureau de direction, salle de réunion et espace détente.", "Les visuels 3D permettent au client de valider chaque choix avant les travaux, et le résultat est fidèle au projet.")
     img=@(@('rbsysteme-3d.jpg','Visuel 3D','Visuel 3D de l{apos}open space'), @('rbsysteme-apres.jpg','Réalisé','Open space après travaux, fidèle au visuel 3D'), @('rbsysteme-3d-2.jpg','Visuel 3D','Visuel 3D du bureau de direction'),
           @('rbsysteme-apres-2.jpg','Réalisé','Poste de travail après travaux'), @('rbsysteme-3d-3.jpg','Visuel 3D','Visuel 3D de l{apos}espace détente'), @('rbsysteme-3d-4.jpg','Visuel 3D','Visuel 3D de la salle de réunion')) }
  @{ cat='pro'; titre='Jeremias'; meta='Accueil, showroom et espaces de vie au rez-de-chaussée · Conception et suivi de travaux'; agence=$true
     texte=@("Mon premier projet : la rénovation du rez-de-chaussée des locaux d'un fabricant de conduits de cheminée.", "Un accueil lumineux, un showroom qui met en valeur les produits et un espace détente coloré pour les équipes.")
     img=@(@('jeremias-3d.jpg','Visuel 3D','Visuel 3D de l{apos}entrée'), @('jeremias-apres.jpg','Réalisé','Entrée et accueil après travaux'), @('jeremias-apres-2.jpg','Réalisé','Comptoir d{apos}accueil'),
           @('jeremias-apres-3.jpg','Réalisé','Showroom des produits'), @('jeremias-3d-2.jpg','Visuel 3D','Visuel 3D de l{apos}espace détente'), @('jeremias-apres-4.jpg','Réalisé','Espace détente avec poufs colorés')) }
  @{ cat='pro'; titre='Cofruly'; meta='Bureaux · Conception et suivi de travaux'; agence=$true
     texte=@("Aménagement complet d'un plateau de bureaux, du plateau brut à la livraison : bureaux, espace administratif et salle de réunion.", "Papier peint panoramique végétal, revêtement mural texturé et teintes vert céladon donnent une identité forte aux espaces.")
     img=@(@('cofruly-pendant.jpg','Pendant','Plateau brut pendant les travaux'), @('cofruly-3d.jpg','Visuel 3D','Visuel 3D d{apos}un bureau avec papier peint panoramique'), @('cofruly-apres.jpg','Réalisé','Papier peint panoramique végétal après travaux'),
           @('cofruly-3d-2.jpg','Visuel 3D','Visuel 3D de la salle de réunion'), @('cofruly-apres-2.jpg','Réalisé','Salle de réunion après travaux'), @('cofruly-apres-3.jpg','Réalisé','Mur au revêtement texturé')) }
  @{ cat='pro'; titre='Mobilier sur mesure'; meta='Bureaux · Conception du meuble sur mesure et sélection du mobilier'; agence=$true
     texte=@("Conception d'un grand meuble de rangement sur mesure et sélection du mobilier pour des bureaux en centre-ville.")
     img=@(@('leroy-meuble.jpg','Réalisé','Meuble de rangement sur mesure'), @('leroy-meuble-2.jpg','Réalisé','Meuble sur mesure et plan de travail'), @('leroy-meuble-3.jpg','Réalisé','Détail du meuble sur mesure')) }
  @{ cat='part'; titre='Appartement'; meta='Conception · Plans et visuels 3D'; agence=$false
     texte=@("Réorganisation complète d'un appartement : nouveaux espaces de vie, cuisine ouverte et rangements optimisés. Photos après travaux à venir.")
     img=@(@('aksel-3d.jpg','Visuel 3D','Perspective 3D de l{apos}appartement'), @('aksel-3d-2.jpg','Visuel 3D','Variante du projet en perspective 3D')) }
  @{ cat='part'; titre='Studio'; meta='Conception · Travaux prévus en 2027'; agence=$false
     texte=@("Optimiser chaque mètre carré d'un studio : cuisine intégrée, bibliothèque sur mesure et tête de lit en papier peint panoramique.")
     img=@(@('studio-3d.jpg','Visuel 3D','Cuisine intégrée du studio'), @('studio-3d-2.jpg','Visuel 3D','Bibliothèque sur mesure'), @('studio-3d-3.jpg','Visuel 3D','Tête de lit en papier peint panoramique'), @('studio-3d-4.jpg','Visuel 3D','Entrée et cloison en papier peint')) }
  @{ cat='part'; titre='Salle de bain'; meta='Conception · Travaux prévus fin 2026'; agence=$false
     texte=@("Rénovation d'une salle de bain dans des tons travertin : douche à l'italienne, colonne de rangement et menuiseries bois.")
     img=@(@('sdb-3d.jpg','Visuel 3D','Douche à l{apos}italienne en travertin'), @('sdb-3d-2.jpg','Visuel 3D','Colonne de rangement bois')) }
  @{ cat='part'; titre='Salle d{apos}eau'; meta='Conception · Plans et visuels 3D'; agence=$false
     texte=@("Aménagement d'une salle d'eau compacte et fonctionnelle, pensée au centimètre près.")
     img=@(@('entree-3d.jpg','Visuel 3D','Visuel 3D de la salle d{apos}eau'), @('entree-3d-2.jpg','Visuel 3D','Vue axonométrique de la salle d{apos}eau')) }
)

# Comparateurs des autres projets : images <prefixe>-<n>-<colonne>.jpg préparées dans audit/realisations
function Comparateur($titre, $prefixe, $colonnes, $noms) {
  $cles = @{ 'Avant'='avant'; 'Pendant'='pendant'; 'Visuel 3D'='3d'; 'Réalisé'='apres' }
  $vues = for ($n = 1; $n -le $noms.Count; $n++) { ,(@($colonnes | ForEach-Object { "$prefixe-$n-$($cles[$_]).jpg" }) + $noms[$n - 1]) }
  @{ titre = $titre; cols = $colonnes; vues = $vues }
}
$comparateurs = @{
  'Vinci Facilities' = @(Comparateur 'Espaces communs et bureaux' 'vin' @('Avant','Visuel 3D','Réalisé') @('Coin détente sous l{apos}escalier','Rue intérieure','Réfectoire','Open space','Salle de réunion'))
  'RB Système'       = @(Comparateur 'Du visuel 3D à la réalisation' 'rbs' @('Visuel 3D','Réalisé') @('Open space','Bureau de direction','Espace détente','Salle de réunion','Réfectoire','Coin café'))
  'Jeremias'         = @(Comparateur 'Rez-de-chaussée' 'jer' @('Pendant','Visuel 3D','Réalisé') @('Entrée et accueil','Espace détente','Salle de réunion','Espace repas','Showroom'))
  'Cofruly'          = @(Comparateur 'Bureaux' 'cof' @('Pendant','Visuel 3D','Réalisé') @('Bureau comptabilité','Bureau de direction','Salle de réunion','Espace commercial'))
}
foreach ($p in $projets) { if ($comparateurs.ContainsKey($p.titre)) { $p.compare = $comparateurs[$p.titre]; $p.Remove('img') } }

function E([string]$s) { $s.Replace('&', '&amp;').Replace('<', '&lt;').Replace('>', '&gt;').Replace('"', '&quot;') }

$h = New-Object Text.StringBuilder
[void]$h.AppendLine('<!-- wp:group {"className":"ct-real","layout":{"type":"constrained","contentSize":"1100px"}} -->')
[void]$h.AppendLine('<div class="wp-block-group ct-real">')
[void]$h.AppendLine('<!-- wp:heading {"level":1} -->' + "`n" + '<h1 class="wp-block-heading">Mes réalisations en architecture d''intérieur</h1>' + "`n" + '<!-- /wp:heading -->')
[void]$h.AppendLine('<!-- wp:paragraph {"className":"ct-real-intro"} -->' + "`n" + '<p class="ct-real-intro">Bureaux, espaces d''accueil, logements : découvrez quelques projets, du visuel 3D à la réalisation. Cliquez sur une image pour l''agrandir.</p>' + "`n" + '<!-- /wp:paragraph -->')
[void]$h.AppendLine('<!-- wp:html -->' + "`n" + '<div class="ct-filtres" role="group" aria-label="Filtrer les projets"><button type="button" class="ct-filtre actif" data-filtre="tous">Tous</button><button type="button" class="ct-filtre" data-filtre="pro">Professionnels</button><button type="button" class="ct-filtre" data-filtre="part">Particuliers</button></div>' + "`n" + '<!-- /wp:html -->')
$n = 0
foreach ($p in $projets) {
  $n++
  $cls = "ct-projet ct-cat-$($p.cat)"
  [void]$h.AppendLine("`n<!-- wp:group {`"className`":`"$cls`",`"layout`":{`"type`":`"default`"}} -->`n<div class=`"wp-block-group $cls`">")
  [void]$h.AppendLine("<!-- wp:heading -->`n<h2 class=`"wp-block-heading`">$(E $p.titre)</h2>`n<!-- /wp:heading -->")
  $etiq = if ($p.cat -eq 'pro') { 'Professionnel' } else { 'Particulier' }
  [void]$h.AppendLine("<!-- wp:paragraph {`"className`":`"ct-projet-meta`"} -->`n<p class=`"ct-projet-meta`"><span class=`"ct-badge`">$etiq</span> $(E $p.meta)</p>`n<!-- /wp:paragraph -->")
  foreach ($t in $p.texte) { [void]$h.AppendLine("<!-- wp:paragraph -->`n<p>$(E $t)</p>`n<!-- /wp:paragraph -->") }
  if ($p.agence) { [void]$h.AppendLine("<!-- wp:paragraph {`"className`":`"ct-agence`"} -->`n<p class=`"ct-agence`">$(E $agence)</p>`n<!-- /wp:paragraph -->") }
  if ($p.compare) {
    foreach ($c in $p.compare) {
      $nc = $c.cols.Count
      $html = "<div class=`"ct-compare ct-cols-$nc`" tabindex=`"0`" aria-roledescription=`"comparateur`">`n"
      $html += "<div class=`"ct-compare-tete`"><h3>$(E $c.titre)</h3><div class=`"ct-compare-nav`"><button type=`"button`" class=`"ct-prec`" aria-label=`"Vue précédente`">&#8249;</button><span class=`"ct-compteur`">1 / $($c.vues.Count)</span><button type=`"button`" class=`"ct-suiv`" aria-label=`"Vue suivante`">&#8250;</button></div></div>`n"
      $html += "<div class=`"ct-compare-cols`">`n"
      for ($k = 0; $k -lt $nc; $k++) {
        $html += "<div class=`"ct-col`"><p class=`"ct-col-titre`">$(E $c.cols[$k])</p><div class=`"ct-slides`">"
        for ($v = 0; $v -lt $c.vues.Count; $v++) {
          $vue = $c.vues[$v]; $alt = E ("$($vue[$nc]) – $($c.cols[$k])")
          $act = if ($v -eq 0) { ' actif' } else { '' }
          $html += "<img class=`"ct-slide$act`" src=`"{{img:$($vue[$k])|$alt}}`" alt=`"$alt`" loading=`"lazy`">"
        }
        $html += "</div></div>`n"
      }
      $html += "</div>`n"
      $html += "<div class=`"ct-points`">" + (($c.vues | ForEach-Object { "<span data-legende=`"$(E $_[$nc])`"></span>" }) -join '') + "</div>`n</div>"
      [void]$h.AppendLine("<!-- wp:html -->`n$html`n<!-- /wp:html -->")
    }
    [void]$h.AppendLine("</div>`n<!-- /wp:group -->")
    continue
  }
  [void]$h.AppendLine('<!-- wp:group {"className":"ct-galerie","layout":{"type":"default"}} -->' + "`n" + '<div class="wp-block-group ct-galerie">')
  foreach ($i in $p.img) {
    $alt = E $i[2]
    [void]$h.AppendLine("<!-- wp:image {`"sizeSlug`":`"large`",`"linkDestination`":`"none`",`"lightbox`":{`"enabled`":true}} -->`n<figure class=`"wp-block-image size-large`"><img src=`"{{img:$($i[0])|$alt}}`" alt=`"$alt`"/><figcaption class=`"wp-element-caption`">$(E $i[1])</figcaption></figure>`n<!-- /wp:image -->")
  }
  [void]$h.AppendLine("</div>`n<!-- /wp:group -->`n</div>`n<!-- /wp:group -->")
}
[void]$h.AppendLine("`n</div>`n<!-- /wp:group -->")
[void]$h.AppendLine(@'

<!-- wp:html -->
<div class="ct-cta">
<p class="ct-cta-titre">Et si votre projet était le prochain ?</p>
<p class="ct-cta-texte">Parlons-en : je vous accompagne à chaque étape, de l'idée à la réalisation.</p>
<div class="ct-cta-actions"><a class="ct-btn" href="/contact/">Contactez-moi</a><a class="ct-btn" href="/mes-prestations/">Découvrez mes prestations</a></div>
<p class="ct-cta-manuscrit">Révélons ensemble le potentiel de vos espaces</p>
</div>
<!-- /wp:html -->
'@)
$out = Join-Path (Split-Path $PSScriptRoot) 'contenus\realisations.html'
[IO.File]::WriteAllText($out, $h.ToString().Replace('{apos}', [string][char]0x2019), (New-Object Text.UTF8Encoding $false))
"$n projets -> $out"
