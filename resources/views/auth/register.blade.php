<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('messages.Register') }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container border rounded p-5" style="max-width: 500px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-3" width="80%">
            <h2>{{ trans('messages.Register') }}</h2>
        </div>

        <!-- Display success message -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Display error messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('messages.Name') }}:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('messages.Email') }}:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('messages.Password') }}:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">{{ trans('messages.Confirm Password') }}:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-primary">{{ trans('messages.Register') }}</button>
            </div>
        </form>
        <div class="text-center">
            <a href="{{ route('login') }}">{{ trans('messages.Login') }}</a>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
