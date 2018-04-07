var barToggle;
document.getElementById("myMenubutton").onclick = function () {
  menuToggle(this);
};

/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "225px";
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
