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
                            {{ __('Fields Of Practices') }}
                        </h4>
                        <p>
                            <a href="{{ route('fields_of_practices.create') }}" class="text-sm text-gray-700 underline">Create Fields of Practice</a>
                        </p>
                        <h4>
                            {{ __('List of Fields Of Practices') }}
                        </h4>

                        @foreach ($fields_of_practices as $fields_of_practice)
                            <p><a href="/fields_of_practices/{{$fields_of_practice->id}}">{{ $fields_of_practice->name }}</a>
                                <form method="POST" action="/fields_of_practices/{{$fields_of_practice->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">X</button>
                                </form>
                                </p>
                        @endforeach
                </div>
            </div>
            {{ $fields_of_practices->links() }}
        </div>
    </div>
</div>
@endsection
