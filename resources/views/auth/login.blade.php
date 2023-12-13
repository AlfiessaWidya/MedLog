@extends('layouts.app')

@section('content')
<div class="container-md">
    <div class="row g-3" style="margin-top: 2rem">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-title text-center" style="margin-top: 2rem">
                    <p class="fs-2 fw-bolder">Login</p>
                </div>
                <div class="card-body" style="margin-bottom: 2rem">

                    <form method="" action="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @csrf
                        <label for="FloatingUsername" class="form-label fw-bolder">Username</label>
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control" id="FloatingUsername" placeholder="name@example.com">
                            <label for="floatingInput">Masukkan Username</label>
                        </div>
                        <label for="floatingPassword" class="form-label fw-bolder">Password</label>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Masukkan Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection