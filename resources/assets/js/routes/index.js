import home from '../components/layouts/Home'
import profile from '../components/layouts/Profile'

export default [
	{
		path: '/admin/home',
		component : home,
		name : 'home'
	},
	{
		path: '/admin/profile',
		component : profile,
		name : 'profile'
	}
]