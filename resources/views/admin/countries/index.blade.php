@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')

        @slot('title') Список стран @endslot
        @slot('parent') Гравная @endslot
        @slot('active') Страны @endslot

        @endcomponent

        <hr>

        <a href="{{route('admin.country.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i>Создать страну
        </a>

        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Количество комментариев</th>
            <th>Действие</th>
            </thead>
            <tbody>

            @forelse ($countries as $country)
                <tr>
                    <td><a href="{{route('admin.country.show', $country)}}">{{$country->name}}</a></td>
                    <td>
                        @isset($country->comments)
                        {{$country->comments->count()}}
                        @endisset
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('удалить')){return true}else{return false}" action="{{route('admin.country.destroy', $country)}}"
                              method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}

                            <a href="{{route('admin.country.edit', $country)}}" class="btn btn-default">
                                <i class="fa fa-edit"></i>
                            </a>

                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <h2>Данные отсутствуют</h2>
                    </td>
                </tr>
            @endforelse

            </tbody>
            <tfoot>
            <td colspan="3">
                <ul class="pagination pull-right">
                    {{$countries->links()}}
                </ul>
            </td>
            </tfoot>
        </table>

    </div>
@endsection