<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    private $item;

    const LOCAL_STORAGE_FOLDER = 'public/images/';
    public function __construct(Item $item)
    {
         $this->item = $item;
    }

    public function index()
    {
        $all_items = $this->item->all();

        return view('users.admin.items.index')->with('all_items', $all_items);
    }

    public function edit($id)
    {
        $item = $this->item->findOrFail($id);
        return view('users.admin.items.edit')->with('item', $item);
    }

    public function update(Request $request,$id)
    {
        #validation

        $item           = $this->item->findOrFail($id);
        $item->name     = $request->name;
        $item->price    = $request->price;
        $item->quality  = $request->quality;

        if ($request->image) {
            // Delete the previous image from the local storage
            $this->deleteImage($item->image);

            // Move the new image to the local storage
            $item->image = $this->saveImage($request);
        }

        $item->save();

        return redirect()->route('admin.item',$id);
    }

    private function saveImage($request)
    {
        $image_name = time().".".$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);
        return $image_name;
    }

    private function deleteImage($image_name)
    {
        $image_path = Self::LOCAL_STORAGE_FOLDER . $image_name;
        // $image_name = "public/images/167862457.jpg";

        // If the image is existing, delete.
        if (Storage::disk('local')->exists($image_path)) {
            Storage::disk('local')->delete($image_path);
        }
    }

    public function delete($id){
        $this->item->destroy($id);
        return redirect()->back();
    }
}
