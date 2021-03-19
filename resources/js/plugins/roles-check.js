export default {
  install(Vue, options) {
    Vue.mixin({});

    Vue.prototype.$canEdit = function() {
      let arr = this.$store.getters.getRoles;

      var r = arr.some(i => i.name.includes('Editor'));

      return r;

    };
  }
};
