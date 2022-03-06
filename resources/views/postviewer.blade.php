@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    @foreach($data as $d)
    @foreach ($d->posts as $post)
    <div class="col-md-6">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div class="">{{ __('Post') }}</div>
          <div class="">
            
          </div>
        </div>


        <div class="card-body">
          <div>{{ $post->title }}</div>
          <div>{{ $post->description }}</div>
          <div>{{ $post->image }}</div>
          <hr>
          <div>Comments: </div>
          <div>
            @foreach($post->comments as $comment)

            <div>{{ $comment->comment }}</div>

            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endforeach
  </div>
</div>






@endsection

@section('script')

@endsection