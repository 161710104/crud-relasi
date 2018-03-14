@extends('layouts.app')
@section('content')
<section id="main-content">
          <section class="wrapper">         
<div class="container">
    <div class="row">
      <div class="col-md-11">
<ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">kursus</li>
          <li class="active">{{$kursusnamas->id}}</li>
        </ul>
                    <h2>Kursus</h2>
                    <p>Kode Kursus[{{$kursusnamas->kode_kursus}}]</p>
                    <div class="hline"></div>
                    <br>
		 		<h4>Nama Tempat Kursus : {{$kursusnamas->nama}}</h4>
        <h4>Alamat : {{$kursusnamas->alamat}}</h4>
		 		<h4>Jadwal : {{$kursusnamas->jadwal}}</h4>
		 		<h4>Biaya Kursus : Rp. {{$kursusnamas->biaya}} /Bulan</h4>

      </div>
      </div>
      </div>
      </section>
      </section>
      @endsection