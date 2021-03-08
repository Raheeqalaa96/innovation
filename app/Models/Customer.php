<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'nationality_id',
    ];
 public function Shipment()
    {
        return $this->hasMany('App\Shipment');
    }


}
