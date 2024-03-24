<?php

namespace App\Http\Controllers\Artist;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function index()
    {
        return view('artists.index');
    }

    public function search(Request $request, $query)
    {
        
        $apiKey = env('LASTFM_API_KEY');
        
        $client = new Client();
        
        $artists = $client->request('GET', 'http://ws.audioscrobbler.com/2.0/?method=artist.search&api_key=' . $apiKey . '&artist=' . $query . '&format=json');

        $artistsData = json_decode($artists->getBody(), true);

        return response()->json($artistsData['results']['artistmatches']['artist']);

    }
}
