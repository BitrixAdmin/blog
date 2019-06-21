<label for="">Статус</label>
<select class="form-control" name="published">
    @if(isset($article->id))
        <option value="0" @if ($article->published == 0) selected="" @endif>
            Не опубликовано
        </option>
        <option value="1" @if ($article->published == 1) selected="" @endif>
            Опубликовано
        </option>
    @else
        <option value="0"> Не опубликовано</option>
        <option value="1"> Опубликовано</option>
    @endif
</select>

<label for="">Наименование новости</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок новости"
       value="{{$article->title or ""}}" required>

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="автоматическая генерация"
       value="{{$article->slug or ""}}" readonly="">

<label for="">Родительская категория</label>
<select class="form-control" name="categories[]" multiple="">
    @include('admin.articles.partials.categories', ['categories'=>$categories])
</select>

<label for="">Краткое описание</label>
<textarea class="form-control" id="description_short" name="description_short">
    {{$article->description_short or ""}}
</textarea>

<label for="">Полное описание</label>
<textarea class="form-control" id="description" name="description">
    {{$article->description or ""}}
</textarea>

<label for="">Title</label>
<input type="text" class="form-control" name="meta_title" placeholder="title" value="{{$article->meta_title or ""}}">


<label for="">Страна</label>

<select class="form-control" name="country_id">
@foreach($countries as $country)
        <option value="{{$country->id or ""}}"
                @isset($article->id)

                @if ($country->id == $article->country_id)
                selected="selected"
                @endif

                @endisset
        >
            {{$country->name or ""}}
        </option>
    @endforeach
</select>
<hr/>
<input class="btn btn-primary" type="submit" value="Сохранить">