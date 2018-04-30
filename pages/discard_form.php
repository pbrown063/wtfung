<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Harvest Species</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">

</head>
<body>
<?php include 'header.php'; ?>


<div class="container">
  <ul class="flex-outer">
    <h1>Discard Inventory</h1>
    <form method="POST" action="discard.php" id='discard_form'>
      <ul class="flex-outer">
        <li class="icon">
          <select name="phase" required onchange="phaseEntry()">
            <option value="" disabled selected hidden>Select Production Phase</option>
            <option value="plate">Plating Records</option>
            <option value="jar">Jarring Records</option>
            <option value="bag">Innoculating Bags</option>
            <option value="block">Blocking</option>
          </select>
        </li>
        <li>
          <button onclick="return add_time_entry_to_list()" value='add_harvest'>add item</button>
        </li>
      </ul>
    </form>
  </ul>
</div>

<h3 class="table-title"> </h3>
<div class="contain" id="discard-queue-table">

  <table>
    <thead>
    <tr>
      <th>date</th>
      <th>batch</th>
      <th>strain</th>
      <th>stock remaining</th>
    </tr>
    </thead>
    <tbody id="discard-queue">

    </tbody>
  </table>
</div>


<ul class="flex-outer">
  <li>
    <button form='discard_form' onclick="submit_discard()">confirm discard</button>
  </li>
</ul>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="discard_script.js" type="text/javascript"></script>
</html>
