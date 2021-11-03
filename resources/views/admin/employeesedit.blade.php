@extends('admin.base')
@section('content')
<div class="container rounded-0" style="background-image:url('{{asset('picture1.jpeg')}}');height:1400px;background-size:cover">
    <div class="row">
        <div class="col-lg-7 mt-5 mx-auto">
            @if(Session::has('message')) 
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('employees.update',['employee'=>$records->id])}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
                <div class="mb-3">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{$records->first_name}}">
                    @error('first_name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{$records->last_name}}">
                    @error('last_name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Company</label>
                    <input type="text" name="company" class="form-control" value="{{$records->company}}">
                    @error('company') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$records->email}}">
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$records->phone}}">
                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror 
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" value="Updated" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection