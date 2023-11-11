<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak</title>
</head>
<body onload="print()">
   <center>LAPORAN HASIL TRANSAKSI
   <table border="1" class="table table-resposive" id="example" >
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
</body>
</center> 
</html>