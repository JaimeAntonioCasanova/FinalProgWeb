document.addEventListener("DOMContentLoaded", function () {
    const storeList = document.getElementById("store-list");

    // Fetch datos de las tiendas desde el backend
    fetch('../php/fetch_stores.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                storeList.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                return;
            }

            // Crear tarjetas para cada tienda
            data.forEach(store => {
                const col = document.createElement("div");
                col.classList.add("col-md-4", "mb-4");

                col.innerHTML = `
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">${store.nombre}</h5>
                            <p class="card-text">
                                <strong>Ubicación:</strong> ${store.ubicacion} <br>
                                <strong>Gerente:</strong> ${store.gerente}
                            </p>
                            <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editStoreModal" data-store-id="${store.id}" data-store-name="${store.nombre}" data-store-location="${store.ubicacion}" data-store-manager="${store.gerente}">Editar</button>
                        </div>
                    </div>
                `;
                storeList.appendChild(col);
            });

            // Llenar el formulario del modal con los datos de la tienda
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('edit-store-id').value = this.getAttribute('data-store-id');
                    document.getElementById('edit-store-name').value = this.getAttribute('data-store-name');
                    document.getElementById('edit-store-location').value = this.getAttribute('data-store-location');
                    document.getElementById('edit-store-manager').value = this.getAttribute('data-store-manager');
                });
            });
        })
        .catch(err => {
            storeList.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
            console.error(err);
        });

    // Enviar el formulario de edición
    document.getElementById('edit-store-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('../php/edit_store.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Tienda actualizada correctamente');
                window.location.reload(); // Recarga la página para mostrar los cambios
            } else {
                alert('Error al actualizar la tienda');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error al enviar la solicitud');
        });
    });
});
