@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        @component('admin.components.breadcrumb')

        @slot('title') Список пользователей @endslot
        @slot('parent') Главная @endslot
        @slot('active') Пользователи @endslot

        @endcomponent

        <hr>

        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o"></i>Создать пользователя
        </a>

        <table class="table table-striped">
            <thead>
            <th>имя</th>
            <th>майл</th>
            <th>Животное</th>
            <th>Роли</th>
            <th>Действие</th>
            </thead>
            <tbody>

            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @isset($user->animal)
                        <a href="{{route('admin.user_managment.animal.show', $user->animal)}}">{{$user->animal->animal_name or ''}}</a>
                        @endisset
                    </td>
                    <td>{{$user->roles()->pluck('name')->implode(', ')}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('удалить')){return true}else{return false}" action="{{route('admin.user_managment.user.destroy', $user)}}"
                              method="post">
                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                            <a href="{{route('admin.user_managment.user.edit', $user)}}" class="btn btn-default">
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
                    {{$users->links()}}
                </ul>
            </td>
            </tfoot>
        </table>

    </div>
@endsection