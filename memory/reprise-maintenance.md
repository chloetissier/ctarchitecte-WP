---
name: reprise-maintenance
description: "Point de reprise du chantier de maintenance du site (interrompu le 2026-09-28 ~16h35, PC éteint)"
metadata:
  node_type: memory
  type: project
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-28T14:37:51.285Z
---

Chantier [[site-wordpress-ovh]] interrompu le 2026-09-28 vers 16h35 (la propriétaire éteint son PC, reprise prévue ~3h plus tard).

Fait : WP Mail SMTP (e-mails OK), 7 extensions à jour (duplicate-post, ai1wm, smush, litespeed, kadence-blocks, really-simple-ssl, wordpress-seo), pages légales publiées + liens pied de page.

Reste, dans l'ordre :
1. WPForms : `/home/ctarchq/www/wp-content/plugins/wpforms-lite.new` = envoi INCOMPLET (arrêté volontairement) → le supprimer, puis relancer `.\tools\update-plugin.ps1 wpforms-lite` (long : > 10 min, lancer en arrière-plan). Vérifier ensuite que le formulaire s'affiche sur /contact/.
2. Anti-spam WPForms (réglage anti-spam intégré, sans cookie).
3. Déployer le bandeau cookies `site/wp-content/mu-plugins/ct-bandeau-cookies.php` (créer le dossier mu-plugins) + republier la politique de confidentialité corrigée (`contenus/`, page id 195). Le site ne dépose aucun cookie visiteur (vérifié).
4. Astra 4.13.2 → 4.14.0 (`update-plugin.ps1 astra -Theme`), PHP 8.0 → 8.3 dans `/home/ctarchq/.ovhconfig`, ménage (thèmes twenty*, fichiers temp-write-test, .htaccess.bk, readme.html, .tmb 777, dossiers old-plugins après quelques jours).

5. Demandé explicitement (rappel du 2026-09-28) : NE PAS OUBLIER le captcha/anti-spam du formulaire et le bandeau cookies.
6. Ensuite : améliorations du site. Certaines pages sont vides → repérer lesquelles, puis lui faire des PROPOSITIONS (contenu, structure) dans le respect de la charte, avant toute publication (changement visible = son accord).

**Why:** reprendre sans refaire l'état des lieux.
**How to apply:** relire ce fichier en début de session, vérifier l'état serveur (ls plugins) avant d'agir ; supprimer ce fichier quand tout est terminé.
