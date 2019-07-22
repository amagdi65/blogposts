@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">{{ isset($tag) ? 'Edit tag' : 'Create tag' }}</div>
        <div class="card-body">
        @include('partials.errors')
            <form action= "{{ isset($tag)? route('tags.update',$tag->id): route('tags.store') }}" method="POST">
            @csrf
            @if(isset($tag))
                @method('PUT')    
            @endif
            
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name='name' value="{{ isset($tag) ? $tag->name : null }}" >
                </div>
                <div class="form-group">
                    <input type="submit" value="{{ isset($tag) ? 'Edit tag' : 'Create tag' }}" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection

