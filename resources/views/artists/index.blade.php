@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <search-artists :user-auth="{{ auth()->user()->id ?? 0 }}"></search-artists>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        if (performance.navigation.type === 2) {
            window.onload = function() {
                location.reload();
            };
        }
    </script>
@endsection
