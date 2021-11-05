@extends('admin.base')
@section('content')
<div class="container rounded-0" style="background-image:url('{{asset('picture1.jpeg')}}');height:900px;background-size:cover">
    <div class="row">
        <div class="col-lg-4 mt-5">
            @if(Session::has('message')) 
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Logo</label>
                    <input type="file" name="logo" class="form-control" value="{{old('logo')}}">
                    @error('logo') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control" value="{{old('website')}}">
                    @error('website') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group d-grid gap-2">
                    <input type="submit" class="btn btn-dark">
                </div>
            </form>
        </div>

        <div class="col-lg-8 mt-5">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>website</th>
                    <th>Action</th>
                </thead>
                @foreach ($records as $record)
                    <tbody>
                        <td>{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td><img src="{{asset('images/'.$record->logo)}}" alt="" width="120px" class="mx-auto"></td>
                        <td>{{$record->website}}</td>
                        <td>
                            <a href="{{route('companies.edit',['company'=>$record->id])}}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{route('companies.destroy',['company'=>$record->id])}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                            </form>
                        </td>
                    </tbody>
                @endforeach
            </table>
            <div class="row">
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
