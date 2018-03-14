<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    //fillable fields
	protected $table = 'formulirs';
    protected $fillable = ['nomer_formulir','biaya','id_anggota'];
    public $timestamps = true;
    //---------------------------------------
    public function anggota() {
		return $this->belongsTo('App\Anggota', 'id_anggota');
	}
}
