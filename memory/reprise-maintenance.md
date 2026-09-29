---
name: reprise-maintenance
description: Point de reprise du chantier de maintenance du site (état au 2026-09-29)
metadata:
  node_type: memory
  type: project
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-29T09:28:30.630Z
---

Chantier [[site-wordpress-ovh]] — état au 2026-09-29 ~11h30.

Fait : WP Mail SMTP (e-mails OK), 8 extensions à jour dont WPForms 2.0.2.1 (formulaire id 75 vérifié sur /contact/), pages légales publiées + liens pied de page, bandeau cookies en ligne (mu-plugin `ct-bandeau-cookies.php`, localStorage, charte), politique de confidentialité corrigée. Anti-spam WPForms déjà actif (antispam_v3 + délai 2 s) ; aucun captcha (captcha-provider vide).

Reste :
1. Astra 4.13.2 → 4.14.0 (lancé le 2026-09-29), puis PHP 8.0 → 8.3 dans `/home/ctarchq/.ovhconfig`, ménage (thèmes twenty*, temp-write-test*, .htaccess.bk, readme.html, .tmb 777, `old-plugins/` et `old-themes/` après quelques jours).
2. Captcha : proposé Cloudflare Turnstile (gratuit, sans cookie publicitaire) → nécessite qu'elle crée un compte Cloudflare (sa décision). Ne pas utiliser reCAPTCHA (cookies Google → consentement).
3. Notifications du formulaire envoyées à {admin_email} = chloetissier3@gmail.com (pas contact@) — à lui signaler.
4. Pages vides : Prestations (119), A propos (115), Réalisations (113, slug mes-realisations-2), FAQ (111) → lui faire des PROPOSITIONS avant publication (changement visible = son accord).

**Why:** reprendre sans refaire l'état des lieux.
**How to apply:** relire ce fichier en début de session, vérifier l'état serveur avant d'agir ; supprimer ce fichier quand tout est terminé.
