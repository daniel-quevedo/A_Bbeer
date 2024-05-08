document.addEventListener("DOMContentLoaded", function () {
  let dataTable = new DataTable(document.getElementById("table-inventary"), {
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json",
    },
    lengthMenu: [5, 10, 50, 100],
    pageLength: 10,
  });
});

function showEditInv(id,token) {
  fetch('inventarios/editados', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=UTF-8'
    },
    body: JSON.stringify({
      _token: token,
      id: id,
    })
  })
  .then(response => response.json())
  .then((data) => {
    document.getElementById('prodInv').value = data.message.producto;
    document.getElementById('cantInv').value = data.message.cantidad;
    document.getElementById('idInv').value = data.message.idInventario;
    new bootstrap.Modal(document.getElementById('editInv')).show();
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No fue posible visualizar la información",
    });
    console.error(error);
  });
}

function editInv(token) {
  fetch('inventarios/editar', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=UTF-8'
    },
    body: JSON.stringify({
      _token: token,
      id: document.getElementById('idInv').value,
      cantidad: document.getElementById('cantInv').value
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      let table = new DataTable(document.getElementById("table-inventary"));
      let newCant = table.cell('#cant-' + document.getElementById('idInv').value);
      newCant.data(data.newCant)
      table.draw();
      Toast.fire({
        icon: "success",
        title: "Cantidad actualizada correctamente",
      });
    }else{
      let titleMessage = 'No se pudo actualizar la cantidad'
      Toast.fire({
        icon: "error",
        title: (data.message == 'fail' ? 'Cantidad no admitida' : titleMessage),
      });
      console.error(data.message);
    }
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No se pudo actualizar la cantidad",
    });
    console.error(error);
  });
}

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
