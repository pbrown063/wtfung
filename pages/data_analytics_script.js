document.getElementsByName('sort-type')[0].disabled = true;


function phaseEntry() {

  // Write a script that produces a select / option dropdown for Sort Criteria based on Production Phase.
  phase = document.getElementsByName('phase')[0].value;

  add_sort_field(phase);
  document.getElementsByName('sort-type')[0].disabled = false;



}





function add_sort_field(phase) {

  var option = "";
  var select_field = document.getElementsByName("sort-type")[0];
  select_field.length = 0;

  if (phase === "plate") {
    option = document.createElement("option");
    option.text = "Select Plate Data Sort Criteria";
    option.value = "";
    option.disable = true;
    option.selected = true;
    option.hidden = true;
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Strain";
    option.value = "plate_strain";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Date";
    option.value = "plate_date";
    select_field.add(option);
  }

  else if (phase === "jar") {
    option = document.createElement("option");
    option.text = "Select Jar Data Sort Criteria";
    option.value = "";
    option.disable = true;
    option.selected = true;
    option.hidden = true;
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Strain";
    option.value = "jar_strain";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Substrate";
    option.value = "jar_substrate";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Date";
    option.value = "jar_date";
    select_field.add(option);
  }

  else if (phase === "bag") {
    option = document.createElement("option");
    option.text = "Select Bag Data Sort Criteria";
    option.value = "";
    option.disable = true;
    option.selected = true;
    option.hidden = true;
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Strain";
    option.value = "bag_strain";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Substrate";
    option.value = "bag_substrate";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Date";
    option.value = "bag_date";
    select_field.add(option);
  }

  else if (phase === "block") {
    option = document.createElement("option");
    option.text = "Select Block Data Sort Criteria";
    option.value = "";
    option.disable = true;
    option.selected = true;
    option.hidden = true;
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Strain";
    option.value = "block_strain";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Substrate";
    option.value = "block_substrate";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Sort By Date";
    option.value = "block_date";
    select_field.add(option);
  }

  else if (phase === "harvest") {

    option = document.createElement("option");
    option.text = "Select Harvest Data Sort Criteria";
    option.value = "";
    option.disable = true;
    option.selected = true;
    option.hidden = true;
    select_field.add(option);

    // This query is broken right now ... get_total_harvest_by_date()
    // option = document.createElement("option");
    // option.text = "Totals By Day";
    // option.value = "harvest_day";
    // select_field.add(option);

    option = document.createElement("option");
    option.text = "Results By Greenhouse";
    option.value = "harvest_greenhouse";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "Results By Species";
    option.value = "harvest_species";
    select_field.add(option);

    option = document.createElement("option");
    option.text = "All Harvest Data In Range";
    option.value = "harvest_all_data";
    select_field.add(option);
  }
}
