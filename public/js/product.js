document.addEventListener("DOMContentLoaded", function() {
  let dataTable = new DataTable(document.getElementById('table-product'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});

function importExcel() {
  let dataFile = new FormData();
  dataFile.append('file', document.getElementById('excel-file').files[0])
  fetch('productos/importar-excel', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: dataFile
  })
  .then(response => response.json())
  .then((data) => {
    if (data.message == 'success') {
      Toast.fire({
        icon: 'success',
        title: 'Excel importado correctamente'
      })
      setTimeout(() => {location.reload()}, 1.5 * 1000);
    }else{
      let titleInfo = 'Hubo un error al importar el excel';
      data.info == 'true' ? titleInfo = 'Código del producto duplicado en el excel' : titleInfo;
      Toast.fire({
        icon: 'error',
        title: titleInfo
      })
      console.log(data.message);
      console.log(data.info);
    }
  })
  .catch((error) => {
    Toast.fire({
      icon: 'error',
      title: 'Error al importar el excel'
    })
    console.error(error)
  });
}