import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    userid: null,
    roles: null,
    avatar: null,
    name: null,
    school: null,
    gtoken: null
  },
  mutations: {
    setUser(state, id) {
      state.user = id;
    },
    setUserId(state, id) {
      state.userid = id;
    },
    setName(state, id) {
      state.name = id;
    },
    setSchool(state, id) {
      state.school = id;
    },
    setRoles(state, roles) {
      state.roles = roles;
    },
    setAvatar(state, id) {
      state.avatar = id;
    },
    setGtoken(state, id) {
      state.gtoken = id;
    }
  },
  actions: {},
  getters: {
    getUser(state) {
      return state.user;
    },
    getName(state) {
      return state.name;
    },
    getSchool(state) {
      return state.school;
    },
    getUserId(state) {
      return state.userid;
    },
    getRoles(state) {
      return state.roles;
    },
    getAvatar(state) {
      return state.avatar;
    },
    getGtoken(state) {
      return state.gtoken;
    }
  }
});

// export default store;
