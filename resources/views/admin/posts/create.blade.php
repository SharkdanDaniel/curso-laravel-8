@extends('layouts.index')
@section('content')

    <div class="card mb-2">
        <h1 class="card-header">Cadastrar novo post</h1>
        <form class="pr-4 py-3 pl-2" action="{{ route('posts.store') }}" method="post">
            @csrf
            <input class="form-control m-2" type="text" name="title" id="title" placeholder="Título">
            <textarea class="form-control m-2" name="content" id="content" cols="30" rows="4"
                placeholder="Conteúdo"></textarea>
                <button class="btn btn-primary" type="submit">Enviar</button>
                <a class="btn btn-light" href="{{ route('posts.index') }}">Voltar</a>
            </form>
        </div>

@endsection
