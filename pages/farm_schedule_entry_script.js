var entry_list = [];

/**
 * Pulls the harvest form data
 * Validates it
 * Pushes it onto the harvest list
 * Populates a table that shows harvests in queue
 */
function add_schedule_to_list() {

  document.getElementById("farm_schedule_entry_form").addEventListener("click", function(event){
    event.preventDefault()
  });

  // Collect fields and push them onto the schedule_list.
  var date = document.getElementByName('entry_date')[0].value;
  var strain = document.getElementByName('strain')[0].value;
  var substrate = document.getElementByName('substrate')[0].value;
  var phase = document.getElementByName('schedule_phase')[0].value;
  var volume = document.getElementByName('volume')[0].value;
  var notes = document.getElementByName('notes')[0].value;

  var entry = {};
  entry.date = date;
  entry.strain = strain;
  entry.substrate = substrate;
  entry.phase = phase;
  entry.volume = volume;
  entry.notes = notes;


  var validated = is_entry_valid(entry);

  if (validated) {

    entry_list.push(entry);

    add_entry_to_queue_table(entry);

    var tableTitle = document.createTextNode("ENTRY QUEUE TAQBLE");
    document.getElementById('entry-table-title').appendChild(tableTitle);
    document.getElementById('entry-table-title').style.display = "block";
    document.getElementById('entry-table').style.display = "block";


    document.getElementById('farm_schedule_entry_form').reset();
  }
}

/**
 * Builds json string and sends it to the server side.
 * deletes harvest data and refreshes page.
 */
function submit_schedule() {

  var json_harvest = JSON.stringify(entry_list);

  $.ajax({
    type: "POST",
    url: "farm_schedule_entry.php",
    data: {schedule:json_harvest},
    cache: false,
  });

  delete entry_list;
  delete entry;
  window.location.replace('farm_schedule_entry_form.php');
}


/**
 * Validates the harvest data.
 * Only processes one error at a time.
 */
function is_entry_valid(entry) {

  if (entry.notes.length < 1) {
    return confirm('Are you sure you want to create schedule entry with no notes?');
  }
  return true;
}

/**
 * Creates elements and adds a row to the harvest to the harvest queue table.
 * @param strain
 * @param weight
 * @param date
 *
 */
function add_entry_to_queue_table(entry) {
  document.getElementById("entry-queue-table").style.display = "block";
  var body = document.getElementById("entry-queue");
  var entry_row = document.createElement("TR");

  var date_row = document.createElement("TD");
  var text = document.createTextNode(entry.date);
  date_row.appendChild(text);
  entry_row.appendChild(date_row);

  var strain_row = document.createElement("TD");
  var text = document.createTextNode(entry.strain);
  strain_row.appendChild(text);
  entry_row.appendChild(strain_row);

  var phase_row = document.createElement("TD");
  var text = document.createTextNode(entry.phase);
  phase_row.appendChild(text);
  entry_row.appendChild(phase_row);

  var substrate_row = document.createElement("TD");
  var text = document.createTextNode(entry.substrate);
  substrate_row.appendChild(text);
  entry_row.appendChild(substrate_row);

  var volume_row = document.createElement("TD");
  var text = document.createTextNode(entry.volume);
  volume_row.appendChild(text);
  entry_row.appendChild(volume_row);


  body.appendChild(entry_row);

}