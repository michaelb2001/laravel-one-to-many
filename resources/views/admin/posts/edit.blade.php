@extends('layouts.app')

@section('content')
<form action="{{route("admin.posts.update",$post->id)}}" method="post"
  enctype="multipart/form-data" class="d-flex flex-column m-5">

  @csrf
  @method("PUT")
      <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">title</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control" id="title" 
          value="{{old("title")??$post->title}}">
          @error("title")
              <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="content" class="col-sm-2 col-form-label">content</label>
        <div class="col-sm-10">
          <textarea name="content" type="text" class="form-control">{{old("content")??$post->content}}</textarea>
          @error("content")
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="form-group row">
          <label for="img" class="col-sm-2 col-form-label">img</label>
          <div class="col-sm-10">
            <input name="img" type="file" class="form-control" value="{{old("img")??$post->img}}">
            @error("img")
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10 mt-3 ps-3">
              <select class="form-select @error("category_id") is-invalid @enderror" id="category" 
              name="category_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                      {{$category->id == old($category->id) ? 'selected' : ''}}>
                      {{$category->name}}
                    </option>
                @endforeach
          </select>
            </div>

        </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <a href="{{route('admin.posts.index')}}"><button type="submit" class="btn btn-warning rounded-pill ms-0 my-3"> add</button></a>
        </div>
      </div>

</form>

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
@endsection