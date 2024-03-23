@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <form id="searchForm" action="{{ url('/search') }}" method="get">
                        <div class="input-group">

                            <input type="text" class="form-control" id="searchInput" name="search"
                                placeholder="Search...">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
