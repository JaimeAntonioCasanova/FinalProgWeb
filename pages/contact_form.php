<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Formulario de Contacto</h1>
        <form id="contact-form">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="asunto" class="form-label">Asunto</label>
                <input type="text" class="form-control" id="asunto" name="asunto" required>
            </div>
            <div class="mb-3">
                <label for="comentario" class="form-label">Comentario</label>
                <textarea class="form-control" id="comentario" name="comentario" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div id="response-message" class="mt-4"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script personalizado -->
    <script src="../js/scripts.js"></script>
    <script>
        document.getElementById("contact-form").addEventListener("submit", function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch('../php/contact_form.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const responseMessage = document.getElementById("response-message");
                if (data.success) {
                    responseMessage.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
                } else {
                    responseMessage.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                }
            })
            .catch(error => {
                const responseMessage = document.getElementById("response-message");
                responseMessage.innerHTML = `<div class="alert alert-danger">Error al enviar el formulario.</div>`;
                console.error(error);
            });
        });
    </script>
</body>
</html>
