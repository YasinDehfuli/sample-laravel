@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            User
        </h1>
        @include('component.err')
        <form
            enctype="multipart/form-data"
            class="" method="post"
              @if(isset($post))
              action="{{route('post.update',$post->slug)}}"
              @else
              action="{{route('post.store')}}"
            @endif>
            @csrf

            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="title">
                            {{__('Title')}}
                        </label>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{__('Title')}}" value="{{old('title',$post->title??null)}}"  />
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="form-group">
                        <label for="body">
                            {{__('Text')}}
                        </label>


{{--                        <div id="quill_editor"></div>--}}
{{--                        <input type="hidden" id="quill_html" name="body">--}}
                        <textarea rows="10" name="body" class="form-control @error('body') is-invalid @enderror" placeholder="{{__('Text')}}"  >{{old('body',$post->body??null)}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="cat">
                            {{__('Category')}}
                        </label>
                        <select name="category_id" id="cat" class="form-control @error('category_id') is-invalid @enderror"   >
                            @foreach($cats as $cat )
                                <option value="{{ $cat->id }}"  @if (old('category_id',$post->category_id??null) == $cat->id ) selected @endif > {{$cat->title}} </option>
                            @endforeach
                        </select>			 </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label for="img">
                            {{__('Image')}}
                        </label>
                        <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" placeholder="{{__('Image')}}" value="{{old('img',$post->img??null)}}"  />
                    </div>
                </div>
                <div class="col-md-12">
                    <label> &nbsp; </label>
                    <input name="" type="submit" class="btn btn-primary mt-2" value="{{__('Save')}}"   />
                </div>
            </div>
        </form>
    </div>

@endsection
