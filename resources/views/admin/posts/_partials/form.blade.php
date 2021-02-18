<x-content>
    <div class="d-flex justify-content-center align-items-center">
        <div class="standard-card card mb-2">
            <h1 class="card-header">{{ isset($post) ? 'Atualizar post' : 'Cadastrar novo post' }} </h1>
            <form class="pr-4 py-3 pl-2" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="post">
                @csrf
                @if (isset($post))
                   @method('put')
                @endif
                <input class="form-control m-2 @error('title') is-invalid @enderror" value="{{ $post->title ?? old('title') }}"
                    type="text" name="title" id="title" placeholder="Título">
                @error('title')
                    <div class="invalid-feedback ml-2">{{ $message }}</div>
                @enderror
                <textarea class="form-control m-2 @error('content') is-invalid @enderror" name="content" id="content"
                    cols="30" rows="7" placeholder="Conteúdo">{{ $post->content ?? old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback ml-2 mb-2">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary" type="submit">Enviar</button>
                <a class="btn btn-light" href="{{ route('posts.index') }}">Voltar</a>
            </form>
        </div>
    </div>
</x-content>
