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
@media (min-width:922px){.ast-plain-container.ast-no-sidebar #primary:has(.ct-faq-fin){margin-bottom:60px}}
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
/* Texte justifié sur ordinateur et tablette (avec coupure des mots), aligné à gauche sur téléphone */
@media (min-width:768px){.ct-presta p:not(.has-text-align-center):not(.ct-presta-intro),.ct-apropos p:not(.has-text-align-center):not(.ct-accroche),.ct-faq p{text-align:justify;-webkit-hyphens:auto;hyphens:auto}}
@media (max-width:767px){.ct-presta p,.ct-apropos p,.ct-faq p{text-align:left;-webkit-hyphens:manual;hyphens:manual}.ct-presta p.has-text-align-center,.ct-apropos p.has-text-align-center{text-align:center}}
@media (max-width:781px){.ct-presta h1{font-size:24px}.ct-presta .ct-bande{padding:24px 20px}.ct-presta .ct-bande .wp-block-columns{gap:8px}}
@media (max-width:781px){.ct-apropos-haut{gap:32px;margin-bottom:56px!important}.ct-apropos h2{margin-top:56px}.ct-apropos h1{font-size:24px}}
@media (max-width:600px){.ct-faq .ct-faq-q{font-size:18px}.ct-faq .ct-faq-theme{font-size:13px}}
</style>
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
