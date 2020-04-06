@extends('layouts.app')

@section('title', $category->title . " - Laravel-Blog")

@section('content')
    <div class="container">
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

                    <input type="hidden" name="category_id" value="{{ $category->id }}" />

                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Добавить коментарий" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
