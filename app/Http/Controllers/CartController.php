<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cart;

    public function __construct( cart $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_carts = $this->cart->all()->where('user_id', Auth::user()->id);

    //   foreach($all_carts as $cart):
    //      $cart->item->name;

    //   endforeach;
        return view('users.carts.index')->with('all_carts',$all_carts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $item_id)
    {
        $this->cart->user_id = Auth::user()->id;
        $this->cart->item_id = $item_id;
        $this->cart->number = $request->number;
        $this->cart->save();

        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $this->cart->destroy($id);
        return redirect()->back();
    }

    public function purchase($id){
        $cart = $this->cart->findOrFail($id);
        $cart->status = 'purchase';
        $cart->save();
        return redirect()->back();
    }
}
