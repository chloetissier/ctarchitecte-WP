---
name: reprise-maintenance
description: Point de reprise du chantier de maintenance du site (état au 2026-09-29)
metadata:
  node_type: memory
  type: project
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-29T09:58:07.312Z
---

Chantier [[site-wordpress-ovh]] — état au 2026-09-29 ~11h30.

Fait : WP Mail SMTP (e-mails OK), 8 extensions à jour dont WPForms 2.0.2.1 (formulaire id 75 vérifié sur /contact/), pages légales publiées + liens pied de page, bandeau cookies en ligne (mu-plugin `ct-bandeau-cookies.php`, localStorage, charte), politique de confidentialité corrigée. Anti-spam WPForms déjà actif (antispam_v3 + délai 2 s) ; aucun captcha (captcha-provider vide).

Aussi fait le 2026-09-29 : Astra 4.14.0, PHP 8.3 (copie 8.0 : `audit/.ovhconfig.php80`), ménage (twentytwentythree + fichiers parasites rangés dans `/home/ctarchq/old-themes|old-files`, .tmb 755). SEO de base : blogname « CT Architecte d'intérieur », slogan rempli, titre masqué dans l'en-tête Astra (display-site-title-responsive=false), Yoast company_name, meta descriptions pages 109/190/107.

Fait aussi le 2026-09-29 : notifications formulaire → contact@ (replyto = champ 2 E-mail, sujet « Nouvelle demande de contact – {nom} ») ; thèmes twentytwentythree/twentytwentyfour/ct-architecte-theme SUPPRIMÉS du serveur (copie de ct-architecte-theme dans git `site/`), fichiers parasites supprimés. Reste seul thème de secours : twentytwentyfive.

Plan validé par elle le 2026-09-29, dans l'ordre : (a) captcha Turnstile — elle a créé un compte (via son Google), j'attends site key + secret dans `audit/turnstile.txt` ; (b) Google Search Console ensemble (propriété préfixe d'URL, vérif par fichier HTML que je dépose) + sitemap_index.xml ; (c) optimiser sa fiche Google Business Profile (elle en a une) ; (d) liens depuis Travaux.com/CFAI/LinkedIn — son site reste sa vitrine principale ; (e) elle m'enverra son contenu pour les pages vides ; (f) SEO naturel APRÈS que le site soit fini (concurrent camillethomas.fr apparu après juillet 2025).
Fait le 2026-09-29 (suite) : Turnstile actif sur formulaire 75 (clés dans `audit/turnstile.txt`, gitignoré ; copie serveur supprimée), politique de confidentialité mise à jour (Turnstile + messagerie Microsoft 365). Fichier de vérification Search Console `googlec01f829dc55a2e2e.html` à la racine www (NE PAS SUPPRIMER). Sa fiche Google Business pointait vers son ancien portfolio PDF → elle a mis le site.
PROBLÈME E-MAILS : la boîte contact@ est chez Microsoft 365 (MX outlook, SPF `v=spf1 include:spf.protection.outlook.com -all`, DMARC p=quarantine) mais WP Mail SMTP envoie via ssl0.ovh.net → SPF échoue, messages en quarantaine. Correctif demandé à elle dans l'espace client OVH (zone DNS ns10.ovh.net) : SPF → `v=spf1 include:spf.protection.outlook.com include:mx.ovh.com -all`. Vérifier ensuite avec Resolve-DnsName et un envoi test.

Proposé, pas fait : supprimer l'ancienne sauvegarde ai1wm de mai 2026 (274 Mo, `wp-content/ai1wm-backups/`) — attendre son accord.

Reste :
1. Supprimer `old-plugins/`, `old-themes/`, `old-files/` hors www vers mi-octobre 2026 si rien n'a cassé.
1b. Visibilité Google (demandé le 2026-09-29, site introuvable même sur son nom de domaine) : Search Console + sitemap (elle crée l'accès Google, je peux déposer le fichier de vérification), fiche Google Business Profile (elle), liens depuis Travaux.com / CFAI / LinkedIn vers le site, titre SEO de l'accueil (_yoast_wpseo_title page 109), contenu des pages vides ciblant « architecte d'intérieur Beaujolais / Villefranche / Lyon ». Concurrent homonyme : camillethomas.fr (« CT architecte d'intérieur »).
2. Captcha : proposé Cloudflare Turnstile (gratuit, sans cookie publicitaire) → nécessite qu'elle crée un compte Cloudflare (sa décision). Ne pas utiliser reCAPTCHA (cookies Google → consentement).
3. Notifications du formulaire envoyées à {admin_email} = chloetissier3@gmail.com (pas contact@) — à lui signaler.
4. Pages vides : Prestations (119), A propos (115), Réalisations (113, slug mes-realisations-2), FAQ (111) → lui faire des PROPOSITIONS avant publication (changement visible = son accord).

**Why:** reprendre sans refaire l'état des lieux.
**How to apply:** relire ce fichier en début de session, vérifier l'état serveur avant d'agir ; supprimer ce fichier quand tout est terminé.
