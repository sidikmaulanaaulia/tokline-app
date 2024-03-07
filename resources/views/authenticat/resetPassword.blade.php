@extends('authenticat.layout.header')
@section('container')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <h2 class="fs-2 text-center">Update Password</h2>
        <div class="border p-5 mt-4 rounded">
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ request()->token }}">
                <div class="mb-3">
                    <label for="formGroupExampleInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email"
                    id="formGroupExampleInput1" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"
                    id="formGroupExampleInput1" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput1" class="form-label">Password Confirmasi</label>
                    <input type="password" class="form-control" name="password_confirmation"
                    id="formGroupExampleInput1"  required>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


@endsection
