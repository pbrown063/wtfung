var harvest_list = [];
var lock = false;

/**
 * Pulls the harvest form data
 * Validates it
 * Pushes it onto the harvest list
 * Populates a table that shows harvests in queue
 */
function add_harvest_to_list() {

  document.getElementById("harvest_greenhouse_form").addEventListener("click", function(event){
    event.preventDefault()
  });

  // Collect fields and push them onto the harvest_list for greenhouse.
  var greenhouse = document.getElementsByName('greenhouse')[0].value;
  var strain = document.getElementsByName('strain')[0].value;
  var weight = document.getElementsByName('weight')[0].value;
  var date = document.getElementsByName('date')[0].value;
  var time = document.getElementsByName('time')[0].value;
  var notes = document.getElementsByName('notes')[0].value;


  var harvest = {};
  harvest.strain = strain;
  harvest.weight = weight;
  harvest.date = date;
  harvest.time = time;
  harvest.notes = notes;
  harvest.greenhouse = greenhouse;

  var validated = is_harvest_valid(harvest);

  if (validated) {

    harvest_list.push(harvest);

    add_harvest_to_queue_table(harvest);

    if (!lock) {
      document.getElementsByName("greenhouse")[0].disabled = true;
      var tableTitle = document.createTextNode("\u00A0" + greenhouse.toUpperCase());
      document.getElementById('harvest-table-title').appendChild(tableTitle);
      document.getElementById('harvest-table-title').style.display = "block";
    }

    document.getElementById('harvest_greenhouse_form').reset();
  }
}

/**
 * Builds json string and sends it to the server side.
 */
function submit_harvests() {

  var json_harvest = JSON.stringify(harvest_list);

  $.ajax({
    type: "POST",
    url: "harvest_greenhouse.php",
    data: {harvest:json_harvest},
    cache: false,
  });

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
function add_harvest_to_queue_table(harvest) {
  document.getElementById("harvest-queue-table").style.display = "block";
  var body = document.getElementById("harvest-queue");
  var harvest_row = document.createElement("TR");

  var strain_row = document.createElement("TD");
  var text = document.createTextNode(harvest.strain);
  strain_row.appendChild(text);
  harvest_row.appendChild(strain_row);

  var weight_row = document.createElement("TD");
  var text = document.createTextNode(harvest.weight);
  weight_row.appendChild(text);
  harvest_row.appendChild(weight_row);

  var date_row = document.createElement("TD");
  var text = document.createTextNode(harvest.date);
  date_row.appendChild(text);
  harvest_row.appendChild(date_row);

  body.appendChild(harvest_row);

}