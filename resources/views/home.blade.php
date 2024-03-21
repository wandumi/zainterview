@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="bg-gray-200 px-4 py-2">{{ __('Dashboard') }}</div>

                    <div class="p-4">
                        @if (session('status'))
                            <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
