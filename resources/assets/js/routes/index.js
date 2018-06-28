import Vue from 'vue'
import Router from 'vue-router'

import home from '../components/layouts/Home'
import profile from '../components/layouts/Profile'

Vue.use(Router)

export default new Router({
	routes: [
		{
			path: '/',
			component : home
		},
		{
			path: '/profile',
			component : profile
		}
	]
})