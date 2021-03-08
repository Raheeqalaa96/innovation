<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone_number',
    ];
    public function Branches()
    {
        return $this->hasMany('App\Branches');
    }
    public function Employee()
    {
        return $this->hasMany('App\Employee');
    }
  
}
