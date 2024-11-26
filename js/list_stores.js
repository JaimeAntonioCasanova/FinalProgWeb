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
                            <h5 class="card-title">${store.nombre_tienda}</h5>
                            <p class="card-text">
                                <strong>Dirección:</strong> ${store.direcc_tienda} <br>
                                <strong>Ciudad:</strong> ${store.ciudad} <br>
                                <strong>Estado:</strong> ${store.estado} <br>
                                <strong>País:</strong> ${store.pais} <br>
                                <strong>Código Postal:</strong> ${store.cod_postal} <br>
                                <strong>Términos:</strong> ${store.terminos}
                            </p>
                            <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editStoreModal"
                                data-id-tienda="${store.id_tienda}" 
                                data-nombre-tienda="${store.nombre_tienda}" 
                                data-direcc-tienda="${store.direcc_tienda}" 
                                data-ciudad="${store.ciudad}" 
                                data-estado="${store.estado}" 
                                data-pais="${store.pais}" 
                                data-cod-postal="${store.cod_postal}" 
                                data-terminos="${store.terminos}">
                                Editar
                            </button>
                        </div>
                    </div>
                `;
                storeList.appendChild(col);
            });

            // Llenar el formulario del modal con los datos de la tienda
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    document.getElementById('edit-store-id').value = this.getAttribute('data-id-tienda');
                    document.getElementById('edit-store-name').value = this.getAttribute('data-nombre-tienda');
                    document.getElementById('edit-store-address').value = this.getAttribute('data-direcc-tienda');
                    document.getElementById('edit-store-city').value = this.getAttribute('data-ciudad');
                    document.getElementById('edit-store-state').value = this.getAttribute('data-estado');
                    document.getElementById('edit-store-country').value = this.getAttribute('data-pais');
                    document.getElementById('edit-store-zip').value = this.getAttribute('data-cod-postal');
                    document.getElementById('edit-store-terms').value = this.getAttribute('data-terminos');
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
            const messageDiv = document.getElementById('success-message');
            if (data.success) {
                // Mostrar el mensaje de éxito
                messageDiv.innerHTML = `<div class="alert alert-success" role="alert">Tienda actualizada correctamente</div>`;
            } else {
                // Mostrar mensaje de error
                messageDiv.innerHTML = `<div class="alert alert-danger" role="alert">Error al actualizar la tienda</div>`;
            }
        })
        .catch(err => {
            console.error(err);
            const messageDiv = document.getElementById('success-message');
            messageDiv.innerHTML = `<div class="alert alert-danger" role="alert">Error al enviar la solicitud</div>`;
        });
    });
});
