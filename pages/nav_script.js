var barToggle;
document.getElementById("myMenubutton").onclick = function () {
  menuToggle(this);
};

/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  barToggle = true;
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  barToggle = false;
}

/* Toggle the menu button open close and call the open/close nav functions*/
function menuToggle(x) {
  x.classList.toggle("change");
  (barToggle) ? closeNav() : openNav();
}

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content -
 This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        //this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;

        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";

        } else {
                dropdownContent.style.display = "block";
        }
    });
}


  document.getElementById('plate_table').onclick = function(event) {
    event = event || window.event;
    var target = event.target || event.srcElement;
    while (target && target.nodeName != 'TR') {
      target = target.parentElement;
    }
    var cells = target.cells;

    if (!cells.length || target.parentNode.nodeName == 'THEAD') {
      return;
    }

    document.getElementsByName('plate_id')[0].value = cells[0].innerHTML;

  }