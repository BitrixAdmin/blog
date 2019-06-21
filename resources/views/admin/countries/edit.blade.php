@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Редактирование страны @endslot
        @slot('parent') Главная @endslot
        @slot('active') Страна @endslot
        @endcomponent

        <hr />

        <form class="form-horizontal" action="{{route('admin.country.update', $country)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.countries.partials.form')
        </form>
    </div>

@endsection