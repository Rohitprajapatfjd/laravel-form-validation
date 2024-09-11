@extends('layout')
@section('title')
    Index Page
@endsection

@section('heading')
Wel Optimise Form with Validation  
@endsection

@section('contains')
 <div class="d-flex justify-content-center my-3">
    <a href="{{route('crud.create')}}" class="btn btn-success btn-md ">Add User</a>
 </div>
 @if (session('status'))
 <div class="row justify-content-center">
  <div class="col-5">
    <div class="alert alert-success" role="alert">
      {{session('status')}}
    </div>
  </div>
 </div>
 @elseif (session('delete'))
 <div class="row justify-content-center">
  <div class="col-5">
    <div class="alert alert-danger" role="alert">
      {{session('delete')}}
    </div>
  </div>
 </div>
 @endif
 
<div class="mt-3 row justify-content-center">
    <div  class="col-sm-8">
        <table class="table table-secondary table-striped table-hover">
            <thead>
                <tr>
                  <th scope="col">Sno</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">City</th>
                  <th scope="col">Age</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @forelse ( $data as $values )
                <tr>
                    <th scope="row">{{$values->id}}</th>
                    <td>{{$values->name}}</td>
                    <td>{{$values->email}}</td>
                    <td>{{$values->city}}</td>
                    <td>{{$values->age}}</td>                  
                    <td> <a href="{{route('crud.edit',$values->id)}}" class="btn btn-primary btn-sm ">Edit</a></td>                  
                    <td> <a href="{{route('deletes',$values->id)}}" class="btn btn-danger btn-sm ">Delete</a></td>
                  </tr>
                @empty
                    <h1>Do Data Found</h1>
                @endforelse
              
          </table>
          {{$data->links() }}
    </div>
    
<div>
    
@endsection