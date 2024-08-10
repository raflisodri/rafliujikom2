@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Detail Data Sepatu</h3>
                            </div>
                            <div class="card-body">
                                <!-- Setiap baris untuk detail menggunakan dua kolom: satu untuk label dan satu untuk nilai -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Id</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->id }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Foto</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ asset("foto/$sepatu->foto") }}" alt="Kosong"
                                            style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Suplier</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->Suplier->nama }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Merk</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->merk }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Jenis</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->jenis }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Stok</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->stok }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Ukuran</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->ukuran }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Warna</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ $sepatu->warna }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label><strong>Harga</strong></label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Rp. {{ $sepatu->harga }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <a href="/sepatu" class="btn btn-info">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
