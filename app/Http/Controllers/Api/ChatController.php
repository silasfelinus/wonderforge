<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        // Get personality from request. If not provided, fallback to a default
        $personality = $request->input('personality', 'You are chatting with AMI, the Anti-Malaria Intelligence.');

        $messages = [
            ["role" => "system", "content" => $personality],
            ["role" => "user", "content" => $request->input('message')]
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
            'max_tokens' => 400,
            'temperature' => 0.5
        ]);

        Log::info('OpenAI API Response', ['response' => $response->json()]);

        if ($response->successful()) {
            $message = $response->json()['choices'][0]['message']['content'];
            return response()->json(['message' => $message]);
        } else {
            return response()->json(['message' => 'An error occurred during your request.'], 500);
        }
    }
}
