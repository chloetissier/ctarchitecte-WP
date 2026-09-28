<?php
/**
 * Plugin Name: CT – Bandeau d'information cookies
 * Description: Bandeau d'information aux couleurs de la charte CT Architecte d'intérieur. Le site ne dépose que des cookies techniques : aucun consentement requis, le choix « J'ai compris » est mémorisé dans le navigateur (localStorage, pas de cookie).
 * Version: 1.0
 */

if (!defined('ABSPATH')) { exit; }

add_action('wp_footer', function () {
    if (is_admin()) { return; }
    $policy = esc_url(get_privacy_policy_url() ?: home_url('/politique-de-confidentialite/'));
    ?>
<div id="ct-cookies" role="region" aria-label="Information sur les cookies" hidden>
  <p>Ce site n'utilise que des cookies techniques, nécessaires à son bon fonctionnement. Aucun cookie de mesure d'audience ni de publicité n'est déposé. <a href="<?php echo $policy; ?>">En savoir plus</a></p>
  <button type="button" id="ct-cookies-ok">J'ai compris</button>
</div>
<style>
#ct-cookies{position:fixed;left:16px;right:16px;bottom:16px;z-index:9999;max-width:760px;margin:0 auto;display:flex;align-items:center;gap:16px;padding:16px 20px;background:#E7E1DC;color:#382A25;border-radius:30px;box-shadow:0 4px 18px rgba(56,42,37,.18);font-family:'Montserrat',sans-serif;font-size:14px;line-height:1.5}
#ct-cookies[hidden]{display:none}
#ct-cookies p{margin:0;flex:1}
#ct-cookies a{color:#843A45;text-decoration:underline}
#ct-cookies button{flex:none;cursor:pointer;border:0;border-radius:30px;padding:10px 22px;background:#843A45;color:#fff;font:600 14px 'Montserrat',sans-serif}
#ct-cookies button:hover,#ct-cookies button:focus-visible{background:#382A25;outline:none}
@media (max-width:600px){#ct-cookies{flex-direction:column;align-items:stretch;text-align:center;border-radius:20px}}
</style>
<script>
(function(){var k='ct-cookies-ok',b=document.getElementById('ct-cookies');if(!b)return;
try{if(localStorage.getItem(k))return;}catch(e){}
b.hidden=false;
document.getElementById('ct-cookies-ok').addEventListener('click',function(){b.hidden=true;try{localStorage.setItem(k,'1');}catch(e){}});
})();
</script>
    <?php
}, 100);
