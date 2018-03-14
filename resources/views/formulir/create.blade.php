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
          <li class="active">tambah data</li>
        </ul>
		<BR>
			<div class="panel panel-default">
			  <div class="panel-heading"><h4>Tambah Data Formulir</h4>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('formulir.store') }}" method="post" >
			  		{{ csrf_field() }}
			  <div class="form-group {{ $errors->has('nomer_formulir') ? ' has-error' : '' }}">
			  			<label class="control-label">Nomer Formulir</label>	
			  			<input type="number" name="nomer_formulir" class="form-control"  required>
			  			@if ($errors->has('nomer_formulir'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nomer_formulir') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  		<div class="form-group {{ $errors->has('biaya') ? ' has-error' : '' }}">
			  			<label class="control-label">Biaya</label>	
			  			<input type= "number" name="biaya" class="form-control" rows="10" required>
			  			@if ($errors->has('biaya'))
                            <span class="help-block">
                                <strong>{{ $errors->first('biaya') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('id_anggota') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Anggota</label>	
			  			<select name="id_anggota" class="form-control">
			  				@foreach($anggotas as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_anggota'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_anggota') }}</strong>
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