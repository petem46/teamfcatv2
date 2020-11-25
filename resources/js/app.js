require("./bootstrap");

import Vue from "vue";
import App from "./views/App";
import router from "./router";
import store from "./store";
import Vuetify from "vuetify";
import VueFilterDateFormat from "vue-filter-date-format";
import VueFilterDateParse from "vue-filter-date-parse";
import colors from "vuetify/lib/util/colors";
import vueFilterPrettyBytes from 'vue-filter-pretty-bytes'
import ClickOutside from 'vue-click-outside'

Vue.use(VueFilterDateFormat);
Vue.use(VueFilterDateParse);
Vue.use(vueFilterPrettyBytes);
Vue.use(ClickOutside);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component("landing-page", require("./pages/LandingPage.vue").default);
Vue.component("staff-search", require("./pages/StaffSearch.vue").default);

Vue.component("home-header", require("./components/HomeHeader.vue").default);
Vue.component("home-twitters", require("./components/HomeTwitters.vue").default);

Vue.component("side-nav-drawer", require("./components/SideNavDrawer.vue").default);
Vue.component("top-nav-bar", require("./components/TopNavBar.vue").default);
Vue.component("pages-section", require("./components/PagesSection.vue").default);
Vue.component("new-link", require("./components/NewLink.vue").default);
Vue.component("file-manager", require("./components/FileManager.vue").default);
Vue.component("file-upload", require("./components/FileUpload.vue").default);
Vue.component("g-apps-menu", require("./components/GAppsMenu.vue").default);
Vue.component("google-picker", require("./components/GooglePicker.vue").default);
Vue.component("page-header", require("./components/PageHeader.vue").default);
Vue.component("page-side-bar", require("./components/PageSideBar.vue").default);
Vue.component("page-content", require("./components/PageContent.vue").default);
Vue.component("tip-tap-editor", require("./components/TipTap.vue").default);
Vue.component("tip-tap-editor-bar", require("./components/EditorBar.vue").default);
Vue.component("tip-tap-editor-bar-heading", require("./components/EditorBarHeading.vue").default);
Vue.component("tip-tap-editor-bar-textblock", require("./components/EditorBarTextBlock.vue").default);
Vue.component("tip-tap-editor-bar-image", require("./components/EditorBarImage.vue").default);
Vue.component("latest-menu", require("./components/LatestMenu.vue").default);
Vue.component("key-info-menu", require("./components/KeyInfoMenu.vue").default);
Vue.component("remote-learning-menu", require("./components/RemoteLearningMenu.vue").default);
Vue.component(
  "academies-menu",
  require("./components/AcademiesMenu.vue").default
);
Vue.component(
  "central-services-menu",
  require("./components/CentralServicesMenu.vue").default
);
Vue.component(
  "editor-toolbar",
  require("./components/EditorToolbar.vue").default
);

Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    light: {
      a: colors.teal,
      primary: colors.teal,
      warning: "#F57C00",
      "dark-orange": "#F57C00"
    }
  },
  icons: {
    iconfont: "fa"
  }
});

const app = new Vue({
  components: {
    App
  },
  el: "#app",
  router,
  store,
  vuetify: new Vuetify()
});
