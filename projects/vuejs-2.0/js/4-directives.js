// Option 1. Déclaration d'une directive custom
// Vue.directive('salut', {
//   bind: function(el, binding, vnode) {
//     console.log(el, binding);
//     el.value = binding.value;
//     console.log('bind');
//   },
//   update: function(el, binding, vnode, oldvnode) {
//     console.log('update');
//   }
// });

// Option 2. Idem qu'au-dessus mais si on veut que le comportement au bind / update
// soit identique, on ne définit pas chaqu méthode
// Vue.directive('salut', function(el, binding) {
//     el.value = binding.value;
//     console.log('bind');
//   }
// );

// Option 3. On peut aussi stocker les variables custom dans une variable
let salut = function(el, binding) {
  el.value = binding.value;
  console.log('bind');
};

let vm = new Vue({
  el: '#app',
  // Option 3. On appelle la directive stockée en variable
  directives: {
    salut: salut

    // Ou en ES6, simplement :
    // salut
  },
  data: {
    message: "Message",
    number: 1234,
    trim: "Je suis un espace"
  },
  methods: {
    demo: function() {
      console.log('demo');
    },
    demo2: function() {
      console.log('demo2')
    }
  }
});