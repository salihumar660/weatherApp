<?php

namespace App\Http\Controllers\weather;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class weatherAppController extends Controller
{
    public function index()
    {
        return view('weather.searchWeather');
    }
    public function searchWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255'
        ]);
        $city = $request->input('city');
        $apiKey = env('WEATHER_API_KEY');
        $apiUrl = env('WEATHER_API_URL');

        try {
            $client = new Client();
            $response = $client->get($apiUrl, [
                'query' => [
                    'q' => $city,
                    'appid' => $apiKey,
                    'units'=> 'metric',
                ],
            ]);
            $weatherData = json_decode($response->getBody(), true);
            return view('weather.resultWeather', compact('weatherData', 'city'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }
}
