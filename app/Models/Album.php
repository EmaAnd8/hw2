<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
        protected $table='album';
        protected $primaryKey='codice';
        protected $fillable=[
            'nome',
            'genere',
            'numero_brani',
            'copertina'
        ];


    public  function  brani(){
        return $this->hasMany('app\Models\Brano');
    }

}
