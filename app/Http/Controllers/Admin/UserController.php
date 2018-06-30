<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
use File;

class UserController extends Controller
{
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

    public function upload(Request $request) {

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

        $input = request()->validate([
                    'name' => 'required',
                    'phone' => 'required|',
                    'address' => 'required'
                ],
                [
                    'name.required'   => 'Name không bỏ trống',
                    'phone.required'   => 'Số điện thoại không bỏ trống',
                    'address.required' => 'Địa chỉ không bỏ trống'
                ]);

        $user = new User();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        return redirect()->route('profile');
    }

    public function index() {
        return view('home');
    }
}
