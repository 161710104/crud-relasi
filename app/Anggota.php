<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //fillable fields
	protected $table = 'anggotas';
    protected $fillable = ['nama', 'ttl' ,'status_anggota' ,'id_kursus'];
    public $timestamps = true;
    //---------------------------------------
    public function kursus()
	{
		return $this->belongsTo('App\Kursusnama','id_kursus');
	}

	public function formulir() {
		return $this->hasOne('App\Formulir', 'id_anggota');
	}
}
