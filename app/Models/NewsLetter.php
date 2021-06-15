<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $table='newsletter';
    protected $primaryKey='id_newsletter';
    public $timestamps=false;
    protected $fillable = [
        'email',
        'descrizione',
        'checkbox'
    ];
}
