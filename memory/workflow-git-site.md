---
name: workflow-git-site
description: "Commit + push sur GitHub à chaque mise à jour du site WordPress, mémoire projet incluse"
metadata:
  node_type: memory
  type: feedback
  originSessionId: 7feebee1-03ec-41c4-92f2-49f9797adff6
  modified: 2026-09-28T12:18:37.050Z
---

À chaque mise à jour du site [[site-wordpress-ovh]], faire git commit + push sur https://github.com/chloetissier/ctarchitecte-WP (dépôt local `C:\Users\Chloé\ovh-site`), et y pousser aussi la mémoire Claude concernant ce projet (copie dans `memory/` du dépôt).

**Why:** demandé explicitement le 2026-09-28 pour garder un historique et partager la mémoire du projet.
**How to apply:** après chaque modification déployée, copier les fichiers mémoire du projet dans `ovh-site/memory/`, commit, push — sans redemander.
