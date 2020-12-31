import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home'
import Covid from './pages/Covid'
import LandingPage from './pages/LandingPage'
import StaffSearch from './pages/StaffSearch'
import PageSearch from './pages/PageSearch'
import CovidLandingPage from './pages/CovidLandingPage'
import QIGLandingPage from './pages/QIGLandingPage'
import FinanceLandingPage from './pages/FinanceLandingPage'
import HRLandingPage from './pages/HRLandingPage'
import ICTLandingPage from './pages/ICTLandingPage'
import HealthandSafetyLandingPage from './pages/HealthandSafetyLandingPage'
import DataProtectionLandingPage from './pages/DataProtectionLandingPage'
import MediaPRLandingPage from './pages/MediaPRLandingPage'
import PremisesLandingPage from './pages/PremisesLandingPage'
import DataInformationLandingPage from './pages/DataInformationLandingPage'
import UpdatesLandingPage from './pages/UpdatesLandingPage'
import PolicyDocsLandingPage from './pages/PolicyDocsLandingPage'
import EventsDatesLandingPage from './pages/EventsDatesLandingPage'
import RemoteTLPage from './pages/RemoteTLPage'
import Panda from './pages/Panda'
import Penguin from './pages/Penguin'
import ViewPage from './pages/ViewPage'
import ViewPage2 from './pages/ViewPage2'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    // {
    //   path: '/:sectionname',
    //   name: 'landingpage',
    //   component: LandingPage,
    //   props: true
    // },

    {
      path: '/',
      name: 'base',
      component: Home
    },
    {
      path: '/home',
      name: 'home',
      component: Home
    },

    // {
    //   path: '/p/:slug',
    //   name: 'viewpage',
    //   component: ViewPage,
    //   props: true
    // },
    {
      path: '/p2/:areaname/:slug',
      name: 'viewpage2',
      component: ViewPage2,
      props: true
    },
    {
      path: '/newpage/:areaname/:slug',
      name: 'newpage',
      component: ViewPage2,
      props: true
    },
    {
      path: '/finance',
      name: 'finance',
      component: FinanceLandingPage,
      props: true
    },
    {
      path: '/covid',
      name: 'covid',
      component: CovidLandingPage,
      props: true
    },
    {
      path: '/qigs',
      name: 'qigs',
      component: QIGLandingPage,
      props: true
    },
    {
      path: '/ict',
      name: 'ict',
      component: ICTLandingPage,
      props: true
    },
    {
      path: '/healthandsafety',
      name: 'healthandsafety',
      component: HealthandSafetyLandingPage,
      props: true
    },
    {
      path: '/dataprotection',
      name: 'dataprotection',
      component: DataProtectionLandingPage,
      props: true
    },
    {
      path: '/mediaandpr',
      name: 'mediaandpr',
      component: MediaPRLandingPage,
      props: true
    },
    {
      path: '/hr',
      name: 'hr',
      component: HRLandingPage,
      props: true
    },
    {
      path: '/premises',
      name: 'premises',
      component: PremisesLandingPage,
      props: true
    },
    {
      path: '/datamis',
      name: 'datamis',
      component: DataInformationLandingPage,
      props: true
    },
    {
      path: '/updates',
      name: 'updates',
      component: UpdatesLandingPage,
      props: true
    },
    {
      path: '/policies',
      name: 'policies',
      component: PolicyDocsLandingPage,
      props: true
    },
    {
      path: '/calendar',
      name: 'calendar',
      component: EventsDatesLandingPage,
      props: true
    },
    {
      path: '/remotetl',
      name: 'remotetl',
      component: RemoteTLPage,
      props: true
    },
    {
      path: '/panda',
      name: 'panda',
      component: Panda,
      props: true
    },
    {
      path: '/penguin',
      name: 'penguin',
      component: Penguin,
      props: true
    },
    {
      path: '/staffsearch',
      name: 'staffsearch',
      component: StaffSearch,
      // props: true
    },
    {
      path: '/pagesearch',
      name: 'pagesearch',
      component: PageSearch,
      // props: true
    },
  ],
  // scrollBehavior(to, from, savedPosition) {
  //   return { x: 0, y: 0 }
  // },
})
