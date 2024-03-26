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

                                                <div class="row my-4">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <p class="text-muted mb-2 fw-medium"><span class="fw-bold">Total
                                                                    Listeners</span> :
                                                                {{ $album['listeners'] }}
                                                            </p>
                                                            <p class="text-muted fw-medium mb-0"><span class="fw-bold">Play
                                                                    Count</span> :
                                                                {{ $album['playcount'] }}
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
