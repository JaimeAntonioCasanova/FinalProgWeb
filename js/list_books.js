// Archivo: list_books.js

document.addEventListener("DOMContentLoaded", function () {
    const bookList = document.getElementById("book-list");

    // Fetch libros desde el backend
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
                                <strong>Fecha de Publicación:</strong> ${book.fecha_pub} <br>
                            </p>
                            <button class="btn btn-warning btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editBookModal" data-book-id="${book.id_titulo}" data-title="${book.titulo}" data-type="${book.tipo}" data-price="${book.precio}" data-pub-date="${book.fecha_pub}">Editar</button>
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

    // Llenar el formulario del modal con los datos del libro
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const bookId = this.getAttribute('data-book-id');
            const title = this.getAttribute('data-title');
            const type = this.getAttribute('data-type');
            const price = this.getAttribute('data-price');
            const pubDate = this.getAttribute('data-pub-date');

            document.getElementById('edit-book-id').value = bookId;
            document.getElementById('edit-title').value = title;
            document.getElementById('edit-type').value = type;
            document.getElementById('edit-price').value = price;
            document.getElementById('edit-pub-date').value = pubDate;
        });
    });

    // Enviar el formulario de edición
    document.getElementById('edit-book-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('../php/edit_book.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Libro actualizado correctamente');
                window.location.reload();  // Recarga la página para mostrar los cambios
            } else {
                alert('Error al actualizar el libro');
            }
        })
        .catch(err => {
            console.error(err);
            alert('Error al enviar la solicitud');
        });
    });
});
