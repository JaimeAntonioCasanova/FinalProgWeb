<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos específicos para list_books -->
    <link href="../css/list_books.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Botón para abrir el formulario de edición -->
        <div class="d-flex justify-content-between">
            <h1 class="text-center">Listado de Libros</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBookModal">Editar Libro</button>
        </div>

        <div id="book-list" class="row">
            <!-- Aquí se insertarán los libros dinámicamente -->
        </div>
    </div>

    <!-- Modal para editar libro -->
    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBookModalLabel">Editar Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-book-form">
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Título</label>
                            <input type="text" class="form-control" id="edit-title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-type" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="edit-type" name="type" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-price" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="edit-price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-pub-date" class="form-label">Fecha de Publicación</label>
                            <input type="date" class="form-control" id="edit-pub-date" name="pub_date" required>
                        </div>
                        <input type="hidden" id="edit-book-id" name="book_id">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script específico para list_books -->
    <script src="../js/list_books.js"></script>
</body>
</html>
