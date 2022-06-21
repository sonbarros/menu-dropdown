
window.Vue = require('vue');

import Dropdown from './Components/Dropdown.vue'
import DropdownItem from './Components/DropdownItem.vue'
import DrodownDivider from './Components/DropdownDivider.vue'

var app = new Vue({
  el: '#app',
  components: {
    'dropmenu': Dropdown,
    'drop-item': DropdownItem,
    DrodownDivider
  },
  methods: {
    metodo4teste: function(evt) {
      console.log('click em metodo4teste', evt)
    }
  }
})
