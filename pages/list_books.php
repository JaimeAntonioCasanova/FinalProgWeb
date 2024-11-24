<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Listado de Libros</h1>
        <div id="book-list" class="row">
            <!-- Aquí se insertarán los libros dinámicamente -->
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const bookList = document.getElementById("book-list");

            fetch('../php/fetch_books.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        bookList.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                        return;
                    }

                    data.forEach(book => {
                        const col = document.createElement("div");
                        col.classList.add("col-md-4", "mb-4");

                        col.innerHTML = `
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title">${book.titulo}</h5>
                                    <p class="card-text">
                                        <strong>Tipo:</strong> ${book.tipo} <br>
                                        <strong>Precio:</strong> $${book.precio} <br>
                                        <strong>Fecha de Publicación:</strong> ${book.fecha_pub}
                                    </p>
                                </div>
                            </div>
                        `;
                        bookList.appendChild(col);
                    });
                })
                .catch(err => {
                    bookList.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
                    console.error(err);
                });
        });
    </script>
</body>
</html>
