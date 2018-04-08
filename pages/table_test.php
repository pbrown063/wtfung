<?php
  function plate_table()
  {

    $mysqli = sql_connect();
    $substrate = "SELECT * FROM plates WHERE plate_count >= 1";
    $sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

    echo '
    <table>
      <thead>
        <tr>
            <th>id</th>
            <th>strain code</th>
            <th>plate number</th>
            <th>generation</th>
            <th>creation date</th>
        </tr>
      </thead>
      <tbody> ';
    while ($row = $sql->fetch_assoc()) {
      echo '
       <tr>
          <td>' . $row["plate_id"] . '</td>
          <td>' . $row["strain_code"] . '</td>
          <td>' . $row["plate_count"] . '</td>
          <td>' . $row["generation"] . '</td>
          <td>' . $row["creation_date"] . '</td>
       </tr>';
    }
    echo '</tbody>
    </table>
';
    mysqli_close($mysqli);
  }






