<?php

return [
    'token' => env('FIREBASE_TOKEN'),
    'credentials' => storage_path(env('FIREBASE_CREDENTIALS')),
    'project_id' => env('FIREBASE_PROJECT_ID', 'app'),
];