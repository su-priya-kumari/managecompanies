@extends('admin.base')
@section('content')
<div class="container rounded-0" style="background-image:url('{{asset('picture1.jpeg')}}');height:1400px;background-size:cover">
    <div class="row">
        <div class="col-lg-7 mt-5 mx-auto">
            @if(Session::has('message')) 
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('companies.update',['company'=>$records->id])}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('put')
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$records->name}}">
                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$records->email}}">
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="mb-3">
                    <label for="">Logo</label>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{asset('images/'.$records->logo)}}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control" value="{{$records->website}}">
                    @error('website') <p class="text-danger">{{$message}}</p> @enderror 
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" value="Updated" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection