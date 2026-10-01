<?php
/**
 * Plugin Name: CT – Mise en forme des pages
 * Description: Styles des pages de contenu selon la charte CT Architecte d'intérieur (FAQ numérotée Q.01…, bouton final) et données structurées FAQPage générées automatiquement à partir des questions de la page.
 * Version: 1.0
 */

if (!defined('ABSPATH')) { exit; }

add_action('wp_head', function () {
    if (is_admin()) { return; }
    ?>
<style id="ct-pages">
.ct-faq-intro{font-size:17px;color:#382A25;max-width:760px}
.ct-faq{counter-reset:ctq;max-width:820px;margin-top:24px}
.ct-faq .ct-faq-theme{font-family:'Montserrat',sans-serif;font-weight:700;font-size:15px;letter-spacing:.06em;text-transform:uppercase;color:#382A25;background:#E7E1DC;border-radius:12px;padding:12px 18px;margin:48px 0 8px}
.ct-faq .ct-faq-theme:first-child{margin-top:8px}
.ct-faq .ct-faq-q{counter-increment:ctq;font-family:'Montserrat',sans-serif;font-weight:600;font-size:20px;line-height:1.4;color:#843A45;margin:0;padding:28px 0 0;border-top:3px solid #A8B2A1}
.ct-faq .ct-faq-theme + .ct-faq-q{border-top:0;padding-top:16px}
.ct-faq .ct-faq-q::before{content:"Question " counter(ctq) " : "}
.ct-faq .ct-faq-q ~ p,.ct-faq .ct-faq-q ~ ul{color:#382A25;font-size:16px;line-height:1.7}
.ct-faq .ct-faq-q + p,.ct-faq .ct-faq-q + ul{margin-top:12px}
.ct-faq ul{padding-left:18px}
.ct-faq li{margin:8px 0}
.ct-faq li::marker{color:#A8B2A1}
.ct-faq p:last-child{margin-bottom:28px}
.ct-faq a,.ct-faq-intro a{color:#843A45}
.ct-faq-fin{background:transparent;border:3px solid #A8B2A1;border-radius:30px;padding:16px 20px;margin-top:40px;max-width:820px;color:#382A25}
/* Même espace avant le pied de page que sur les pages avec titre (Astra : 60 px sur ordinateur) */
@media (min-width:922px){.ast-plain-container.ast-no-sidebar #primary:has(.ct-faq-fin),.ast-plain-container.ast-no-sidebar #primary:has(.ct-cta){margin-bottom:60px}}
.ct-faq-fin p{margin-bottom:12px}
.ct-faq-fin .wp-block-buttons{margin-top:4px}
.ct-faq-fin .wp-block-button .wp-block-button__link{border:3px solid #A8B2A1!important;border-radius:30px;color:#382A25!important;background:transparent!important;padding:10px 32px;font-weight:600}
.ct-faq-fin .wp-block-button .wp-block-button__link:hover{background:#A8B2A1!important;color:#382A25!important}
.ct-apropos{color:#382A25;font-size:16px;line-height:1.7}
.ct-apropos-haut{gap:56px;margin-bottom:80px!important}
.ct-apropos p{margin-bottom:18px}
.ct-apropos + .ct-faq-fin{margin-top:16px}
.ct-apropos .ct-portrait img{width:100%;height:auto;border-radius:30px;box-shadow:0 10px 30px rgba(56,42,37,.12)}
.ct-apropos h1{font-family:'Montserrat',sans-serif;font-weight:700;font-size:30px;line-height:1.3;color:#843A45;margin:0 0 24px}
.ct-apropos h2{font-family:'Montserrat',sans-serif;font-weight:600;font-size:22px;color:#843A45;margin:72px 0 18px}
.ct-apropos-haut h2{margin-top:0}
.ct-apropos .ct-accroche{font-size:16px;margin:12px 0 36px}
.ct-apropos .ct-accroche strong{font-family:'Benedict',cursive;font-weight:400;font-size:1.45em;line-height:1;color:#382A25}
.ct-apropos .wp-block-kadence-rowlayout{margin:0 0 24px!important;border-radius:30px;overflow:hidden}
.ct-presta{color:#382A25;font-size:16px;line-height:1.7}
.ct-presta h1{font-family:'Montserrat',sans-serif;font-weight:700;font-size:30px;line-height:1.3;color:#843A45;margin:0 0 24px}
.ct-presta .ct-presta-intro{font-size:18px;margin-bottom:10px}
.ct-presta p{margin-bottom:16px}
.ct-presta .ct-forfait{border-top:3px solid #A8B2A1;padding-top:36px;margin-top:48px}
.ct-presta h2{font-family:'Montserrat',sans-serif;font-weight:600;font-size:22px;color:#843A45;margin:0 0 10px}
.ct-presta h3{font-family:'Montserrat',sans-serif;font-weight:600;font-size:18px;color:#382A25;margin:28px 0 10px}
.ct-presta h2 + h3{margin-top:4px}
.ct-presta .ct-etape{display:inline-block;margin-right:10px;padding:2px 12px;border:2px solid #A8B2A1;border-radius:30px;font-size:13px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;vertical-align:2px}
.ct-presta ul{padding-left:20px;margin:0 0 16px}
.ct-presta li{margin:6px 0}
.ct-presta li::marker{color:#A8B2A1}
.ct-presta .ct-conclusion{color:#843A45;font-weight:600;margin-top:18px}
.ct-presta .ct-bande{background:#E7E1DC;border-radius:30px;padding:32px 36px;margin-top:56px}
.ct-presta .ct-bande .wp-block-columns{gap:48px;margin:0}
.ct-presta .ct-bande h2{font-size:20px}
.ct-presta .ct-bande ul{margin-bottom:12px}
.ct-presta .ct-bande .ct-bande-fin{margin:20px 0 0;padding-top:18px;border-top:1px solid rgba(56,42,37,.15);font-weight:600}
.ct-presta .ct-bande + .ct-rdv{border-top:0;margin-top:40px;padding-top:0}
.ct-presta .ct-rdv p:last-child{margin-bottom:0}
.ct-presta a{color:#843A45}
.ct-presta + .ct-faq-fin{margin-top:32px}
.ct-methode .ct-atouts{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:18px}
.ct-methode .ct-atout{background:#E7E1DC;border-radius:24px;padding:22px 22px 8px}
.ct-methode .ct-atout h3{color:#843A45;font-size:18px;margin:0 0 8px}
.ct-methode .ct-atout p{text-align:left!important;-webkit-hyphens:manual!important;hyphens:manual!important}
.ct-methode .ct-deux-publics{gap:40px;margin-top:18px}
.ct-methode .ct-photo-arrondie img{width:100%;aspect-ratio:4/3;object-fit:cover;border-radius:30px}
.ct-methode .ct-deux-publics h3{color:#843A45;margin-top:18px}
.ct-methode .ct-etapes{counter-reset:ctet;margin-top:18px}
.ct-methode .ct-etape-bloc{counter-increment:ctet;position:relative;padding:4px 0 6px 68px;margin-bottom:18px;min-height:52px}
.ct-methode .ct-etape-bloc::before{content:counter(ctet);position:absolute;left:0;top:0;width:48px;height:48px;border-radius:50%;background:#A8B2A1;color:#382A25;font:700 20px/48px 'Montserrat',sans-serif;text-align:center}
.ct-methode .ct-etape-bloc h3{margin:6px 0 4px;color:#382A25}
.ct-methode .ct-etape-bloc p{margin:0}
.ct-faq-fin .wp-block-buttons{gap:14px}
@media (max-width:900px){.ct-methode .ct-atouts{grid-template-columns:1fr 1fr}}
@media (max-width:600px){.ct-methode .ct-atouts{grid-template-columns:1fr}}
/* Tous les boutons du site : vert sauge plein, texte brun ; survol bordeaux, texte blanc.
   (Pas de « display » ici : Astra masque lui-même la version mobile du bouton d'en-tête.) */
.entry-content .wp-block-button .wp-block-button__link,.ct-btn,.ct-form input[type=submit],.ast-custom-button{background:#D4D9D0!important;color:#382A25!important;border:0!important;border-radius:30px!important;padding:12px 30px!important;font-family:'Montserrat',sans-serif;font-weight:600!important;font-size:15px;text-decoration:none!important;transition:background .2s,color .2s}
.ct-btn{display:inline-block}
.entry-content .wp-block-button .wp-block-button__link:hover,.entry-content .wp-block-button .wp-block-button__link:focus-visible,.ct-btn:hover,.ct-btn:focus-visible,.ct-form input[type=submit]:hover,.ct-form input[type=submit]:focus-visible,.ast-custom-button-link:hover .ast-custom-button{background:#843A45!important;color:#fff!important;outline:none}
/* Titres : même police, même couleur, même taille sur tout le site */
body .entry-content h1,body .entry-content h2,body .entry-content h3,body .entry-content h4{font-family:'Montserrat',sans-serif!important;color:#843A45!important;line-height:1.3}
body .entry-content h1{font-size:30px!important;font-weight:700!important}
body .entry-content h2{font-size:24px!important;font-weight:600!important}
body .entry-content h3{font-size:20px!important;font-weight:600!important}
body .entry-content h4{font-size:18px!important;font-weight:600!important}
body .entry-content .ct-faq .ct-faq-theme{font-size:15px!important;font-weight:700!important;color:#382A25!important}
@media (max-width:781px){body .entry-content h1{font-size:24px!important}body .entry-content h2{font-size:21px!important}body .entry-content h3,body .entry-content h4{font-size:18px!important}}
/* Introduction de la page Méthode dans un encadré beige */
.ct-intro-encadre{background:#fff;border:3px solid #E7E1DC;border-radius:30px;padding:26px 32px;margin:0 auto 8px;max-width:1100px;color:#382A25}
.ct-intro-encadre p{margin:0 0 12px}
.ct-intro-encadre .ct-zone{display:flex;align-items:center;gap:12px;margin:16px 0 0;font-weight:600;text-align:left!important}
/* Cartes vertes en ligne (rangées de 5) : même hauteur, icônes/chiffres, titres et textes alignés */
.kt-has-5-columns{align-items:stretch!important}
.kt-has-5-columns>.wp-block-kadence-column,.kt-has-5-columns>.wp-block-kadence-column>.kt-inside-inner-col,.kt-has-5-columns .wp-block-kadence-infobox{height:100%}
.kt-has-5-columns .kt-blocks-info-box-link-wrap{height:100%;display:flex!important;flex-direction:column;justify-content:flex-start!important}
.kt-has-5-columns .kt-blocks-info-box-media-container{flex:none}
.kt-has-5-columns .kt-blocks-info-box-title{min-height:2.6em;display:flex;align-items:flex-start;justify-content:center}
/* Encadré de fin de page : question en bordeaux, boutons verts, signature manuscrite */
.ct-cta{max-width:820px;margin:56px auto 24px;text-align:center;color:#382A25;font-family:'Montserrat',sans-serif}
.ct-cta p{text-align:center!important;-webkit-hyphens:manual!important;hyphens:manual!important}
.ct-cta-titre{font-size:20px;font-weight:600;color:#843A45;margin:0 0 6px!important}
.ct-cta-texte{margin:0 0 18px!important}
.ct-cta-actions{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:12px 16px;margin-top:18px}
.ct-cta-manuscrit{font-family:'Benedict',cursive;font-size:26px;line-height:1.3;color:#382A25;margin:18px 0 0!important}
@media (max-width:700px){.ct-cta-manuscrit{font-size:22px}}
.ct-real{color:#382A25;font-size:16px;line-height:1.7}
.ct-real h1{font-family:'Montserrat',sans-serif;font-weight:700;font-size:30px;line-height:1.3;color:#843A45;margin:0 0 16px}
.ct-real .ct-real-intro{font-size:17px;margin-bottom:24px}
.ct-filtres{display:flex;flex-wrap:wrap;gap:10px;margin:0 0 8px}
.ct-filtre{cursor:pointer;border:2px solid #A8B2A1;border-radius:30px;background:#fff;color:#382A25;padding:8px 20px;font:600 14px 'Montserrat',sans-serif}
.ct-filtre:hover,.ct-filtre:focus-visible{border-color:#843A45;outline:none}
.ct-filtre.actif{background:#A8B2A1;color:#382A25}
.ct-real .ct-projet{border-top:3px solid #A8B2A1;padding-top:36px;margin-top:44px}
.ct-real .ct-projet.ct-masque{display:none}
.ct-real .ct-projet h2{font-family:'Montserrat',sans-serif;font-weight:600;font-size:24px;color:#843A45;margin:0 0 6px}
.ct-real .ct-projet-meta{font-size:14px;font-weight:600;margin-bottom:14px}
.ct-real .ct-badge{display:inline-block;margin-right:8px;padding:2px 12px;border-radius:30px;background:#E7E1DC;font-size:12px;letter-spacing:.04em;text-transform:uppercase}
.ct-real .ct-agence{font-size:14px;font-style:italic;opacity:.85}
.ct-real .ct-galerie{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:18px}
.ct-real .ct-galerie figure{margin:0!important}
.ct-real .ct-galerie img{width:100%;aspect-ratio:4/3;object-fit:cover;border-radius:24px;display:block}
.ct-real .ct-galerie figcaption{margin:10px 0 0;font-size:14px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#843A45;text-align:center}
.ct-real + .ct-faq-fin{margin-top:48px}
.ct-compare{margin:26px 0 8px;outline:none}
.ct-compare-tete{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-bottom:12px}
.ct-compare-tete h3{font-family:'Montserrat',sans-serif;font-weight:600;font-size:18px;color:#382A25;margin:0}
.ct-compare-nav{display:flex;align-items:center;gap:10px}
.ct-compare-nav button{cursor:pointer;width:40px;height:40px;border:2px solid #A8B2A1;border-radius:50%;background:#fff;color:#382A25;font-size:24px;line-height:1;padding:0}
.ct-compare-nav button:hover,.ct-compare-nav button:focus-visible{background:#A8B2A1;outline:none}
.ct-compteur{font-size:14px;font-weight:600;min-width:44px;text-align:center}
.ct-compare-cols{display:grid;gap:14px}
.ct-cols-3 .ct-compare-cols{grid-template-columns:repeat(3,1fr)}
.ct-cols-2 .ct-compare-cols{grid-template-columns:repeat(2,1fr)}
.ct-col-titre{margin:0 0 10px!important;font-size:16px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#843A45;text-align:center!important}
.ct-slides{position:relative;aspect-ratio:4/3;background:#fff}
/* L'image garde son format et ses propres coins arrondis, centrée dans le cadre */
.ct-slide{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:auto!important;height:auto!important;max-width:100%;max-height:100%;border-radius:24px;opacity:0;transition:opacity .35s;cursor:zoom-in}
.ct-slide.actif{opacity:1;z-index:1}
.ct-legende{display:none}
.ct-points{display:flex;justify-content:center;gap:8px;margin-top:12px}
.ct-points span{width:10px;height:10px;border-radius:50%;background:#E7E1DC;cursor:pointer}
.ct-points span.actif{background:#A8B2A1}
.ct-zoom{position:fixed;inset:0;z-index:100000;background:rgba(56,42,37,.9);display:flex;align-items:center;justify-content:center;padding:24px;cursor:zoom-out}
.ct-zoom img{max-width:100%;max-height:100%;border-radius:12px}
@media (max-width:781px){.ct-cols-3 .ct-compare-cols,.ct-cols-2 .ct-compare-cols{grid-template-columns:1fr;gap:10px}.ct-compare-tete{flex-wrap:wrap}}
@media (max-width:781px){.ct-real h1{font-size:24px}.ct-real .ct-galerie{grid-template-columns:repeat(2,1fr);gap:10px}.ct-real .ct-projet h2{font-size:21px}}
/* Toutes les pages : texte justifié sur ordinateur et tablette (avec coupure des mots), aligné à gauche sur téléphone.
   Exclus : textes centrés/alignés, textes des encadrés à icône (Kadence), formulaires, accroches. */
@media (min-width:768px){body.page .entry-content p:not([class*="has-text-align"]):not(.kt-blocks-info-box-text):not(.ct-presta-intro):not(.ct-accroche):not(.ct-rgpd):not(.ct-aide):not(.ct-total){text-align:justify;-webkit-hyphens:auto;hyphens:auto}}
@media (max-width:767px){body.page .entry-content p:not([class*="has-text-align"]):not(.kt-blocks-info-box-text){text-align:left;-webkit-hyphens:manual;hyphens:manual}}
body.page .entry-content .wpcf7 p{text-align:left!important;-webkit-hyphens:manual!important;hyphens:manual!important}
@media (max-width:781px){.ct-presta h1{font-size:24px}.ct-presta .ct-bande{padding:24px 20px}.ct-presta .ct-bande .wp-block-columns{gap:8px}}
@media (max-width:781px){.ct-apropos-haut{gap:32px;margin-bottom:56px!important}.ct-apropos h2{margin-top:56px}.ct-apropos h1{font-size:24px}}
@media (max-width:600px){.ct-faq .ct-faq-q{font-size:18px}.ct-faq .ct-faq-theme{font-size:13px}}
</style>
    <?php
}, 100);

// Typographie française : espace insécable avant : ; ! ? » et après « (jamais de « : » en début de ligne).
// Ne touche qu'au texte, jamais aux balises, styles ou scripts.
add_filter('the_content', function ($html) {
    if (is_admin() || $html === '') { return $html; }
    $parts = preg_split('#(<script[\s\S]*?</script>|<style[\s\S]*?</style>|<[^>]+>)#i', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($parts as $i => $p) {
        if ($p === '' || $p[0] === '<') { continue; }
        $p = preg_replace('/(?:[ \t\x{00A0}\x{202F}]|&nbsp;)+([:;!?»])/u', "\u{00A0}$1", $p);
        $p = preg_replace('/«(?:[ \t\x{00A0}\x{202F}]|&nbsp;)+/u', "«\u{00A0}", $p);
        $parts[$i] = $p;
    }
    return implode('', $parts);
}, 99);

// Bouton « Appelez-moi » de l'en-tête : sur téléphone le lien tel: ouvre l'appel ;
// sur ordinateur (souris), le premier clic affiche le numéro à la place du texte.
add_action('wp_footer', function () {
    if (is_admin()) { return; }
    ?>
<script>
(function(){
  if (!window.matchMedia || !window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;
  document.querySelectorAll('a[href^="tel:"].ast-custom-button-link, .ast-builder-button-wrap a[href^="tel:"]').forEach(function(a){
    a.addEventListener('click', function(e){
      if (a.getAttribute('data-ct-affiche')) return;
      e.preventDefault();
      var num = a.getAttribute('href').replace('tel:', '').replace(/^\+33/, '0').replace(/(\d{2})(?=\d)/g, '$1 ');
      var cible = a.querySelector('.ast-custom-button') || a;
      cible.textContent = num;
      a.setAttribute('data-ct-affiche', '1');
      a.setAttribute('aria-label', 'Numéro de téléphone : ' + num);
    });
  });
})();
</script>
    <?php
}, 100);

// Comparateurs Avant / 3D / Réalisé : toutes les colonnes défilent ensemble
add_action('wp_footer', function () {
    if (is_admin()) { return; }
    ?>
<script>
(function(){
  document.querySelectorAll('.ct-compare').forEach(function(box){
    var cols = box.querySelectorAll('.ct-slides');
    var n = cols[0] ? cols[0].children.length : 0, i = 0;
    var compteur = box.querySelector('.ct-compteur'), legende = box.querySelector('.ct-legende');
    var points = box.querySelectorAll('.ct-points span');
    function aller(k){
      i = (k + n) % n;
      cols.forEach(function(c){ Array.prototype.forEach.call(c.children, function(img, j){ img.classList.toggle('actif', j === i); }); });
      points.forEach(function(p, j){ p.classList.toggle('actif', j === i); });
      if (compteur) compteur.textContent = (i + 1) + ' / ' + n;
      if (legende && points[i]) legende.textContent = points[i].getAttribute('data-legende');
    }
    box.querySelector('.ct-prec').addEventListener('click', function(){ aller(i - 1); });
    box.querySelector('.ct-suiv').addEventListener('click', function(){ aller(i + 1); });
    points.forEach(function(p, j){ p.addEventListener('click', function(){ aller(j); }); });
    box.addEventListener('keydown', function(e){ if (e.key === 'ArrowLeft') aller(i - 1); if (e.key === 'ArrowRight') aller(i + 1); });
    var x0 = null;
    box.addEventListener('touchstart', function(e){ x0 = e.touches[0].clientX; }, {passive:true});
    box.addEventListener('touchend', function(e){ if (x0 === null) return; var d = e.changedTouches[0].clientX - x0; if (Math.abs(d) > 40) aller(d < 0 ? i + 1 : i - 1); x0 = null; });
    box.querySelectorAll('.ct-slide').forEach(function(img){
      img.addEventListener('click', function(){
        var z = document.createElement('div'); z.className = 'ct-zoom';
        var big = document.createElement('img'); big.src = img.currentSrc || img.src; big.alt = img.alt;
        z.appendChild(big); z.addEventListener('click', function(){ z.remove(); });
        document.addEventListener('keydown', function esc(e){ if (e.key === 'Escape') { z.remove(); document.removeEventListener('keydown', esc); } });
        document.body.appendChild(z);
      });
    });
    aller(0);
  });
})();
</script>
    <?php
}, 100);

// Filtre Tous / Professionnels / Particuliers de la page Réalisations
add_action('wp_footer', function () {
    if (is_admin()) { return; }
    ?>
<script>
(function(){
  var btns = document.querySelectorAll('.ct-filtre');
  if (!btns.length) return;
  btns.forEach(function(b){
    b.addEventListener('click', function(){
      var f = b.getAttribute('data-filtre');
      btns.forEach(function(x){ x.classList.toggle('actif', x === b); x.setAttribute('aria-pressed', x === b ? 'true' : 'false'); });
      document.querySelectorAll('.ct-projet').forEach(function(p){
        p.classList.toggle('ct-masque', f !== 'tous' && !p.classList.contains('ct-cat-' + f));
      });
    });
  });
})();
</script>
    <?php
}, 100);

// Données structurées FAQPage, construites à partir des titres .ct-faq-q et des paragraphes qui les suivent
add_action('wp_head', function () {
    if (is_admin() || !is_singular('page')) { return; }
    $html = apply_filters('the_content', get_post_field('post_content', get_queried_object_id()));
    if (strpos($html, 'ct-faq-q') === false) { return; }
    $parts = preg_split('#<h3[^>]*ct-faq-q[^>]*>#', $html);
    array_shift($parts);
    $items = [];
    foreach ($parts as $part) {
        $q = trim(wp_strip_all_tags(strstr($part, '</h3>', true)));
        $a = substr(strstr($part, '</h3>'), 5);
        $a = preg_replace('#(</div>|<h2).*$#s', '', $a); // s'arrête à la fin du bloc ou au thème suivant
        $a = trim(preg_replace('/\s+/', ' ', wp_strip_all_tags($a)));
        if ($q && $a) {
            $items[] = ['@type' => 'Question', 'name' => $q, 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $a]];
        }
    }
    if ($items) {
        echo '<script type="application/ld+json">' . wp_json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $items], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . "</script>\n";
    }
}, 20);
