import addRegent from './AddRegent'
import listRegent from './ListRegent'
import editRegent from './EditRegent'

export default [
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
	}
]