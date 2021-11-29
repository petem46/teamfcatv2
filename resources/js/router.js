import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home";
import Covid from "./pages/Covid";
import LandingPage from "./pages/LandingPage";
import UserManagement from "./pages/UserManagement";
import StaffSearch from "./pages/StaffSearch";
import PageSearch from "./pages/PageSearch";
import CovidLandingPage from "./pages/CovidLandingPage";
import QIGLandingPage from "./pages/QIGLandingPage";
import FinanceLandingPage from "./pages/FinanceLandingPage";
import HRLandingPage from "./pages/HRLandingPage";
import JoinLandingPage from "./pages/JoinLandingPage";
import JoinTeamFCATPage from "./pages/JoinTeamFCATPage";
import CreateVacancyPage from "./pages/join/Create";
import ShowVacancyPage from "./pages/join/Show";
import EditVacancyPage from "./pages/join/Edit";
import ITLandingPage from "./pages/ITLandingPage";
import HealthandSafetyLandingPage from "./pages/HealthandSafetyLandingPage";
import DataProtectionLandingPage from "./pages/DataProtectionLandingPage";
import MediaPRLandingPage from "./pages/MediaPRLandingPage";
import PremisesLandingPage from "./pages/PremisesLandingPage";
import DataInformationLandingPage from "./pages/DataInformationLandingPage";
import UpdatesLandingPage from "./pages/UpdatesLandingPage";
import SafeguardingLandingPage from "./pages/SafeguardingLandingPage";
import PolicyDocsLandingPage from "./pages/PolicyDocsLandingPage";
import EventsDatesLandingPage from "./pages/EventsDatesLandingPage";
import RemoteTLPage from "./pages/RemoteTLPage";
import Panda from "./pages/Panda";
import Penguin from "./pages/Penguin";
import ViewPage from "./pages/ViewPage";
import ViewPage2 from "./pages/ViewPage2";
import store from "./store";

Vue.use(Router);

async function isHrUser(to, from, next) {
  const user = await getUserState();
  let arr = store.state.roles;
  if (
    arr.some(i => i.name.includes("Site Admin")) ||
    arr.some(i => i.name.includes("HR Lead")) ||
    arr.some(i => i.name.includes("HR Content Editor"))
  ) {
    next();
  } else next("/home");
}

function getUserState() {
  return new Promise((resolve, reject) => {
    if (store.state.user === undefined) {
      const unwatch = store.watch(
        () => store.state.user,
        value => {
          unwatch();
          resolve(value);
        }
      );
    } else {
      resolve(store.state.user);
    }
  });
}

