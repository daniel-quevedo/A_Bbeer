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
let m = document.getElementById('mesa');
let mesa;
let p = document.getElementById('product');
let valueU = document.getElementById('valueU');
let val;
let cod_order;
p.addEventListener('change', function(){
  val = p.value
  valueU.value = val;
});

if (m.value) {
  mesa = 'M0' + m.value;
}else{
  m.addEventListener('change', function(){
    mesa = 'M0' + m.value;
  });
}

document.getElementById('send').addEventListener('click',function() {
  cod_order = '1_cod_'+mesa;
  document.getElementById('cod_order').value = cod_order;
})