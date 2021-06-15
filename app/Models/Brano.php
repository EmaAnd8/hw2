<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Brano extends Model
{

    protected $table='brano';
    protected $primaryKey='id';
    protected $fillable=[
        'nome',
        'posizione',
        'album'
    ];

    public  function  album(){
        return $this->belongsTo('app\Models\Album');
    }
}
