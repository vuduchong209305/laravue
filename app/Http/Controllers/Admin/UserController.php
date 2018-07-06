<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;
use Validator;

class UserController extends Controller
{
    private $per_page = 10;

    public function getLogin() {
        if(Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('admin.login');
        }
    }

    public function postLogin(LoginRequest $request) {

    	$login = $request->only('email', 'password');

        if (!Auth::attempt($login))
            return back()->with('msg', 'Đăng nhập thất bại');
        else
            return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function updateAvatar(Request $request) {

    	$status = false;

    	$id = Auth::user()->id;

    	if($request->hasFile('image')) {

    		if($request->file('image')->isValid()) {

    			$image = $request->file('image');

    			$fileName = $image->getClientOriginalName();

    			$image->move(public_path('admin/avatar'), $fileName);

    			$location = '/public/admin/avatar/' . $fileName;

    			$avatar_old = User::find($id)->select('avatar')->first();

    			$avatar_old = url('/').$avatar_old->avatar;

    			File::delete($avatar_old);

    			User::where('id', $id)->update(['avatar' => $location]);

    			$status = 'OK';

    		} else {

    			$status = 'IMAGE INVALID';

    		}
    	}
    	
    	return response()->json($status);
    }

    public function updateProfile(Request $request) {

        $validator = Validator::make($request->data, [
            'name'    => 'required',
            'phone'   => 'required',
            'address' => 'required'
        ]);

        if ($validator->passes()) {

            $user          = User::find($request->data['id']);
            $user->name    = $request->data['name'];
            $user->phone   = $request->data['phone'];
            $user->address = $request->data['address'];

            if($request->data['password'] != '') {
                $user->password = Hash::make($request->data['password']);
            }

            $user->save();
            $status = 'OK';
            
        } else {
            $status = $validator->errors();
        }

        return response()->json($status);
    }

    public function index() {
        return view('admin.home');
    }

    public function getAllRegent() {
        $admin = User::paginate($this->per_page);
        return response()->json($admin);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'email'    => 'required',
            'role'     => 'required',
            'password' => 'required'
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->file('image');

            $fileName = $image->getClientOriginalName();

            $image->move(public_path('admin/avatar'), $fileName);

            $location = '/public/admin/avatar/' . $fileName;

        }

        if ($validator->passes()) {
            $user           = new User;
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone    = $request->phone;
            $user->address  = $request->address;
            $user->role     = $request->role;
            $user->avatar   = $location;

            $user->save();
            $status = 'OK';

        } else {

            $status = $validator->errors();

        }

        return response()->json($status);
    }

    public function deleteRegent(Request $request) {
        if($request->id == Auth::user()->id) {
            $status = 'is_me';
            return response()->json($status);
        }

        if($request->isMethod('delete')) {
            $user = new User;
            $user = User::find($request->id);
            $user->delete();

            if(File::exists($user->avatar)) {
                File::delete($user->avatar);
            }

            $status = 'OK';
        }
        return response()->json($status);
    }
}
