export default {
  install(Vue, options) {
    Vue.mixin({});

    Vue.prototype.$canEdit = function() {
      if (parseInt(this.$store.getters.getRoleId) < 3) {
        return 1;
      } else return 0;
    };
  }
};
