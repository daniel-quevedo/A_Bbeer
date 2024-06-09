
document.addEventListener("DOMContentLoaded",function() {
  optSidebar();
  document.querySelectorAll('.item-menu > a').forEach(item => {
    item.addEventListener('click', function() {
      const submenu = this.nextElementSibling;
      if (submenu) {
        submenu.classList.toggle('show');
        document.querySelector('.ico-submenu').classList.toggle('rotate');
      }
    });
  });
})

let estado = 'close';
function optSidebar() {
  if (estado == 'close') {
      document.getElementById('sidebar').classList.remove('open');
      document.getElementById('main').classList.remove('open');
      if (document.querySelector('.txt_links_sub')) {
        document.querySelector('.txt_links_sub').setAttribute('hidden','true');
      }
    estado = 'open';
  } else if (estado == 'open'){
    document.getElementById('sidebar').classList.add('open');
    document.getElementById('main').classList.add('open');
    if (document.querySelector('.txt_links_sub')) {
      setTimeout(() => document.querySelector('.txt_links_sub').removeAttribute('hidden'), 180);
    }
    estado = 'close';
  }
}

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});