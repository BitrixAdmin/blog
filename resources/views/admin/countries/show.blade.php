@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <a href="{{route('admin.country.index')}}" class="btn btn-primary">Назад</a>
        <hr>
        <h1>{{$country->name or ''}}</h1>
        <small>Колво комментариев: {{$country->comments->count()}}</small>
        <hr>
        @forelse($country->comments as $comment)
            <div class="alert alert-primary" role="alert">
                <b>{{$comment->article->title}}</b>
                <br>
                {{$comment->text or ''}}
                <p class="mb-0">
                    <a class="btn btn-primary" href="{{route('admin.comment.edit',$comment)}}">Редактировать</a>
                </p>
            </div>
        @empty
            <h3 class="text-center">Комментариев нет</h3>
        @endforelse
    </div>
@endsection