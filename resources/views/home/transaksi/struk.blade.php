<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk pembelian</title>
</head>
<body onload="print()">
    <center>
    <h3>STRUK PEMBELIAN</h3>
    <h4>CHOICE SHOES</h4>
</center>
 <div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Nama Petugas:</th>
                <th scope="col"> {{$transaksi->User->name}}</th>
            </tr>
        </thead>
    </table>
 </div>
 <div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Nama Member:</th>
                <th scope="col"> {{$transaksi->Member->nama}}</th>
            </tr>
        </thead>
    </table>
 </div>
 <div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Sepatu:</th>
                <th scope="col">  {{$transaksi->Sepatu->merk}} - {{$transaksi->Sepatu->nama}}</th>
            </tr>
        </thead>
    </table>
 </div>
 <div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Jumlah:</th>
                <th scope="col"> {{$transaksi->jumlah}}</th>
            </tr>
        </thead>
    </table>
 </div>
 <div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Total:</th>
                <th scope="col">Rp. {{number_format ($transaksi->total),2,'.','.'}}</th>
            </tr>
        </thead>
    </table>
<hr>
-harap di simpan sebagai bukti pembelian
 </div>
</body>
</html>