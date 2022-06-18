<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\item;
use App\Models\user;

class cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','item_id'];
    public $timestamps = false;

    public function item(){
        return $this->belongsTo(item::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }
}
