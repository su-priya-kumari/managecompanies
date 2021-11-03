@extends('admin.base')
@section('content')
<div class="container rounded-0" style="background-image:url('{{asset('picture1.jpeg')}}');height:900px;background-size:cover">
    <div class="row">
        <div class="col-lg-4 mt-5">
            @if(Session::has('message')) 
                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @endif
            <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="form-group mb-3">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}">
                    @error('first_name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}">
                    @error('last_name') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Company</label>
                    <select type="" name="company" class="form-control" value="{{old('company')}}">
                        <option selected disabled value="">Select Company Name</option>           
                        
                         @foreach ($c_data as $comp)
                        <option value="{{$comp->id}}" >{{$comp->name}}</option>
                        @endforeach

                         {{-- @foreach (\App\Http\Controllers\EmployeesController::fetch() as $comp)
                        <option value="{{$comp->id}}">{{$comp->name}}</option>
                        @endforeach --}}
                    </select>
                    @error('company') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}">
                    @error('email') <p class="text-danger">{{$message}}</p> @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                    @error('phone') <p class="text-danger">{{$message}}</p> @enderror
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </thead>
                @foreach ($records as $record)
                    <tbody>
                        <td>{{$record->id}}</td>
                        <td>{{$record->first_name}}</td>
                        <td>{{$record->last_name}}</td>
                        <td>{{$record->company}}</td>
                        <td>{{$record->email}}</td>
                        <td>{{$record->phone}}</td>
                        <td>
                            <a href="{{route('employees.edit',['employee'=>$record->id])}}" class="btn btn-secondary">Edit</a>
                            <form action="{{route('employees.destroy',['employee'=>$record->id])}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" class="btn btn-danger">
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
