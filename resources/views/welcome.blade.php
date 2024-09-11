@extends('layout')

@section('title')
main Page
@endsection

@section('heading')
Registration Form
@endsection

@section('contains')
<div class="mt-3 row justify-content-center text-white">
    <form class="col-sm-6 mt-3"  action="{{route('crud.store')}}" method="POST">
        @csrf
        <div class="form-floating mb-3 ">            
            <input type="text" class="form-control bg-secondary @error('fullname')  is-invalid  @enderror  " name="fullname" value="{{old('fullname')}}" id="floatingInput" placeholder="enter Name">
            <label for="floatingInput">Full Name</label>
            @error('fullname')
            <span class="text-danger">{{$message}}</span>
            @enderror
           
          </div>
           <div class="form-floating mb-3 ">            
            <input type="email" value="{{old('email')}}" class="form-control bg-secondary @error('email')  is-invalid  @enderror  " name='email' id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-floating  mb-3">
            <input type="text" class="form-control bg-secondary @error('city')  is-invalid  @enderror " name="city" value="{{old('city')}}" id="floatingPassword" placeholder="city Name">
            <label for="floatingPassword">city</label>
            @error('city')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-floating  mb-3">
            <input type="text" value="{{old('age')}}" class="form-control bg-secondary @error('age')  is-invalid  @enderror " name="age" id="floatingPassword" placeholder="Enter Age">
            <label for="floatingPassword">Age</label>
            @error('age')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-floating  mb-3">
            <input type="password" class="form-control bg-secondary @error('password')  is-invalid  @enderror " name="password" value="{{old('password')}}" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary btn-md ">Submit</button>
          </div>
    </form>
</div>
   
@endsection