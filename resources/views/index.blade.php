
@extends('template')

@section('content')

@if (session()->has('info'))

    <div class="alert alert-success">
        {{session('info')}}
    </div>    
@endif


<div class="card">
    <div class="card-header">
        
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
        <form  action = "{{route('projects.index')}}" class="form-inline float-center" method="GET">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="term">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <h1 style="text-align: center">List of projects</h1>
    </div>
    <div class="card-content">
    <table class="table table-hover table-responsive-lg">
        <thead>
            <tr>
            <th>No</th>
            <th>Project</th>
            <th>Customer</th>
            <th>Cost ($)</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)

            <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->name}}</td>
            <td>{{$project->customer}}</td>
            <td>{{$project->cost}}</td>
            <td>
                <a href="{{route('projects.show',$project->id)}}">
                 <i class="fas fa-eye text-success  fa-lg"></i>
                </a>
            </td>
            <td>
                <a href="{{ route('projects.edit', $project->id) }}">
                    <i class="fas fa-edit  fa-lg"></i>
                </a>
            </td>
            <td>
                <form action="{{route('projects.destroy',$project->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" title="delete" style="border: none; background-color:transparent">
                    <i class="fas fa-trash fa-lg text-danger"></i>

                </button>
                </form>
            </td>
            </tr>
            
        @endforeach
    </tbody>

</table>
</div>
</div>
@endsection
