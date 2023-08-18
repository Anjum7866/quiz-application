 @extends('user.master')
@section('content')
<div class="flex">
  <div class="content-left">
    <div class="form__title">
					<h3>To Learn More</h3>
          <h4>Register on <br>TecnolynxGlobal</h4>
				</div>
  </div>
<div class="form-bg content-right">
<form method="POST" class="form" action="{{ route('register') }}">  
      @csrf
				<div class="form__title">
					<h1>register</h1>
				</div>
        <div class="form__field">
        <label for="name" class="form__label">name</label>
              <input type="name" name="name" class="form__input" placeholder="{{ __('Name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong style="color: white;">{{ $message }}</strong>
            </span>
        @enderror
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
          <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong style="color: white;">{{ $message }}</strong>
            </span>
        @enderror
				</div>
        <div class="form__field">
        <label for="password_confirmation" class="form__label"> Confirm password</label>
              <input type="password" name="password_confirmation" class="form__input" placeholder="{{ __('Confirm Password') }}">
             
          </div>
				<div class="form__links">
          <div class="form-group d-flex justify-content-center">
            <div class="form-check form-check-flat mt-0">
              <label class="form-check-label" style="color:white">
                <input type="checkbox" class="form-check-input" checked> I agree to the terms </label>
            </div>
          </div>
					<div class="form__link"> <a href="{{ route('user.login') }}" class="text-black text-small">Login</a></div>
				</div>
				<button type="submit" class="form__btn">Register</button>
			</form>
</div>

</div>


