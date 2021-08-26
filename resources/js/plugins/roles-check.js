export default {
  install(Vue, options) {
    Vue.mixin({});

    Vue.prototype.$canEdit = function($areaname) {
      let arr = this.$store.getters.getRoles;
      if (arr) {
        var r = arr.some(i => i.name.includes("Editor"));
        var a = arr.some(i => i.area.includes($areaname));
      }
      if (r && a) {
        return r;
      }
      if (arr) {
        if (arr.some(i => i.name.includes("Site Editor"))) {
          return true;
        }
      }
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
      let arr = this.$store.getters.getRoles;
      if (arr) {
        if(arr.some(i => i.name.includes("HR Lead"))) {return true};
        if(arr.some(i => i.name.includes("HR Content Editor"))) {return true};
        if(arr.some(i => i.name.includes("Site Admin"))) {return true};
      }
      return res;
    };
  }
};
