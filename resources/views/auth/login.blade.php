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
                                <div class="text-center">
                                    <a href="/auth/google/redirect" class="btn btn-danger btn-block">
                                        <i class="fa fa-google"></i> <img
                                            src="https://img.icons8.com/color/16/000000/google-logo.png" class="">
                                        Sign in with
                                        <b>Google</b></a>

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
