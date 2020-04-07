@extends('blog.loyouts.app_admin')

@section('content')
    <div class="container">

        @component('blog.components.breadcrumb')
            @slot('title') Редактирование новости @endslot
            @slot('home') Главная @endslot
            @slot('active') Пост @endslot
        @endcomponent
        <hr/>
        <form class="form-horizontal" action="{{route('article.update', $article)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('blog.articles.partials.form')
        </form>
    </div>
@endsection
