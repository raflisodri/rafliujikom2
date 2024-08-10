@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Data User</h3>
                            </div>
                            <div class="card-body">
                                <form action="/user/update/{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Foto dan Preview Image -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Foto</label>
                                            <input type="file" name="foto" id="image" class="form-control"
                                                onchange="previewImage()">
                                            <img class="img-preview img-fluid mt-2" alt="Preview"
                                                style="width:200px; max-height:200px; object-fit:cover;"
                                                src="{{ asset('foto/' . $user->foto) }}">
                                        </div>
                                    </div>

                                    <!-- Nama dan Username -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <div class="alert alert-danger alert-dismisible fade show" role="alert"
                                                    data-dismiss="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                value="{{ old('username', $user->username) }}">
                                            @error('username')
                                                <div class="alert alert-danger alert-dismisible fade show" role="alert"
                                                    data-dismiss="alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Password dan Level -->
                                    <div class="row mb-3 align-items-center">
                                        <!-- Password Field -->
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="password" class="form-control"
                                                    placeholder="" aria-describedby="helpId" style="border-radius: 0;">
                                                <span class="input-group-text" style="border-radius: 0;">
                                                    <i id="togglePassword" class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger alert-dismisible fade show" role="alert"
                                                    data-dismiss="alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Level Field -->
                                        <div class="col-md-6">
                                            <label for="level" class="form-label">Level</label>
                                            <select name="level" id="level" class="form-control"
                                                style="border-radius: 0;">
                                                <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="kasir" {{ $user->level == 'kasir' ? 'selected' : '' }}>Kasir
                                                </option>
                                            </select>
                                            @error('level')
                                                <div class="alert alert-danger alert-dismisible fade show" role="alert"
                                                    data-dismiss="alert">{{ $message }}</div>
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
        // Script untuk preview image
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            const fileReader = new FileReader();
            fileReader.readAsDataURL(image.files[0]);

            fileReader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        // Script untuk toggle password visibility
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endsection
