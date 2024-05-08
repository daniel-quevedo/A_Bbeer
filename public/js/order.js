document.addEventListener("DOMContentLoaded", function() {
  let dataTable = new DataTable(document.getElementById('table-order'), {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
    },
    order: [[ 3, "asc" ]],
    lengthMenu: [ 5, 10, 50, 100 ],
    pageLength: 5
  });
});