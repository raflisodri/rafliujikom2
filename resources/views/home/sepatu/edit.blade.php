@extends('layout.master')
@section('content')
    
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Data Sepatu</h3>
                            </div>
                            <div class="card-body">
                                <form action="/sepatu/update/{{$sepatu->id}}" method="post">
                                @csrf
                                {{-- <div class="mb-3">
                                  <label for="" class="form-label">Suplier</label>
                                  <input type="text" name="id_suplier" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                  @error('id_suplier')
                                      <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                  @enderror
                                </div> --}}
                                <div class="mb-3">
                                  <label for="" class="form-label">Suplier</label>
                                    <select name="id_suplier" id="" class="form-control">
                                        @foreach ($suplier as $suplier)
                                            <option value="{{$suplier->id}}">{{$suplier->nama}} - {{$suplier->nama_perusahaan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" value="{{$sepatu->nama}}" name="nama" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('nama')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Merk</label>
                                    <input type="text" value="{{$sepatu->merk}}" name="merk" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('merk')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Jenis</label>
                                    <input type="text" value="{{$sepatu->jenis}}" name="jenis" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('jenis')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Stok</label>
                                    <input type="number" value="{{$sepatu->stok}}" name="stok" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('stok')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Ukuran</label>
                                    <input type="number" value="{{$sepatu->ukuran}}" name="ukuran" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('ukuran')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Warna</label>
                                    <input type="text" value="{{$sepatu->warna}}" name="warna" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('warna')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Harga</label>
                                    <input type="text" value="{{$sepatu->harga}}" name="harga" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('harga')
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