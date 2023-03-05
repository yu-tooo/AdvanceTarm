<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;
use App\Models\Reservation;
use App\Models\Favorite;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $restaurants = Restaurant::join('details', 'restaurants.id', '=', 'details.restaurant_id')
        ->where('area', 'LIKE BINARY',"%{$request->area}%")
        ->where('genre', 'LIKE BINARY',"%{$request->genre}%")
        ->where('name', 'LIKE BINARY',"%{$request->name}%")
        ->get();

        $favorites = [];

        if(!empty($user)) {
            foreach ( $restaurants as $restaurant) {
            if (
                Favorite::where('user_id', $user->id)
                ->where('restaurant_id', $restaurant->id)->exists()
            ) {
                $favorites[] = $restaurant->id;
            }
        }
        }

        $data = [
            'restaurants' => $restaurants,
            'favorites' => $favorites,
            'user' => $user
        ];
        return view('restaurant.index', $data);
    }

    public function shop_detail_get(Request $request)
    {
        if (Auth::user()) {
            $login = 1;
        } else {
            $login = null;
        }

        $shop_id = $request->id;
        $shop = Restaurant::where('id', $shop_id)->first();
        $data = [
            'id' => $shop_id,
            'shop' => $shop,
            'login' => $login
        ];
        return view('restaurant.shop_detail', $data);
    }

    public function shop_detail_post(ReservationRequest $request)
    {
        if (Auth::user()) {
            $login = 1;
        } else {
            return redirect('/register');
        }

        $user = Auth::user();
        $shop_id = $request->id;
        $shop = Restaurant::where('id', $shop_id)->first();
        $date = $request->date;
        $time = $request->time;
        $number = $request->number;

        $data = [
            'user' => $user,
            'id' => $shop_id,
            'shop' => $shop,
            'date' => $date,
            'time' => $time,
            'number' => $number,
            'login' => $login
        ];

        return view('restaurant.shop_detail', $data);
    }

    public function done(Request $request)
    {
        $param = [
            'user_id' => Auth::user()->id,
            'restaurant_id' => $request->id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number
        ];

        Reservation::create($param);
        return view('restaurant.done');
    }
}
