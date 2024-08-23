<!-- views/import/index.blade.php -->

<!-- Exibir mensagens de sucesso ou erro -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Formulário -->
<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" id="importForm">
    @csrf
    <div class="form-group">
        <label for="file">Escolher arquivo</label>
        <input type="file" class="form-control" name="file" required>
    </div>
    <button type="submit" class="btn btn-secondary mt-2">Importar</button>
</form>

<!-- Loader -->
<!-- Loader estilizado -->
<div id="loader" style="display:none; text-align: center; margin-top: 20px;">
    <div class="spinner-border" role="status">
        <span class="sr-only">Processando...</span>
    </div>
    <p>Processando, por favor aguarde...</p>
</div>




<script>
document.getElementById('importForm').addEventListener('submit', function() {
    // Mostrar o loader
    document.getElementById('loader').style.display = 'block';
    // Esconder o formulário
    this.style.display = 'none';
});
</script>
