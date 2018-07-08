import home from '../components/layouts/Home'
import profile from '../components/layouts/Profile'
import page404 from '../components/layouts/Page404'
import addRegent from '../components/pages/regent/AddRegent'
import listRegent from '../components/pages/regent/ListRegent'
import editRegent from '../components/pages/regent/EditRegent'

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
		meta : {title : 'Không tìm thấy trang'}
	},
	{	
		path: '/admin/regent/add',
		component: addRegent,
		name : 'addRegent',
		meta : {title : 'Thêm ban quản trị'}
	},
	{	
		path: '/admin/regent',
		component: listRegent,
		name : 'listRegent',
		meta : {title : 'Danh sách ban quản trị'}
	},
	{	
		path: '/admin/regent/:id',
		component: editRegent,
		name : 'editRegent',
		meta : {title : 'Cập nhật ban quản trị'}
	},
]