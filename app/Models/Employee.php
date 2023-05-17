<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'department',
        'country',
        'state',
        'city',
        'zip_code',
        'birthdate',
        'date_hired'
    ];

    protected $hidden = ['password'];

    public function getNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }
}
