document.addEventListener("DOMContentLoaded", function () {
    const bookList = document.getElementById("book-list");

    // Fetch data from the server
    fetch('php/fetch_books.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                bookList.innerHTML = `<p>Error: ${data.error}</p>`;
                return;
            }

            data.forEach(book => {
                const bookItem = document.createElement("div");
                bookItem.classList.add("book-item");
                bookItem.innerHTML = `
                    <div class="book-title">${book.titulo}</div>
                    <div class="book-details">
                        Tipo: ${book.tipo} | Precio: $${book.precio} | Fecha: ${book.fecha_pub}
                    </div>
                `;
                bookList.appendChild(bookItem);
            });
        })
        .catch(err => {
            bookList.innerHTML = `<p>Error al cargar los datos.</p>`;
            console.error(err);
        });
});
