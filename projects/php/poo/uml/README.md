# UML (Unified Modeling Language) ?

Il s'agit d'une méthodologie de représentation des objets sous forme de diagramme. Cela permet de comprendre la construction des classes, méthodes et propriétés, et leurs relations.

## Syntaxe

| **News**                                                          |
|-------------------------------------------------------------------|
| #id: int                                                          |
| +__construct(donnees: array): void                                |
| +hydrate(donnees: array): void                                    |

En 1er, il y a le nom de la classe.

Ensuite, on ajoute les attributs avec leur visiblité et type.

Enfin, on termine par les méthode avec leur visibilité, les arguments et leur type, et le type de valeur renvoyée par la méthode.

### Visibilité

- "+" : élément public
- "#" : élément protégé
- "-" : élément privé

### Type des éléments

- int : Nombre
- void : Vide
- mixed : mixe
- array : Tableau
- si on attend ou renvoie un élément une instance, on ne met pas "object", mais le nom de la classe

### Normal, abstrait, final

- pas de style particulier : méthode "normale"
- italique : méthode abstraite
- préfixé par `<<leaf>>` : méthode finale
- souligné : élément statique
- une constante est représentée en visiblité publique, statique, de type const et en majuscules (exemple : `+VALEUR_CONSTANTE: const = 42`)

## Interactions

### L'héritage

L'héritage est modélisé par une flèche pointe de la classe Fille vers la classe Mère.

![heritage](https://user.oc-static.com/files/403001_404000/403757.png)

### L'interface

L'interface d'une classe est modélisée par une flèche **pointillée** allant de la classe vers l'interface.

![interface](https://user.oc-static.com/files/405001_406000/405059.png)

### Association

On parle d'association lorsqu'une instance des 2 classes est amenée à interagir avec l'autre instance.

![association](https://user.oc-static.com/files/403001_404000/403889.png)

Sur la flèche :

- le mot au centre est la **définition** de la relation
- le `1` et `*` désignent les cardinalités : ici **1** instance de `NewsManager` gère une infinité de `News`
  - `x` (nombre entier) : la valeur exacte de **x**
  - `x..y` : de **x** à **y** (exemple : `1..5`)
  - `x..*` : **x** ou plus (exemple : `5..*`)

### L'agrégation

On parle d'agrégation lorsque l'une des classes contiendra au moins une instance d'une autre classe.

![agregation](https://user.oc-static.com/files/403001_404000/403755.png)

Le côté ayant le losange signifie qu'il y a obligatoirement une et une seule instance de la classe par relation.

### La composition

Imaginons que nous ayons une classe A qui contient une ou plusieurs instance(s) de B. On parlera de composition si, lorsque l'instance de A sera supprimée, toutes les instances de B contenues dans l'instance de A sont elles aussi supprimées (ce qui n'était pas le cas avec l'agrégation).

![composition](https://user.oc-static.com/files/403001_404000/403756.png)