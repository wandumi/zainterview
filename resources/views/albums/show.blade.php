@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($albums as $album)
                        <div class="col-xl-12 mb-5">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <div class="text-center border-end">

                                                <img src="{{ $album['image'][1]['#text'] }}"
                                                    class="img-fluid avatar-xxl rounded-circle" alt="">
                                                <h4 class="text-primary font-size-20 mt-3 mb-2"> {{ $album['name'] }}
                                                </h4>


                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3">
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

                                    @if ($album['tracks']['track'])
                                        @foreach ($album['tracks']['track'] as $track)
                                            <li class="col-md-12 mt-3">
                                                <a href="{{ $track['url'] ?? '' }}" class="text-decoration-none"
                                                    target="__blank">
                                                    <div class="card mb-0 p-3 ">
                                                        <div class="d-md-flex justify-content-between">

                                                            <p><span class="fw-bold">TrackName:</span>
                                                                {{ $track['name'] ?? '' }}
                                                            </p>
                                                            <p><span class="fw-bold">ArtistName:</span>
                                                                {{ $track['artist']['name'] ?? '' }}
                                                            </p>

                                                            <p><span class="fw-bold">Time:
                                                                </span>{{ timeFormat($track['duration'] ?? '') }}
                                                            </p>
                                                            <p><span class="fw-bold">Rank:
                                                                </span>{{ $track['@attr']['rank'] ?? '' }}</p>


                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <p>There is no tracklist</p>
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
