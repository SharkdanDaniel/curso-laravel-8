<x-content>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="">Posts</h1>
            <a class="btn btn-primary" href="{{ route('posts.create') }}">Criar novo post</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
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
            <div class="card-footer">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-content>
