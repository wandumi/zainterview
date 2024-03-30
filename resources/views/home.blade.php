@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <div class="bg-gray-200 py-2">{{ __('Dashboard') }}</div>

                    <div class="p-4">

                        @if (session('status'))
                            <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                    <div class="col-xl-12">
                        <h3 class="mb-3">Favourite Artists</h3>
                        <ul class="row list-unstyled mb-0">
                            @if (!$artists->isEmpty())
                                @foreach ($artists as $artist)
                                    <li class="col-md-3 mt-3">
                                        <div class="card mb-0">
                                            <img class="image-responsive" src="{{ $artist->image }}" alt="">
                                            <div class="card-body">
                                                <a href="{{ $artist['url'] }}" target="__blank"
                                                    class="card-title title-link text-center fw-bold text-decoration-none">
                                                    {{ $artist->name }}
                                                </a>

                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <p class="text-center text-danger">There are no favourite artists</p>
                            @endif

                        </ul>
                    </div>
                    <div class="col-xl-12 mt-5">
                        <h3 class="mb-3">Favourite Albums</h3>
                        <ul class="row list-unstyled mb-0">
                            @if (!$albums->isEmpty())
                                @foreach ($albums as $album)
                                    <li class="col-md-3 mt-3">
                                        <div class="card mb-0">
                                            <img class="image-responsive" src="{{ $album->image }}" alt="">
                                            <div class="card-body">
                                                <a href="{{ $album['url'] }}" target="__blank"
                                                    class="card-title title-link text-center fw-bold text-decoration-none">
                                                    {{ $album->name }}
                                                </a>

                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <p class="text-center text-danger">There are no favourite albums</p>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
