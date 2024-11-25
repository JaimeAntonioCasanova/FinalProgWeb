<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Autores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos específicos para list_authors -->
    <link href="../css/list_authors.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Botón para abrir el formulario de edición -->
        <div class="d-flex justify-content-between">
            <h1 class="text-center">Listado de Autores</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAuthorModal">Editar Autor</button>
        </div>

        <div id="author-list" class="row">
            <!-- Aquí se insertarán los autores dinámicamente -->
        </div>
    </div>

    <!-- Modal para editar autor -->
    <div class="modal fade" id="editAuthorModal" tabindex="-1" aria-labelledby="editAuthorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAuthorModalLabel">Editar Autor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-author-form">
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="edit-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-lastname" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="edit-lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-city" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="edit-city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-state" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="edit-state" name="state" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-country" class="form-label">País</label>
                            <input type="text" class="form-control" id="edit-country" name="country" required>
                        </div>
                        <input type="hidden" id="edit-author-id" name="author_id">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script específico para list_authors -->
    <script src="../js/list_authors.js"></script>
</body>
</html>
