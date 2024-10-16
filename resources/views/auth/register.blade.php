@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card enter">
                <div class="card-header">{{ __('Регистрация') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Имя') }}</label>

                            <div class="col">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email адрес') }}</label>

                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                            <div class="col">
                                <input id="password" type="password" class="mb-3 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="remember callout d-flex justify-content-end mt-2">
                                    <input type="checkbox" id="show" class="accent-green-600" onclick="document.getElementById('password').type == 'password' ? document.getElementById('password').type = 'text' : document.getElementById('password').type ='password';">
                                    <label for="show" id="check">показать пароль</label>
                                </div>

                            </div>

                            
                        </div>

                        <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end mt-2">{{ __('Подтвердить пароль') }}</label>

                            <div class="col mt-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="remember  callout d-flex justify-content-end">
                                    <input type="checkbox" id="confirm" class="accent-green-600" onclick="document.getElementById('password-confirm').type == 'password' ? document.getElementById('password-confirm').type = 'text' : document.getElementById('password-confirm').type ='password';">
                                    <label for="confirm" id="check">показать пароль</label>
                                </div>
                            </div>
                        
                            
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <button type="submit" class="btn w-100" style = "background: #63c34e">
                                    {{ __('Зарегистрироваться') }}
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
