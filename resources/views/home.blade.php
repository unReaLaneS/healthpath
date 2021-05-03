@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Models') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <a href="{{ url('/employees') }}" class="text-sm text-gray-700 underline">Employees</a>
                        </div>
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <a href="{{ url('/practices') }}" class="text-sm text-gray-700 underline">Practices</a>
                        </div>
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            <a href="{{ url('/fields_of_practices') }}" class="text-sm text-gray-700 underline">Fields of practices</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
