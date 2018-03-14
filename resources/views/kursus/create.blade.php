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
          <li class="active">tambah data</li>
        </ul>
		<BR>
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Tambah Data Kursus</h4>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kursus.store') }}" method="post" >
			  		{{ csrf_field() }}
			  <div class="form-group {{ $errors->has('kode_kursus') ? ' has-error' : '' }}">
			  			<label class="control-label">Kode Kursus</label>	
			  			<input type="number" name="kode_kursus" class="form-control"  required>
			  			@if ($errors->has('kode_kursus'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kode_kursus') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Tempat Kursus</label>	
			  			<input type="text" name="nama" class="form-control"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">Alamat Tempat Kursus</label>	
			  			<input type="text" name="alamat" class="form-control"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('jadwal') ? ' has-error' : '' }}">
			  			<label class="control-label">Jadwal Kursus</label>	
			  			<input type="date" name="jadwal" class="form-control"  required>
			  			@if ($errors->has('jadwal_kursus'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jadwal') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('biaya') ? ' has-error' : '' }}">
			  			<label class="control-label">Biaya Kursus</label>	
			  			<input type= "number" name="biaya" class="form-control" rows="10" required>
			  			@if ($errors->has('biaya'))
                            <span class="help-block">
                                <strong>{{ $errors->first('biaya') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</span></button>

			  			<button type="reset" class="btn btn-danger" onclick="return confirm('hapus data yang telah diinput?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</span></button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection