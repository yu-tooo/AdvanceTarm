@extends('layouts.card')

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
            <form action="/logout" method="POST">
              @csrf
              <button>logout</button>
            </form>
          </li>  
          <li>
            <form action="/my_page" method="GET">
              <button>Mypage</button>
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

@section('content')
<h2>会員登録ありがとうございます</h2>
<form action="/login" method="GET">
  <button>ログインする</button>
</form>
@endsection