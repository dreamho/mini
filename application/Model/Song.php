<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Song
 * @package App\model
 */
class Song extends Eloquent
{

    protected $table = 'song';
    protected $fillable = ['artist','track','link'];
    public $timestamps = [];

}
