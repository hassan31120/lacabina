import { createRouter, createWebHistory } from "vue-router";
import axios from "axios";
import homePage from "../pages/HomePage.vue";
import allusersPage from "../pages/users/allusersPage.vue";
import add_userPage from "../pages/users/add_userPage.vue";
import edit_userPage from "../pages/users/edit_userPage.vue";
import adminsPage from "../pages/admins/adminsPage.vue";
import add_adminPage from "../pages/admins/add_adminPage.vue";
import edit_adminPage from "../pages/admins/edit_adminPage.vue";
import citiesPage from "../pages/cities/citiesPage.vue";
import add_cityPage from "../pages/cities/add_cityPage.vue";
import edit_cityPage from "../pages/cities/edit_cityPage.vue";
import catsPage from "../pages/cats/catsPage.vue";
import add_catPage from "../pages/cats/add_catPage.vue";
import edit_catPage from "../pages/cats/edit_catPage.vue";
import subsPage from "../pages/subs/subsPage.vue";
import add_subPage from "../pages/subs/add_subPage.vue";
import edit_subPage from "../pages/subs/edit_subPage.vue";
import login from "../components/auth/login.vue";
import error404 from "../components/errors/error404.vue";
import error500 from "../components/errors/error500.vue";
import infoPage from "../pages/info/infoPage.vue";
import edit_infoPage from "../pages/info/edit_infoPage.vue";
import productsPage from "../pages/products/productsPage.vue";
import add_productPage from "../pages/products/add_productPage.vue";
import edit_productPage from "../pages/products/edit_productPage.vue";
import ordersPage from "../pages/orders/ordersPage.vue";
import notiPage from "../pages/noti/notiPage.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: homePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/:catchAll(.*)*",
        name: "error404",
        component: error404,
    },
    {
        path: "/serverErr",
        name: "error500",
        component: error500,
    },
    {
        path: "/login",
        name: "login",
        component: login,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    return next({ name: "home" });
                })
                .catch(() => {
                    next();
                });
        },
    },
    {
        path: "/users",
        name: "users",
        component: allusersPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_user",
        name: "add_user",
        component: add_userPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_user/:id",
        name: "edit_user",
        component: edit_userPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/admins",
        name: "admins",
        component: adminsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_admin",
        name: "add_admin",
        component: add_adminPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_admin/:id",
        name: "edit_admin",
        component: edit_adminPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/cities",
        name: "cities",
        component: citiesPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_city",
        name: "add_city",
        component: add_cityPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_city/:id",
        name: "edit_city",
        component: edit_cityPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/noti",
        name: "noti",
        component: notiPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/cats",
        name: "cats",
        component: catsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_cat",
        name: "add_cat",
        component: add_catPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_cat/:id",
        name: "edit_cat",
        component: edit_catPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/subs",
        name: "subs",
        component: subsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_sub",
        name: "add_sub",
        component: add_subPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_sub/:id",
        name: "edit_sub",
        component: edit_subPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/info",
        name: "info",
        component: infoPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_info",
        name: "edit_info",
        component: edit_infoPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },

    {
        path: "/products",
        name: "products",
        component: productsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_product",
        name: "add_product",
        component: add_productPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_product/:id",
        name: "edit_product",
        component: edit_productPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/orders",
        name: "orders",
        component: ordersPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
