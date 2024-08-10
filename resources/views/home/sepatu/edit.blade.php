@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Data Sepatu</h3>
                            </div>
                            <div class="card-body">
                                <form action="/sepatu/update/{{ $sepatu->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6 text-center">
                                            <img class="img-preview img-fluid" alt="preview"
                                                src="{{ asset('foto/' . $sepatu->foto) }}"
                                                style="border: 1px solid #ddd; width: 200px; height: 200px; object-fit: contain;">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Foto</label>
                                            <!-- Input hidden untuk menyimpan nama file jika tidak ada perubahan -->
                                            <input type="hidden" name="old_foto" value="{{ $sepatu->foto }}">
                                            <input type="file" name="foto" id="image" class="form-control"
                                                onchange="previewImage()">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="suplier" class="form-label">Suplier</label>
                                            <select name="id_suplier" id="suplier" class="form-control">
                                                <option value="#">--PILIH SATU--</option>
                                                @foreach ($suplier as $s)
                                                    <option value="{{ $s->id }}"
                                                        {{ $s->id == $sepatu->id_suplier ? 'selected' : '' }}>
                                                        {{ $s->nama }} - {{ $s->nama_perusahaan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                value="{{ old('nama', $sepatu->nama) }}">
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="merk" class="form-label">Merk</label>
                                            <input type="text" name="merk" id="merk" class="form-control"
                                                value="{{ old('merk', $sepatu->merk) }}">
                                            @error('merk')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis" class="form-label">Jenis</label>
                                            <input type="text" name="jenis" id="jenis" class="form-control"
                                                value="{{ old('jenis', $sepatu->jenis) }}">
                                            @error('jenis')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="number" name="stok" id="stok" class="form-control"
                                                value="{{ old('stok', $sepatu->stok) }}">
                                            @error('stok')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ukuran" class="form-label">Ukuran</label>
                                            <input type="number" name="ukuran" id="ukuran" class="form-control"
                                                value="{{ old('ukuran', $sepatu->ukuran) }}">
                                            @error('ukuran')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="warna" class="form-label">Warna</label>
                                            <input type="text" name="warna" id="warna" class="form-control"
                                                value="{{ old('warna', $sepatu->warna) }}">
                                            @error('warna')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="text" name="harga" id="harga" class="form-control"
                                                value="{{ old('harga', number_format($sepatu->harga, 0, ',', '.')) }}"
                                                oninput="formatRupiah(this)">
                                            @error('harga')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info">Update</button>
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

        function formatRupiah(element) {
            let value = element.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            element.value = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }
    </script>
@endsection
