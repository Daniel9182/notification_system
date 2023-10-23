<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use App\Models\notification_types;
use App\Models\users;
use App\Models\images;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class NotificationsController extends Controller
{
    

    public function view($id,Request $request){

        $post = notifications::find($id);
        $type = $post->types;
        $image = $post->images;
        $type_post = $type[0]->id;
        $content = notification_types::find($type_post); 
        $users = $content->users;
        
        
        $user = users::find($request->session()->get('user_id'));
        $types_user = $user->types;


        return view('user.viewpost',['data'=>$post,'image'=>$image,'types'=>$type,'users'=>$users,'types_user'=>$types_user]);

    }

    public function newpost(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:10|max:2000',
            'image' => 'required|file|mimes:jpeg,png,gif,pdf|max:2048',
        ]);
        switch ($request->tipopost) {
            case '1':
                $url_redirect = '/post/1';
                break;
            case '2':
                $url_redirect = '/post/2';
                break;
            case '3':
                $url_redirect = '/post/3';
                break;
            default: 
                $url_redirect = '/';
                break;
        }

    if ($validator->fails()) {
        return redirect($url)
            ->withErrors($validator)
            ->withInput();
        }


        $post = new notifications();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = 1;
        $post->add_by = $request->session()->get('user_id');
        $post->save();

        $imagenes = $request->file('image')->store('public/post/imagen');
        $url = Storage::url($imagenes);
        $imagen = images::create([
            'url'=>$url
        ]);
        $imagen->save();

        $imagen->notifications()->attach([$post->id]);
        $post->types()->attach([$request->tipopost]);

        
        notify()->success('Saved data!');
     
        return redirect($url_redirect);
    }

    public function post($id,Request $request){
       
        $user = users::find($request->session()->get('user_id'));
        $user_types = $user->types;
        $type_notification = notification_types::find($id);

        $content = notification_types::find($id); 
     
        $notifications = $content->notifications;

        if (isset($notifications)) {
           $list = $notifications;
        } else {
           $list = null;
        }

        return view('user.list',['content'=>$list,'data'=>$user,'type'=>$user_types, 'notification'=>$type_notification,'data'=>$notifications]);

    }

    public function sendPost($id,Request $request){

        $user = users::find($request->session()->get('user_id'));
        $type = $user->types;
        
        if(in_array(2,array_column(json_decode($type,true),'id'))){
            //is admin
            $post = notifications::find($id);
            $type_post = $post->types;
            $type_notification = notification_types::find($type_post[0]->id);
            $addressee = $type_notification->users;

            foreach ($addressee as $key => $user) {
                Mail::to($user->email)->send(new PostMail($post,$type_post[0]));
                
                $sid = env('TWILIO_SID');
                $token = env('TWILIO_AUTH_TOKEN');
                $twilio = new Client($sid, $token);
                
                $twilio->messages
                        ->create(
                            '+52'.$user->phone, 
                            [
                                'from' => env('TWILIO_PHONE_NUMBER'),
                                'body' =>  'You have new posts "'. $post->title .'" to enjoy "Notifications systems" programmed by Daniel Mendez Camacho',
                            ]);

            } 
            
            notify()->success('Notifications sent!');
            return redirect('/post/'.$type_post[0]->id);
        }
        

    }


}
