@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My Columns') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Column Name') }}</th>
                                    <th scope="col">{{ __('Column Type') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userColumns as $userColumn)
                                    <tr>
                                        <th scope="row">{{ $userColumn->id }}</th>
                                        <td>{{ $userColumn->column_name }}</td>
                                        <td>{{ $userColumn->column_type }}</td>
                                        <td>
                                            <a href="{{ route('user-columns.edit', $userColumn->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>

                                            <form action="{{ route('user-columns.destroy', $userColumn->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('user-columns.create') }}" class="btn btn-success">{{ __('Add Column') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection