<?php

namespace App\Http\Controllers\LastFm;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $apiKey = env('LASTFM_API_KEY');

        $client = new Client();

        $responseAlbum = $client->request('GET', 'http://ws.audioscrobbler.com/2.0/?method=album.search&api_key=' . $apiKey . '&album=' . $query . '&format=json');
        $responseArtist = $client->request('GET', 'http://ws.audioscrobbler.com/2.0/?method=artist.search&api_key=' . $apiKey . '&artist=' . $query . '&format=json');

        $dataAlbums = json_decode($responseAlbum->getBody(), true);
        $dataArtists = json_decode($responseArtist->getBody(), true);

        // dd($dataAlbums);
        dd($dataArtists);

        // return view('search.results', [
        //     'artists' => $dataArtists,
        //     'albums' => $dataAlbums,
        // ]);
    }
}
