/*=========================================================================================
  File Name: getters.js
  Description: Vuex Store - getters
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


const getters = {
    isLoggedIn: state => state.isAuthenticated,
    isToken: state => state.token,
    userRoles: state => state.userRole,
    isAdmin: state => state.user.is_admin,
    user: state => state.user,
    // COMPONENT
    // vx-autosuggest
    // starredPages: state => state.navbarSearchAndPinList.data.filter((page) => page.highlightAction),
}

export default getters