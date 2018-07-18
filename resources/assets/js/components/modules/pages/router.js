import home from './Home'
import profile from './Profile'
import page404 from './Page404'

export default [
	{
		path: '/admin/home',
		component : home,
		name : 'home',
		meta : {title : 'Home'}
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
		name : 'page404',
		meta : {title : 'Không tìm thấy trang'}
	},
]