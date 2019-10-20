window._ = require('lodash');
store = require('./store/store');
routes = require('./router');
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

const access_token = localStorage.getItem('access_token');
if (access_token) {
    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + access_token
}

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    if (error.response.data.status === 401) {
        window.location.href = '/login';
    }
    return Promise.reject(error);
});

window.checkPermission = function (rule) {
    //Admin(is_admin) free access (change router.js)
    if (!rule || store.default.getters.isAdmin) {
        return true
    }
    return store.default.getters.userRoles.includes(rule);
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
