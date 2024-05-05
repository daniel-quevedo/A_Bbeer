document.addEventListener("DOMContentLoaded",function() {
  const submenu = document.querySelector('.submenu');
  const parentMenu = document.querySelector('.sidebar .item-menu:nth-child(2)');

  parentMenu.addEventListener('click', function() {
    submenu.classList.toggle('hide');
    document.querySelector('.ico-submenu').classList.toggle('rotate');
  });
})

let estado = 'open';
function optSidebar() {
  let links = document.getElementsByClassName('txt_links');

  if (estado == 'open') {

    document.querySelectorAll('a.sub-item span').forEach(span => span.style.display = 'none');
    document.querySelectorAll('a.sub-item').forEach(span => span.style.paddingLeft = '15px');
    document.getElementById('sidebar').style.width = '4%';
    document.getElementById('main').style.marginLeft = '4%';
    document.getElementById('img_info').style.width = '34px';
    document.getElementById('img_info').style.height = '34px';
    document.getElementById('img_info').style.marginTop = '20px';
    document.getElementById('img_info').style.marginBottom = '20px';
    document.getElementById('text_info').style.display = 'none';
    if (document.getElementById('ico-submenu') != null) {
      document.querySelector('.fa-list').style.marginRight = '0px';
      document.getElementById('ico-submenu').style.width = '6px';
      document.getElementById('ico-submenu').style.marginTop = '5px';
    }
    for (let i = links.length -1 ; i >= 0; i--) {
      links[i].style.display = 'none';
    }
    estado = 'close';
  } else if (estado == 'close'){
    document.querySelectorAll('a.sub-item span').forEach(span => span.style.display = '');
    document.getElementById('sidebar').style.width = '17%';
    document.getElementById('main').style.marginLeft = '17%';
    document.getElementById('img_info').style.width = '10em';
    document.getElementById('img_info').style.height = '9.7em';
    document.getElementById('text_info').style.display = 'block';
    if (document.getElementById('ico-submenu') != null) {
      document.querySelector('.fa-list').style.marginRight = '30px';
      document.getElementById('ico-submenu').style.width = '14px';
    }
    for (let i = links.length -1 ; i >= 0; i--) {
      links[i].style.display = '';
    }
    estado = 'open';
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