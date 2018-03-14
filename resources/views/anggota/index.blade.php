@extends('layouts.app')
@section('content')
<section id="main-content">
          <section class="wrapper">         
<div class="container">
    <div class="row">
  <br>
      <div class="col-md-11">
        <ul class="breadcrumb">
          <li><a href="{{ url('/home') }}">Dashboard</a></li>
          <li class="active">anggota</li>
        </ul>
                <div class="pull-left">
                    <h2>Data anggota</h2>
                    <div class="hline"></div>
                </div>
                <br>
                <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('anggota.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</span></a>
                </div>
                <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <thead>
                    <tr>
                      <th width="5%">No</font></th>
                      <th>Nama</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Status Anggota</th>
                      <th>Kode Kursus</th>
                      <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($anggotas as $anggota)
                      <tr>
                        <td>
                            <div>{{$no++}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$anggota->nama}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$anggota->ttl}}</div>
                            </td>
                             <td class="table-text">
                                <div>{{$anggota->status_anggota}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$anggota->kursus->kode_kursus}}</div>
                            </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('anggota.edit', $anggota->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span></a>
                        </td>
                        <td>
                            <a href="{{ route('anggota.show',$anggota->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Show</span></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('anggota.destroy',$anggota->id) }}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">

                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</span></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>  
        </div>
    </div>
</div>
@endsection