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
                        <h4>
                            {{ __('Employees') }}
                        </h4>
                        <p>
                            <a href="{{ route('employees.create') }}" class="text-sm text-gray-700 underline">Create Employee</a>
                        </p>
                        <h4>
                            {{ __('List of Employees') }}
                        </h4>

                        @foreach ($employees as $employee)
                            <p><a href="/employees/{{$employee->id}}">{{ $employee->first_name }} {{$employee->last_name}}</a>
                                <form method="POST" action="/employees/{{$employee->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">X</button>
                                </form>
                                </p>
                        @endforeach
                </div>
            </div>
            {{ $employees->links() }}
        </div>
    </div>
</div>
@endsection
