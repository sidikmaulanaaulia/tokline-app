
@extends('authenticat.layout.header')

@section('container')
<form action="" method="post">
    @csrf
    @if (session('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session('error') }}
    </div>
    </div>
    @endif
  <section class="vh-100">
   <div class="container py-5 h-100">
     <div class="row d-flex align-items-center justify-content-center h-100">
       <div class="col-md-8 col-lg-7 col-xl-6 ">
           <h1 class="text-center fw-bold">TOKLINE SHOP</h1>
         <div class="d-flex justify-content-center">
         <img src="assets/images/shopping-cart.png"
         class="img-fluid" width="250" height="380" alt="Phone image">
         </div>
       </div>
       <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

           <!-- Email input -->
           <div class="form-outline mb-4">
             <input type="text" name="email" id="form1Example13" class="form-control form-control-lg" required />
             <label class="form-label" for="form1Example13">Email </label>
           </div>

           <!-- Password input -->
           <div class="form-outline mb-4">
             <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" required />
             <label class="form-label" for="form1Example23">Password</label>
           </div>

           <div class="form-outline mb-4">
             <input type="password" name="confirm_password" id="form1Example23" class="form-control form-control-lg" required />
             <label class="form-label" for="form1Example23">Confirm Password</label>
           </div>
           <!-- Submit button -->
           <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Register</button>
           <button  class="btn btn-outline-success btn-lg btn-block" name="submit"><a class="text-black text-decoration-none" href="/login">Login</a></button>

       </div>
     </div>
   </div>
 </section>
  </form>


@endsection
