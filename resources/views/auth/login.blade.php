@extends('admin.layouts.base')

@section('title', 'ログイン')

@section('content')
<style>
    main {
        padding: 0;
    }
    .main-contents.active {
        width: 100%;
    }
</style>
<div class="login-wrapper">
    <div id="particles"></div>
    <div>
        <div class="login-title">
        </div>
        <section class="login-box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h2>管理画面</h2>
                <div class="login-id">
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <div class="login-error">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
                @enderror
                <div class="login-pw">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">
                </div>
                @error('password')
                <div class="login-error">
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                </div>
                @enderror
                <div class="main-ck_ar">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label for="remember" class="ck-box mg-b_20 mg-t_20">{{ __('ログイン状態を保持する') }}</label>
                </div>
                <button type="submit" class="login-btn-submit">
                    {{ __('Login') }}
                </button>
            </form>
        </section>
    </div>
</div>
@endsection
