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
    .btn__wrapper {
        text-align: right;
        margin-top: 20px;
        padding-right: 30px;
    }
    .btn {
        padding: 5px 10px;
        background-color: #0055e8;
        color: #fff;
        border: none;
        border-radius: 5px;
    }
    .name {
        display: flex;
        align-items: center;
    }
    .email {
        display: flex;
        align-items: center;
    }
    .password {
        display: flex;
        align-items: center;
    }
    .password-confirm {
        display: flex;
        align-items: center;
    }
    label {
        font-size: 32px;
        margin-right: 5px;
    }
    input {
        width: 300px;
        border: none;
        outline: none;
        border-bottom: 1px solid #000;
    }
    .email label {
        margin-left: 5px;
        margin-right: 12px;
    }
    .password-confirm label {
        margin-left: 2.5px;
    }
</style>
@section('content')
            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="name">
                            <label for="name">👤</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="お名前">

                                @error('name')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="email">
                            <label for="email">✉</label>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="メールアドレス">

                                @error('email')
                                    <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="password">
                            <label for="password">🔒</label>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                placeholder="パスワード">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="password-confirm">
                            <label for="password-confirm">🔐</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                placeholder="もう一度パスワードを入力">
                            </div>
                        </div>

                        <div>
                            <div class="btn__wrapper">
                                <button type="submit" class="btn">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
