# Site ctarchitectedinterieur.fr (WordPress, OVH mutualisé)

- Hébergement : OVH cluster100, login `ctarchq`, racine `/home/ctarchq/www`. SFTP uniquement
  (pas de SSH, FTP non chiffré à proscrire).
- Accès : `.\tools\sftp.ps1 "<commandes WinSCP>"`. Le mot de passe est lu dans `~/.ovh_netrc`,
  ne jamais l'afficher ni le versionner.
- `site/` reflète l'arborescence de `/home/ctarchq/www` (seulement ce qu'on maintient :
  thème enfant `ct-architecte-theme`, config).

## Workflow
1. Modifier en local dans `site/`.
2. Montrer le changement, puis déployer par SFTP (confirmation avant toute modif du site en ligne).
3. Copier la mémoire Claude du projet dans `memory/`
   (depuis `C:\Users\Chloé\.claude\projects\C--Users-Chlo-\memory\`, fichiers liés au site + MEMORY.md).
4. `git add`, `git commit`, `git push` sur `origin` (https://github.com/chloetissier/ctarchitecte-WP)
   à chaque mise à jour.
