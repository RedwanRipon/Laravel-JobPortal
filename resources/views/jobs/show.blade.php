@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>
                    <div class="card-body">
                        <p>
                            <h3>Description</h3>
                        {{$job->description}}
                        </p>
                        <p>
                        <h3>Responsibilities</h3>
                        {{$job->roles}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>
                    <div class="card-body">
                        <p>Company: <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">
                                {{$job->company->cname}}
                            </a></p>
                        <p>Address: {{$job->address}}</p>
                        <p>Position: {{$job->position}}</p>
                        <p>Date: {{$job->last_date}}</p>
                    </div>
                    @if(Auth::user()->user_type=='seeker')
                        @if(!$job->checkApplication())
                        <form action="{{route('jobs.apply',[$job->id])}}" method="post">
                            @csrf
                            <button class="btn btn-warning form-control" >Apply</button>
                        </form>
                            @else
                            <h5 class="pl-2" style="background-color: #1d643b;color: #d6d8db">Already Applied for this job.</h5>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

