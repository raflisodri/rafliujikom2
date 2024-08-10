<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .child-table {
            margin-top: 10px;
            margin-left: 20px;
            width: 95%;
            /* Make child table a bit smaller than the parent */
        }

        .child-table th,
        .child-table td {
            border: 1px solid #ccc;
        }

        .child-table th {
            background-color: #eaeaea;
        }

        .parent-row {
            background-color: #f9f9f9;
        }

        .child-row {
            background-color: #fff;
        }
    </style>
</head>

<body onload="print()">
    <center>
        <h2>LAPORAN HASIL TRANSAKSI</h2>
    </center>
    <table class="table table-responsive">
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
                        <table class="child-table">
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
                                        <td>{{ $detail->sepatu->merk }} - {{ $detail->sepatu->nama }}</td>
                                        <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                                        <td>{{ $detail->jumlah }}</td>
                                        <td>Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Sub Total:</strong></td>
                                    <td><strong>Rp {{ number_format($u->sub_total, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
