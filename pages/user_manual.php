<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Schedule Entry</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">

</head>
<body>
<?php include 'header.php'; ?>


<div class="container">
  <h3>Table of Contents</h3>

  <ul>
    <button class="dropdown-btn">Production Process
    </button>
    <div class="dropdown-container, table-of-contents">
      <ul><a href="#plates">Plates</a></ul>
      <ul><a href="#jars">Jars</a></ul>
      <ul><a href="#bags">Bags</a></ul>
      <ul><a href="#blocks">Blocks</a></ul>
      <ul><a href="#harvest">Harvesting</a></ul>
      <ul><a href="#batches">Batches</a></ul>
    </div>
    <button class="dropdown-btn">Admin Options
    </button>
    <div class="dropdown-container, table-of-contents">
      <ul><a href="#strain">Add New Strain</a></ul>
      <ul><a href="#substrate">Add New Substrate</a></ul>
      <ul><a href="#building">Add New Building</a></ul>
      <ul><a href="#new-event">Add Scheduling Events</a></ul>
      <ul><a href="#view-schedule">View Farm Schedule</a></ul>
      <ul><a href="#data">Data Analytics</a></ul>
      <ul><a href="#account">Create Account</a></ul>
      <ul><a href="#dev">Dev Docs</a></ul>
    </div>


  </ul>

  <h1>USER MANUAL</h1>

  <h2 id="process">Production Process</h2>

  <h3 id="plates">1. Plating cultures using cultures stored in test tubes</h3>
  When <a href="plate_form.php">making a new group of plates</a>, the following information is tracked:
  <ul>
    <li>The Strain code</li>
    <li>Generation of culture</li>
    <li>Number of Plates </li>
    <li>Date of work.</li>
  </ul>

  <h3 id="jars">2. Splitting test plates into jars</h3>
  When <a href="plate_form.php">splitting plates into jars</a>, click the plate from the table that you want to split and enter:
  <ul>
    <li>Number of jars to make</li>
    <li>The substrate of the jar</li>
    <li>The number of plates you are processing</li>
    <li>The date of work done</li>
  </ul>


  <h3 id="bags">3. Sporing multiple bags using each jar</h3>
  This is where the <a href="#batches">batch</a> id is generated.  Jars filled with mycelium colony
  will be added to sterilized bags filled with a substrate.  The following information will be entered:
  <ul>
    <li>Batch name (eg A1, C3, etc)</li>
    <li>Substrate in the bag</li>
    <li>Number of bags being made</li>
    <li>Date of work</li>
    <li>The person who made the bags</li>
    <li>Any notes about this phase</li>
  </ul>

  <h3 id="blocks">4. Inoculating blocks with the culture from the bags</h3>
  Blocks are created.

  <h3 id="harvest">5. Harvesting the fruiting mycellium</h3>
  The fruit is flushed and <a href="harvest_ampm_form.php">harvested</a> from blocks.  Our system allows multiple
  harvests entries to be done at once.
  Harvesting is done according to three strategies:
  <ul>
    <li>Harvest a greenhouse</li>
    <li>Harvest a species across many greenhouses</li>
    <li>Harvest everything at a certain time</li>
  </ul>
  Each strategy employed requires the same information:
  <ul>
    <li>Greenhouse harvested</li>
    <li>Strain</li>
    <li>Weight</li>
    <li>Date</li>
    <li>Time of Day</li>
    <li>Any Notes</li>
  </ul>


  <h2 id="batches">Batches</h2>

  <h2 id="admin"></h2>

  <h3 id="strain">Add a strain to the strains library</h3>
  <a href="strain_form.php">Adding a new strain</a> to the strains library is quick and easy and will be used
  to autopopulate forms that call on strains.  You will need to enter:
  <ul>
    <li>Unique strain code</li>
    <li>Scientific name of strain</li>
    <li>The abreviated shorthand</li>
    <li>Common name of mushroom</li>
    <li>Notes</li>
  </ul>

  <h3 id="substrate">Add a substrate to the substrate library</h3>
  <a href="substrate_form.php">A new substrate</a> can be added with the following information:
  <ul>
    <li>Name of the substrate</li>
    <li>Notes about the substrate</li>
  </ul>

  <h3 id="building">Add a new building</h3>
  <a href="building_form.php">New buildings</a> such as greenhouses, labs or sterilization sheds can be added.

  <h3 id="new-event">Farm plans and events can be added to the schedule</h3>
  <a href="farm_schedule_entry_form.php">Making an entry into the farming schedule</a> lets you enter an event based on the following information:
  <ul>
    <li>Date</li>
    <li>Strain</li>
    <li>Substrate</li>
    <li>Production Phase</li>
    <li>Number of Items</li>
    <li>Notes</li>
  </ul>

  <h3 id="view-schedule">The schedule can be viewed through various filters</h3>
  Selecting the <em>From</em> and <em>To</em> dates will determine the time
  window that you will view. <a href="farm_schedule_view_form.php">The schedule</a> can be viewed through the following
  production phase filters:
  <ul>
    <li>Transfer to Plates</li>
    <li>Innoculate Jars</li>
    <li>Sterilize and Innoculate Bags</li>
    <li>Bag Blocks</li>
    <li>Display Complete Schedule</li>
  </ul>

  <h3 id="data">Data Analytics</h3>
  <a href="data_analytics_tables.php">Harvest data</a> can be called upon.  Selecting the <em>From</em> and <em>To</em>
  dates will determine the harvest window that you want to see. Harvest totals
  can be sorted in several ways:
  <ul>
    <li>By day (AM / PM / Total)</li>
    <li>By species</li>
    <li>By building (greenhouse)</li>
    <li>All harvest data for window</li>
  </ul>

  <h3 id="account">Adding a new account</h3>
  <a href="account_form.php">Creating a new account</a> is straightforward and based on the following:
  <ul>
    <li>First Name</li>
    <li>Last Name</li>
    <li>Unique Email Address</li>
    <li>Password</li>
  </ul>

  <h3 id="dev">Developer Documentation</h3>
  The <a href="developer_manual.php">developer documentation</a> is there to help a developer who is unfamiliar
  with the codebase and design get a better sense of how to
  modify or add to the software.






</div>
<script src="nav_script.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>



