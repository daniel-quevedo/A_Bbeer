document.addEventListener("DOMContentLoaded", function() {
  new DataTable(document.getElementById('table-country'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});

function showEditCountry(id,token) {
  fetch('paises/editados', {
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
    document.getElementById('country').value = data.message.pais;
    document.getElementById('idCountry').value = data.message.idPais;
    new bootstrap.Modal(document.getElementById('editCountry')).show();
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No fue posible visualizar la información",
    });
    console.error(error);
  });
}

function editCountry(token) {
  fetch('paises/editar', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=UTF-8'
    },
    body: JSON.stringify({
      _token: token,
      id: document.getElementById('idCountry').value,
      pais: document.getElementById('country').value
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      let table = new DataTable(document.getElementById("table-country"));
      let newCountry = table.cell('#name-' + document.getElementById('idCountry').value);
      newCountry.data(data.newCountry)
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