<div class="form-group">
    <label for="">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Наименование категории" value="{{$category->title ?? ""}}" required>
</div>


<div class="form-group">
    <label for="">Описание</label>
    <textarea placeholder="Описание категории" name="description" class="form-control" rows="3">{{$category->description ?? ""}}</textarea>
</div>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
