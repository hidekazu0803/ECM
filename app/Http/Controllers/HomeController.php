<?php

namespace App\Http\Controllers;
use App\Models\item;
use App\Models\cart;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $item;
    private $cart;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_items = $this->item->latest()->paginate(10);

        return view('users.home')->with('all_items', $all_items);
    }
}
