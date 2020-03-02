@extends('layouts.app')

@section('title', $category->title . " - Laravel-Blog")

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <h4>Add comment</h4>

                <form id="add-comment" method="post" action="">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="user_name" class="form-control" placeholder="ФИО"/>
                    </div>

                    <div class="form-group">
                        <input type="text" name="body" class="form-control" placeholder="Текст отзыва"/>
                    </div>

                    <input type="hidden" name="category_id" value="{{ $category->id }}"/>

                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Add Comment"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
