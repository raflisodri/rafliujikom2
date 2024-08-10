@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Tambah Data Sepatu</h3>
                            </div>
                            <div class="card-body">
                                <form action="/sepatu/simpan" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6 text-center">
                                            <img class="img-preview img-fluid" alt="preview"
                                                style="border: 1px solid #ddd; width: 200px; height: 200px; object-fit: contain;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Foto</label>
                                            <input type="file" name="foto" id="image" class="form-control"
                                                onchange="previewImage()">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="suplier" class="form-label">Suplier</label>
                                            <select name="id_suplier" id="suplier" class="form-control">
                                                <option value="#">--PILIH SATU--</option>
                                                @foreach ($suplier as $suplier)
                                                    <option value="{{ $suplier->id }}">{{ $suplier->nama }} -
                                                        {{ $suplier->nama_perusahaan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control">
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="merk" class="form-label">Merk</label>
                                            <input type="text" name="merk" id="merk" class="form-control">
                                            @error('merk')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis" class="form-label">Jenis</label>
                                            <input type="text" name="jenis" id="jenis" class="form-control">
                                            @error('jenis')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="number" name="stok" id="stok" class="form-control">
                                            @error('stok')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ukuran" class="form-label">Ukuran</label>
                                            <input type="number" name="ukuran" id="ukuran" class="form-control">
                                            @error('ukuran')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="warna" class="form-label">Warna</label>
                                            <input type="text" name="warna" id="warna" class="form-control">
                                            @error('warna')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" name="harga" id="harga" class="form-control">
                                            @error('harga')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
