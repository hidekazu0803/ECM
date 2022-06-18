<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $item;

    const LOCAL_STORAGE_FOLDER = 'public/images/';

    public function __construct(Item $item)
    {
        $this->item = $item;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_items = $this->item->latest()->paginate(10);

        return view('users.home')->with('all_items', $all_items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_items = $this->item->all();

        return view('users.items.create')->with('all_items', $all_items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #validation

        $this->item->image = $this->saveImage($request);
        $this->item->name = $request->name;
        $this->item->price = $request->price;
        $this->item->quality = $request->quality;
        $this->item->save();

        return redirect()->route('home');
    }

    private function saveImage($request)
    {
        $image_name = time().".".$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
        return $image_name;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->item->findOrFail($id);
        return view('users.items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        //
    }
}
