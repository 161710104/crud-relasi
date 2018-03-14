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
          <li class="active">{{$anggotas->id}}</li>
        </ul>
                    <h2>Anggota</h2>
                    <p>Kode Kursus[{{$anggotas->kursus->kode_kursus}}]</p>
                    <div class="hline"></div>
                    <br>
		 		<h4>Nama : {{$anggotas->nama}}</h4>
		 		<h4>Tempat Tanggal Lahir : {{$anggotas->ttl}}</h4>
		 		<h4>Status Anggota : {{$anggotas->status_anggota}}</h4>

      </div>
      </div>
      </div>
      </section>
      </section>
      @endsection