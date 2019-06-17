@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <a href="{{route('admin.user_managment.user.index')}}" class="btn btn-primary">
            Назад
        </a>
        <hr>
        <ul>
            <li>Animal: {{$animal->animal_name or ''}}</li>
            <li>User name: {{$animal->user->name or ''}}</li>
            <li>User email: {{ $animal->user->email or '' }}</li>
        </ul>
    </div>
@endsection