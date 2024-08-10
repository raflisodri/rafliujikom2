<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .invoice-container {
            max-width: 700px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #00aaff;
            padding-bottom: 10px;
        }

        .invoice-header h1 {
            margin: 0;
            font-size: 28px;
            color: #00aaff;
        }

        .invoice-header h2 {
            margin: 0;
            font-size: 22px;
            color: #555;
        }

        .invoice-body {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .invoice-body p {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .invoice-details table th,
        .invoice-details table td {
            border: 1px solid #e0e0e0;
            padding: 12px;
            text-align: left;
        }

        .invoice-details table th {
            background-color: #00aaff;
            color: #fff;
            font-weight: bold;
        }

        .invoice-footer {
            text-align: right;
            font-size: 18px;
        }

        .invoice-footer p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .invoice-footer h3 {
            margin: 10px 0 0;
            font-size: 24px;
            color: #00aaff;
            font-weight: bold;
        }

        .signature {
            margin-top: 50px;
            text-align: center;
        }

        .signature h3 {
            margin: 0;
            font-size: 18px;
            border-top: 1px solid #333;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            padding-top: 10px;
        }

        .signature p {
            margin-top: 5px;
            font-size: 16px;
            color: #666;
        }
    </style>
</head>

<body onload="print()">
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>INVOICE</h1>
            <h2>CHOICE SHOES</h2>
        </div>

        <div class="invoice-body">
            <p>Kepada: <strong>{{ $transaksi->member->nama }}</strong></p>
            <p>ID Member: {{ $transaksi->member->id }}</p>
            <p>Tanggal: {{ $transaksi->tanggal }}</p>
            <p>No Invoice: {{ $transaksi->id }}</p>
        </div>

        <div class="invoice-details">
            <table>
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Jml</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->detailTransaksi as $detail)
                        <tr>
                            <td>{{ $detail->sepatu->merk }} - {{ $detail->sepatu->nama }}</td>
                            <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="invoice-footer">
            <p>Sub Total: Rp {{ number_format($transaksi->sub_total, 0, ',', '.') }}</p>
            <p>Pajak (10%): Rp {{ number_format($transaksi->sub_total * 0.1, 0, ',', '.') }}</p>
            <h3>Total: Rp {{ number_format($transaksi->sub_total + $transaksi->sub_total * 0.1, 0, ',', '.') }}</h3>
        </div>

        <br>
        <br>
        <div class="signature">
            <h3>{{ $transaksi->user->name }}</h3>
            <p>Petugas</p>
        </div>
    </div>
</body>

</html>
