@extends('user.master')
@section('content')
<div style="display:flex;">
  <div style="margin:auto">
    <div class="form__title">
					<h3>To Learn More</h3>
          <h4>Login on TecnolynxGlobal</h4>
				</div>
  </div>
<div class="form-bg">
<form method="POST" class="form" action="{{ route('login') }}">  
      @csrf
				<div class="form__title">
					<h1>login</h1>
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
				<div class="form__field">
					<label for="password" class="form__label">password</label>
          <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
				</div>
				<div class="form__links">
					<div class="form__link"> @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif  </div>
					<div class="form__link"> <a href="{{ url('/register') }}" class="text-black text-small">Signup</a></div>
				</div>
				<button type="submit" class="form__btn">login</button>
			</form>
</div>

</div>
<!-- <div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('assets/images/auth/login_1.jpg') }}); background-size: cover;">
  <div class="row w-100">
    <div class="col-lg-4 mx-auto">
      <div class="auto-form-wrapper">
      <form method="POST" action="{{ route('login') }}">  
      @csrf
        
        <div class="form-group">
            <label for="email"  class="label">{{ __('Email Address') }}</label>

            <div class="input-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                    autofocus>
                    <div class="input-group-append">
                        <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                    </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        
<div class="form-group">
    <label for="password" class="label">{{ __('Password') }}</label>

    <div class="input-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-check-circle-outline"></i>
                </span>
              </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group d-flex justify-content-between">
            <div class="form-check form-check-flat mt-0">
            <input type="checkbox" class="form-check-input" > 
              <label class="form-check-label">
               {{ __('Remember Me') }} </label>
            </div>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif  </div>
<div class="form-group">
<button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

       
    </div>
</form>
      <div class="form-group">
            <button class="btn btn-block g-login">
              <img class="mr-3" src="{{ url('assets/images/file-icons/icon-google.svg') }}" alt="">Log in with Google</button>
          </div>
          <div class="text-block text-center my-3">
            <span class="text-small font-weight-semibold">Not a member ?</span>
            <a href="{{ url('/register') }}" class="text-black text-small">Create new account</a>
          </div>
        </form>
      </div>
      <ul class="auth-footer">
        <li>
          <a href="#">Conditions</a>
        </li>
        <li>
          <a href="#">Help</a>
        </li>
        <li>
          <a href="#">Terms</a>
        </li>
      </ul>
      <p class="footer-text text-center">copyright © 2023 TecnolynxGlobal. All rights reserved.</p>
    </div>
  </div>
</div> -->

@endsection