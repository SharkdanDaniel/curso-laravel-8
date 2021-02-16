<x-content>
    <div class="d-flex justify-content-center align-items-center">
        <div class="standard-card card mb-2">
            <h1 class="card-header">Editar post</h1>
            <form class="pr-4 py-3 pl-2" action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('put')
                <input class="form-control m-2 @error('title') is-invalid @enderror" value="{{ $post->title }}"
                    type="text" name="title" id="title" placeholder="Título">
                @error('title')
                    <div class="invalid-feedback ml-2">{{ $message }}</div>
                @enderror
                <textarea class="form-control m-2 @error('content') is-invalid @enderror" name="content" id="content"
                    cols="30" rows="7" placeholder="Conteúdo">{{ $post->content }}</textarea>
                @error('content')
                    <div class="invalid-feedback ml-2 mb-2">{{ $message }}</div>
                @enderror
                <button class="btn btn-primary" type="submit">Enviar</button>
                <a class="btn btn-light" href="{{ route('posts.store') }}">Voltar</a>
            </form>
        </div>
    </div>
</x-content>