@foreach ($categories as $category)
  <option value="{{$category->id ?? ""}}"
    @isset($article->id)
      @foreach ($article->categories as $category_article)
        @if ($category->id == $category_article->id)
          selected="selected"
        @endif
      @endforeach

    @endisset
    >
    {{$category->title ?? ""}}
  </option>
@endforeach
