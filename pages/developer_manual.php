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

<h1>DEVELOPER DOCUMENTATION</h1>
<h3>Table of Contents</h3>
<ol>
  <li><a href="#database">Database</a>
    <ul><a href="#accounts">Accounts Table</a></ul>
    <ul><a href="#plates">Plates Table</a></ul>
    <ul><a href="#jars">Jars Table</a></ul>
    <ul><a href="#bags">Bags Table</a></ul>
    <ul><a href="#batches">Batches Table</a></ul>
    <ul><a href="#blocks">Blocks Table</a></ul>
    <ul><a href="#greenhouses">Greenhouses Table</a></ul>
    <ul><a href="#harvest">Harvests Table</a></ul>
  </li>
  <li><a href="#overview">Overview</a></li>
</ol>

Brian will create an account for each user that wants to do farming using
<em>account_form.php</em>
<h2>The Database</h2>
All of the information that is collected in the forms will be stored in a database called <em>whatthefungus</em>.
<table>
  <caption id="accounts">Accounts Table</caption>
  <tr>
    <th>firstname</th>
    <th>lastname</th>
    <th>email</th>
    <th>password</th>
  </tr>
  <tr>
    <td>varchar(30)</td>
    <td>varchar(30)</td>
    <td>varchar(30)</td>
    <td>varchar(30)</td>
  </tr>
</table>

<h3 id="plates">1. Plating cultures using samples stored in test tubes</h3>

<table>
  <caption>Plates Table</caption>
  <tr>
    <th>strain_code</th>
    <th>generation</th>
    <th>plate_count</th>
    <th>creation_date</th>
    <th>plate_id</th>
  </tr>
  <tr>
    <td>varchar(45)</td>
    <td>varchar(10)</td>
    <td>int(11)</td>
    <td>date</td>
    <td>int(11)</td>
  </tr>
</table>


<h3 id="jars">2. Splitting test plates into jars</h3>

<table>
  <caption>Jars Table</caption>
  <tr>
    <th>strain_code</th>
    <th>generation</th>
    <th>jar_count</th>
    <th>substrate</th>
    <th>creation_date</th>
    <th>plate_id</th>
  </tr>
  <tr>
    <td>varchar(45)</td>
    <td>varchar(10)</td>
    <td>int(11)</td>
    <td>varchar(45)</td>
    <td>date</td>
    <td>int(11)</td>
  </tr>
</table>


<h3 id="bags">3. Innoculating multiple bags using each jar</h3>

<table>
  <caption>Bags Table</caption>
  <tr>
    <th>user</th>
    <th>worker</th>
    <th>num_bags</th>
    <th>substrate</th>
    <th>batch_id</th>
    <th>creation_date</th>
    <th>notes</th>
  </tr>
  <tr>
    <td>varchar(50)</td>
    <td>varchar(50)</td>
    <td>int(11)</td>
    <td>varchar(45)</td>
    <td>int(11)</td>
    <td>date</td>
    <td>longtext</td>
  </tr>
</table>

Batches are generated at this point as well:

<table>
  <caption id="batches">Batches Table</caption>
  <tr>
    <th>id</th>
    <th>date</th>
    <th>letter_id</th>
    <th>strain_code</th>
    <th>plate_date</th>
    <th>notes</th>

  </tr>
  <tr>
    <td>int(11)</td>
    <td>date</td>
    <td>varchar(3)</td>
    <td>varchar(45)</td>
    <td>date</td>
    <td>longtext</td>
  </tr>
</table>





<h3 id="blocks">4. Inoculating blocks with the culture from the bags</h3>
<table>
  <caption>Blocks Table</caption>
  <tr>
    <th>greenhouse_id</th>
    <th>innoc_date</th>
    <th>is_empty</th>
    <th>is_full</th>
    <th>block_date</th>
    <th>batch_id</th>
  </tr>
  <tr>
    <td>varchar(25)</td>
    <td>date</td>
    <td>varchar(1)</td>
    <td>varchar(1)</td>
    <td>date</td>
    <td>int(11)</td>
  </tr>
</table>

<h3 id="greenhouses">5. Loading the blocks into greenhouses</h3>

<h3 id="harvest">6. Harvesting the fruiting mycellium from greenhouses</h3>

<table>
  <caption>Harvest Table</caption>
  <tr>
    <th>species</th>
    <th>date</th>
    <th>weight</th>
    <th>time</th>
    <th>notes</th>
    <th>batch_id</th>
  </tr>
  <tr>
    <td>varcahr(30)</td>
    <td>date</td>
    <td>float</td>
    <td>varchar(5)</td>
    <td>longtext</td>
    <td>int(11)</td>
  </tr>



  <h3 id="overview">BIRDS EYE VIEW</h3>

  <h5>An overview of the system as a whole is as follows:</h5>
  - <em>pages/bootstrap.php</em> includes the <em>includes</em> folder contents
  - <em>includes/</em> stores all of the functions used and is non-functional by itself
  - Each new php page should have the line <em>require_once __DIR__ . '/bootstrap.php';</em>
  -
</body>
</html>