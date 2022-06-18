<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\cart;

class item extends Model
{
    use HasFactory;

    public function cart(){
        return $this->belongsTo(cart::class);
    }
}
