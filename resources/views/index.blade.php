
@extends('template')

@section('content')

@if (session()->has('info'))

    <div class="alert alert-success">
        {{session('info')}}
    </div>    
@endif

<div class="card">
    <div class="card-header">
        <div class="float-left">
            <h2>List Of Projects </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('projects.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
            </a>
        </div>
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
