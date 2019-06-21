@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Создание роли @endslot
        @slot('parent') Главная @endslot
        @slot('active') Роли @endslot
        @endcomponent

        <hr>

        <form class="form-horizontal" action="{{route('admin.user_managment.role.store')}}" method="post">
            {{csrf_field()}}

            {{--Form include--}}
            @include('admin.user_managment.roles.partials.form')
        </form>

    </div>

@endsection