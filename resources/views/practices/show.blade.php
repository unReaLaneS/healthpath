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
                            <h4>{{ __('Practice') }}</h4>
                            <p>
                                <a href="/practices/{{$practice->id}}/edit" class="text-sm text-gray-700 underline">Edit Practice</a>
                            </p>
                        <div>
                            <p>Name: {{ $practice->name }}</p>
                            <p>Email: {{ $practice->email }}</p>
                            Logo:
                            <p><img src="/storage/{{ $practice->logo }}" width="200px" height="200px"></p>
                            <p>Website URL: {{ $practice->website_url }}</p>
                            <p>Employees:</p>
                            <ul>
                            @foreach($practice->employees as $employee)
                            <li>{{ $employee->first_name }} {{ $employee->last_name }}</li>
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
