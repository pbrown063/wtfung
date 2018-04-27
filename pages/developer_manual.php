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
    <button class="toc-dropdown-btn">Database</button>
    <div class="toc-dropdown-container, table-of-contents">
      <ul><a href="#accounts">Accounts Table</a></ul>
      <ul><a href="#plates">Plates Table</a></ul>
      <ul><a href="#jars">Jars Table</a></ul>
      <ul><a href="#bags">Bags Table</a></ul>
      <ul><a href="#batches">Batches Table</a></ul>
      <ul><a href="#blocks">Blocks Table</a></ul>
      <ul><a href="#greenhouses">Greenhouses Table</a></ul>
      <ul><a href="#harvest">Harvests Table</a></ul>
    </div>

    <a class="toc-dropdown-btn" href="#overview">Overview</a>
    <a class="toc-dropdown-btn" href="#fresh">Fresh Install</a>
  </ul>


  <h1>DEVELOPER DOCUMENTATION</h1>

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
  </table>


  <h3 id="overview">BIRDS EYE VIEW</h3>

  <h5>An overview of the system as a whole is as follows:</h5>
  <ul>
    <li><em>pages/bootstrap.php</em> includes the <em>includes</em> folder contents</li>
    <li><em>includes/</em> stores all of the functions used and is non-functional by itself</li>
    <li>Each new php page should have the line <em>require_once __DIR__ . '/bootstrap.php';</em></li>

    <li>There are two different types of tables for each of the production phases, excluding harvest which is independent</li>
    <ul>
      <li><h4>static tables</h4></li>
      <ul>
        <li>once inserts are made, updates are never done</li>
        <li>these tables act as a record of creation</li>
      </ul>
    </ul>
    <ul>
      Creating a static table would look something like this:
      <pre class="flex-inner">
        CREATE TABLE blocks_creation (
        num_blocks int,
        substrate varchar(45),
        creation_date date,
        strain_code varchar(45),
        batch_id int,
        bag_id int,
        notes longtext,
        id int not null);

        ALTER TABLE blocks_creation ADD PRIMARY KEY (id);
        ALTER TABLE blocks_creation MODIFY COLUMN id INT auto_increment;
        ALTER TABLE blocks_creation AUTO_INCREMENT=101;

        ALTER TABLE blocks_creation
          ADD CONSTRAINT FK_from_bag_creation
          FOREIGN KEY (bag_id) REFERENCES bags_creation(id);
      </pre>
      Comparing this to the dynamic table schema illustrates that we store a foreign key to the previous phase as well as notes about the creation event.
      <li><h4>dynamic tables</h4></li>
      <ul>
        <li>inserts are made</li>
        <li>updates are done over time</li>
        <li>a snapshot will represent the current state of that phase</li>
      </ul>
    </ul>

    Following is an example of a dynamic table creation:
    <pre class="flex-outer">
    <div class="flex-inner">
      CREATE TABLE blocks (
      num_blocks int,
      substrate varchar(45),
      creation_date date,
      strain_code varchar(45),
      batch_id int,
      id int not null);

      ALTER TABLE blocks ADD PRIMARY KEY (id);
      ALTER TABLE blocks MODIFY COLUMN id INT auto_increment;
      ALTER TABLE blocks AUTO_INCREMENT=101;
    </div>
  </pre>
  </ul>
  <h3 id="fresh">Fresh Install</h3>
  Sometimes it may be required to remove all of the old data and start from scratch, creating a new administrator user.
  An example of this is during a fresh installation of the site.
  NOTE: This will delete all of the previous data that has been entered and should never
  be done by anyone who is not qualified and familiar with SQL as well as the client company:
  <pre class="flex-outer">
  <div class="flex-inner">
        delete from bags;
        delete from bags_creation;
        delete from jars;
        delete from jars_creation;
        delete from plates;
        delete from plates_creation;
        delete from batches;
        delete from blocks;
        delete from blocks_creation;
        delete from building;
        delete from harvest;
        delete from account;

        ALTER TABLE plates_creation AUTO_INCREMENT=101;
        ALTER TABLE jars_creation AUTO_INCREMENT=101;
        ALTER TABLE bags_creation AUTO_INCREMENT=101;
        ALTER TABLE blocks_creation AUTO_INCREMENT=101;
        ALTER TABLE plates AUTO_INCREMENT=101;
        ALTER TABLE jars AUTO_INCREMENT=101;
        ALTER TABLE bags AUTO_INCREMENT=101;
        ALTER TABLE batches AUTO_INCREMENT=101;
        ALTER TABLE blocks AUTO_INCREMENT=101;

        INSERT INTO account
        VALUES ('Jack', 'Smith', 'jsmite@email.com', 'password');
      <div class="flex-inner">

</pre>
</div>
<script src="manual_script.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>