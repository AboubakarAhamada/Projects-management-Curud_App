@extends('template')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
        </div>
    </div>
</div>

<form action="{{route('projects.store')}}" method="POST">

    @csrf
    <div class="form-group">
        <label class="label">Project name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label class="label">Customer</label>
        <input type="text" class="form-control" name="customer" value="{{old('customer')}}">
    </div>
    <div class="form-group">
        <label class="label">Cost</label>
        <input type="number" class="form-control" name="cost" value="{{old('cost')}}">
    </div>
    <div class="form-group">
        <label class="label">Description</label>
        <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>

</form>
    
@endsection