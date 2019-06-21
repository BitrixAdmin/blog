@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')

        @slot('title') Список Ролей @endslot
        @slot('parent') Главная @endslot
        @slot('active') Роли @endslot

        @endcomponent

        <hr>

        <a href="{{route('admin.user_managment.role.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i>Создать роль
        </a>
        <a href="{{route('admin.user_managment.user.index')}}">Пользователи</a>

        <table class="table table-striped">
            <thead>
            <th data-toggle="true">Наименование</th>
            <th data-toggle="true">слаг</th>
            <th data-toggle="true">Пользователи</th>
            <th class="text-right" data-sort-ignire="true">Действие</th>
            </thead>
            <tbody>

            @forelse ($roles as $role)
                <tr>
                    <td><a href="{{route('admin.user_managment.role.show',$role)}}">{{$role->name}}</a></td>
                    <td>{{$role->slug}}</td>
                    <td>{{$role->users()->pluck('name')->implode(', ')}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('удалить')){return true}else{return false}" action="{{route('admin.user_managment.role.destroy', $role)}}"
                              method="post">
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <a href="{{route('admin.user_managment.role.edit', $role)}}" class="btn btn-default">
                                <i class="fa fa-edit"></i>
                            </a>

                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h2>Данные отсутствуют</h2>
                    </td>
                </tr>
            @endforelse

            </tbody>
            <tfoot>
            <td colspan="4">
                <ul class="pagination pull-right">
                    {{$roles->links()}}
                </ul>
            </td>
            </tfoot>
        </table>

    </div>
@endsection