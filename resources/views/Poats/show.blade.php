@extends('Poats.layout')
@section('mansour')
<h3 style="    font-family: 'Cairo', sans-serif;" class="pb-4 mb-4  border-bottom">
  صفحة المقالات
</h3>
@endsection
@section('content')

<div class="blog-post">
  <h2 style="    font-family: 'Cairo', sans-serif;" class="blog-post-title"> {{ $post->title}} </h2>
  <?php $post->created_at = strtotime('created_at');?>
  <p class="blog-post-meta">{{ date('Y-m-d')}} <a href="#"> User : {{ $post->user->name}} </a></p>
  <a href="{{ route('posts.edit' ,($post->id))}}">Edit Post </a>
  <p>
    {{ $post->body}} 
 
  </p>
  
</div>
<!-- /.blog-post -->
  @if (!$post->comments)
    <li class="list-group-item">لايوجد تعليقات</li>
  @else
    <ul class="list-group">
      @foreach ($post->comments  as $comment)
  
        <li class="list-group-item my-3">  <strong>{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</strong>
          {{$comment->comment}}</li>
      @endforeach
    </ul>
  @endif
@endsection

@section('footer')
<footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
      <a href="#">Back to top</a>
    </p>
  </footer>
@endsection