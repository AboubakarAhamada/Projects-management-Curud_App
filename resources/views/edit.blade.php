@extends('template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<form action="{{route('projects.update',$project->id)}}" method="POST">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="label">Project name</label>
        <input type="text" class="form-control" name="name" value="{{$project->name}}">
    </div>
    <div class="form-group">
        <label class="label">Customer</label>
        <input type="text" class="form-control" name="customer" value="{{$project->customer}}">
    </div>
    <div class="form-group">
        <label class="label">Cost</label>
        <input type="number" class="form-control" name="cost" value="{{$project->cost}}">
    </div>
    <div class="form-group">
        <label class="label">Description</label>
        <textarea class="form-control" name="description">{{$project->description}}</textarea>
    </div>
    <a href="{{route('projects.index')}}" class="btn btn-secondary">Cancel</a>
    &nbsp; &nbsp;
    <button type="submit" class="btn btn-primary">Save</button>

</form>
    
@endsection