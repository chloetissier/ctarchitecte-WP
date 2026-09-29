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
.ct-faq-fin{background:#E7E1DC;border-radius:30px;padding:28px 20px;margin-top:40px;max-width:820px;color:#382A25}
.ct-faq-fin .wp-block-button__link{border:3px solid #382A25;border-radius:30px;color:#382A25;background:transparent;padding:14px 36px;font-weight:600}
.ct-faq-fin .wp-block-button__link:hover{background:#843A45;border-color:#843A45;color:#fff}
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
