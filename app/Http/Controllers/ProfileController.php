<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    const LOCAL_STORAGE_FOLDER = 'public/avatars/';
    private $user;
    private $cart;

    public function __construct(User $user, cart $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }

    public function show()
    {
        $all_carts = $this->cart->all()->where('user_id', Auth::user()->id)
                                       ->where('status', 'purchase');

        return view('users.profile.show')->with('all_carts', $all_carts);


       // return view('users.profile.show');
    }

    public function edit()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.profile.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        $user                 = $this->user->findOrFail(Auth::user()->id);
        $user->name           = $request->name;
        $user->email          = $request->email;
        $user->contact_number = $request->contact_number;
        $user->address        = $request->address;

        if ($request->avatar) {
            if ($user->avatar) {
                $this->deleteAvatar($user->avatar);
            }
        }
        $user->avatar = $this->saveAvatar($request);

        $user->save();
        return redirect()->route('profile.show', auth::user()->id);
    }

    private function saveAvatar($request)
    {
        $avatar_name = time() . "." . $request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER, $avatar_name);
        return $avatar_name;
    }

    private function deleteAvatar($avatar_name)
    {
        $avatar_path = Self::LOCAL_STORAGE_FOLDER . $avatar_name;
        // $image_name = "public/images/167862457.jpg";

        // If the image is existing, delete.
        if (Storage::disk('local')->exists($avatar_path)) {
            Storage::disk('local')->delete($avatar_path);
        }
    }
}
