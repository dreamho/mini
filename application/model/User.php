<?php
namespace App\model;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * @package App\model
 */
class User extends Eloquent
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = false;
}