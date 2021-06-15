<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{

    protected $table='favourite';
    protected $primaryKey='id_pref';
    public $timestamps=false;
    protected $fillable = [
        'id',
        'titolo',
        'immagine',
        'tipo',
    ];

    public  function  users(){
        return $this->belongsTo('app\Models\User');
    }
}

?>
