let estado = 'open';

function optSidebar() {
  let links = document.getElementsByClassName('txt_links');

  if (estado == 'open') {
    document.getElementById('sidebar').style.width = '3%';
    document.getElementById('main').style.marginLeft = '4%';
    document.getElementById('img_info').style.width = '30px';
    document.getElementById('img_info').style.height = '30px';
    document.getElementById('img_info').style.marginTop = '20px';
    document.getElementById('img_info').style.marginBottom = '20px';
    document.getElementById('text_info').style.display = 'none';
    for (let i = links.length -1 ; i >= 0; i--) {
      links[i].style.display = 'none';
    }
    estado = 'close';
  } else if (estado == 'close'){
    document.getElementById('sidebar').style.width = '17%';
    document.getElementById('main').style.marginLeft = '17%';
    document.getElementById('img_info').style.width = '10em';
    document.getElementById('img_info').style.height = '9.7em';
    document.getElementById('text_info').style.display = 'block';
    for (let i = links.length -1 ; i >= 0; i--) {
      links[i].style.display = 'inline';
    }
    estado = 'open';
  }
}