import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    userid: null,
    roleid: null,
    avatar: null,
    name: null,
    gtoken: null,
  },
  mutations: {
    setUserId(state, id) {
      state.userid = id;
    },
    setName(state, id) {
      state.name = id;
    },
    setRoleId(state, id) {
      state.roleid = id;
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
    getName(state) {
      return state.name;
    },
    getUserId(state) {
      return state.userid;
    },
    getRoleId(state) {
      return state.roleid;
    },
    getAvatar(state) {
      return state.avatar;
    },
    getGtoken(state) {
      return state.gtoken;
    }
  }
});
