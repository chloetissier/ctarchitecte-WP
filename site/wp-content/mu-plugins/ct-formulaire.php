<?php
/**
 * Plugin Name: CT – Style du formulaire de contact
 * Description: Mise en forme du formulaire Contact Form 7 selon la charte CT Architecte d'intérieur (Montserrat, brun #382A25, bordeaux #843A45, beige #E7E1DC, boutons arrondis comme le reste du site).
 * Version: 1.0
 */

if (!defined('ABSPATH')) { exit; }

add_action('wp_head', function () {
    if (is_admin() || !function_exists('wpcf7_contact_form')) { return; }
    ?>
<style id="ct-formulaire">
.ct-form{font-family:'Montserrat',sans-serif;color:#382A25;max-width:720px}
.ct-form p{margin:0 0 18px}
.ct-form label{display:block;font-weight:600;font-size:15px;margin-bottom:6px}
.ct-form .wpcf7-form-control-wrap{display:block;margin-top:6px}
.ct-form input[type=text],.ct-form input[type=email],.ct-form input[type=tel],.ct-form select,.ct-form textarea{width:100%;box-sizing:border-box;padding:12px 14px;border:1px solid #D1D5DB;border-radius:12px;background:#fff;color:#382A25;font:400 15px 'Montserrat',sans-serif}
.ct-form textarea{min-height:160px;resize:vertical}
.ct-form input:focus,.ct-form select:focus,.ct-form textarea:focus{outline:none;border-color:#843A45;box-shadow:0 0 0 3px rgba(132,58,69,.15)}
.ct-form .ct-fichiers{background:#E7E1DC;border-radius:20px;padding:18px 20px;margin:0 0 18px}
.ct-form .ct-fichiers legend,.ct-form .ct-fichiers .ct-titre{font-weight:600;font-size:15px}
.ct-form .ct-aide{font-size:13px;font-weight:400;opacity:.85;margin:4px 0 12px}
.ct-form input[type=file]{font:400 14px 'Montserrat',sans-serif;color:#382A25;margin:4px 0}
.ct-form input[type=file]::file-selector-button{cursor:pointer;border:2px solid #382A25;border-radius:30px;background:#fff;color:#382A25;padding:6px 16px;margin-right:12px;font:600 13px 'Montserrat',sans-serif}
.ct-form input[type=file]::file-selector-button:hover{background:#382A25;color:#fff}
.ct-form .ct-rgpd{font-size:13px;opacity:.85}
.ct-form .ct-rgpd a{color:#843A45}
.ct-form input[type=submit]{cursor:pointer;border:3px solid #382A25;border-radius:30px;background:transparent;color:#382A25;padding:14px 36px;font:600 16px 'Montserrat',sans-serif}
.ct-form input[type=submit]:hover,.ct-form input[type=submit]:focus-visible{background:#843A45;border-color:#843A45;color:#fff}
.ct-form .wpcf7-not-valid-tip{color:#843A45;font-size:13px;margin-top:4px}
.ct-form .wpcf7-spinner{vertical-align:middle}
.wpcf7 form .wpcf7-response-output{border-radius:12px;padding:12px 16px;font-family:'Montserrat',sans-serif;color:#382A25;margin:16px 0 0}
.wpcf7 form.sent .wpcf7-response-output{border-color:#A8B2A1;background:#f3f5f2}
.wpcf7 form.invalid .wpcf7-response-output,.wpcf7 form.failed .wpcf7-response-output,.wpcf7 form.spam .wpcf7-response-output{border-color:#843A45}
.ct-form .ct-fichiers .wpcf7-form-control-wrap{margin-top:8px}
.ct-form .ct-fichiers .ct-cache{display:none}
.ct-form .ct-total{font-size:13px;margin:10px 0 0}
.ct-form .ct-total.ct-trop{color:#843A45;font-weight:600}
.ct-form .ct-drop-actif .wpcf7-form-control-wrap[data-name^="ct-fichier-"]{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0)}
.ct-form .ct-drop{display:block;border:2px dashed #A8B2A1;border-radius:16px;background:#fff;padding:22px 16px;text-align:center;cursor:pointer;transition:border-color .2s,background .2s}
.ct-form .ct-drop:hover,.ct-form .ct-drop:focus-visible,.ct-form .ct-drop.ct-survol{border-color:#843A45;background:#faf8f7;outline:none}
.ct-form .ct-drop strong{display:block;font-size:15px;color:#382A25}
.ct-form .ct-drop span{display:block;font-size:13px;margin-top:4px;opacity:.85}
.ct-form .ct-drop .ct-bouton{display:inline-block;margin-top:12px;border:2px solid #382A25;border-radius:30px;padding:6px 18px;font-weight:600;font-size:13px;opacity:1}
.ct-form .ct-liste{list-style:none;margin:12px 0 0;padding:0}
.ct-form .ct-liste li{display:flex;align-items:center;gap:10px;background:#fff;border-radius:10px;padding:8px 12px;margin:6px 0;font-size:14px}
.ct-form .ct-liste .ct-nom{flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.ct-form .ct-liste .ct-poids{font-size:12px;opacity:.75;white-space:nowrap}
.ct-form .ct-liste button{border:0;background:none;color:#843A45;font:600 13px 'Montserrat',sans-serif;cursor:pointer;text-decoration:underline;padding:0}
.ct-form .ct-alerte{color:#843A45;font-size:13px;font-weight:600;margin:8px 0 0}
</style>
    <?php
}, 100);

// Champs fichiers affichés un par un + total affiché (limite 20 Mo)
add_action('wp_footer', function () {
    if (is_admin() || !function_exists('wpcf7_contact_form')) { return; }
    ?>
<script>
(function(){
  var MAX = 20 * 1024 * 1024, MAX_FICHIER = 8 * 1024 * 1024;
  var EXT = /\.(jpe?g|png|heic|heif|webp|pdf|docx?|dwg)$/i;
  function mo(o){ return (o / 1048576).toFixed(1).replace('.', ',') + ' Mo'; }
  function peutGlisser(){ try { new DataTransfer(); return true; } catch (e) { return false; } }

  // Zone de dépôt : plusieurs fichiers d'un coup, répartis dans les 6 champs de Contact Form 7
  function initDrop(box){
    var inputs = Array.prototype.map.call(box.querySelectorAll('.wpcf7-form-control-wrap[data-name^="ct-fichier-"] input[type=file]'), function(i){ return i; });
    var out = box.querySelector('.ct-total');
    var fichiers = [];
    box.classList.add('ct-drop-actif');
    var zone = document.createElement('label');
    zone.className = 'ct-drop'; zone.tabIndex = 0;
    zone.innerHTML = '<strong>Glissez vos fichiers ici</strong><span>ou</span><span class="ct-bouton">Choisir des fichiers</span>';
    var choix = document.createElement('input');
    choix.type = 'file'; choix.multiple = true; choix.hidden = true;
    choix.accept = '.jpg,.jpeg,.png,.heic,.heif,.webp,.pdf,.doc,.docx,.dwg';
    zone.appendChild(choix);
    var liste = document.createElement('ul'); liste.className = 'ct-liste';
    var alerte = document.createElement('p'); alerte.className = 'ct-alerte'; alerte.setAttribute('aria-live', 'polite');
    var aide = box.querySelector('.ct-aide');
    (aide || box.firstChild).insertAdjacentElement('afterend', zone);
    zone.insertAdjacentElement('afterend', liste);
    liste.insertAdjacentElement('afterend', alerte);

    function synchro(){
      inputs.forEach(function(inp, i){
        var dt = new DataTransfer();
        if (fichiers[i]) dt.items.add(fichiers[i]);
        inp.files = dt.files;
      });
      liste.innerHTML = '';
      var total = 0;
      fichiers.forEach(function(f, i){
        total += f.size;
        var li = document.createElement('li');
        var nom = document.createElement('span'); nom.className = 'ct-nom'; nom.textContent = f.name;
        var poids = document.createElement('span'); poids.className = 'ct-poids'; poids.textContent = mo(f.size);
        var btn = document.createElement('button'); btn.type = 'button'; btn.textContent = 'Retirer';
        btn.addEventListener('click', function(){ fichiers.splice(i, 1); alerte.textContent = ''; synchro(); });
        li.appendChild(nom); li.appendChild(poids); li.appendChild(btn); liste.appendChild(li);
      });
      if (out) {
        var trop = total > MAX;
        out.textContent = fichiers.length ? fichiers.length + ' fichier' + (fichiers.length > 1 ? 's' : '') + ' – ' + mo(total) + ' sur 20 Mo' + (trop ? ' – trop lourd : retirez un fichier.' : '') : '';
        out.classList.toggle('ct-trop', trop);
      }
    }
    function ajouter(liste_){
      var refus = [];
      Array.prototype.forEach.call(liste_, function(f){
        if (!EXT.test(f.name)) { refus.push(f.name + ' (format non accepté)'); return; }
        if (f.size > MAX_FICHIER) { refus.push(f.name + ' (plus de 8 Mo)'); return; }
        if (fichiers.length >= inputs.length) { refus.push(f.name + ' (6 fichiers maximum)'); return; }
        fichiers.push(f);
      });
      alerte.textContent = refus.length ? 'Non ajouté : ' + refus.join(', ') + '.' : '';
      synchro();
    }
    choix.addEventListener('change', function(){ ajouter(choix.files); choix.value = ''; });
    zone.addEventListener('keydown', function(e){ if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); choix.click(); } });
    ['dragenter', 'dragover'].forEach(function(ev){ zone.addEventListener(ev, function(e){ e.preventDefault(); zone.classList.add('ct-survol'); }); });
    ['dragleave', 'drop'].forEach(function(ev){ zone.addEventListener(ev, function(e){ e.preventDefault(); zone.classList.remove('ct-survol'); }); });
    zone.addEventListener('drop', function(e){ if (e.dataTransfer && e.dataTransfer.files) ajouter(e.dataTransfer.files); });
    document.addEventListener('wpcf7mailsent', function(){ fichiers = []; alerte.textContent = ''; synchro(); });
    synchro();
  }

  // Solution de secours (navigateurs anciens) : un champ apparaît à chaque fichier ajouté
  function init(box){
    if (peutGlisser()) { initDrop(box); return; }
    var wraps = box.querySelectorAll('.wpcf7-form-control-wrap[data-name^="ct-fichier-"]');
    var out = box.querySelector('.ct-total');
    function maj(){
      var total = 0, dernier = 0;
      wraps.forEach(function(w, i){
        var inp = w.querySelector('input[type=file]');
        if (inp && inp.files && inp.files.length) { total += inp.files[0].size; dernier = i + 1; }
      });
      wraps.forEach(function(w, i){ w.classList.toggle('ct-cache', i > dernier); });
      if (out) {
        if (!total) { out.textContent = ''; out.classList.remove('ct-trop'); return; }
        var mo = (total / 1048576).toFixed(1).replace('.', ',');
        var trop = total > MAX;
        out.textContent = 'Total : ' + mo + ' Mo sur 20 Mo' + (trop ? ' – trop lourd : retirez un fichier ou envoyez une version plus légère.' : '');
        out.classList.toggle('ct-trop', trop);
      }
    }
    wraps.forEach(function(w){ var inp = w.querySelector('input[type=file]'); if (inp) inp.addEventListener('change', maj); });
    document.addEventListener('wpcf7mailsent', function(){ setTimeout(maj, 50); });
    maj();
  }
  document.querySelectorAll('.ct-form .ct-fichiers').forEach(init);
})();
</script>
    <?php
}, 100);

// Contrôle serveur : 20 Mo maximum pour l'ensemble des pièces jointes
add_filter('wpcf7_validate', function ($result, $tags) {
    $total = 0;
    $premier = null;
    foreach ($tags as $tag) {
        if ($tag->basetype !== 'file' || strpos($tag->name, 'ct-fichier-') !== 0) { continue; }
        $premier = $premier ?: $tag;
        if (!empty($_FILES[$tag->name]['size'])) { $total += (int) $_FILES[$tag->name]['size']; }
    }
    if ($premier && $total > 20 * 1024 * 1024) {
        $result->invalidate($premier, 'Les fichiers joints dépassent 20 Mo au total. Merci de retirer un fichier ou d\'envoyer des versions plus légères.');
    }
    return $result;
}, 20, 2);
