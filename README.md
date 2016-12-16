# 421
## Introduction
Application servant de support pour le jeu de société 421.
C'est un jeu qui se joue au minimum à deux joueurs, avec trois dés.

Les règles du jeu se trouve dans le fichier 'rules.html' et ne sont pas les règles officielles.

L'application est destinée à un usage privé et n'insite pas à la consommation d'alcool.

## Cahier des charges
1.Menu principal
2.Nouvelle partie
3.Gestion des scores
4.Fin de la partie
5.Historique
6.Top classement


### Menu principal
Menu simple avec trois boutons :
* Nouvelle partie
* Historique
* Top

### Nouvelle partie
Création d'une partie. Il faut que l'utilisateur renseigne le nombre de joueur, leurs noms ainsi que le lieu (champ texte).

Pendant cette phase, l'utilisateur devra faire les premiers lancés. Cela déterminera qui commencera et qui finira.
Après quoi, l'utilisateur devra indiquer d'ordre des joueurs.

À la fin de la procédure sera enregistrée les informations en base de données ainsi que le jour et l'heure du début.

Entités concernées : 
* partie
* joueur    
    
### Gestion des scores
Les scores sont enregistrés à chaque fin de tour.

D'une part, les scores se rajoutent en javascript à la ligne totale (entête).
D'autre part, ils sont enregistrés dans la base de données.

Entités concernées :
* ligneScore
* score
    
### Fin de la partie
Enregistre les scores totaux de chaque joueur, le Datetime de fin, mise à jour des tops (classement).
    
### Historique
Affiche le visuel d'anciennes parties.
Génère le tableau des scores associés à la partie sélectionnée.
  
### Top classement
Classement en top 3.

Comprends 4 catégories :
* Lieu
* Joueur (score)
* Diablo
* Avertissements <small>avec nombre de partie comptabilisée avec trois avertissements</small>

