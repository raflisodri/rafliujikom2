<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>HISTORY</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
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
                                <table class="table table-responsive" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Kasir</th>
                                            <th>Member</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $u)
                                            <tr class="parent-row">
                                                <td>{{ $u->id }}</td>
                                                <td>{{ $u->user->name }}</td>
                                                <td>{{ $u->member->nama }}</td>
                                                <td>{{ $u->tanggal }}</td>
                                            </tr>
                                            <tr class="child-row">
                                                <td colspan="4">
                                                    <table class="table table-bordered child-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Keterangan Sepatu</th>
                                                                <th>Harga Satuan</th>
                                                                <th>Jumlah</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($u->detailTransaksi as $detail)
                                                                <tr>
                                                                    <td>{{ $detail->sepatu->merk }} -
                                                                        {{ $detail->sepatu->nama }}</td>
                                                                    <td>Rp
                                                                        {{ number_format($detail->harga_satuan, 0, ',', '.') }}
                                                                    </td>
                                                                    <td>{{ $detail->jumlah }}</td>
                                                                    <td>Rp
                                                                        {{ number_format($detail->total, 0, ',', '.') }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="3" class="text-right"><strong>Sub
                                                                        Total:</strong></td>
                                                                <td><strong>Rp
                                                                        {{ number_format($u->sub_total, 0, ',', '.') }}</strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="/loginmember">
                                    <div class="mt-3">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg font-weight-medium auth-form-btn">Kembali</button>
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
