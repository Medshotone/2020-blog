@extends('layouts.app')

@section('title', $article->title . " - Laravel-Blog")

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1>{{ $article->title }}</h1>
      <p>{!!$article->content!!}</p>
    </div>
    <div class="col-sm-12">
      <h4>Коментарии</h4>
      <div data-url="{{ route("comment.article.show", ["article" => "{$article->id}"]) }}" id="comments">No comments</div>
      <hr />
      <h4>Добавить коментарий</h4>
      <form id="add-comment" method="post" action="{{route('comment.article.store')}}">
        @csrf
        <div class="form-group">
          <input type="text" name="author" class="form-control" placeholder="ФИО" />
        </div>
        <div class="form-group">
          <input type="text" name="content" class="form-control" placeholder="Текст отзыва" />
        </div>

        <input type="hidden" name="parent_id" value="{{ $article->id }}" />

        <div class="form-group">
          <input type="submit" class="btn btn-warning" value="Добавить коментарий" />
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
