# Fonctions SQL

## Fonctions scalaires

- `UPPER` : convertir en majuscules
- `LOWER` : convertir en minuscules
- `LENGTH`: compter le nombre de caractères
- `ROUND` : arrondir un nombre décimal

Exemple : `SELECT UPPER(nom) AS nom_maj FROM jeux_video` | `SELECT ROUND(prix, 2) AS prix_decimal FROM jeux_video`

## Fonctions d'agrégat

Elles retournent une valeur, donc il n'y a pas besoin de boucler dessus pour récupérer le résultat.

- `AVG` : calculer la moyenne
- `SUM` : additionner les valeurs
- `MAX` : retourner la valeur maximale
- `MIN` : retourner la valeur minimale
- `COUNT` : compter le nombre d'entrées

Exemple : `SELECT AVG(prix) AS prix_moyen FROM jeux_video` | `SELECT COUNT(*) AS nbjeux FROM jeux_video WHERE possesseur='Florent'`

## Grouper des données

`SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console` : va calculer le prix moyen par console

## Filtrer des données regroupées

`SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console HAVING prix_moyen <= 10` : va retourner le prix moyen par console, dont le prix moyen est inférieur ou égal à 10


