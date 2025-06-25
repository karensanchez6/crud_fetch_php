document.getElementById("formulario").addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    formData.append("accion", "Guardar"); // Cambiar a "Modificar" si es edición

    const response = await fetch("registrar.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();

    if (result.success) {
        Swal.fire("¡Éxito!", result.message, "success");
    } else {
        Swal.fire("¡Error!", result.message, "error");
    }
});
