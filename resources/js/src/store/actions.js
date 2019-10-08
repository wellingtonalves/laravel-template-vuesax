/*=========================================================================================
  File Name: actions.js
  Description: Vuex Store - actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
import Router from './../router';

const actions = {

    // ////////////////////////////////////////////
    // SIDEBAR & UI UX
    // ////////////////////////////////////////////

    updateSidebarWidth({commit}, width) {
        commit('UPDATE_SIDEBAR_WIDTH', width);
    },
    updateI18nLocale({commit}, locale) {
        commit('UPDATE_I18N_LOCALE', locale);
    },
    toggleContentOverlay({commit}) {
        commit('TOGGLE_CONTENT_OVERLAY');
    },
    updateTheme({commit}, val) {
        commit('UPDATE_THEME', val);
    },
    updateUserRole({commit}, val) {
        commit('UPDATE_USER_ROLE', val);
    },
    updateWindowWidth({commit}, width) {
        commit('UPDATE_WINDOW_WIDTH', width);
    },


    // ////////////////////////////////////////////
    // COMPONENT
    // ////////////////////////////////////////////

    // VxAutoSuggest
    updateStarredPage({commit}, payload) {
        commit('UPDATE_STARRED_PAGE', payload)
    },

    //  The Navbar
    arrangeStarredPagesLimited({commit}, list) {
        commit('ARRANGE_STARRED_PAGES_LIMITED', list)
    },
    arrangeStarredPagesMore({commit}, list) {
        commit('ARRANGE_STARRED_PAGES_MORE', list)
    },
    async setAuthenticated({dispatch, commit}, data) {
        await dispatch('updateToken', data);
        await dispatch('getUser');
        await commit('SET_AUTHENTICATED');
    },
    updateToken({commit}, data) {
        commit('UPDATE_TOKEN', data);
    },
    updateUser({commit}, data) {
        commit('UPDATE_USER', data);
    },
    async getUser({dispatch}) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
        await axios.get('/api/v1/auth/user').then(response => {
            dispatch('updateUser', response.data);
            return true;
        }).catch(error => {
            return false;
        })
    },
    async refreshToken({dispatch, commit}) {
        let refresh_token = localStorage.getItem('refresh_token');
        if (!refresh_token) {
            commit('LOGOUT');
            return false;
        }
        let data = {
            'grant_type': 'refresh_token',
            'refresh_token': refresh_token,
            'client_id': '2',
            'client_secret': 'IYo9VB3qFVQjB53cJWV1M6zoOxQv5dZDo231cDmR',
            'scope': '',
        };
        await axios.post('/oauth/token', data).then(async response => {
            await new Promise(async resolve => {
                await dispatch('updateToken', response.data);
                await dispatch('getUser');
                resolve();
            }).then(() => {
                commit('SET_AUTHENTICATED');
                return true;
            });

        }).catch(error => {
            commit('LOGOUT');
            return false;
        })
    },
    logout({commit}){
        commit('LOGOUT');
    }
}

export default actions
