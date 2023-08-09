@extends('user.master')

@section('content')
<div class="form-bg">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="form" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form__link"> <a href="{{ route('user.login') }}" class="text-black text-small">Back</a></div>
				
                        <div class="form__title">
                            <h1>{{ __('Reset Password') }}</h1>
                        </div>
                        <div class="form__field">
                        <label for="email" class="form__label">email</label>
                        <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                        </div>
                        <div class="form__links">
                            <div class="form__link">  
                                <button type="submit" class="form__btn">
                                    {{ __('Send Password Reset Link') }}
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
