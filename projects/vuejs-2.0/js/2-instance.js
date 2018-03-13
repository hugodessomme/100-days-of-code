let vm =new Vue({
  el: '#app',
  data: {
    seconds: 0
  },

  // Lorsque l'élément est "monté"
  mounted: function() {
    this.$interval = setInterval(() => {
      console.log("Time");

      this.seconds++
    }, 1000)
  },

  // Au destroy de l'élément
  //
  // Si cette méthode n'est pas définie, simplement appeler dans la console `vm.$destoryed()
  // n'est pas suffisant. A l'avenir, si on écoute des événements au scroll et qu'on ne les
  // destroy pas avec la méthode dédiée, ils tourneront toujours en tâche de fond
  destroyed: function() {
    clearInterval(this.$interval)
  }
});

// A retenir
//
// Vue n'est pas capable d'ajouter des propriétés qui ne sont pas définies de base dans data
// On ne peut pas accéder à un élément de tableau via son index
// Comprendre le lifecycle de Vue.js : https://vuejs.org/v2/guide/instance.html#Lifecycle-Diagram