@extends('layouts.app')
@section('content')
<section id="main-content">
          <section class="wrapper">         
<div class="container">
    <div class="row">
      <div class="col-md-11">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">anggota</li>
          <li class="active">tambah data</li>
        </ul>
		<BR>
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Tambah Data Anggota</h4>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('anggota.update' , $anggotas->id) }}" method="post" >
			  		{{ csrf_field() }}
			  		<input name="_method" type="hidden" value="PATCH">
			  <div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{$anggotas->nama}}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('ttl') ? ' has-error' : '' }}">
			  			<label class="control-label">ttl</label>	
			  			<input type="date" name="ttl" class="form-control" value="{{$anggotas->ttl}}" required>
			  			@if ($errors->has('ttl'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ttl') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('status_anggota') ? ' has-error' : '' }}">
			  			<label class="control-label">status_anggota</label>	
			  			<select name="status_anggota" class="form-control" value="{{$anggotas->id}}">
			  				<option>Pelajar</option>
			  				<option>Mahasiswa</option>
			  				<option>Lulus Sekolah</option>
			  			</select>
			  			@if ($errors->has('status_anggota'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status_anggota') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('id_kursus') ? ' has-error' : '' }}">
			  			<label class="control-label">Kode Kursus</label>	
			  			<select name="id_kursus" class="form-control">
			  				@foreach($kursusnamas as $data)
			  				<option value="{{ $data->id }}"  {{ $selectedkursus == $data->id ? 'selected="selected"' : '' }} >{{ $data->kode_kursus }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_kursus'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_kursus') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Edit</span></button>

			  			<button type="reset" class="btn btn-danger" onclick="return confirm('hapus data yang telah diinput?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</span></button>
			  			</div>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection