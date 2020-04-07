@extends('layouts.app')

@section('title', $category->title . " - Laravel-Blog")

@section('content')
    <div class="container">
        @forelse ($category->articles as $article)
            <div class="list-group-item">
                <h2><a href="{{ route('article', $article->id) }}">{{ $article->title }}</a></h2>
            </div>
        @empty
            <h2 class="text-center">Пусто</h2>
        @endforelse

        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <h4>Коментарии</h4>
                <div data-url="{{ route("comment.category.show", ["category" => "{$category->id}"]) }}" id="comments">No comments</div>
                <hr />
                <h4>Добавить коментарий</h4>
                <form id="add-comment" method="post" action="{{route('comment.category.store')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="author" class="form-control" placeholder="ФИО" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="content" class="form-control" placeholder="Текст отзыва" />
                    </div>

                    <input type="hidden" name="parent_id" value="{{ $category->id }}" />

                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Добавить коментарий" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
