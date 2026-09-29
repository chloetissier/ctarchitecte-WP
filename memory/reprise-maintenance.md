---
name: reprise-maintenance
description: Point de reprise du chantier de maintenance du site (état au 2026-09-29)
metadata:
  node_type: memory
  type: project
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-29T12:25:28.322Z
---

Chantier [[site-wordpress-ovh]] — état au 2026-09-29 ~11h30.

Fait : WP Mail SMTP (e-mails OK), 8 extensions à jour dont WPForms 2.0.2.1 (formulaire id 75 vérifié sur /contact/), pages légales publiées + liens pied de page, bandeau cookies en ligne (mu-plugin `ct-bandeau-cookies.php`, localStorage, charte), politique de confidentialité corrigée. Anti-spam WPForms déjà actif (antispam_v3 + délai 2 s) ; aucun captcha (captcha-provider vide).

Aussi fait le 2026-09-29 : Astra 4.14.0, PHP 8.3 (copie 8.0 : `audit/.ovhconfig.php80`), ménage (twentytwentythree + fichiers parasites rangés dans `/home/ctarchq/old-themes|old-files`, .tmb 755). SEO de base : blogname « CT Architecte d'intérieur », slogan rempli, titre masqué dans l'en-tête Astra (display-site-title-responsive=false), Yoast company_name, meta descriptions pages 109/190/107.

Fait aussi le 2026-09-29 : notifications formulaire → contact@ (replyto = champ 2 E-mail, sujet « Nouvelle demande de contact – {nom} ») ; thèmes twentytwentythree/twentytwentyfour/ct-architecte-theme SUPPRIMÉS du serveur (copie de ct-architecte-theme dans git `site/`), fichiers parasites supprimés. Reste seul thème de secours : twentytwentyfive.

