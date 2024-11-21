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

    /**
     * Verify the given token and phone number against the Firebase Auth service.
     *
     * @param string $token The token to verify.
     * @param string $phoneNumber The phone number to verify.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request)
    {
        // $token = config('firebase.token');
        $token = $request->token;
        $phoneNumber = '+212704282927';
        // $phoneNumber = $request->phoneNumber;

        $isValid = $this->firebaseService->verifyToken($token, $phoneNumber);

        if ($isValid) {
            // If the token and phone number are valid, return a success response.
            return response()->json(['message' => 'Token and phone number are valid'], 200);
        } else {
            // If the token and phone number are invalid, return an error response.
            return response()->json(['error' => 'Invalid token or phone number'], 400);
        }
    }
}
