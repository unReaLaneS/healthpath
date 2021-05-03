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
                        <h4>{{ __('Employee') }}</h4>
                        <p>
                            <a href="/employees/{{$employee->id}}/edit" class="text-sm text-gray-700 underline">Edit Employee</a>
                        </p>
                        <div>
                            <p>First Name: {{ $employee->first_name }}</p>
                            <p>Last Name: {{ $employee->last_name }}</p>
                            <p>Practice: {{ $employee->practice->name ?? '' }} </p>
                            <p>Email: {{ $employee->email }}</p>
                            <p>Phone: {{ $employee->phone }}</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