Plan validé par elle le 2026-09-29, dans l'ordre : (a) captcha Turnstile — elle a créé un compte (via son Google), j'attends site key + secret dans `audit/turnstile.txt` ; (b) Google Search Console ensemble (propriété préfixe d'URL, vérif par fichier HTML que je dépose) + sitemap_index.xml ; (c) optimiser sa fiche Google Business Profile (elle en a une) ; (d) liens depuis Travaux.com/CFAI/LinkedIn — son site reste sa vitrine principale ; (e) elle m'enverra son contenu pour les pages vides ; (f) SEO naturel APRÈS que le site soit fini (concurrent camillethomas.fr apparu après juillet 2025).
Fait le 2026-09-29 (suite) : Turnstile actif sur formulaire 75 (clés dans `audit/turnstile.txt`, gitignoré ; copie serveur supprimée), politique de confidentialité mise à jour (Turnstile + messagerie Microsoft 365). Fichier de vérification Search Console `googlec01f829dc55a2e2e.html` à la racine www (NE PAS SUPPRIMER). Sa fiche Google Business pointait vers son ancien portfolio PDF → elle a mis le site.
PROBLÈME E-MAILS : la boîte contact@ est chez Microsoft 365 (MX outlook, SPF `v=spf1 include:spf.protection.outlook.com -all`, DMARC p=quarantine) mais WP Mail SMTP envoie via ssl0.ovh.net → SPF échoue, messages en quarantaine. Correctif demandé à elle dans l'espace client OVH (zone DNS ns10.ovh.net) : SPF → `v=spf1 include:spf.protection.outlook.com include:mx.ovh.com -all`. → FAIT par elle le 2026-09-29 (SPF avec include:mx.ovh.com vérifié sur dns10.ovh.net), e-mail de test envoyé vers contact@ ; attendre sa confirmation de réception (boîte de réception, pas indésirables).

Search Console validée le 2026-09-29 (propriété préfixe d'URL). Pages vides 119/115/113/111 passées en noindex Yoast (`_yoast_wpseo_meta-robots-noindex`) → À RETIRER quand elles seront remplies (script local `audit/idx-…php?a=off`), puis les resoumettre dans Search Console.

Fiche Google Business (2026-09-29) : description réécrite collée, catégorie secondaire « Décorateur d'intérieur », 11 zones desservies (Ouest lyonnais + Villefranche/Gleizé/Anse…), flyer + photo portrait ajoutés. CFAI : lien vers le site OK. LinkedIn : site + contact OK. Travaux.com refuse tout lien externe (normal, rien à faire). camillethomas.fr N'EST PAS elle (homonyme concurrent, ne jamais sous-entendre le contraire).
À LUI RAPPELER quand les pages du site seront finies : revenir sur la fiche Google pour ajouter les photos avant/après des meilleures réalisations, les prestations (via « Éditer produits »), et un premier post.

E-mails : réception CONFIRMÉE par elle le 2026-09-29 (test + vrai envoi formulaire, instantané). Favicon installé (site_icon=203, symbole du logo recadré, source `docs/images/ct-favicon-512.png`).
Pièces jointes : elle a choisi l'option B (Contact Form 7) le 2026-09-29. Préparé EN LOCAL, rien déployé : CF7 6.1.7 + pack fr_FR (scratchpad), style `site/wp-content/mu-plugins/ct-formulaire.php`, script de config `audit/cf7-…php` (actions activate / create → form + page test cachée `test-formulaire-contact` noindex / turnstile). Envoi d'abord refusé par le classifieur, puis elle est passée en mode « Ask before edits » et a validé → DÉPLOYÉ le 2026-09-29 : CF7 6.1.7 actif (+ fr_FR), formulaire id 205, page de test cachée id 206 `/test-formulaire-contact/` (noindex), Turnstile configuré dans CF7, test avec pièce jointe reçu OK. Script de config archivé : `tools/wp-cf7-setup.php.txt`.
À FAIRE après sa validation : remplacer le bloc WPForms de la page Contact (107) par `[contact-form-7 id="205"]`, supprimer la page 206, puis désactiver/supprimer WPForms Lite ; mettre à jour la politique de confidentialité (pièces jointes transmises par e-mail, non conservées sur le serveur).
Leçon : OVH bride l'envoi SMTP après plusieurs e-mails rapprochés (« data not accepted » / « MAIL FROM failed ») → espacer les tests, un seul envoi à la fois.
Sécurité : le mot de passe de la boîte contact@ est faible (proche du nom de domaine) → lui recommander de le changer (espace client OVH, E-mails) puis mettre à jour `audit/mdp-contact.txt` ET la constante WPMS_SMTP_PASS de wp-config.php.
Historique de la demande : pièces jointes (photos/docs/PDF) dans le formulaire — non disponible dans WPForms Lite (champ File Upload = Pro payant). Options proposées : WPForms Pro (payant), ou remplacer le formulaire par une extension gratuite qui gère les fichiers, ou inviter à envoyer les fichiers en réponse à l'e-mail.

Proposé, pas fait : supprimer l'ancienne sauvegarde ai1wm de mai 2026 (274 Mo, `wp-content/ai1wm-backups/`) — attendre son accord.

Reste :
1. Supprimer `old-plugins/`, `old-themes/`, `old-files/` hors www vers mi-octobre 2026 si rien n'a cassé.
1b. Visibilité Google (demandé le 2026-09-29, site introuvable même sur son nom de domaine) : Search Console + sitemap (elle crée l'accès Google, je peux déposer le fichier de vérification), fiche Google Business Profile (elle), liens depuis Travaux.com / CFAI / LinkedIn vers le site, titre SEO de l'accueil (_yoast_wpseo_title page 109), contenu des pages vides ciblant « architecte d'intérieur Beaujolais / Villefranche / Lyon ». Concurrent homonyme : camillethomas.fr (« CT architecte d'intérieur »).
2. Captcha : proposé Cloudflare Turnstile (gratuit, sans cookie publicitaire) → nécessite qu'elle crée un compte Cloudflare (sa décision). Ne pas utiliser reCAPTCHA (cookies Google → consentement).
3. Notifications du formulaire envoyées à {admin_email} = chloetissier3@gmail.com (pas contact@) — à lui signaler.
4. Pages vides : Prestations (119), A propos (115), Réalisations (113, slug mes-realisations-2), FAQ (111) → lui faire des PROPOSITIONS avant publication (changement visible = son accord).

**Why:** reprendre sans refaire l'état des lieux.
**How to apply:** relire ce fichier en début de session, vérifier l'état serveur avant d'agir ; supprimer ce fichier quand tout est terminé.
