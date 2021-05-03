@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Fields of Practices') }}</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/fields_of_practices/{{$fields_of_practice->id}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $fields_of_practice->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tag" class="col-md-4 col-form-label text-md-right">{{ __('Tag Name') }}</label>

                                <div class="col-md-6">
                                    <input id="tag" type="text" class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{ old('tag') }}" required autocomplete="tag" autofocus>

                                    @error('tag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="practices" class="col-md-4 col-form-label text-md-right">{{ __('Practices') }}</label>

                                <div class="col-md-6">
                                    <select name="practice" id="practice">
                                        @foreach ($practices as $practice)
                                            <option value="{{$practice->id}}">{{$practice->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('practice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Fields of Practice') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
