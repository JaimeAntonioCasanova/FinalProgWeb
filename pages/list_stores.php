<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tiendas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos específicos para list_stores -->
    <link href="../css/list_stores.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <!-- Botón para abrir el formulario de edición -->
        <div class="d-flex justify-content-between">
            <h1 class="text-center">Listado de Tiendas</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStoreModal">Editar Tienda</button>
        </div>

        <div id="store-list" class="row">
            <!-- Aquí se insertarán las tiendas dinámicamente -->
        </div>
    </div>

    <!-- Modal para editar tienda -->
    <div class="modal fade" id="editStoreModal" tabindex="-1" aria-labelledby="editStoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStoreModalLabel">Editar Tienda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-store-form">
                        <div class="mb-3">
                            <label for="edit-store-name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="edit-store-name" name="store_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-location" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" id="edit-store-location" name="store_location" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-manager" class="form-label">Gerente</label>
                            <input type="text" class="form-control" id="edit-store-manager" name="store_manager" required>
                        </div>
                        <input type="hidden" id="edit-store-id" name="store_id">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script específico para list_stores -->
    <script src="../js/list_stores.js"></script>
</body>
</html>
