@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>{{ __('Fields Of Practice') }}</h4>
                        <p>
                            <a href="/fields_of_practices/{{$fields_of_practice->id}}/edit" class="text-sm text-gray-700 underline">Edit Fields Of Practice</a>
                        </p>
                        <div>
                            <h5>Practice Name: </h5>
                            <ul>
                            @foreach($fields_of_practice->practices as $practice)
                                <li>{{ $practice->name ?? '' }}</li>
                            @endforeach
                            </ul>
                            <h5>Tag: </h5>
                            <ul>
                            @foreach($fields_of_practice->tags as $tag)
                                <li>{{ $tag->name ?? '' }}</li>
                            @endforeach
                                </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
