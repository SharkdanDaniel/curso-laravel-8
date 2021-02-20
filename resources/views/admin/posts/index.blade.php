<x-content>
    @section('title')
        Listagem dos posts
    @endsection
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="">Posts</h1>
            <a class="btn btn-primary" href="{{ route('posts.create') }}">Criar novo post</a>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.search') }}" method="post">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Pesquisar">
                    <div class="input-group-append">
                        <button class="input-group-text" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th class="text-center w-25">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->id }} <a class="btn" href="{{ route('posts.show', $post->id) }}">Ver</a>
                            </th>
                            <th><img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}"
                                    style="max-width: 50px"></th>
                            <th>{{ $post->title }}</th>
                            <th>{{ $post->content }}</th>
                            <th class="text-center">
                                <a class="btn edit" href="{{ route('posts.edit', $post->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="" class="btn delete" data-toggle="modal" data-target="#modal">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                @include('components.modal', ['route' => route('posts.destroy', $post->id), 'key' =>
                                $post->id, 'title' => 'Excluir post', 'body' => 'Tem certeza que
                                deseja excluir este post?', 'type' => 'danger'])
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $posts->appends($filters)->links() }}
            @else
                {{ $posts->links() }}
            @endif
        </div>
    </div>
</x-content>
