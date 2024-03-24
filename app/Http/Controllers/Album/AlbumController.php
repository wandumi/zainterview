<?php

namespace App\Http\Controllers\Album;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        return view('albums.index');
    }

    public function search(Request $request, $query)
    {
        
        $apiKey = env('LASTFM_API_KEY');

        $client = new Client();

        $albums = $client->request('GET', 'http://ws.audioscrobbler.com/2.0/?method=album.search&api_key=' . $apiKey . '&album=' . $query . '&format=json');

        $albumsData = json_decode($albums->getBody(), true);

        return response()->json($albumsData['results']['albummatches']['album']);
    
      

        
    }
}
