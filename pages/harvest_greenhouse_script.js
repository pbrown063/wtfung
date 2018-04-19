var harvest_list = [];
var lock = false;

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

  var harvest = { };
  harvest.strain = strain;
  harvest.weight = weight;
  harvest.date = date;
  harvest.time = time;
  harvest.notes = notes;

  harvest_list.push(harvest);

  // Creates a new table row and outputs it on page
  document.getElementById("harvest-queue-table").style.display = "block";
  var body = document.getElementById("harvest-queue");
  var harvest_row = document.createElement("TR");

  var strain_row = document.createElement("TD");
  var text = document.createTextNode(strain);
  strain_row.appendChild(text);
  harvest_row.appendChild(strain_row);

  var weight_row = document.createElement("TD");
  var text = document.createTextNode(weight);
  weight_row.appendChild(text);
  harvest_row.appendChild(weight_row);

  var date_row = document.createElement("TD");
  var text = document.createTextNode(date);
  date_row.appendChild(text);
  harvest_row.appendChild(date_row);

  body.appendChild(harvest_row);



  if (!lock) {
    lock = true;
    document.getElementsByName("greenhouse")[0].disabled = true;
    var building = document.createTextNode("\u00A0" + greenhouse.toUpperCase());
    document.getElementById('harvest-table-caption').appendChild(building);
  }

  document.getElementById('harvest_greenhouse_form').reset();
}


function submit_harvests() {

  var json_harvest = JSON.stringify(harvest_list);


  $.ajax({
    type: "POST",
    url: "harvest_greenhouse.php",
    data: {harvest:json_harvest},
    cache: false,
  });

}