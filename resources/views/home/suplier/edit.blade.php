@extends('layout.master')
@section('content')
    
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Data Suplier</h3>
                            </div>
                            <div class="card-body">
                                <form action="/suplier/update/{{$suplier->id}}" method="post">
                                @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label">Name</label>
                                  <input type="text" value="{{$suplier->nama}}" name="nama" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                  @error('nama')
                                      <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Perusahaan</label>
                                    <input type="text" value="{{$suplier->nama_perusahaan}}" name="nama_perusahaan" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('nama_perusahaan')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input type="text" value="{{$suplier->alamat}}" name="alamat" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('alamat')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">No telp</label>
                                    <input type="text" value="{{$suplier->no_telp}}" name="no_telp" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('no_telp')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <button type="submit" class="btn btn-info">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection