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
use Mail;

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

    public function dashboard() {
        return view('admin.home');
    }

    public function index(Request $request) {
        if(!$request->keyword) {
            $admin = User::orderBy('role', 'asc')->orderBy('status', 'desc')->paginate($this->per_page);
        } else {
            $admin = User::where('email', 'like', '%' . $request->keyword . '%')
            ->orWhere('role', 'like', '%' . $request->keyword . '%')
            ->orWhere('name', 'like', '%' . $request->keyword . '%')
            ->orWhere('phone', 'like', '%' . $request->keyword . '%')
            ->orWhere('address', 'like', '%' . $request->keyword . '%')
            ->orderBy('role', 'asc')->orderBy('status', 'desc')
            ->paginate($this->per_page);
        }
        
        return response()->json($admin);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'email'    => 'required|unique:users',
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
            $user->status   = $request->status;
            $user->avatar   = isset($location) ? $location : '';

            $user->save();
            $status = 'OK';

        } else {

            $status = $validator->errors();

        }

        return response()->json($status);
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'email'    => 'unique:users',
            'role'     => 'required',
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $image->move(public_path('admin/avatar'), $fileName);
            $location = '/public/admin/avatar/' . $fileName;

        } else {
            $location = $request->image;
        }

        if ($validator->passes()) {
            $user           = User::find($request->id);
            $user->name     = $request->name;
            $user->phone    = $request->phone;
            $user->address  = $request->address;
            $user->role     = $request->role;
            $user->status   = $request->status;

            if($request->password != '') {
                $user->password = Hash::make($request->password);
            }

            $user->avatar = $request->image == null ? '' : $location;
            $user->save();
            $status = 'OK';

        } else {

            $status = $validator->errors();

        }

        return response()->json($status);
    }

    public function deleteItem(Request $request) {
        if($request->isMethod('delete')) {
            if($request->id == Auth::user()->id) {
                return response()->json(['status'=>"IS_ME"]);
            }

            User::destroy($request->id);
            $user = User::paginate($this->per_page);
            return response()->json([
                'status'=>"OK",
                'user' => $user
            ]);
        }
    }

    public function deleteMulti(Request $request) {
        if($request->isMethod('delete')) {
            if(in_array(Auth::user()->id, $request->id)) {
                return response()->json(['status'=>"IS_ME"]);
            }
            
            User::destroy($request->id);
            $user = User::paginate($this->per_page);
            return response()->json([
                'status'=>"OK",
                'user' => $user
            ]);
        }
    }

    public function getDetail(Request $request) {
        $user = User::find($request->id);
        if($user)
            return response()->json($user);
        else
            return response()->json(['status' => 'NOT_FOUND']);
    }

    public function sendEmail(Request $request)
    {
        $input = $request->data;

        Mail::send('mailfb', array('name' => $input["name"],'email' => $input["email"], 'content' => $input['comment']), function($message){

            $message->to('aduka.asia@gmail.com', 'Visitor')->subject('Visitor Feedback!');

        });

        return response()->json(['status' => 'OK']);
    }
}
