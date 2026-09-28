---
name: site-wordpress-ovh
description: "Site WordPress ctarchitectedinterieur.fr sur OVH mutualisé (cluster100) — accès SFTP, outils, état au 2026-09-28"
metadata:
  node_type: memory
  type: project
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-28T13:01:23.613Z
---

La personne maintient le site WordPress ctarchitectedinterieur.fr (architecte d'intérieur), hébergé OVH mutualisé cluster100, login `ctarchq`, racine `/home/ctarchq/www`.

- Accès : SFTP seulement (pas de SSH sur l'offre, FTP sans TLS → ne pas utiliser). Script `C:\Users\Chloé\ovh-site\tools\sftp.ps1` (WinSCP, mot de passe lu dans `~/.ovh_netrc`, jamais l'afficher).
- Copie locale de travail : `C:\Users\Chloé\ovh-site\site\`. **Thème actif = Astra** (constaté en base le 2026-09-28) ; `ct-architecte-theme` (enfant de twentytwentyfour) est installé mais inactif.
- Base : `ctarchq652` sur `ctarchq652.mysql.db`, préfixe `mod768_`, joignable seulement depuis OVH → export via script PHP temporaire à nom/clé aléatoires, supprimé après usage.
- Formulaire : e-mails via contact@ctarchitectedinterieur.fr (boîte OVH) ; admin_email = chloetissier3@gmail.com.
- Charte graphique officielle : `docs/charte-graphique.md` du dépôt (source PDF dans OneDrive `MICRO\COMMUNICATION\Charte_graphique_CT_Architecte_d_Interieur.pdf`). Titres Montserrat #843A45, manuscrit Benedict #382A25, texte Montserrat #382A25, bandes beige rosé #E7E1DC, accents vert sauge #A8B2A1 / bordeaux #843A45. Logo sur fond blanc, jamais inversé.
- Identité (supports de com) : Chloé TISSIER, architecte d'intérieur qualifiée CFAI n°4305, 07 63 98 74 33, contact@ctarchitectedinterieur.fr, zone Beaujolais – Ouest lyonnais – Lyon. Micro-entreprise, SIRET 988 720 728 00019, assurance RC pro Euromaf. Pages légales rédigées dans `contenus/` du dépôt (pas encore publiées) ; manquent l'adresse postale et le médiateur de la consommation (placeholders entre crochets). Pages : Accueil, A propos, Prestations, Methode, Réalisations, FAQ, Contact — pas de mentions légales ni politique de confidentialité au 2026-09-28.
- Sauvegardes locales : `C:\Users\Chloé\Sauvegardes-site\<date>\` (base-de-donnees.sql.gz + www\), hors git.
- État 2026-09-28 : WP 7.1.2, PHP 8.0 (obsolète), plugins Yoast, Kadence Blocks, AIO WP Migration, Smush, LiteSpeed Cache, Custom Fonts, Really Simple SSL, WPForms Lite, Duplicate Post. Dernière sauvegarde ai1wm : 2026-05-12. Alerte OVH : e-mails envoyés sans authentification (WPForms → configurer SMTP).

**Why:** accompagnement long terme maintenance + évolution du site.
**How to apply:** travailler en local puis déployer par SFTP ; confirmer avant toute modif du site en ligne ; git pas encore installé.
