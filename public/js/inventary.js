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
  let checkbox = document.getElementById('stateInv_' + id);
  let state = checkbox.checked;
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "inventarios/activar");
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
  xhr.onload = function () {
    if (xhr.responseText === 'success') {
      let element = document.querySelector('.bgi-' + id);
      if (element.classList.contains('bg-danger')) {
        element.classList.remove('bg-danger');
      } else {
        element.classList.add('bg-danger');
      }
      Toast.fire({
        icon: "success",
        title: "Estado cambiado correctamente"
      });
    } else {
      Toast.fire({
        icon: "error",
        title: "Error al cambiar de estado "
      });
      console.error(xhr.status);
      checkbox.checked = !state;
    }
  };
  xhr.onerror = function () {
    console.error("Error en la solicitud:", xhr.status);
    checkbox.checked = state;
  };

  let data = JSON.stringify({
    _token: token,
    idInv: id,
    state: state
  });
  xhr.send(data);
}

