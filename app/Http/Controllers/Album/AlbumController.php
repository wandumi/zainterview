<?php

namespace App\Http\Controllers\Album;

use App\Models\Albums;
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

    public function show($artist, $album)
    {

        $albums = $this->search_album($artist, $album);
        $albumsData = $albums->getData(true);

        return view('albums.show', [
            'albums' => $albumsData['albums'],
        ]);
    }

    /**
     * Store the artist details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $albums = Albums::where('name', $request->name)->first();

        if(!$albums){
            $album = Albums::create([
                'name' => $request->name,
                'artist' => $request->artist,
                'image' => $request->image,
                'url' => $request->url,
                'user_id' => auth()->user()->id,
            ]);

            return response()->json([
                'message' => 'Album created successfully',
                'album' => $album], 201);

        }


        return response()->json([
            'message' => 'Already Saved',
            'album' => $albums], 422);

    }

    public function search_album($artist, $album)
    {
        $artistPara = urldecode($artist);
        $albumPara = urldecode($album);

        $response = $this->client->request('GET', 'http://ws.audioscrobbler.com/2.0/', [
            'query' => [
                'method' => 'album.getinfo',
                'api_key' => $this->apiKey,
                'artist' => $artistPara,
                'album' => $albumPara,
                'format' => 'json'
            ]
        ]);

        $albumsData = json_decode($response->getBody(), true);

        $album = $albumsData['album'];

        return response()->json([
            'albums' => $albumsData,
            'albumJson' => $album
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Albums::findOrFail($id);
        $album->delete();

        return redirect('/dashboard')->with('success', 'Favourite Album was removed successfully');
    }
}
