<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table= "admin";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   

    public $timestamps=true;

    protected $primaryKey= "id";

    protected $keyType="int";

    public $incrementing=true;

    protected $fillable = ['nama','email','password','no_hp','alamat'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];
}
