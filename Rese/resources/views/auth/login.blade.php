@extends('layouts.check')

@section('header')
<div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
    <!--メニュー-->
    <div class="menu-content">
        <ul>
            <li>
            <form action="/" method="GET">
                <button>Home</button>
            </form>
            </li>
            <li>
            <form action="/register" method="GET">
                <button>Registration</button>
            </form>
            </li>  
            <li>
            <form action="/login" method="GET">
                <button>Login</button>
            </form>
            </li>
        </ul>
    </div>
    <!--ここまで-->
</div>
<div class="logo">
    <a href="/">Rese</a>
</div>
@endsection
<style>
    .card-header {
        background-color: #0055e8;
        border-radius: 5px 5px 0 0 ;
        color: #fff;
        padding: 10px 15px;
    }
    .card-body {
        padding: 20px 20px 5px 20px;
    }
    .email {
        display: flex;
        align-items: center;
    }
    .password {
        display: flex;
        align-items: center;
    }
    .btn__wrapper {
        text-align: right;
        margin-top: 20px;
        padding-right: 30px;
    }
    .picture {
        font-size: 32px;
        padding-right: 5px;
    }
    .picter_email {
        padding-left: 5px;
        padding-right: 10px;
    }
    input {
        width: 300px;
        border: none;
        outline: none;
        border-bottom: 1px solid #000;
    }
    .btn {
        padding: 5px 10px;
        background-color: #0055e8;
        color: #fff;
        border: none;
        border-radius: 5px;
    }
</style>
@section('content')
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="email">
                            <div>
                                <label for="email" class="picture picter_email">
                                    ✉
                                </label>
                            </div>
                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="password">
                            <div>
                                <label for="password" class="picture">
                                    🔐
                                </label>
                            </div>
                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                placeholder="パスワード">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="btn__wrapper">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
