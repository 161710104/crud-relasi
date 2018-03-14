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
          <li class="active">kursus</li>
        </ul>
                <div class="pull-left">
                    <h2>Data Kursus</h2>
                    <div class="hline"></div>
                </div>
                <br>
                <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kursus.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</span></a>
                </div>
                <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <thead>
                    <tr>
                      <th>No</font></th>
                      <th>Kode Kursus</th>
                      <th>Nama Tempat Kursus</th>
                      <th>Alamat</th>
                      <th>Jadwal Kursus</th>
                      <th>Biaya Kursus</th>
                      <th>Nama Anggota</th>
                      <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($kursusnamas as $kursus)
                      <tr>
                        <td>
                            <div>{{$no++}}</div>
                            </td>
                            <td class="table-text">
                                <div>KK - {{$kursus->kode_kursus}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$kursus->nama}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$kursus->alamat}}</div>
                            </td>
                             <td class="table-text">
                                <div>{{$kursus->jadwal}}</div>
                            </td>
                            <td class="table-text">
                                <div>Rp. {{$kursus->biaya}}/Bulan</div>
                            </td>
                            <td class="table-text">
                            <div>@foreach($kursus->anggota as $mhs)<li>{{ $mhs->nama }}@endforeach</li></div>
                            </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('kursus.edit', $kursus->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span></a>
                        </td>
                        <td>
                            <a href="{{ route('kursus.show',$kursus->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Show</span></a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('kursus.destroy',$kursus->id) }}">
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