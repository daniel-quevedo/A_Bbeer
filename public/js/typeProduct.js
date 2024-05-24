document.addEventListener("DOMContentLoaded", function() {
  new DataTable(document.getElementById('table-typeProduct'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});

function showEditTypeProd(id,token) {
  fetch('tipo-productos/editados', {
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
    document.getElementById('typeProd').value = data.message.tipo_producto;
    document.getElementById('idTypeProd').value = data.message.idTipoProducto;
    new bootstrap.Modal(document.getElementById('editTypeProd')).show();
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No fue posible visualizar la información",
    });
    console.error(error);
  });
}

function editTypeProd(token) {
  fetch('tipo-productos/editar', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=UTF-8'
    },
    body: JSON.stringify({
      _token: token,
      id: document.getElementById('idTypeProd').value,
      tipo_producto: document.getElementById('typeProd').value
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      let table = new DataTable(document.getElementById("table-typeProduct"));
      let newTypeProd = table.cell('#typeP-' + document.getElementById('idTypeProd').value);
      newTypeProd.data(data.newTypeProd)
      table.draw();
      Toast.fire({
        icon: "success",
        title: "Tipo de producto actualizado correctamente",
      });
    }else{
      Toast.fire({
        icon: "error",
        title: "No se pudo actualizar el tipo de producto"
      });
      console.error(data.message);
    }
  })
  .catch((error) => {
    Toast.fire({
      icon: "error",
      title: "No se pudo actualizar el tipo de producto",
    });
    console.error(error);
  });
}