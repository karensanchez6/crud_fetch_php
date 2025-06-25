async function listarProductos() {
  const res = await fetch("listar.php");
  const datos = await res.json();
  const lista = document.getElementById("lista");

  lista.innerHTML = "";

  if (datos.success && datos.data.length > 0) {
    datos.data.forEach(p => {
      const fila = document.createElement("div");
      fila.classList = "bg-white p-4 rounded-xl shadow-sm border border-pink-200";
      fila.innerHTML = `
        <p class="text-pink-700 font-semibold">${p.producto}</p>
        <p class="text-sm text-gray-600">Código: ${p.codigo}</p>
        <p class="text-sm text-gray-600">Precio: $${p.precio} | Cantidad: ${p.cantidad}</p>
        <button onclick='editar(${JSON.stringify(p)})' class="mt-2 text-sm text-pink-600 underline hover:text-pink-800">Editar</button>
      `;
      lista.appendChild(fila);
    });
  } else {
    lista.innerHTML = "<p class='text-center text-gray-500'>No hay productos aún.</p>";
  }
}
