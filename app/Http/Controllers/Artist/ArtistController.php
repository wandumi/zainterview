<?php

namespace App\Http\Controllers\Artist;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = env('LASTFM_API_KEY');
        $this->client = new Client();
    }

    /**
     * Show the index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('artists.index');
    }

    /**
     * Search for artists.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $query
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, $query)
    {
        $response = $this->client->request('GET', 'http://ws.audioscrobbler.com/2.0/', [
            'query' => [
                'method' => 'artist.search',
                'api_key' => $this->apiKey,
                'artist' => $query,
                'format' => 'json'
            ]
        ]);

        $artistsData = json_decode($response->getBody(), true);

        return response()->json($artistsData['results']['artistmatches']['artist']);
    }

    /**
     * Show artist details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $artist
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $query)
    {
        $artist = urldecode($query);
        
        $response = $this->client->request('GET', 'http://ws.audioscrobbler.com/2.0/', [
            'query' => [
                'method' => 'artist.getinfo',
                'api_key' => $this->apiKey,
                'artist' => $artist,
                'format' => 'json'
            ]
        ]);

        $artistData = json_decode($response->getBody(), true);

        return view('artists.show', [
            'artists' => $artistData
        ]);
    }
}
