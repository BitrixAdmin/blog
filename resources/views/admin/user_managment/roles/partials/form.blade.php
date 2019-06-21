@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя"
       value="@if(old('name')){{old('name')}}@else{{$role->name or ""}}@endif" required>


<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="slug"
       value="@if(old('slug')){{old('slug')}}@else{{$role->slug or ""}}@endif" required>






<hr/>
<input class="btn btn-primary" type="submit" value="Сохранить">