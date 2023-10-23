@extends('layouts.app')

@section('content')
<div class="container">

  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}  
    </div>
  @endif
 
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('messages.Profile') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <div class="form-group">
              <label for="email">{{ __('messages.Email') }}</label>
              <input type="text" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <div class="form-group">
              <label for="company">{{ __('messages.Company') }}</label>  
              <input type="text" class="form-control" name="company" value="{{ $user->company }}">
            </div>

            <div class="form-group">
              <label for="address">{{ __('messages.Address') }}</label>
              <input type="text" class="form-control" name="address" value="{{ $user->address }}">
            </div>

            <div class="form-group">
              <label for="postal_code">{{ __('messages.Postal Code') }}</label>
              <input type="text" class="form-control" name="postal_code" value="{{ $user->postal_code }}">
            </div>

            <div class="form-group">
              <label for="city">{{ __('messages.City') }}</label>
              <input type="text" class="form-control" name="city" value="{{ $user->city }}">
            </div>

            <div class="form-group">
              <label for="website">{{ __('messages.Website') }}</label>
              <input type="text" class="form-control" name="website" value="{{ $user->website }}">
            </div>

            <div class="form">
              <label for="phone">{{ __('messages.Phone') }}</label>
              <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
              <label for="tax_number">{{ __('messages.Tax Number') }}</label>
              <input type="text" class="form-control" name="tax_number" value="{{ $user->tax_number }}">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('messages.Save') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
