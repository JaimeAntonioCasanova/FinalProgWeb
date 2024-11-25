<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tiendas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos específicos -->
    <link href="../css/list_stores.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Listado de Tiendas</h1>
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
                            <label for="edit-store-id" class="form-label">ID Tienda</label>
                            <input type="text" class="form-control" id="edit-store-id" name="id_tienda" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="edit-store-name" name="nombre_tienda" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-address" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="edit-store-address" name="direcc_tienda" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-city" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="edit-store-city" name="ciudad" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-state" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="edit-store-state" name="estado" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-country" class="form-label">País</label>
                            <input type="text" class="form-control" id="edit-store-country" name="pais" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-zip" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="edit-store-zip" name="cod_postal" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-store-terms" class="form-label">Términos</label>
                            <input type="text" class="form-control" id="edit-store-terms" name="terminos" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script específico -->
    <script src="../js/list_stores.js"></script>
</body>
</html>
