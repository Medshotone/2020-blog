@extends('blog.loyouts.app_admin')

@section('content')
    <div class="container">

        @component('blog.components.breadcrumb')
            @slot('title') Создание постов @endslot
            @slot('home') Главная @endslot
            @slot('active') Посты @endslot
        @endcomponent
        <hr/>
        <form class="form-horizontal" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- Form include --}}
            @include('blog.articles.partials.form')
        </form>
    </div>
@endsection
