@extends('authenticat.layout.header')
@section('container')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
@endif
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <h2 class="fs-2 text-center">Forgot Password</h2>
        <div class="border p-5 mt-4 rounded">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="formGroupExampleInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email"
                    id="formGroupExampleInput1" placeholder="Email" required>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
