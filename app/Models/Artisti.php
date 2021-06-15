<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
//use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Artisti extends  Model
{
        //protected $collection='artisti';
        protected $table='artista';
        protected $primaryKey='ID';
        //protected $connection='mongodb';

        protected $fillable=[
            'nome',
            'inizio_carriera',
            'numero_partecipanti',
            'profilo',
            'descrizione'
            ];



}
