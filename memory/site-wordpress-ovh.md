---
name: site-wordpress-ovh
description: "Site WordPress ctarchitectedinterieur.fr sur OVH mutualisé (cluster100) — accès SFTP, outils, état au 2026-09-28"
metadata:
  node_type: memory
  type: project
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-28T12:15:49.198Z
---

La personne maintient le site WordPress ctarchitectedinterieur.fr (architecte d'intérieur), hébergé OVH mutualisé cluster100, login `ctarchq`, racine `/home/ctarchq/www`.

- Accès : SFTP seulement (pas de SSH sur l'offre, FTP sans TLS → ne pas utiliser). Script `C:\Users\Chloé\ovh-site\tools\sftp.ps1` (WinSCP, mot de passe lu dans `~/.ovh_netrc`, jamais l'afficher).
- Copie locale de travail : `C:\Users\Chloé\ovh-site\site\` (thème enfant `ct-architecte-theme`, parent twentytwentyfour).
- État 2026-09-28 : WP 7.1.2, PHP 8.0 (obsolète), plugins Yoast, Kadence Blocks, AIO WP Migration, Smush, LiteSpeed Cache, Custom Fonts, Really Simple SSL, WPForms Lite, Duplicate Post. Dernière sauvegarde ai1wm : 2026-05-12. Alerte OVH : e-mails envoyés sans authentification (WPForms → configurer SMTP).

**Why:** accompagnement long terme maintenance + évolution du site.
**How to apply:** travailler en local puis déployer par SFTP ; confirmer avant toute modif du site en ligne ; git pas encore installé.
