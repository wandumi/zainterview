@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($artists as $artist)
                        <div class="col-md-12 mb-5">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-3">
                                            <div class="text-center border-end">

                                                <img src="{{ $artist['image'][1]['#text'] }}"
                                                    class="img-fluid avatar-xxl rounded-circle" alt="">
                                                <h4 class="text-primary font-size-20 mt-3 mb-2"> {{ $artist['name'] }}
                                                </h4>

                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="ms-3">
                                                <div>
                                                    <h4 class="card-title mb-2">Biography</h4>
                                                    <p>{{ $artist['bio']['summary'] }}</p>

                                                </div>
                                                <div class="row my-4">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <p class="text-muted mb-2 fw-medium"><span class="fw-bold">Total
                                                                    Listeners</span> :
                                                                {{ $artist['stats']['listeners'] }}
                                                            </p>
                                                            <p class="text-muted fw-medium mb-0"><span class="fw-bold">Play
                                                                    Count</span> :
                                                                {{ $artist['stats']['playcount'] }}
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
                        <div class="col-xl-12">
                            <h3>Related Artists</h3>
                            <ul class="row list-unstyled mb-0">

                                @foreach ($artist['similar']['artist'] as $similar)
                                    <li class="col-md-2 mt-3">
                                        <div class="card mb-0">
                                            <img class="image-responsive" src="{{ $similar['image'][2]['#text'] }}"
                                                alt="{{ $similar['name'] }}">
                                            <div class="card-body">
                                                <a href="{{ $similar['url'] }}"
                                                    class="card-title title-link text-center fw-bold text-decoration-none">
                                                    {{ $similar['name'] }}
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-xl-12">
                            <h3 class="mt-4">Tags</h3>
                            <ul class="list-inline mr-3">
                                @foreach ($artist['tags']['tag'] as $tag)
                                    <li class="list-inline-item mt-2"><a class="btn btn-outline-secondary"
                                            href="{{ $tag['url'] }}" target="__blank">
                                            {{ $tag['name'] }}
                                        </a></li>
                                @endforeach

                            </ul>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