export default new Router({
  mode: "history",
  routes: [
    // {
    //   path: '/:sectionname',
    //   name: 'landingpage',
    //   component: LandingPage,
    //   props: true
    // },

    {
      path: "/",
      name: "base",
      component: Home,
      meta: {
        auth: true,
        title: "Home Page"
      }
    },
    {
      path: "/home",
      name: "home",
      component: Home,
      meta: {
        auth: true,
        title: "Home Page"
      }
    },

    // {
    //   path: '/p/:slug',
    //   name: 'viewpage',
    //   component: ViewPage,
    //   props: true
    // },
    {
      path: "/p2/:areaname/:slug",
      name: "viewpage2",
      component: ViewPage2,
      props: true,
      meta: {
        auth: true,
        title: ":areaname Page"
      }
    },
    {
      path: "/newpage/:areaname/:slug",
      name: "newpage",
      component: ViewPage2,
      props: true,
      meta: {
        auth: true,
        title: ":areaname New Page"
      }
    },
    {
      path: "/finance",
      name: "finance",
      component: FinanceLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Finance Landing Page"
      }
    },
    {
      path: "/covid",
      name: "covid",
      component: CovidLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Covid Landing Page"
      }
    },
    {
      path: "/safeguarding",
      name: "safeguarding",
      component: SafeguardingLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Safeguarding Landing Page"
      }
    },
    {
      path: "/qigs",
      name: "qigs",
      component: QIGLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "QIG Landing Page"
      }
    },
    {
      path: "/it",
      name: "it",
      component: ITLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "IT Landing Page"
      }
    },
    {
      path: "/healthandsafety",
      name: "healthandsafety",
      component: HealthandSafetyLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Health & Safety Landing Page"
      }
    },
    {
      path: "/dataprotection",
      name: "dataprotection",
      component: DataProtectionLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Data Protection Landing Page"
      }
    },
    {
      path: "/mediaandpr",
      name: "mediaandpr",
      component: MediaPRLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Media & PR Landing Page"
      }
    },
    {
      path: "/hr",
      name: "hr",
      component: HRLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "HR Landing Page"
      }
    },
    {
      path: "/jointeamfcat",
      name: "jointeamfcat",
      component: JoinLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Join TeamFCAT Page"
      }
    },
    {
      path: "/join",
      name: "join",
      component: JoinTeamFCATPage,
      // beforeEnter: isHrUser,
      props: true,
      meta: {
        auth: true,
        title: "Join TeamFCAT Landing Page"
      }
    },
    {
      path: "/join/create",
      name: "join.create",
      component: CreateVacancyPage,
      // beforeEnter: isHrUser,
      props: true,
      meta: {
        auth: true,
        title: "Join TeamFCAT New Vacancy"
      },
      beforeEnter: (to, from, next) => {
        if (to.name !== "Login" && !isAuthenticated) next({ name: "Login" });
        else next();
      }
    },
    {
      path: "/join/:vacancy_id",
      name: "join.show",
      component: ShowVacancyPage,
      // beforeEnter: isHrUser,
      props: true,
      meta: {
        auth: true,
        title: "Show Vacancy TeamFCAT"
      }
    },
    {
      path: "/join/:vacancy_id/edit",
      name: "join.edit",
      component: EditVacancyPage,
      // beforeEnter: isHrUser,
      props: true,
      meta: {
        auth: true,
        title: "Edit Vacancy TeamFCAT"
      }
    },
    {
      path: "/premises",
      name: "premises",
      component: PremisesLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Premises Landing Page"
      }
    },
    {
      path: "/datamis",
      name: "datamis",
      component: DataInformationLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Data Landing Page"
      }
    },
    {
      path: "/updates",
      name: "updates",
      component: UpdatesLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Updates Landing Page"
      }
    },
    {
      path: "/policies",
      name: "policies",
      component: PolicyDocsLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Policies Landing Page"
      }
    },
    {
      path: "/calendar",
      name: "calendar",
      component: EventsDatesLandingPage,
      props: true,
      meta: {
        auth: true,
        title: "Calendar Landing Page"
      }
    },
    {
      path: "/remotetl",
      name: "remotetl",
      component: RemoteTLPage,
      props: true,
      meta: {
        auth: true,
        title: "Remote T&L Landing Page"
      }
    },
    {
      path: "/panda",
      name: "panda",
      component: Panda,
      props: true
    },
    {
      path: "/penguin",
      name: "penguin",
      component: Penguin,
      props: true
    },
    {
      path: "/usermanagement",
      name: "usermanagement",
      component: UserManagement,
      // props: true,
      meta: {
        auth: true,
        title: "User Management Page"
      }
    },
    {
      path: "/staffsearch",
      name: "staffsearch",
      component: StaffSearch,
      // props: true,
      meta: {
        auth: true,
        title: "Staff Search Page"
      }
    },
    {
      path: "/pagesearch",
      name: "pagesearch",
      component: PageSearch,
      // props: true,
      meta: {
        auth: true,
        title: "Page Search Page"
      }
    }
  ]
  // scrollBehavior(to, from, savedPosition) {
  //   return { x: 0, y: 0 }
  // },
});
