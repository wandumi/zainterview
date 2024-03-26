<?php

namespace App\Http\Controllers\Album;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = env('LASTFM_API_KEY');
        $this->client = new Client();
    }

    public function index()
    {
        return view('albums.index');
    }

    public function search(Request $request, $query)
    {
        $response = $this->client->request('GET', 'http://ws.audioscrobbler.com/2.0/', [
            'query' => [
                'method' => 'album.search',
                'api_key' => $this->apiKey,
                'album' => $query,
                'format' => 'json'
            ]
        ]);

        $albumsData = json_decode($response->getBody(), true);

        return response()->json($albumsData['results']['albummatches']['album']);
    }

    public function show(Request $request, $query)
    {
        $album = urldecode($query);

        $response = $this->client->request('GET', 'http://ws.audioscrobbler.com/2.0/', [
            'query' => [
                'method' => 'album.getinfo',
                'api_key' => $this->apiKey,
                'artist' => $album,
                'album' => $album,
                'format' => 'json'
            ]
        ]);

        $albumsData = json_decode($response->getBody(), true);


        return view('albums.show', [
            'albums' => $albumsData
        ]);
    }
}
