@extends('dashboard')

@section('content')


<div class = "content-header">
    <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">EVENTS</h1>
                </div><div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ url('event') }}">EVENTS</a>
                        </li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div></div></div></div> 

<div class = "content">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('event.create') }}" method="POST">
                                <fieldset>
                                    <legend>Form Tambah Ticket</legend>
                                    <label for = "nama_event">Nama Event</label><br>
                                    <input type = "text" id = "nama_event" name = "nama_event" placeholder = "Masukkan Nama Event"/> <br><br>

                                    <label for = "lokasi_event">Lokasi Event</label><br>
                                    <input type = "text" id = "lokasi_event" name = "lokasi_event" placeholder = "Masukkan Lokasi Event" /><br><br>

                                    <label for = "quota">Kuota Event</label><br>
                                    <input type = "text" id = "quota" name = "quota" placeholder = "Masukkan Kuota Event"/><br><br>
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                </fieldset>
                            </form>
                            
                            
                            
                        </div></div></div></div></div></div>

@endsection