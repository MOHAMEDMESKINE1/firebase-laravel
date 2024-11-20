<?php
namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseService
{   


    
    public function verifyToken($token,$credentials,$projectId) {
        
        $verifiedIdToken = null;

        $factory = (new Factory)
        ->withServiceAccount($credentials)
        ->withProjectId($projectId);

        $auth = $factory->createAuth();

        

        try {
            if (!$token) {

                return response()->json(['error' => 'Firebase token not found'], 400);
            }
            else{

                $verifiedIdToken = $auth->verifyIdToken($token);

            }           

        } catch (FailedToVerifyToken $e) {

            return response()->json(['error' => 'Failed to verify token: ' . $e->getMessage()], 400);


        }

        $uid = $verifiedIdToken->claims()->get('sub');

        try {
            $user = $auth->getUser($uid);
        } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to retrieve user: ' . $e->getMessage()], 400);
            
        }

        return $user;
    }
}