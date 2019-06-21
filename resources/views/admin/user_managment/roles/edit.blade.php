@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Редактирование роли @endslot
        @slot('parent') Главная @endslot
        @slot('active') роль @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.user_managment.role.update', $role)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.user_managment.roles.partials.form')

        </form>
    </div>

@endsection