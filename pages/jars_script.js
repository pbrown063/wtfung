document.getElementById('plate_table').onclick = function(event) {

  var rows = document.querySelectorAll('.plate-row');
  for ( var i = 0; i < rows.length; i++ ) {
    if (rows[i].classList.contains("selected-row")) {
      rows[i].classList.remove("selected-row");
    }
  }



  event = event || window.event;
  var target = event.target || event.srcElement;
  while (target && target.nodeName != 'TR') {
    target = target.parentElement;
  }
  var cells = target.cells;
  cells[0].parentNode.classList.add('selected-row');

  if (!cells.length || target.parentNode.nodeName == 'THEAD') {
    return;
  }

  document.getElementsByName('plate_id')[0].value = cells[0].innerHTML;

}

