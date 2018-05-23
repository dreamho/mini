<?php
namespace App\model;
use Illuminate\Database\Eloquent\Model as Eloquent;
class User extends Eloquent
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = false;
}