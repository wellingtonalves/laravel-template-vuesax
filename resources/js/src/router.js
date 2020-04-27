/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  Object Strucutre:
                    path => router path
                    name => router name
                    component(lazy loading) => component to load
                    meta : {
                      rule => which user can have access (ACL)
                      breadcrumb => Add breadcrumb to specific page
                      pageTitle => Display title besides breadcrumb
                    }
==========================================================================================*/


import Vue from 'vue'
import Router from 'vue-router'
import store from './store/store';

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: '/',
    routes: [

        {
            // =============================================================================
            // MAIN LAYOUT ROUTES
            // =============================================================================
            path: '',
            component: () => import('./layouts/main/Main.vue'),
            children: [
                {
                    path: '/',
                    name: 'Root',
                    meta: {
                        requiresAuth: false,
                    },
                    redirect: {name: 'Dashboard'},
                },
                {
                    path: '/dashboard',
                    name: 'Dashboard',
                    component: () => import('./views/Home.vue'),
                    meta: {
                        title: 'Dashboard',
                        requiresAuth: true,
                        breadcrumb: [
                            {title: 'Home', url: '/dashboard'},
                            {title: 'Dashboard', active: true},
                        ],
                    }
                },
                {
                    path: '/users',
                    component: () => import('./views/pages/RouterViewComponent.vue'),
                    children: [
                        {
                            path: '',
                            name: 'Users',
                            component: () => import('./views/pages/Users/Users.vue'),
                            meta: {
                                title: 'Usuários',
                                requiresAuth: true,
                                rule: 'users',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Usuários', active: true},
                                ],
                            }
                        },
                        {
                            path: '/users/create',
                            component: () => import('./views/pages/Users/UserCreate.vue'),
                            meta: {
                                title: 'Novo usuário',
                                requiresAuth: true,
                                rule: 'users-store',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Usuários', url: '/users'},
                                    {title: 'Novo usuário', active: true},
                                ],
                            }
                        },
                        {
                            path: '/users/:uuid/edit',
                            component: () => import('./views/pages/Users/UserDetail.vue'),
                            meta: {
                                title: 'Detalhes do Usuário',
                                requiresAuth: true,
                                rule: 'users',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Usuários', url: '/users'},
                                    {title: 'Detalhes do Usuário', active: true},
                                ],
                            }
                        }
                    ]
                },
                {
                    path: '/profiles',
                    component: () => import('./views/pages/RouterViewComponent.vue'),
                    children: [
                        {
                            path: '',
                            name: 'Profiles',
                            component: () => import('./views/pages/Profiles/Profiles.vue'),
                            meta: {
                                title: 'Perfis',
                                requiresAuth: true,
                                rule: 'profiles',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Perfis', active: true},
                                ],
                            }
                        },
                        {
                            path: '/profiles/create',
                            component: () => import('./views/pages/Profiles/ProfileCreate.vue'),
                            meta: {
                                title: 'Novo perfil',
                                requiresAuth: true,
                                rule: 'profiles-store',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Perfis', url: '/profiles'},
                                    {title: 'Novo perfil', active: true},
                                ],
                            }
                        },
                        {
                            path: '/profiles/:uuid/edit',
                            component: () => import('./views/pages/Profiles/ProfileDetail.vue'),
                            meta: {
                                title: 'Detalhes do perfil',
                                requiresAuth: true,
                                rule: 'profiles',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Perfis', url: '/profiles'},
                                    {title: 'Detalhes do perfil', active: true},
                                ],
                            }
                        }
                    ]
                },
                {
                    path: '/clients',
                    component: () => import('./views/pages/RouterViewComponent.vue'),
                    children: [
                        {
                            path: '',
                            name: 'Clients',
                            component: () => import('./views/pages/Clients/Clients.vue'),
                            meta: {
                                title: 'Clientes',
                                requiresAuth: true,
                                rule: 'clients',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Clientes', active: true},
                                ],
                            }
                        },
                        {
                            path: '/clients/create',
                            component: () => import('./views/pages/Clients/ClientsCreate.vue'),
                            meta: {
                                title: 'Novo cliente',
                                requiresAuth: true,
                                rule: 'clients-store',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Clientes', url: '/clients'},
                                    {title: 'Novo cliente', active: true},
                                ],
                            }
                        },
                        {
                            path: '/clients/:uuid/edit',
                            component: () => import('./views/pages/Clients/ClientsDetail.vue'),
                            meta: {
                                title: 'Detalhes do cliente',
                                requiresAuth: true,
                                rule: 'clients',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Clientes', url: '/clients'},
                                    {title: 'Detalhes do Cliente', active: true},
                                ],
                            }
                        }
                    ]
                },
                {
                    path: '/representatives',
                    component: () => import('./views/pages/RouterViewComponent.vue'),
                    children: [
                        {
                            path: '',
                            name: 'Representatives',
                            component: () => import('./views/pages/Representatives/Representatives.vue'),
                            meta: {
                                title: 'Representantes',
                                requiresAuth: true,
                                rule: 'representatives',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Representantes', active: true},
                                ],
                            }
                        },
                        {
                            path: '/representatives/create',
                            component: () => import('./views/pages/Representatives/RepresentativesCreate.vue'),
                            meta: {
                                title: 'Novo representante',
                                requiresAuth: true,
                                rule: 'representatives-store',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Representantes', url: '/representatives'},
                                    {title: 'Novo representante', active: true},
                                ],
                            }
                        },
                        {
                            path: '/representatives/:uuid/edit',
                            component: () => import('./views/pages/Representatives/RepresentativesDetail.vue'),
                            meta: {
                                title: 'Detalhes do representante',
                                requiresAuth: true,
                                rule: 'representatives',
                                breadcrumb: [
                                    {title: 'Home', url: '/dashboard'},
                                    {title: 'Representantes', url: '/clients'},
                                    {title: 'Detalhes do representante', active: true},
                                ],
                            }
                        }
                    ]
                },
            ],
        },
        {
            path: '/login',
            name: 'pageLogin',
            meta: {
                requiresAuth: false,
            },
            component: () => import('@/views/pages/Login.vue')
        },
        {
            path: '/error-404',
            name: 'pageError404',
            meta: {
                requiresAuth: false,
            },
            component: () => import('@/views/pages/Error404.vue')
        },
        // Redirect to 404 page, if no match found
        {
            path: '*',
            name: 'ErrorPage',
            redirect: '/error-404',
            meta: {
                requiresAuth: false,
            },
        }
    ],
});

router.beforeEach(async (to, from, next) => {
    app.loadingActive = true;
    const requiresAuth = to.meta.requiresAuth;
    const routeRule = to.meta.rule;

    if (!requiresAuth) {
        next();
        return;
    }

    await new Promise(resolve => {
        if (!store.getters.isToken) {
            store.dispatch('refreshToken').then(() => {
                resolve()
            });
        } else {
            resolve();
        }
    });

    await new Promise(resolve => {
        // Admin (is_admin) free access (change bootstrap.js)
        if (store.getters.isAdmin) {
            resolve();
            return;
        }
        if (routeRule) {
            if (store.getters.userRoles.includes(routeRule)) {
                resolve();
                return;
            }

            next('/error-404');
        }
        resolve()
    });

    await new Promise(resolve => {
        if (requiresAuth && !store.getters.isLoggedIn) {
            next('/login');
            return;
        } else if (requiresAuth && store.getters.isLoggedIn) {
            next();
        } else {
            next();
        }
        resolve()
    })
});

export default router
