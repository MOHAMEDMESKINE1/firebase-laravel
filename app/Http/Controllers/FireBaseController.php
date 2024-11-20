<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Http\Request;
// use Kreait\Firebase\Auth;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;
use Kreait\Firebase\Contract\Auth;
 class FireBaseController extends Controller
{
    protected $firebaseService;
    public function __construct(FirebaseService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }
    
    public function index()
    {
        
        // sending a message
        // $message = CloudMessage::new()
        // ->withNotification(Notification::create('Title', 'Body'))
        // ->withData(['message' => 'hello this is a notif from firebase'])
        // ->toTopic('Notification firebase');
        // // ->toTopic('...')
        // // ->toCondition('...')    
        // dd($message);


        $title = 'My Notification Title';
        $body = 'My Notification Body';
        $imageUrl = 'https://picsum.photos/400/200';

        $notification = Notification::fromArray([
            'title' => $title,
            'body' => $body,
            'image' => $imageUrl,
        ]);

        $notification = Notification::create($title, $body);


       dd($notification);
    }


    public function verify()  {
       
        $token = config('firebase.token');
        $credentials =config('firebase.credentials');
        $projectId =config('firebase.project_id');

        $data = $this->firebaseService->verifyToken($token,$credentials,$projectId);
     
        dd($data);
            
    }
}
