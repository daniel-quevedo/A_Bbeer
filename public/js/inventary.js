document.addEventListener("DOMContentLoaded", function () {
  let dataTable = new DataTable(document.getElementById("table-inventary"), {
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
    },
    lengthMenu: [5, 10, 50, 100],
    pageLength: 10,
  });
});

function stateInventary(id, token) {
  let checkbox = document.getElementById("stateInv_" + id);
  let state = checkbox.checked;
  fetch("inventarios/activar", {
    method: "POST",
    headers: {
      "Content-Type": "application/json;charset=UTF-8",
    },
    body: JSON.stringify({
      _token: token,
      idInv: id,
      state: state,
    }),
  })
  .then((response) => response.json())
  .then((data) => {
    if (data.message !== 'success') {
      Toast.fire({
        icon: "error",
        title: "Error al cambiar de estado",
      });
      checkbox.checked = !state;
      console.error(data.message);
      return;
    }
    let element = document.querySelector(".bgi-" + id);
      if (element.classList.contains("bg-danger")) {
        element.classList.remove("bg-danger");
      } else {
        element.classList.add("bg-danger");
      }
      Toast.fire({
        icon: "success",
        title: "Estado cambiado correctamente",
      });
  })
  .catch((error) => {
    console.error("Error en la solicitud:", error);
    checkbox.checked = state;
  });
}
