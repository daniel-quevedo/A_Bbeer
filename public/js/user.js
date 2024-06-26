let datatable;
document.addEventListener("DOMContentLoaded", function () {
  datatable = new DataTable(document.getElementById('table-users'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    lengthMenu: [5, 10, 50, 100],
    pageLength: 5,
    // responsive: {
    //   details: {
    //     display: DataTable.Responsive.display.modal({
    //       header: function (row) {
    //         var data = row.data();
    //         return 'Details for ' + data[0] + ' ' + data[1];
    //       }
    //     }),
    //     renderer: DataTable.Responsive.renderer.tableAll({
    //       tableClass: 'table'
    //     })
    //   }
    // }
  });

});

function importExcel() {
  let dataFile = new FormData();
  dataFile.append('file', document.getElementById('excel-file').files[0])
  fetch('usuarios/importar-excel', {
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
        setTimeout(() => { location.reload() }, 1.5 * 1000);
      } else {
        let titleInfo = 'Hubo un error al importar el excel';
        data.info == 'true' ? titleInfo = 'Cédula o Email duplicado en el excel' : titleInfo;
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
