export default {
  install(Vue, options) {
    Vue.mixin({});

    Vue.prototype.$canEdit = function($areaname) {
      var res = false;
      let array = this.$store.getters.getRoles;
      // console.log(array);
      for (let i = 0; i < array.length; i++) {
        var r = array[i].name.includes("Editor");
        var a = array[i].name.includes($areaname.toUpperCase() + " Content Editor");
        if (r & a) {
          return true;
        }
        if (array[i].name.includes("Site Editor")) {
          return true;
        }
      }
      return res;
    };

    Vue.prototype.$isSiteAdmin = function() {
      let arr = this.$store.getters.getRoles;
      if (arr) {
        var r = arr.some(i => i.name.includes("Site Admin"));
      }
      return r;
    };

    /*
     * CHECK IS HR USER
     */
    Vue.prototype.$isHrUser = function() {
      var res = false;
      const array = this.$store.getters.getRoles;
      for (let i = 0; i < array.length; i++) {
        if (array[i].name.includes("HR Lead")) {
          return true;
        }
        if (array[i].name.includes("HR Content Editor")) {
          return true;
        }
        if (array[i].name.includes("Site Admin")) {
          return true;
        }
      }
      return res;
    };
  }
};
