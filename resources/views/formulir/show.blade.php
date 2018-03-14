@extends('layouts.app')
@section('content')
<section id="main-content">
          <section class="wrapper">         
<div class="container">
    <div class="row">
      <div class="col-md-11">
<ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">formulir</li>
          <li class="active">{{$formulirs->id}}</li>
        </ul>
                    <h2>{{$formulirs->anggota->nama}}</h2>
                    <p>Nomer Formulir[{{$formulirs->nomer_formulir}}]</p>
                    <div class="hline"></div>
                    <br>
		 		<h4>Biaya Pendaftaran : {{$formulirs->biaya}}</h4>

      </div>
      </div>
      </div>
      </section>
      </section>
      @endsection