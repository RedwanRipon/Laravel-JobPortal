
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">
                @if(empty(Auth::user()->company->cover_photo))
                    <img style="border-radius: 50px;width: 100%;margin-bottom: 5px" width="80" height="190" src="{{asset('avatar/Logo.png')}}" alt="image">
                @else
                    <img style="border-radius: 50px;width: 100%;margin-bottom: 5px" width="100" height="500" src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" alt="image">
                @endif
            </div>
            <div class="company-desc"><br>
                @if(empty(Auth::user()->company->logo))
                    <img style="border-radius: 50px;width: 100%;margin-bottom: 5px" width="80" height="190" src="{{asset('avatar/Logo.png')}}" alt="image">
                @else
                    <img width="150" height="190" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" alt="image">
                @endif
                <h1>{{$company->cname}}</h1>

                <p>Description-{{$company->description}}</p>
                <p>Slogan-{{$company->slogan}} &nbsp; Phone-{{$company->phone}} </p>
                <p>Address-{{$company->address}} &nbsp; Website-{{$company->website}}</p>
            </div>
        </div>
        <table class="table">
            <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            @foreach($company->jobs as $job)
                <tr>
                    <td>
                        <img src="{{asset('avatar/Logo.png')}}" alt="image" width="80">
                    </td>
                    <td>
                        Position: {{$job->position}}
                        <br>
                        {{$job->type}}
                    </td>
                    <td>
                        Address: {{$job->address}}
                    </td>
                    <td>
                        Date: {{$job->created_at->diffForHumans()}}
                    </td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">Apply</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>
@endsection
