@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Редактирование новости @endslot
        @slot('parent') Главная @endslot
        @slot('active') Новости @endslot
        @endcomponent

        <hr/>
        <h3>Комментарий к статье: {{$comment->article->title or ''}}</h3>

        <form class="form-horizontal" action="{{route('admin.comment.update', $comment)}}" method="post">

            {{ csrf_field() }}
            {{method_field('PUT')}}
            <fieldset class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Описание:</label>

                    <div class="col-sm-12">
                        <textarea name="text" class="form-control">{{$comment->text or ''}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </div>

            </fieldset>

        </form>
    </div>

@endsection