@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</div>
        <div class="card-body">
            @include('partials.errors')
            <form action= "{{ isset($category)? route('categories.update',$category->id): route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')    
            @endif
            
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name='name' value="{{ isset($category) ? $category->name : null }}" >
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ isset($category) ? 'Edit Category' : 'Create Category' }}" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection

