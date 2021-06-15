<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Autori extends Model
{
    protected $table='autore';
    protected $primaryKey='codice';
    protected $fillable = [
        'titolo',
        'immagine',
        'descrizione',
    ];


}
