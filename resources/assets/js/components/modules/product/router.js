import addProduct from './AddProduct'
import listProduct from './ListProduct'
import editProduct from './EditProduct'

export default [
	{	
		path: '/admin/product/add',
		component: addProduct,
		name : 'addProduct',
		meta : {title : 'Thêm sản phẩm'}
	},
	{	
		path: '/admin/product',
		component: listProduct,
		name : 'listProduct',
		meta : {title : 'Danh sách sản phẩm'}
	},
	{	
		path: '/admin/product/:id',
		component: editProduct,
		name : 'editProduct',
		meta : {title : 'Cập nhật sản phẩm'}
	}
]