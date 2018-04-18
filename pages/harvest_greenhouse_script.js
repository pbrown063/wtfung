var harvest_list = [];

function add_batch_to_harvest_list() {
  // Collect fields and push them onto the harvest_list for greenhouse.
  var greenhouse = document.getElementsByName('greenhouse');
  var batch_id = document.getElementsByName('batch');
  var strain = document.getElementsByName('strain');
  var weight = document.getElementsByName('weight');
  var date = document.getElementsByName('date');
  var time = document.getElementsByName('time');
  var notes = document.getElementsByName('notes');

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

  // Clear form and repopulate the greenhouse field value.
  document.getElementById('harvest_greenhouse_form').reset();
  document.forms['harvest_greenhouse_form'].elements['greenhouse'].value = greenhouse;


}

function submit_batches() {

  // READ https://stackoverflow.com/questions/10955017/sending-json-to-php-using-ajax

  $.ajax() = ({
    type: "POST",
    dataType: "json",
    url: "harvest_greenhous.php",
    data: {harvest_list_data:harvest_list},
    success: submit_batches(data){
      alert('Greenhouse harvest added');
  },
  error: submit_batches(e){
      console.log(e.message);
  }
  });
}