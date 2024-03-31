<?php

namespace App\Http\Controllers\Artist;

use App\Models\User;
use App\Models\Artists;
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
        $artists = $this->search_artist($query);
        $artistArr = $artists->getData(true);

        return view('artists.show', [
            'artists' => $artistArr['artistsData']
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
        $artist = Artists::where('name', $request->name)->first();

        if(!$artist){
            $artist = Artists::create([
                'name' => $request->name,
                'image' => $request->image,
                'summary' => $request->summary,
                'user_id' => auth()->user()->id,
            ]);

            return response()->json([
                'message' => 'Album created successfully',
                'artist' => $artist], 201);

        }


        return response()->json([
            'message' => 'Already Saved',
            'artist' => $artist], 422);


    }

    function search_artist($query){

        $artist = urldecode($query);

        $response = $this->client->request('GET', 'http://ws.audioscrobbler.com/2.0/', [
            'query' => [
                'method' => 'artist.getinfo',
                'api_key' => $this->apiKey,
                'artist' => $artist,
                'format' => 'json'
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        $artists = $data['artist'];

        return response()->json([
            'artistsData' => $data,
            'artistJson' => $artists
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
        $artist = Artists::findOrFail($id);
        $artist->delete();

        return redirect('/dashboard')->with('success', 'Favourite Artist was removed successfully');
    }


}
