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
       value="@if(old('name')){{old('name')}}@else{{$user->name or ""}}@endif" required>


<label for="">Email</label>
<input type="text" class="form-control" name="email" placeholder="Email"
       value="@if(old('email')){{old('email')}}@else{{$user->email or ""}}@endif" required>

<label for="">Пароль</label>
<input type="text" class="form-control" name="password">

<label for="">Подтверждение пароля</label>
<input type="text" class="form-control" name="password_confirmation">

<label for="">Животное</label>
<input type="text" class="form-control" name="animal_name" placeholder="Животное"
       value="{{$user->animal->animal_name or ''}}" required>

<div class="form-group">
    <label class="col-sm-2 control-label">Роли:</label>

    <div class="col-sm-10">
        @foreach($roles as $role)

            <input type="checkbox" name="roles[]" value="{{$role->id}}"
                   @isset($user->roles)
                   @if($user->roles->where('id',$role->id)->count())
                   checked="checked"
                    @endif
                    @endisset
            >
            <label class="">{{ucfirst($role->name)}}</label>
            <br>
        @endforeach
    </div>

</div>


<hr/>
<input class="btn btn-primary" type="submit" value="Сохранить">