@extends('layout.master')
@section('content')
    
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tambah Data Transaksi</h3>
                            </div>
                            <div class="card-body">
                                <form action="/transaksi/update/{{$transaksi->id}}" method="post">
                                @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label">Kasir</label>
                                    <select name="id_user" id="" class="form-control">
                                        @foreach ($user as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Member</label>
                                      <select name="id_member" id="" class="form-control">
                                          @foreach ($member as $member)
                                              <option value="{{$member->id}}">{{$member->nama}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                                  <div class="mb-3">
                                    <label for="" class="form-label">Sepatu</label>
                                      <select name="id_sepatu" id="" class="form-control">
                                          @foreach ($sepatu as $sepatu)
                                              <option value="{{$sepatu->id}}">{{$sepatu->merk}} - {{$sepatu->nama}}</option>
                                          @endforeach
                                      </select>
                                  </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal</label>
                                    <input type="date" value="{{$transaksi->tanggal}}" name="tanggal" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('tanggal')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Jumlah</label>
                                    <input type="text" value="{{$transaksi->jumlah}}" name="jumlah" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('jumlah')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Total</label>
                                    <input type="text" value="{{$transaksi->total}}" name="total" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('total')
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