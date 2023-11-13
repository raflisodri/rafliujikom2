@extends('layout.master')
@section('content')
    
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Ini Detail Data Sepatu</h3>
                        </div>               
                        <div class="card body">
                            <div class="table-responsive">
                            
                                <table class="table">
                                        <tr>
                                            <th>Id</th>
                                            <td>{{$sepatu->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto</th>
                                            <td >
                                                <img src="{{asset("foto/$sepatu->foto")}}" alt="Kosong" style="width: 50%; height: 50%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Suplier</th>
                                            <td>{{$sepatu->Suplier->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>Merk</th>
                                            <td>{{$sepatu->merk}}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis</th>
                                            <td>{{$sepatu->jenis}}</td>
                                        </tr>
                                        <tr>
                                            <th>Stok</th>
                                            <td>{{$sepatu->stok}}</td>
                                        </tr>
                                        <tr>
                                            <th>Ukuran</th>
                                            <td>{{$sepatu->ukuran}}</td>
                                        </tr>
                                        <tr>
                                            <th>Warna</th>
                                            <td>{{$sepatu->warna}}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>Rp.{{number_format($sepatu->harga,0,'.','.') }}</td>
                                        </tr>
                                        
                                </table>
                                <a href="/sepatu" class="btn btn-info">Kembali</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection