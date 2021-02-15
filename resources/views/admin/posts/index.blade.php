<x-content>
    <div class="card">
        <h1 class="card-header">Posts</h1>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th>Criado em:</th>
                        <th>Última atualização</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>{{ $post->id }} <a class="btn" href="{{ route('posts.show', $post->id) }}">Ver</a> </th>
                            <th>{{ $post->title }}</th>
                            <th>{{ $post->content }}</th>
                            <th>{{ $post->created_at }}</th>
                            <th>{{ $post->updated_at }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a class="btn btn-primary mt-2" href="{{ route('posts.create') }}">Criar novo post</a>
</x-content>
