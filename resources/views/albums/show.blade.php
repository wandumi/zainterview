@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($albums as $album)
                        <div class="col-md-12 mb-5">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <div class="text-center border-end">

                                                <img src="{{ $album['image'][1]['#text'] }}" class="img-fluid avatar-xxl"
                                                    alt="">
                                                <h4 class="text-primary font-size-20 mt-3 mb-2"> {{ $album['name'] }}
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3 mx-auto">
                                                <div>
                                                    <h4 class="card-title mb-2">Biography</h4>
                                                </div>
                                                <div class="row my-4">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <p class="text-muted mb-2 fw-medium"><span class="fw-bold">
                                                                    Artist</span> :
                                                                {{ $album['artist'] }}
                                                            </p>
                                                            <p class="text-muted mb-2 fw-medium"><span class="fw-bold">Total
                                                                    Listeners</span> :
                                                                {{ $album['listeners'] }}
                                                            </p>
                                                            <p class="text-muted fw-medium mb-0"><span class="fw-bold">Play
                                                                    Count</span> :
                                                                {{ $album['playcount'] }}
                                                            </p>
                                                            <p class="text-muted fw-medium mt-1"><span class="fw-bold">
                                                                    <a href="{{ $album['url'] }}" target="__blank">Read
                                                                        More...</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <h3>Tracklist</h3>
                                <ul class="row list-unstyled mb-0">

                                    @if (isset($album['tracks']['track']) && $album['tracks']['track'])
                                        @foreach ($album['tracks']['track'] as $track)
                                            <li class="col-md-12 mt-3">
                                                <a href="{{ $track['url'] ?? '' }}" class="text-decoration-none"
                                                    target="__blank">
                                                    <div class="card mb-0 p-3 ">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th class="fw-bold" style="width: 40%;">TrackName
                                                                    </th>
                                                                    <th class="fw-bold" style="width: 40%;">ArtistName
                                                                    </th>
                                                                    <th class="fw-bold" style="width: 10%;">Time</th>
                                                                    <th class="fw-bold" style="width: 10%;">Rank</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ $track['name'] ?? '' }}</td>
                                                                    <td>{{ $track['artist']['name'] ?? '' }}</td>
                                                                    <td>{{ timeFormat($track['duration'] ?? '') }}</td>
                                                                    <td>{{ $track['@attr']['rank'] ?? '' }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <h5 class="text-center fw-bold">There is no tracklist</h5>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        window.onload = function() {
            // Override the back button function
            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                history.go(1);
            };
        };
    </script>
@endsection
