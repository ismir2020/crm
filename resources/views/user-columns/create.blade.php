@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Column') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user-columns.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="column_name" class="col-md-4 col-form-label text-md-right">{{ __('Column Name') }}</label>
                                <div class="col-md-6">
                                    <input id="column_name" type="text" class="form-control @error('column_name') is-invalid @enderror" name="column_name" value="{{ old('column_name') }}" required autocomplete="column_name" autofocus>
                                    @error('column_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="column_type" class="col-md-4 col-form-label text-md-right">{{ __('Column Type') }}</label>
                                <div class="col-md-6">
                                    <select id="column_type" class="form-control @error('column_type') is-invalid @enderror" name="column_type" required>
                                        <option value="text" selected>{{ __('Text') }}</option>
                                        <option value="number">{{ __('Number') }}</option>
                                        <option value="date">{{ __('Date') }}</option>
                                    </select>
                                    @error('column_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Column') }}
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