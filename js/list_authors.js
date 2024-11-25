document.addEventListener("DOMContentLoaded", function () {
    const authorList = document.getElementById("author-list");

    // Fetch autores desde el backend
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
                            <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editAuthorModal" data-author-id="${author.id_autor}" data-name="${author.nombre}" data-lastname="${author.apellido}" data-city="${author.ciudad}" data-state="${author.estado}" data-country="${author.pais}">Editar</button>
                        </div>
                    </div>
                `;
                authorList.appendChild(col);
            });

            // Llenar el formulario del modal con los datos del autor
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('edit-author-id').value = this.getAttribute('data-author-id');
                    document.getElementById('edit-name').value = this.getAttribute('data-name');
                    document.getElementById('edit-lastname').value = this.getAttribute('data-lastname');
                    document.getElementById('edit-city').value = this.getAttribute('data-city');
                    document.getElementById('edit-state').value = this.getAttribute('data-state');
                    document.getElementById('edit-country').value = this.getAttribute('data-country');
                });
            });
        })
        .catch(err => {
            authorList.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
            console.error(err);
        });

    // Enviar el formulario de edición
    document.getElementById('edit-author-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('../php/edit_author.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Autor actualizado correctamente');
                window.location.reload();  // Recarga la página para mostrar los cambios
            } else {
                alert('Error al actualizar el autor');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error al enviar la solicitud');
        });
    });
});
