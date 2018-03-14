let vm = new Vue({
  el: '#app',
  data: {
    success: false,
    message: '',
    firstname: 'Jean',
    lastname: 'Delatour',
    completename: ''
  },

  // A la place de `methods`, on utilise `computed`
  // Au lieu que le code soit exécuté à chaque modification dans le template
  // (via v-model par exemple), le code ne sera exécuté que si la propriété
  // dans `data` est affectée
  computed: {
    cls: function() {
      console.log('cls called');
      return this.success === true ? 'success' : 'error'
    },

    // De base, une propriété "computed" n'est qu'une méthode "get",
    // on peut par contre y ajouter une méthode "set" pour redéfinir les
    // propriétés sur lesquelles on travaille
    fullname: {
      get: function() {
        return this.firstname + ' ' + this.lastname;
      },
      set: function (value) {
        let parts = value.split(' ');
        this.firstname = parts[0];
        this.lastname = parts[1];
      }
    },
  },

  // Les watchers permettent de détecter lorsque le contenu d'une variable a été modifié
  watch: {
    completename: function(value) {
      console.log('watch', value);
    }
  }
});