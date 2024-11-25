<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Contactos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Listado de Contactos</h1>
        <div id="contact-list" class="row">
            <!-- Aquí se insertarán los contactos dinámicamente -->
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script personalizado -->
    <script src="../js/scripts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const contactList = document.getElementById("contact-list");

            fetch('../php/fetch_contacts.php')
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        contactList.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                        return;
                    }

                    data.forEach(contact => {
                        const col = document.createElement("div");
                        col.classList.add("col-md-4", "mb-4");

                        col.innerHTML = `
                            <div class="card shadow-sm h-100">
                                <div class="card-body">
                                    <h5 class="card-title">${contact.nombre}</h5>
                                    <p class="card-text">
                                        <strong>Correo:</strong> ${contact.correo} <br>
                                        <strong>Asunto:</strong> ${contact.asunto} <br>
                                        <strong>Comentario:</strong> ${contact.comentario} <br>
                                        <strong>Fecha:</strong> ${new Date(contact.fecha).toLocaleString()}
                                    </p>
                                </div>
                            </div>
                        `;
                        contactList.appendChild(col);
                    });
                })
                .catch(err => {
                    contactList.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
                    console.error(err);
                });
        });
    </script>
</body>
</html>
