<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatController extends Controller
{
    public function chat(Request $request)
{
    $client = new Client(); //GuzzleHttp\Client
    $url = 'https://api.openai.com/v1/chat/completions';

    $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
    ];

    $messageContent = $request->input('message');

    $body = [
        'messages' => [
            ['role' => 'system', 'content' => 'You are a helpful assistant.'],
            ['role' => 'user', 'content' => $messageContent],
        ],
    ];

    try {
        $response = $client->request('POST', $url, [
            'headers' => $headers,
            'body' => json_encode($body),
        ]);

        $response = json_decode($response->getBody(), true);
        $message = $response['choices'][0]['text'];

        return response()->json(['message' => $message]);

    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
        // Handle the error
        return response()->json(['message' => $e->getMessage()], 500);
    }
}

}
