document.addEventListener("DOMContentLoaded", function() {
  new DataTable(document.getElementById('table-city'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});

function showEditCity(id,token) {
  fetch('ciudades/editadas', {
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
    document.getElementById('city').value = data.message.ciudad;
    document.getElementById('idCity').value = data.message.idCiudad;
    new bootstrap.Modal(document.getElementById('editCity')).show();
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No fue posible visualizar la información",
    });
    console.error(error);
  });
}

function editCity(token) {
  fetch('ciudades/editar', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=UTF-8'
    },
    body: JSON.stringify({
      _token: token,
      id: document.getElementById('idCity').value,
      ciudad: document.getElementById('city').value
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      let table = new DataTable(document.getElementById("table-city"));
      let newCity = table.cell('#city-' + document.getElementById('idCity').value);
      newCity.data(data.newCity)
      table.draw();
      Toast.fire({
        icon: "success",
        title: "País actualizado correctamente",
      });
    }else{
      Toast.fire({
        icon: "error",
        title: "No se pudo actualizar el país"
      });
      console.error(data.message);
    }
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No se pudo actualizar el país",
    });
    console.error(error);
  });
}