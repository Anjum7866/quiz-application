@extends('user.master')
@section('content')
<div class="flex">
  <div class="content-left">
    <div class="form__title">
					<h3>To Learn More</h3>
          <h4>Login on TecnolynxGlobal</h4>
				</div>
  </div>
<div class="form-bg content-right">
<form method="POST" class="form" action="{{ route('login') }}">  
      @csrf
				<div class="form__title">
					<h1>login</h1>
				</div>
				<div class="form__field">
					<label for="email" class="form__label">email</label>
					<input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autocomplete="email"
                    autofocus>
             @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: white;">{{ $message }}</strong>
                    </span>
                @enderror
				</div>
				<div class="form__field">
					<label for="password" class="form__label">password</label>
          <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong style="color: white;">{{ $message }}</strong>
            </span>
        @enderror
				</div>
				<div class="form__links">
					<div class="form__link"> @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif  </div>
					<div class="form__link"> <a href="{{ route('register') }}" class="text-black text-small">Signup</a></div>
				</div>
				<button type="submit" class="form__btn">login</button>
			</form>
</div>

</div>

@endsection