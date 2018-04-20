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
    <a class="dropdown-btn" href="#overview">Overview</a>


  </ul>

  <h1>USER MANUAL</h1>

  <h2 id="process">Production Process</h2>

  <h3 id="plates">1. Plating cultures using cultures stored in test tubes</h3>
    When making a new group of plates, the following information is tracked:
  <ul>
    <li>The Strain code</li>
    <li>Generation of culture</li>
    <li>Number of Plates </li>
    <li>Date of work.</li>
  </ul>

  <h3 id="jars">2. Splitting test plates into jars</h3>
  When splitting plates into jars, click the plate from the table that you want to split and enter:
  <ul>
    <li>Number of jars to make</li>
    <li>The substrate of the jar</li>
    <li>The number of plates you are processing</li>
    <li>The date of work done</li>
  </ul>


  <h3 id="bags">3. Sporing multiple bags using each jar</h3>
  This is where the <a href="#batches">batch</a> id is generated.

  <h3 id="blocks">4. Inoculating blocks with the culture from the bags</h3>

  <h3 id="harvest">5. Harvesting the fruiting mycellium from greenhouses</h3>

  <h2 id="batches">Batches</h2>

</div>
<script src="nav_script.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>

</html>



