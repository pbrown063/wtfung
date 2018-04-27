var harvest_list = [];
var lock = false;
var block_id;
var batch_id;

document.getElementById('block_table').onclick = function(event) {

  event = event || window.event;
  var target = event.target || event.srcElement;
  while (target && target.nodeName !== 'TR') {
    target = target.parentElement;
  }
  var cells = target.cells;

  // Removes selected-row style from all rows and adds it to the target row
  var rows = document.querySelectorAll('.block-row');
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

  document.getElementsByName('block_id')[0].value = cells[0].innerHTML;
  document.getElementsByName('batch_id')[0].value = cells[4].innerHTML;
  document.getElementsByName('strain-code')[0].value = cells[5].innerHTML;
  document.getElementsByName('strain-name')[0].value = cells[2].innerHTML;
}


/**
 * Builds json string and sends it to the server side.
 * deletes harvest data and refreshes page.
 */
function submit_harvests() {

  var json_harvest = JSON.stringify(harvest_list);

  $.ajax({
    type: "POST",
    url: "harvest.php",
    data: {harvest:json_harvest},
    cache: false,
  });

  delete harvest_list;
  delete harvest;

  window.location.replace('home.php');
}


/**
 * Locks the time of day field so that only one strain is being harvested
 * Pulls the harvest form data
 * Validates it
 * Pushes it onto the harvest list
 * Populates a table that shows harvests in queue
 */
function add_time_entry_to_list() {

  var entry_by = 'time';

  document.getElementById("harvest_time_form").addEventListener("click", function(event){
    event.preventDefault()
  });

  var harvest = get_harvest_object();
  var validated = is_harvest_valid(harvest);

  if (validated) {

    harvest_list.push(harvest);
    add_harvest_to_queue_table(harvest, entry_by);

    if (!lock) {
      lock = true;

      document.getElementsByName('time')[0].disabled = true;
      var tableTitle = document.createTextNode("HARVEST FOR \u00A0" + harvest.time.toUpperCase());
      document.getElementsByClassName('table-title')[0].appendChild(tableTitle);
      document.getElementsByClassName('table-title')[0].style.display = "block";
    }

    document.getElementById('harvest_time_form').reset();
  }
}

/**
 * Validates the harvest data.
 * Only processes one error at a time.
 */
function is_harvest_valid(harvest) {

  if (harvest.greenhouse.length > 30) {
    alert('The greenhouse name is too long.');
    return false;
  }
  else if (harvest.strain.length > 45) {
    alert('The strain name is too long.');
    return false;
  }
  else if (harvest.time.length > 5) {
    alert('The time of day is invalid');
    return false;
  }
  else if (harvest.weight <= 0) {
    alert('Please enter a positive value for the harvest weight.');
    return false;
  }
  else if (isNaN(harvest.weight)) {
    alert('Please enter a valid number for weight.');
    return false;
  }
  else if (
      harvest.greenhouse.length < 1 ||
      harvest.strain.length < 1 ||
      harvest.time.length < 1 ) {
    alert('Please fill in all fields.');
    return false;
  }
  else if (harvest.notes.length < 1) {
    return confirm('Are you sure you want to harvest with no notes?');
  }
  return true;
}

/**
 * Creates elements and adds a row to the harvest to the harvest queue table.
 * @param strain
 * @param weight
 * @param date
 */
function add_harvest_to_queue_table(harvest, entry_by) {
  document.getElementById("harvest-queue-table").style.display = "block";

  var text = "";
  var body = document.getElementById("harvest-queue");
  var harvest_row = document.createElement("TR");

  if (entry_by === 'species') {
    var greenhouse_row = document.createElement("TD");
    text = document.createTextNode(harvest.greenhouse);
    greenhouse_row.appendChild(text);
    harvest_row.appendChild(greenhouse_row);
  }
  else if (entry_by === 'greenhouse') {
    var strain_row = document.createElement("TD");
    text = document.createTextNode(harvest.strain);
    strain_row.appendChild(text);
    harvest_row.appendChild(strain_row);
  }
  else if (entry_by === 'time') {
    var greenhouse_row = document.createElement("TD");
    text = document.createTextNode(harvest.greenhouse);
    greenhouse_row.appendChild(text);
    harvest_row.appendChild(greenhouse_row);

    var strain_row = document.createElement("TD");
    text = document.createTextNode(harvest.strain_name);
    strain_row.appendChild(text);
    harvest_row.appendChild(strain_row);
  }

  var weight_row = document.createElement("TD");
  text = document.createTextNode(harvest.weight);
  weight_row.appendChild(text);
  harvest_row.appendChild(weight_row);

  var date_row = document.createElement("TD");
  text = document.createTextNode(harvest.date);
  date_row.appendChild(text);
  harvest_row.appendChild(date_row);

  body.appendChild(harvest_row);

}

/**
 * Collects all harvest data and builds a harvest object
 */
function  get_harvest_object() {

  var greenhouse = document.getElementsByName('greenhouse')[0].value;
  var strain = document.getElementsByName('strain-code')[0].value;
  var weight = document.getElementsByName('weight')[0].value;
  var date = document.getElementsByName('date')[0].value;
  var time = document.getElementsByName('time')[0].value;
  var notes = document.getElementsByName('notes')[0].value;
  var batch_id = document.getElementsByName('batch_id')[0].value;
  var block_id = document.getElementsByName('block_id')[0].value;
  var strain_name = document.getElementsByName('strain-name')[0].value;

  var harvest = {};
  harvest.strain = strain;
  harvest.weight = weight;
  harvest.date = date;
  harvest.time = time;
  harvest.notes = notes;
  harvest.greenhouse = greenhouse;
  harvest.batch_id = batch_id;
  harvest.block_id = block_id;
  harvest.strain_name = strain_name;

  return harvest;
}
