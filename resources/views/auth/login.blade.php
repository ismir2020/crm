<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ trans('messages.Login') }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="container border rounded p-5" style="max-width: 500px;">
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-3" width="80%">
            <h2>{{ trans('messages.Login') }}</h2>
        </div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">{{ trans('messages.Email') }}:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">{{ trans('messages.Password') }}:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-primary">{{ trans('messages.Login') }}</button>
            </div>
        </form>
        <div class="text-center">
            <a href="{{ route('register') }}">{{ trans('messages.Register') }}</a> | <a href="{{ route('password.request') }}">{{ trans('messages.Forgot Password?') }}</a>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
