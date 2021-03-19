export default {
  install(Vue, options) {
    Vue.mixin({});

    Vue.prototype.$canEdit = function() {
      let arr = this.$store.getters.getRoles;
      if (arr) {
        var r = arr.some(i => i.name.includes("Editor"));
      }
      return r;
    };

    Vue.prototype.$isSiteAdmin = function() {
      let arr = this.$store.getters.getRoles;
      if (arr) {
        var r = arr.some(i => i.name.includes("Site Admin"));
      }
      return r;
    };
  }
};
