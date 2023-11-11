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
                                <form action="/user/update/{{$user->id}}" method="post">
                                @csrf
                                <div class="mb-3">
                                  <label for="" class="form-label">Name</label>
                                  <input type="text" value="{{$user->name}}" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                  @error('name')
                                      <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" value="{{$user->username}}" name="username" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('username')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" value="{{$user->password}}" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    @error('password')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="" class="form-label">level</label>
                                  <select name="level" id="" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option> 
                                    @error('level')
                                        <div class="alert alert-danger alert-dismisible fade show" role="alert" data-dismiss="alert">{{$message}}</div>
                                    @enderror
                                </select>
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

@endsection