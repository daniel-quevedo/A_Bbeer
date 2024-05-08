document.addEventListener("DOMContentLoaded", function() {
  new DataTable(document.getElementById('table-order'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    order: [[ 3, "asc" ]],
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});

let p = document.getElementById('product');
let valueU = document.getElementById('valueU');
if (p) {
  p.addEventListener('change', function(){
    valueU.value = p.value;
  });
}

function delOrder(cod, token) {
  fetch("pedidos/eliminar", {
    method: 'POST',
    headers: {
      "Content-Type": "application/json;charset=UTF-8",
    },
    body: JSON.stringify({
      _token: token,
      cod_pedido: cod
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      Toast.fire({
        icon: "success",
        title: "Pedido eliminado correctamente",
      });
      if (document.getElementById('row-' + data.cod_pedido)) {
        document.getElementById('row-' + data.cod_pedido).hidden = true;
      }
    }else{
      Toast.fire({
        icon: "error",
        title: "No se pudo eliminar el pedido",
      });
      console.error(data.message);
    }
  })
  .catch(error => console.log(error));
}

function delProduct(id, token) {
  fetch("eliminar-producto", {
    method: 'POST',
    headers: {
      "Content-Type": "application/json;charset=UTF-8",
    },
    body: JSON.stringify({
      _token: token,
      idPedido: id
    })
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      Toast.fire({
        icon: "success",
        title: "Producto eliminado correctamente",
      });
      if (document.getElementById('row-' + data.idPedido)) {
        document.getElementById('row-' + data.idPedido).remove();
      }
    }else{
      Toast.fire({
        icon: "error",
        title: "No se pudo eliminar el producto",
      });
      console.error(data.message);
    }
  })
  .catch(error => console.log(error));
}