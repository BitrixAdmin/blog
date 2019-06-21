@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <a href="{{route('admin.user_managment.role.index')}}" class="btn btn-primary">Назад</a>
        <hr>
        <ul>
            <li>Наименование: {{$role->name or ''}}</li>
            <li>Слаг: {{$role->slug or ''}}</li>
            <li>пользоаватели: {{$role->users()->pluck('name')->implode(', ')}}</li>
        </ul>
    </div>
@endsection