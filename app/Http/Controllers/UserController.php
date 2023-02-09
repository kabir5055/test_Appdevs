<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\NormalUser;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index.index',[
            'todos'=> ToDo::all(),
        ]);
    }
    public function UserResister()
    {
        return view('admin.resister.userresister');
    }
    public function SaveUserResister(Request $request)
    {
        NormalUser::SaveUserResister($request);
        return back();
    }
    public function manageUser()
    {
        return view('admin.user.user-manage',[
            'users' => NormalUser::all(),
        ]);
    }

    public function AdminUserResister()
    {
        return view('admin.resister.adminresister');
    }
    public function AdminSaveUserResister(Request $request)
    {
        NormalUser::AdminSaveUserResister($request);
        return back();
    }
    public function loginUser()
    {
        return view('admin.login.userlogin');
    }
    public function checkLogin(Request $request)
    {
        $userInfo = NormalUser::where('email',$request->user_name)
            ->orWhere('phone',$request->phone)
            ->first();
        $adminuserInfo = AdminUser::where('email',$request->user_name)
            ->orWhere('phone',$request->phone)
            ->first();
        if ($userInfo)
        {
            $existingPass = $userInfo->password;
            if (password_verify($request->password,$existingPass))
            {
                Session::put('userId',$userInfo->id);
                Session::put('userStatus',$userInfo->status);
                Session::put('userName',$userInfo->name);
                return redirect('/home');
            }
            else
            {
                return back()->with('massage','Please Use Valid password');
            }
        }
        elseif ($adminuserInfo)
        {
            $existingPass = $adminuserInfo->password;
            if (password_verify($request->password,$existingPass))
            {
                Session::put('userId',$adminuserInfo->id);
                Session::put('userStatus',$adminuserInfo->status);
                Session::put('userName',$adminuserInfo->name);
                return redirect('/home');
            }
            else
            {
                return back()->with('massage','Please Use Valid password');
            }
        }
        else
        {
            return back()->with('massage','Please Use Valid UserName or Phone');
        }
    }

    public function adminloginUser()
    {
        return view('admin.login.userlogin');
    }
    public function logout(Request $request)
    {
        Session::forget('userId');
        Session::forget('userName');
        Session::forget('userStatus');
        return redirect('/');
    }

}
