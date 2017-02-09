# Emails Workflow

> *Projet réalisé dans le cadre du [100 Days of Code Challenge](https://github.com/hugodessomme/100-days-of-code).*

Création d'un worflow sous Gulp pour simplifier la création, la modification et l'envoi d'emails (newsletter), basé sur le framework [Foundation for Emails](http://foundation.zurb.com/emails.html).

## Usage

**Pour la 1ère installation**

Lancer la commande `npm install --global foundation-cli` (si problèmes d'accès, préfixer la commande par `sudo)

**Sinon...**

1. Cloner le projet
2. Lancer la commande `npm install` (l'opération prend environ 1 minute)
3. Lancer la commande `npm start`
4. Cela va ouvrir un nouvel onglet avec notre projet
5. Il ne reste plus qu'à coder pour visualiser directement les modifications dans le navigateur

## Structure
|-- `dist/` : fichiers compilés de l'email (minifié, css inline...)  
|-- `src/`  
|----`assets/` : fichiers .scss et images  
|----`layouts/` : template de structure de l'email (basiquement le header / footer)  
|----`pages/` : contenus de l'email  
|----`partials/` : templates importables dans les pages (équivalent à un `include` en PHP)

## Inky

Inky est le langage de templating des emails sur ce framework. Il permet de simplifier chaque étape de l'élaboration d'un email (création, modification, maintenance.

Exemple : 

```html
<!-- HTML -->
<table align="center" class="container">
	<tbody>
		<tr>
	  		<td>Lorem ipsum dolor sit amet</td>
		</tr>
	</tbody>
</table>

<!-- Inky -->
<container>Lorem ipsum dolor sit amet</container>
```

[Foundation for Emails](http://foundation.zurb.com/emails.html) propose plusieurs composants (comme `<container>` dans l'exemple ci-dessus), dont la documentation se trouve sur le site officiel : 

- [Alignment Classes](http://foundation.zurb.com/emails/docs/alignment.html)
- [Button ](http://foundation.zurb.com/emails/docs/button.html)
- [Callout](http://foundation.zurb.com/emails/docs/callout.html)
- [Global Styles](http://foundation.zurb.com/emails/docs/global.html)
- [Grid](http://foundation.zurb.com/emails/docs/grid.html)
- [Menu](http://foundation.zurb.com/emails/docs/menu.html)
- [Spacer](http://foundation.zurb.com/emails/docs/spacer.html)
- [Wrapper](http://foundation.zurb.com/emails/docs/wrapper.html)
- [Typography](http://foundation.zurb.com/emails/docs/typography.html)
- [Visibility Classes](http://foundation.zurb.com/emails/docs/visibility.html)
