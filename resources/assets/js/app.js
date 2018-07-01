
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import App from './components/App'
import VueRouter from 'vue-router'
import Notifications from 'vue-notification'
import NProgress from 'nprogress'
import '../../../node_modules/nprogress/nprogress.css'
import VeeValidate from 'vee-validate'
import Routes from './routes'

Vue.use(VueRouter)
Vue.use(Notifications)
Vue.use(VeeValidate)

const router = new VueRouter({
	routes : Routes,
	mode: 'history',
})

router.beforeEach((to, from, next) => {
	document.title = to.meta.title
	next()
})

router.beforeResolve((to, from, next) => {
	if (to.name) {
		NProgress.start()
	}
	next()
})

router.afterEach(() => {
	NProgress.done()
})

const app = new Vue({
    el: '#app',
    router : router,
    render: h => h(App),
})

export default app