@extends('layouts.basic')

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

<style>
  .wrapper {
    display: flex;
    justify-content: space-between;
  }
  .reservations {
    width: 40%;
  }
  .favorites {
    width: 50%;
  }
  .reservations_card {
    background-color: #0055e8;
    width: 80%;
    padding: 20px;
    margin-bottom: 20px;
    color: #fff;
    border-radius: 10px;
    box-shadow: 1px 1px 2px #000;
  }
  .title {
    margin-left: 20Px;
    display: flex;
    justify-content: space-between;
  }
  .cancel_btn {
    border-radius: 50%;
    border: 2px solid #fff;
    color: #fff;
    font-size: 20px;
    background-color: #0055e8;
    outline: none;
    cursor: pointer;
  }
  .reservations_table{
    color: #fff;
  }
  .reservations_table td {
    padding-right: 30px;
  }

  .favorites_wrpper {
    display: flex;
    flex-wrap: wrap;
  }
  .items {
    width: 40%;
    background-color: #fff;
    margin: 0 50px 30px 0;
    box-shadow: 1px 1px 5px;
    border-radius: 5px;
  }
  img {
    width: 100%;
    border-radius: 5px 5px 0 0;
  }
  .items__content {
    padding: 10px 20px 0 20px;
  }
  .item__content--title {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
  }
  .item__content--detail {
    display: flex;
    font-size: 12px;
    font-weight: bold;
  }
  .item__content--detail p{
    margin: 5px 10px 0 0;
  }
  .item__content--action {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
  }
  .action__button {
    background-color: #0055e8;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    box-shadow: 1px 1px #000;
    cursor: pointer;
  }
  /* ハート */
  .heart {
  width: 30px;  
  height: 30px;
  position: relative;
  outline: none;
  border: none;
  background-color: #fff;
  cursor: pointer;
}
.heart::before,
.heart::after {
  content: ""; 
  width: 50%;  
  height: 80%;  
  background: red; 
  border-radius: 25px 25px 0 0; /
  display: block; 
  position: absolute;
  top: 0;
}
.heart::before {
  transform: rotate(-45deg); 
  left: 14%;                 
}
.heart::after {
  transform: rotate(45deg);  
  right: 14%;               
}
</style>
@section('content')
<div class="user_name">
  <h2>{{ $user->name }}さん</h2>
</div>
<div class="wrapper">
  <div class="reservations">
    <h3>予約状況</h3>
    @foreach($reservations as $index => $reservation)
    <div class="reservations_card">
      <form action="/my_page/cancel/id={{ $reservation->id }}">
      <div class="title">
        <div>予約 {{ $index + 1}}</div>
          <button class="cancel_btn">×</button>
      </form>
      </div>  
      <table class="reservations_table">
        <tr>
          <td>Shop</td>
          <td>{{ $reservation->restaurant->getName() }}</td>
        </tr>
        <tr>
          <td>Date</td>
          <td>{{ $reservation->date }}</td>
        </tr>
        <tr>
          <td>Time</td>
          <td>{{ substr($reservation->time, 0, 5) }}</td>
        </tr>
        <tr>
          <td>Number</td>
          <td>{{ $reservation->number }}人</td>
        </tr>
      </table>
    </div>
    @endforeach
  </div>
  <div class="favorites">
    <h3>お気に入り店舗</h3>
    <div class="favorites_wrpper">

    @foreach($favorites as $favorite)
    <div class="items">
    <div class="items__img">
      <img src="{{ $favorite->restaurant->getUrl() }}" alt="飲食店の写真">
    </div>
    <div class="items__content">
      <p class="item__content--title">{{ $favorite->restaurant->getName() }}</p>
      <div class="item__content--detail">
        <p>{{ $favorite->restaurant->detail->getDetail() }}</p>
      </div>
      <div class="item__content--action">
        <form action="/shop_detail/id={{ $favorite->restaurant->getId() }}">
          <div class="action--button">
            <button class="action__button">詳しくみる</button>
          </div>
          </form>
          <form action="/favorite?
          user_id={{ $user->id }}&restaurant_id={{ $favorite->restaurant->getId() }}"
          method="POST">
          @csrf
          <div class="bookmark">
            <button class="heart"></button>
          </div>
          </form>
      </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection