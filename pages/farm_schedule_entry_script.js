var entry_list = [];
var lock = false;
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
  var date = document.getElementsByName('entry_date')[0].value;
  var strain = document.getElementsByName('strain')[0].value;
  var substrate = document.getElementsByName('substrate')[0].value;
  var phase = document.getElementsByName('schedule_phase')[0].value;
  var volume = document.getElementsByName('volume')[0].value;
  var notes = document.getElementsByName('notes')[0].value;

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

    if (!lock) {
      lock = true;
      var tableTitle = document.createTextNode("SCHEDULE ENTRY QUEUE");
      document.getElementsByClassName('table-title')[0].appendChild(tableTitle);
      document.getElementsByClassName('table-title')[0].style.display = "block";
      document.getElementById('schedule-queue-table').style.display = "block";
    }


    document.getElementById("farm_schedule_entry_form").reset();
  }
}

/**
 * Builds json string and sends it to the server side.
 * deletes schedule data and refreshes page.
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
 * var entry = {};
 entry.date = date;
 entry.strain = strain;
 entry.substrate = substrate;
 entry.phase = phase;
 entry.volume = volume;
 entry.notes = notes;

 */
function is_entry_valid(entry) {
  if (entry.strain.length < 1) {
    alert('Choose a strain');
    return false;
  }
  if (entry.substrate.length < 1) {
    alert('Choose a substrate');
    return false;
  }
  if (entry.phase.length < 1) {
    alert('Choose a phase');
    return false;
  }
  if (entry.volume < 0) {
    alert('Enter a positive value for number of items');
    return false;
  }
  if (isNaN(entry.volume)) {
    alert('Number of items must be a number');
    return false;
  }
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
  document.getElementById("schedule-queue-table").style.display = "block";
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