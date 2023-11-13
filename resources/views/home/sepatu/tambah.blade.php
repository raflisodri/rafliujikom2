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
                                    <img class="img-preview img-fluid" alt="preview" style="width: 200px">
                                <div class="mb-3">
                                    <br><br>
                                    <label for="" class="form-label">foto</label>
                                    <input type="file" name="foto" id="image" class="form-control" placeholder="" aria-describedby="helpId" onchange="previewImage()" >
                                  </div>
                                {{-- <div class="mb-3">
                                  <label for="" class="form-label">Suplier</label>
                                  <input type="text" name="id_suplier" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                  @error('id_suplier')
                                      <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                  @enderror
                                </div> --}}
                                <div class="mb-3">
                                  <label for="" class="form-label">Suplier</label>
                                    <select name="id_suplier" id="" class="form-control">
                                        <option value="#">--PILIH SATU--</option>
                                        @foreach ($suplier as $suplier)
                                            <option value="{{$suplier->id}}">{{$suplier->nama}} - {{$suplier->nama_perusahaan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="nama" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('nama')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Merk</label>
                                    <input type="text" name="merk" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('merk')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Jenis</label>
                                    <input type="text" name="jenis" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('jenis')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Stok</label>
                                    <input type="number" name="stok" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('stok')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Ukuran</label>
                                    <input type="number" name="ukuran" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('ukuran')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Warna</label>
                                    <input type="text" name="warna" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('warna')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Harga</label>
                                    <input type="text" name="harga" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('harga')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
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
            const image = document.querySelector('#image'); // perbaiki querySelector
            const imgPreview = document.querySelector('.img-preview'); // perbaiki querySelector
        
            imgPreview.style.display = 'block';
        
            const fileReader = new FileReader(); // perbaiki penulisan FileReader
            fileReader.readAsDataURL(image.files[0]); // perbaiki penulisan readAsDataURL
        
            fileReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
        </script>
        

@endsection