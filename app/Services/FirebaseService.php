<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class FirebaseService
{



    /**
     * Verify a Firebase token.
     *
     * @param string $token The Firebase token.
     * @param string $phoneNumber The phone number to verify the token against.
     * @return boolean True if the token is valid, false otherwise.
     */
    public function verifyToken(string $token, string $phoneNumber): bool
    {
        // Attempt to verify the ID token.
        try {
            $verifiedIdToken = $this->auth()->verifyIdToken($token);
        } catch (FailedToVerifyToken $e) {

            return false;
        }
        // Get the uid from the verified ID token.
        $uid = $verifiedIdToken->claims()->get('sub');

        // Attempt to retrieve the user from the uid.
        try {
            $user = $this->auth()->getUser($uid);
        } catch (\Exception $e) {
            return false;
        }

        // If the phone number associated with the user matches the provided phone number, return true.
        if ($user->phoneNumber === $phoneNumber) {
            return true;
        }

        // Otherwise, return false.
        return false;
    }

    /**
     * Get the Firebase Auth instance.
     *
     * @return \Kreait\Firebase\Auth
     */
    private function auth(): \Kreait\Firebase\Auth
    {
        $credentials = config('firebase.credentials');
        $projectId = config('firebase.project_id');

        $factory = (new Factory)
            ->withServiceAccount($credentials)
            ->withProjectId($projectId);


        return $factory->createAuth();
    }
}
