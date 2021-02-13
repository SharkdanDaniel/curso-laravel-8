<h1>Cadastrar novo post</h1>
<form action="" method="post">
    <input type="text" name="title" id="title" placeholder="Título">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo"></textarea>
    <button type="submit">Enviar</button>
</form>
<a href="{{ route('posts.index') }}">Voltar</a>
