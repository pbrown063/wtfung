var harvest_list = [];

function add_batch_to_harvest_list() {

  document.getElementById("harvest_greenhouse_form").addEventListener("click", function(event){
    event.preventDefault()
  });

  // Collect fields and push them onto the harvest_list for greenhouse.
  var greenhouse = document.getElementsByName('greenhouse')[0].value;
  var batch_id = document.getElementsByName('batch')[0].value;
  var strain = document.getElementsByName('strain')[0].value;
  var weight = document.getElementsByName('weight')[0].value;
  var date = document.getElementsByName('date')[0].value;
  var time = document.getElementsByName('time')[0].value;
  var notes = document.getElementsByName('notes')[0].value;

  var batch = {
    greenhouse: greenhouse,
    batch: batch_id,
    strain: strain,
    weight: weight,
    date: date,
    time: time,
    notes: notes
  };

  harvest_list.push(batch);

  // Creates a new table row and outputs it on page
  document.getElementById("harvest-queue-table").style.display = "block";
  var body = document.getElementById("harvest-queue");
  var harvest_row = document.createElement("TR");

  var batch_row = document.createElement("TD");
  var text = document.createTextNode(batch_id);
  batch_row.appendChild(text);
  harvest_row.appendChild(batch_row);

  var strain_row = document.createElement("TD");
  var text = document.createTextNode(strain);
  strain_row.appendChild(text);
  harvest_row.appendChild(strain_row);

  var weight_row = document.createElement("TD");
  var text = document.createTextNode(weight);
  weight_row.appendChild(text);
  harvest_row.appendChild(weight_row);

  body.appendChild(harvest_row);


  document.getElementById('harvest_greenhouse_form').reset();
}

function submit_batches() {

  // READ https://stackoverflow.com/questions/10955017/sending-json-to-php-using-ajax

}