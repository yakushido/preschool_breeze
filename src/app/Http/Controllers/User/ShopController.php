<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use App\Models\Stock;

class ShopController extends Controller
{
    public function index()
    {
        $purchases = Purchase::where('user_id', Auth::id())->get();

        return view('user.shop', compact('purchases'));
    }

    public function show(Request $request)
    {
            $stock = Stock::find($request->id);

        return view('user.cart', compact('stock'));
    }

    public function add(Request $request)
    {
        Purchase::create([
            'stock_id' => $request->stock_id,
            'user_id' => Auth::id()
        ]);

        return view('user.done');
    }
}
