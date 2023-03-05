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
<h2>ご予約ありがとうございます</h2>
<form action="/my_page">
  <button>マイページへ</button>
</form>

@endsection