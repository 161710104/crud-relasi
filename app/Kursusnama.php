<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kursusnama extends Model
{
     //fillable fields
	protected $table = 'kursusnamas';
    protected $fillable = ['kode_kursus', 'nama' ,'alamat','jadwal', 'biaya'];
    public $timestamps = true;
    //---------------------------------------
    public function anggota()
    {
    	return $this->hasMany('App\Anggota','id_kursus');
    }
    
}
