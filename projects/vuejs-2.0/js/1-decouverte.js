new Vue({
  el: '#app',
  data: {
    message: "Salut les gens",
    link: "http://www.google.fr",
    success: true,
    cls: 'success',
    people: ['Marc', 'Paul', 'Jack', 'Lucie']
  },
  methods: {
    close: function() {
      this.message = "Fermé"
      this.success = false
    },
    style: function() {
      if (this.success) {
        return {background: 'green'}
      } else {
        return { background: 'red'}
      }
    }
  }
});