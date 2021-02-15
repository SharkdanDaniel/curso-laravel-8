<x-content>
    <div class="d-flex justify-content-center">
        <div class="standard-card card">
            <h1 class="card-header">Detalhes do post: {{ $post->title }}</h1>
            <div class="card-body">
                <div>Conteúdo: {{ $post->content }}</div>
                <div>Criado em: {{ $post->created_at }}</div>
                <div>Última atualização: {{ $post->updated_at }}</div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal">Deletar
                    post</button>
                @include('components.modal', ['route' =>  route('posts.destroy', $post->id), 'key' => $post->id, 'title' => 'Excluir post', 'body' => 'Tem certeza que
                deseja excluir este post?', 'type' => 'danger'])
            </div>
        </div>
    </div>
</x-content>
