<?php

namespace App\Http\Controllers;
use App\Models\users;
use App\Models\notification_types;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\Mail\NotificationMail;
use App\Mail\SubscribeMail;

use Illuminate\Http\Request;


class UsersController extends Controller
{
    

    public function user(Request $request){

      return $request;

    }

    public function newUser(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|regex:/^[A-Za-z\s\']+$/',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^[A-Za-z0-9!@#$%^&*()_+]+$/',
            'age' => 'required|integer|min:18',
            'phone' => 'required|regex:/^[0-9]{10}$/',

        ]);
    if ($validator->fails()) {
        
    notify()->error( 'enter the corresponding values');
        return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }

        $newUser = new users();

        $newUser->name = $request->name;
        $newUser->password =  Hash::make($request->password);
        $newUser->email = $request->email;
        $newUser->age = $request->age;
        $newUser->token = $request->_token;
        $newUser->phone = $request->phone;
        $newUser->verification = 0;
        
        $newUser->save();

        $newUser->types()->attach([1]);


    Mail::to($request->email)->send(new NotificationMail($newUser));

    notify()->success( 'You have registered!');
    return redirect('/');

    }

    public function userLog(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email_access' => 'required|email',
            'password_access' => 'required|min:8|regex:/^[A-Za-z0-9!@#$%^&*()_+]+$/',

        ]);

    if ($validator->fails()) {
        
        notify()->error( 'enter the corresponding values');
        return redirect('/')
            ->withErrors($validator)
            ->withInput();
        }

        $email = $request->email_access;

        try {
            $user = users::where('email', $email)->firstOrFail();
            
            if (isset($user)) {
               if (Hash::check($request->password_access, $user->password)) {
                    $request->session()->put('user_id', $user->id);
                    $request->session()->put('name', $user->name);
                    notify()->success( 'Welcome Back!');
                    return redirect('/dashboard');

                }else{
                    
                    notify()->error( 'wrong username or password');
                    return redirect('/');
                }

            }else{

                notify()->error( 'This user does not exist');
                return redirect('/');
            }
            // $user contiene el usuario encontrado
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // No se encontró un usuario con la dirección de correo especificada
            
            notify()->error( 'This user does not exist');
            return redirect('/');
        }
        
    }

    
    public function close(Request $request){
        $request->session()->forget('user_id');
        $request->session()->forget('name');
        $request->session()->flush();
        

        
        notify()->success( 'You logged out!');
        return redirect('/');
    }


    public function dashboard(Request $request){

        $user = users::find($request->session()->get('user_id'));
        $subs = $user->notifications;
        $types = $user->types;
        $categories = notification_types::all();
        
        return view('user.dashboard',['data'=>$user,'types'=>$types,'categories'=>$categories, 'subs'=>$subs]);

    }

    public function subscribe($id,Request $request){
        $user = users::find($request->session()->get('user_id'));
        
        if (!$user->notifications()->where('notification_types_id', $id)->exists()) {
                $user->notifications()->attach([$id]);  
                
                Mail::to($user->email)->send(new SubscribeMail($user)); 
                
                notify()->success( 'You have subscribed!');
                return redirect('/dashboard');

            }
            else{
                notify()->error( 'You are already subscribed');
            }

    }

}
