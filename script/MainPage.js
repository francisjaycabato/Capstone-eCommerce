var toggle = document.getElementById('toggle');
var menu1 = document.getElementById('shopper-text');
var menu2 = document.getElementById('vendor-text');

menu2.style.display = 'none';

toggle.onchange = function () {
  if (checkbox1.checked) {
    menu1.style.display = 'grid';
    menu2.style.display = 'none';
  } else {
    menu2.style.display = 'grid';
    menu1.style.display = 'none';

  }
};