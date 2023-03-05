@extends('layouts.basic')

@section('header')
<div class="hamburger-menu">
    <input type="checkbox" id="menu-btn-check">
    <label for="menu-btn-check" class="menu-btn"><span></span></label>
      <!--メニュー（未ログイン）-->
      @if($login == 0)
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
      @else
      <!--メニュー（ログイン）-->
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
              <button>Logout</button>
            </form>
          </li>  
          <li>
            <form action="/my_page" method="GET">
              <button>Mypage</button>
            </form>
          </li>
        </ul>
      </div>
      @endif
      <!--ここまで-->
</div>
<div class="logo">
  <a href="/">Rese</a>
</div>
@endsection

<style>
  img {
    width: 100%;
  }
  .wrapper {
    display: flex;
    justify-content: space-between;
  }
  .about {
    width: 45%;
  }
  .about_name a {
    text-decoration:none;
    font-size: 20px;
    padding: 0 6px;
    box-shadow: 1px 1px 2px;
    border-radius: 5px;
    background-color: #fff;
    color: #000;
  }
  .about_name h1{
    display: inline-block;
    font-size: 20px;
    margin-left: 10px;
  }
  .about_detail {
    font-size: 10px;
    margin: 20px 0;
  }
  .about_content {
    font-size: 10px;
  }
  .reservation {
    position: relative;
    width: 30%;
    background-color: #0055e8;
    padding: 10px 40px;
    border-radius: 5px;
  }
  .reservation h1 {
    font-size: 20px;
    color: #fff;
  }
  input {
    width: 100%;
    margin-top: 10px;
    border-radius: 5px;
    border: none;
    padding: 0 5px;
    font-weight: bold;
  }
  .input_date {
    width: 40%;
  }
  .input_time {
    width: 100%;
  }
  .input_number {
    width: 20%;
  }
  .input_number input {
    width: 50%;
  }
  .input_number::after {
    content: "人";
    font-size: 8px;
    color: #fff;
  }
  .reservation_table {
    background-color: #4F93D8;
    color: #fff;
    width: 95%;
    margin-top: 40px;
    padding: 5px;
    border-radius: 5px;
    font-size: 14px;
  }
  .checkbtn button{
    display: block;
    width: 50px;
    font-weight: bold;
    background-color: #fff;
    border: none;
    margin: 20px auto;
    box-shadow: 1px 1px #000;
    border-radius: 5px;
    cursor: pointer;
  }
  .reservation_btn {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 10px 0;
    background-color: #0723F7;
    color: white;
    border: none;
    cursor: pointer;
  }
  .errors {
    margin-top: 20px;
    background-color: #fff;
    border-radius: 5px;
    color: red;
  }
  .errors li {
    list-style: none;
  }

</style>
@section('content')
<div class="wrapper">
  <div class="about">
    <div class="about_name">
      <a href="{{ url()->previous() }}"><</a>
      <h1>{{ $shop->name }}</h1>
    </div>
    <div class="about_img">
      <img src="{{ $shop->img_url }}" alt="お店の写真がお見せできません">
    </div>
    <div class="about_detail">
      <h2>{{ $shop->detail->getdetail() }}</h2>
    </div>
    <div class="about_content">
      <h2>{{ $shop->comment }}</h2>
    </div>
  </div>
  
  <div class="reservation">
    <h1>予約</h1>
    <form action="/shop_detail/id={{ $id }}" method="POST">
      @csrf
      <div class="input_date">
        @isset($date)
        <input type="date" name="date" value="{{ $date }}">
        @else
        <input type="date" name="date">
        @endisset
      </div>
      <div class="inout_time">
        @isset($time)
        <input type="time" name="time" value="{{ $time }}">
        @else
        <input type="time" name="time">
        @endisset
      </div>
      <div class="input_number">
        @isset($number)
        <input type="number" min=1 name="number" value="{{ $number }}">
        @else
        <input type="number" min=1 name="number">
        @endisset
      </div>
      @empty($date)
      <div class="checkbtn">
        <button>確認</button>
      </div>
      @endempty
    </form>
    @isset($date)
    <table class="reservation_table">
      <tr>
        <td>Reservations</td>
        <td>{{ $user->name }}さん</td>
      </tr>
      <tr>
        <td>Shop</td>
        <td>{{ $shop->name }}</td>
      </tr>
      <tr>
        <td>Date</td>
        <td>{{ $date }}</td>
      </tr>
      <tr>
        <td>Time</td>
        <td>{{ $time }}</td>
      </tr>
      <tr>
        <td>Number</td>
        <td>{{ $number }}人</td>
      </tr>
    </table>
    <form action="/done" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $id }}">
      <input type="hidden" name="date" value="{{ $date }}">
      <input type="hidden" name="time" value="{{ $time }}">
      <input type="hidden" name="number" value="{{ $number }}">
      <button class="reservation_btn">予約する</button>
    </form>
    @endisset
    @if(count($errors) > 0)
    <div class="errors">
      <ul>
        @error('date')
        <li>{{ $message }}</li>
        @enderror
        @error('time')
        <li>{{ $message }}</li>
        @enderror
        @error('number')
        <li>{{ $message }}</li>
        @enderror
      </ul>
    </div>
    @endif
  </div>
</div>
@endsection

<script>
    
</script>
