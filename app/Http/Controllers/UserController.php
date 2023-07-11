<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // public function index(){
    //     return view('user.signup', ['users' => User::all()]);
    // }
    // public function signup(Request $request){
    //     $this->validate($request, [
    //         'email' => 'email|required|unique:users',
    //         'password' => 'required|min:4'
    //     ]);
    //     $user = new User();
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();
    //     // return view('user.signup', ['users' => User::all()]);
    //     return redirect()->route('shop.index');
    // }


    /**
     * Display a listing of the resource.
     */
    public function signupForm() :View
    {
        $users = User::all();
        return view ('user.signup')->with('users', $users);
    }

    public function signinForm() :View
    {
        $users = User::all();
        return view ('user.signin')->with('users', $users);
    }

    public function profileView() :View
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view ('user.profile', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('user.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function signup(Request $request): RedirectResponse
    {
        $this->validate($request, [
                    'email' => 'email|required|unique:users',
                    'password' => 'required|min:4'
                ]);
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Auth::login($user);
        // if(Session::has('oldUrl')){
        //     $oldUrl = Session::get('oldUrl');
        //     Session::forget('oldUrl');
        //     return redirect()->to($oldUrl);
        // }

        return redirect('/user/profile');
    }

    public function signin(Request $request): RedirectResponse
    {
        $this->validate($request, [
                    'email' => 'email|required',
                    'password' => 'required|min:4'
                ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // if(Session::has('oldUrl')){
            //     $oldUrl = Session::get('oldUrl');
            //     Session::forget('oldUrl');
            //     return redirect()->to($oldUrl);
            // }
            return redirect('/user/profile');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::find($id);
        return view('user.profile')->with('users', $user);
    }



    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id): View
    // {
    //     $student = User::find($id);
    //     return view('student-views.contacts.edit')->with('students', $student);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $student = User::find($id);
    //     $input = $request->all();
    //     $student->update($input);
    //     return redirect('student')->with('flash_message', 'student Updated!');  
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     User::destroy($id);
    //     return redirect('student')->with('flash_message', 'Student deleted!');
    // }
}

