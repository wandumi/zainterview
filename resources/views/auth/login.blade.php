@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md lg:w-full space-y-4 xs:w-70 sm:w-80 md:w-90">
            <div>
                <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-900">Login</h2>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <a href="/auth/google/redirect" type="button"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        Sign in with Google</a>
                </div>

            </form>


            </button>
        </div>
    </div>
@endsection
