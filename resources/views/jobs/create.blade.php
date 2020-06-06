@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Job</div>

                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form action="{{route('jobs.store')}}" method="post">
                            @csrf
                           <div class="form-group">
                               <label>Title</label>
                               <input type="text" class="form-control" name="title">
                           </div>
                            @if($errors->has('title'))
                                <div class="error" style="color: red">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Roles</label>
                                <input type="text" class="form-control" name="roles">
                            </div>
                            @if($errors->has('roles'))
                                <div class="error" style="color: red">
                                    {{$errors->first('roles')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">

                                </textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control">
                            </div>
                            @if($errors->has('position'))
                                <div class="error" style="color: red">
                                    {{$errors->first('position')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control"></textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="fullTime">Full Time</option>
                                    <option value="partTime">Part Time</option>
                                    <option value="Casual">Casual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option >Live</option>
                                    <option>Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Job Deadline</label>
                                <input name="last_date" class="form-control" type="date" >

                            </div>
                            @if($errors->has('last_date'))
                                <div class="error" style="color: red">
                                    {{$errors->first('last_date')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

