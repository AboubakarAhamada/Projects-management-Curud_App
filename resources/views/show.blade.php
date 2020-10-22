@extends('template')

@section('content')

<br>
<div class="container">
<div class="card">
<div class="card-header">
<h3 class="card-hader-title">{{$project->name}}</h3>
</div>
<div class="card-content">
    <p> <strong>Customer :</strong> {{$project->customer}}</p>
    <p> <strong>Cost :</strong> ${{$project->cost}}</p>
    <p> <strong>Description:</strong> {{$project->description}}</p>
</div>
</div>
<br>
<a href="{{route('projects.index')}}" class="btn btn-primary">Back</a>

</div>
    
@endsection