@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Ini Data Transaksi</h3>
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        data-dismiss="alert">Berhasil Menambahkan Data</div>
                                @endif

                                @if (session('success1'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        data-dismiss="alert">Berhasil Mengubah Data</div>
                                @endif

                                @if (session('success2'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert"
                                        data-dismiss="alert">Berhasil Menghapus Data</div>
                                @endif
                                <a href="transaksi/tambah" class="btn btn-info">Tambah</a>
                                <a href="transaksi/cetak" target="_blank" class="btn btn-success">Cetak</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <br>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Kasir</th>
                                                <th>Member</th>
                                                <th>Tanggal</th>
                                                <th>Sepatu</th>
                                                <th>Sub Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi as $u)
                                                <tr>
                                                    <td>{{ $u->id }}</td>
                                                    <td>{{ $u->User->name }}</td>
                                                    <td>{{ $u->Member->nama }}</td>
                                                    <td>{{ $u->tanggal }}</td>
                                                    <td>
                                                        <a href="#" class="show-detail" data-toggle="modal"
                                                            data-target="#detailModal" data-id="{{ $u->id }}">
                                                            {{ $u->detailTransaksi->count() }} Sepatu
                                                        </a>
                                                    </td>
                                                    <td>Rp.{{ number_format($u->sub_total, 0, '.', '.') }}</td>
                                                    <td>
                                                        <a href="transaksi/edit/{{ $u->id }}"
                                                            class="btn btn-warning">Edit</a>

                                                        <a href="transaksi/struk/{{ $u->id }}"
                                                            class="btn btn-success" target="_blank">Cetak</a>
                                                        <a href="#" class="btn btn-danger"
                                                            onclick="Delete('transaksi/delete/{{ $u->id }}')">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Transaksi -->
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Merk Sepatu</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="detail-table-body">
                                    <!-- Detail transaksi akan dimuat di sini melalui AJAX -->
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load detail transaksi ketika user mengklik link
            document.querySelectorAll('.show-detail').forEach(function(element) {
                element.addEventListener('click', function() {
                    const transaksiId = this.getAttribute('data-id');

                    // Lakukan request AJAX untuk mendapatkan detail transaksi
                    fetch(`/transaksi/detail/${transaksiId}`)
                        .then(response => response.json())
                        .then(data => {
                            const detailTableBody = document.getElementById(
                                'detail-table-body');
                            detailTableBody.innerHTML =
                                ''; // Kosongkan isi modal terlebih dahulu

                            data.forEach(detail => {
                                const row = `
                                    <tr>
                                        <td>${detail.merk} - ${detail.nama}</td>
                                        <td>Rp. ${detail.harga_satuan.toLocaleString()}</td>
                                        <td>${detail.jumlah}</td>
                                        <td>Rp. ${detail.total.toLocaleString()}</td>
                                    </tr>
                                `;
                                detailTableBody.insertAdjacentHTML('beforeend', row);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
@endsection
