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
                        </div>
                    </div>
                `;
                storeList.appendChild(col);
            });
        })
        .catch(err => {
            storeList.innerHTML = `<div class="alert alert-danger">Error al cargar los datos.</div>`;
            console.error(err);
        });
});
