<label for="">Заголовок</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости" value="{{$article->title ?? ""}}" required>

<label for="">В каких категориях состоит пост</label>
<select class="form-control" name="categories[]" multiple>
  @include('blog.articles.partials.categories', ['article' => $article])
</select>

<label for="">Контент</label>
<textarea class="form-control" id="description" name="content" required>{{ $article->content ?? "" }}</textarea>

<label for="fileUpload">Файл: не больше 2 мб</label>
<input onchange="" data-max-size="2049" class="form-control" type="file" id="file" name="fileUpload" value="">

@if(!empty($article->file))
    <a download href="/{{ $article->file }}">{{ $article->file }}</a>
@endif

<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">
