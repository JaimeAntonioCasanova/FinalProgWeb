<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Autores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Listado de Autores</h1>
        <div id="author-list" class="row">
            <!-- Aquí se insertarán los autores dinámicamente -->
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script personalizado -->
    <script src="../js/scripts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const authorList = document.getElementById("author-list");

            fetch('../php/fetch_authors.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        authorList.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                        return;
                    }

                    data.forEach(author => {
                        const col = document.createElement("div");
                        col.classList.add("col-md-4", "mb-4");

                        col.innerHTML = `
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title">${author.nombre} ${author.apellido}</h5>
                                    <p class="card-text">
                                        <strong>Ciudad:</strong> ${author.ciudad} <br>
                                        <strong>Estado:</strong> ${author.estado} <br>
                                        <strong>País:</strong> ${author.pais}
                                    </p>
                                </div>
                            </div>
                        `;
                        authorList.appendChild(col);
                    });
                })
                .catch(err => {
                    authorList.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
                    console.error(err);
                });
        });
    </script>
</body>
</html>
