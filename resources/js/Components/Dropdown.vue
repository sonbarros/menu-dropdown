<template>
  <div class="relative inline-block text-left">
    <button 
      @click.stop.prevent="toggle"
      type="button"
      :class="{ 'rounded-md': rounded, 'border border-gray-300': !naked }"
      class="flex items-center justify-center leading-5 transition ease-in-out duration-150 z-50 text-sm font-medium text-cool-gray-700 hover:text-cool-gray-500 active:text-cool-gray-700 focus:border-blue-300 focus:outline-none focus:shadow-outline-blue px-4 py-2 bg-white active:bg-gray-50">
      {{text}}
      
      <svg
        v-if="!noIcon"
        class="h-4 w-4 -mr-1 ml-2"
        fill="currentColor"
        viewBox="0 0 20 20"
      >
        <path
          fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"
        />
      </svg>
      
    </button>

    <Transition
      enter-active-class="transition ease-out duration-100"
      enter-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95">

    <div 
      v-show="isOpen"
      class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg z-50">
      <div class="flex flex-col py-1 rounded-md bg-white shadow-xs border border-gray-100">
        <slot/>
      </div>
    </div>

    </Transition>


  </div>
</template>

<script>

export default {
  name: 'Dropdown',
  props: {
    text: {
      type: String,
      default: ''
    },
    noIcon: {
      type: Boolean,
      default: false
    },
    rounded: {
      type: Boolean,
      default: false
    },

    naked: {
      type: Boolean,
      default: false
    }
  },
  data: function() {
    return {
      isOpen: false
    }
  },
  provide: function(){
    return {
      dropdown: this,
    }
  },
  watch: {
    /**
     * Técnica para fechar o dropdown nos casos que temos mais de um dropdown
     * Se clicar no primeiro feicha o segundo, se clicar no segundo fecha o primeiro
     */
    isOpen(newValue){
      if (newValue) {
        this.$root.$emit('dropdown::open', this) // emit no root do vue
      }
    }
  },
  created: function() {
    this.$root.$on('dropdown::open', this.rootCloseListener) // escuta no root do vue
  },
  methods: {
    toggle: function() {
      this.isOpen = !this.isOpen
    },
    close: function() {
      this.isOpen = false
    },
    clickDeForaDoDropdown: function(evt) {
        if (!this.$el.contains(evt.target)) {
          this.close()
        }
    },
    rootCloseListener: function(vm) {
      if (vm !== this) {
        // checa se o dropdown clicado é diferente
        this.close()
      }
    }
  },
  mounted: function() {
    document.addEventListener('click', this.clickDeForaDoDropdown)
  },
  beforeDestroy: function() {
    document.addEventListener('click', this.clickDeForaDoDropdown)
  }
}
</script>

<style>

</style>