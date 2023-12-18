@extends('layouts.session')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center fw-bold my-4">Registrasi</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('proses_register')}}" method="POST" id="regForm">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label class="small mb-1 fw-bold" for="floatingInput">Username</label>
                                <input class="form-control" id="floatingInput" name="username" type="text" placeholder="Masukkan Username" required/>
                                @if ($errors->has('username'))
                                    <span class="error"> * {{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <label for="FloatingJenisObat" class="small fw-bolder">Status</label>
                            <select name="level" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Status</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select> 
                            <div class="form-group mb-3 fw-bold">
                                <label class="small mb-1 fw-bold" for="floatingPassword">Password</label>
                                    <input class="form-control" id="floatingPassword" type="password" name="password" placeholder="Masukkan Password" required/>
                                @if ($errors->has('password'))
                                    <span class="error">* {{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mt-4 mb-0">
                                <button class="btn btn-primary btn-block w-100" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small" style="padding-top: 1rem">
                            <p>Sudah Punya Akun? <a href="/">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection