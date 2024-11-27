<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAiController extends Controller
{
    public function index()
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [['role' => 'user', 'content' => 'Hello!']],
        ]);

        echo $result->choices[0]->message->content; // Hello! How can I assist 
        
    }
}
