<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <title>HISTORY</title>
 <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}" />
 <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}" />
 <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}" />
 <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
 <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" />
 <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">
 <link rel="stylesheet" href="{{asset('assets/vendors/datatable/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
 <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
</head>
<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                HISTORY PEMBELIAN
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
                                            <td>{{$u->total}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 
                                <a href="/loginmember">
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg font-weight-medium auth-form-btn">Kembali</button>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>