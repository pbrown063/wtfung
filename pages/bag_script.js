document.getElementById('jar_table').onclick = function(event) {

  event = event || window.event;
  var target = event.target || event.srcElement;
  while (target && target.nodeName != 'TR') {
    target = target.parentElement;
  }
  var cells = target.cells;

  // Removes selected-row style from all rows and adds it to the target row
  var rows = document.querySelectorAll('.jar-row');
  for ( var i = 0; i < rows.length; i++ ) {
    if (rows[i].classList.contains("selected-row")) {
      rows[i].classList.remove("selected-row");
    }
  }
  if (cells[0].parentNode.parentNode.tagName !== "THEAD") {
    cells[0].parentNode.classList.add('selected-row');
  }


  if (!cells.length || target.parentNode.nodeName == 'THEAD') {
    return;
  }

  document.getElementsByName('jar_id')[0].value = cells[0].innerHTML;
  document.getElementsByName('strain')[0].value = cells[4].innerHTML;
  document.getElementsByName('num_jars')[0].value = cells[2].innerHTML;
  document.getElementsByName('jars_used')[0].setAttribute("max", cells[2].innerHTML);
}

