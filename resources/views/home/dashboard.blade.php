@extends('layout.master')
@section('content')
    
<div class="content-wrapper pb-0">
    <div class="page-header flex-wrap">
   
        {{-- <h3 class="mb-0"> Hi, {{Auth()->User()->name}} welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"></span>
        </h3>
        @if (session('success'))
        <div class="alert alert-success alert-dismisible fade show" role="alert" data-dismiss="alert">Selamat datang!!</div>
        @endif  --}}
    </div>
    <div class="row">
        
        <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
            <div class="row">
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah Transaksi</p>
                                    <h4 class="text-white"> 
                                        @if ($total_minggu->totalprices == null)
                                           0 
                                        @else
                                           Rp. {{number_format($total_minggu->totalprices,0,'.','.') }}
                                        @endif
                                        
                                        <span class="h5"></span>
                                    </h4>
                                </div>
                                <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                            </div>
                      
                            <h6 class="text-white">Seluruh transaksi Yang terjadi</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah Sepatu</p>
                                    <h2 class="text-white"> {{$jumlah_sepatu}}<span class="h5"></span>
                                    </h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                            </div>
                            <h6 class="text-white">Jumlah Seluruh Sepatu</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Jumlah User</p>
                                    <h2 class="text-white">{{$jumlah_user}}<span class="h5"></span>
                                    </h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                            </div>
                            <h6 class="text-white">Jumlah user Kasir dan Admin</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                        <div class="card-body px-3 py-4">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="color-card">
                                    <p class="mb-0 color-card-head">Member</p>
                                    <h2 class="text-white">{{$jumlah_member}}</h2>
                                </div>
                                <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                            </div>
                            <h6 class="text-white">Jumlah Member Aktif</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>History</h3>
                </div>
                <div class="card-body">
                    <table class="table table-resposive" id="example" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Kasir</th>
                                <th>Member</th>
                                <th>Sepatu</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->User->name}}</td>
                                <td>{{$u->Member->nama}}</td>
                                <td>{{$u->Sepatu->merk}} - {{$u->Sepatu->nama}}</td>
                                <td>{{$u->tanggal}}</td>
                                <td>{{$u->jumlah}}</td>
                                <td>Rp.{{number_format($u->total,0,'.','.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   

   
</div>
@endsection