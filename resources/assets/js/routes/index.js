import home from '../components/layouts/Home'
import profile from '../components/layouts/Profile'

export default [
	{
		path: '/',
		component : home,
		name : 'home'
	},
	{
		path: '/profile',
		component : profile,
		name : 'profile'
	}
]