@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{(isset($post))? 'Edit Post' : 'Create Post'  }}
            
        </div>
        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ isset($post)?$post->title:'' }}">
                </div>

                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea name="body" id="" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->body : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
                    <trix-editor input="content"></trix-editor>
                </div>
                @if(isset($post))
                <div class="form-group">
                    <img src="{{ asset($post->image)}}" width= '100%' height='50%'>
                </div>
                @endif
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                @if(isset($post))
                                    @if($category->id == $post->category_id)
                                        selected
                                    @endif
                                @endif
                               
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if($tags->count() > 0)
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"
                                   @if(isset($post))
                                    @if($post->hasTag($tag->id))
                                            selected
                                    @endif
                                   @endif
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        {{(isset($post))? 'Edit Post' : 'Create Post'  }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tags-selector').select2();
        })
    </script>
    

@endsection

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection