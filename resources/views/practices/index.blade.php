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
                            {{ __('Practices') }}
                        </h4>
                        <p>
                        <a href="{{ route('practices.create') }}" class="text-sm text-gray-700 underline">Create Practice</a>
                        </p>
                        <h4>
                            {{ __('List of Practices:') }}
                        </h4>

                    @foreach ($practices as $practice)
                            <p><a href="/practices/{{$practice->id}}">{{ $practice->name }}</a>
                            <form method="POST" action="/practices/{{$practice->id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">X</button>
                            </form>
                                </p>
                    @endforeach
                </div>
            </div>
            {{ $practices->links() }}
        </div>
    </div>
</div>
@endsection
