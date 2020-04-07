@extends('blog.loyouts.app_admin')

@section('content')

<div class="container">

  @component('blog.components.breadcrumb')
    @slot('title') Список постов @endslot
    @slot('home') Главная @endslot
    @slot('active') Посты @endslot
  @endcomponent
  <hr>

  <a href="{{route('article.create')}}" class="btn btn-primary pull-right"><i class="fafa-plus-square-o">Создать пост</i></a>
  <table class="table table-striped">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($articles as $article)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->published}}</td>
          <td>
            <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" action="{{route('article.destroy', $article)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}

              <a href="{{route('article.edit', $article)}}"><i class="fa fa-edit"></i></a>
              <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="text-center">Данние отсуствуют</td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <td colspan="3">
        <ul class="pagination pull-right">
          {{$articles->links()}}
        </ul>
      </td>
    </tfoot>

  </table>
</div>

@endsection
