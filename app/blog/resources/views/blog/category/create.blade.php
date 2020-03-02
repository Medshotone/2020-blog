@extends('blog.loyouts.app_admin')

@section('content')
    <div class="container">
        @component('blog.components.breadcrumb')
            @slot('title') Создание категорий @endslot
            @slot('home') Главная @endslot
            @slot('parent') Панель Состояния@endslot
            @slot('active') Категории @endslot
        @endcomponent

        <hr/>

        <form class="form-horizontal" action="{{route('category.store')}}" method="post">

            {{ csrf_field() }}

            @include('blog.category.partials.form')
        </form>
    </div>
@endsection
