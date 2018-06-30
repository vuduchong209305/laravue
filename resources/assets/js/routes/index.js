import home from '../components/layouts/Home'
import profile from '../components/layouts/Profile'
import page404 from '../components/layouts/Page404'

export default [

	{
		path: '/admin/home',
		component : home,
		name : 'home'
	},
	{
		path: '/admin/profile',
		component : profile,
		name : 'profile',
		meta : {title : 'Profile'}
	},
	{	
		path: '*',
		component: page404,
		meta : {title : 'Không tìm thấy trang'}
	},
]