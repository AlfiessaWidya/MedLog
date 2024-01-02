@extends('layouts.session')

@section('content')
<div class="container-md">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-4">
                        <div class="card-header">                           
                            <h3 class="text-center fw-bold my-4">Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('proses_login')}}" method="POST" id="logForm">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label class="small mb-1 fw-bold" for="floatingInput">Username</label>
                                    <input class="form-control" id="floatingInput" name="username" type="text" placeholder="Masukkan Username" required/>
                                    
                                </div>
                                <div class="form-group mb-3">
                                    <label class="small mb-1 fw-bold" for="floatingPassword">Password</label>
                                    <input class="form-control" id="floatingPassword" type="password" name="password" placeholder="Masukkan Password" required/>
                                    <div class="form-text text-danger fw-light" id="basic-addon4">Password maksimal 8 karakter</div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
                                        <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn w-100 btn-primary btn-block btn-login" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small" style="padding-top: 1rem">
                                <p>Belum Punya Akun? <a href="{{route('register')}}">Registrasi</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection