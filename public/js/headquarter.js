document.addEventListener("DOMContentLoaded", function() {
  dataTable = new DataTable(document.getElementById('table-headquarter'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});

function showEditHeadQuarter(id,token) {
  fetch('sedes/editadas', {
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
    document.getElementById('headQuarter').value = data.message.sede;
    document.getElementById('idHeadQuarter').value = data.message.idSede;
    new bootstrap.Modal(document.getElementById('editHeadQuarter')).show();
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No fue posible visualizar la información",
    });
    console.error(error);
  });
}

function editHeadQuarter(token) {
  fetch('sedes/editar', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=UTF-8'
    },
    body: JSON.stringify({
      _token: token,
      id: document.getElementById('idHeadQuarter').value,
      sede: document.getElementById('headQuarter').value
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      let table = new DataTable(document.getElementById("table-headquarter"));
      let newHeadQuarter = table.cell('#hq-' + document.getElementById('idHeadQuarter').value);
      newHeadQuarter.data(data.newHeadQuarter)
      table.draw();
      Toast.fire({
        icon: "success",
        title: "Sede actualizada correctamente",
      });
    }else{
      Toast.fire({
        icon: "error",
        title: "No se pudo actualizar la sede"
      });
      console.error(data.message);
    }
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No se pudo actualizar la sede",
    });
    console.error(error);
  });
}