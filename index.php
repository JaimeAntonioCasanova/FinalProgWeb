<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="css/styles.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="menu-container">
        <div class="row text-center">
            <!-- Opción 1: Ver libros -->
            <div class="col-md-4">
                <div class="menu-item">
                    <a href="pages/list_books.php">
                        <i class="bi bi-book"></i><br>
                        Ver Libros
                    </a>
                </div>
            </div>

            <!-- Opción 2: Ver autores -->
            <div class="col-md-4">
                <div class="menu-item">
                    <a href="pages/list_authors.php">
                        <i class="bi bi-person-lines-fill"></i><br>
                        Ver Autores
                    </a>
                </div>
            </div>

            <!-- Opción 3: Formulario de contacto -->
            <div class="col-md-4">
                <div class="menu-item">
                    <a href="pages/contact_form.php">
                        <i class="bi bi-envelope"></i><br>
                        Formulario de Contacto
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script personalizado -->
    <script src="js/scripts.js"></script>
</body>
</html>
