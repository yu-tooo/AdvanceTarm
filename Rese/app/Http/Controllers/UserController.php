<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Favorite;

class UserController extends Controller
{
    public function my_page()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $reservations = Reservation::where('user_id', $user_id)
        ->where('date', '>=', date("Y-m-d"))
        ->orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->get();
        $favorites = Favorite::where('user_id', $user_id)
        ->get();

        $data = [
            'user' => $user,
            'reservations' => $reservations,
            'favorites' => $favorites
        ];
        
        return view('user.my_page', $data);
    }

    public function cancel(Request $request)
    {
        Reservation::where('id', $request->id)->delete();
        return redirect('my_page');
    }

    
    public function thanks()
    {
        return view('user.thanks');
    }


    public function favorite(Request $request)
    { 
        if (Favorite::where('user_id', $request->user_id)
        ->where('restaurant_id', $request->restaurant_id)->exists()) {
            Favorite::where('user_id', $request->user_id)
                ->where('restaurant_id', $request->restaurant_id)
                ->delete();
        } else {
            $param = [
                'user_id' => $request->user_id,
                'restaurant_id' => $request->restaurant_id
            ];
            Favorite::create($param);
        }

        return back();
    }
}
