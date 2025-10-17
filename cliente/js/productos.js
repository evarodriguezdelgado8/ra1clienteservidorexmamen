document.addEventListener('DOMContentLoaded', async () => {
  const contenedor = document.getElementById('contenedor-productos');
  const productos = await obtenerProductos();

  productos.forEach(p => {
    const card = document.createElement('div');
    card.className = "col-md-4";
    card.innerHTML = `
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">${p.nombre}</h5>
          <p class="card-text">${p.descripcion}</p>
          <p class="fw-bold">${p.precio.toFixed(2)} €</p>
          <img src="${p.img}" class="img-fluid mb-3" alt= "${p.nombre}">
          <p class="card-text">${p.categoria}</p>
          <a href="producto.html?id=${p.id}" class="btn btn-primary">Ver detalle</a>
        </div>
      </div>
    `;
    contenedor.appendChild(card);

    const estiloTitle = card.querySelector('.card-title');
    estiloTitle.style.backgroundColor = 'blue';

    const estiloText = card.querySelector('.card-text');
    estiloText.style.backgroundColor = 'red';

    const estiloCard = card.querySelector('.card');
    estiloCard.style.backgroundColor = 'yellow';

  });
});
