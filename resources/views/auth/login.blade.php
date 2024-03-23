@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline"
                                        href="/auth/google/redirect"><img
                                            src="https://img.icons8.com/color/16/000000/google-logo.png">
                                        Signup Using Google</a>

                                </div>
                            </div>
                            <br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
