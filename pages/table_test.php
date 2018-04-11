<?php
  function display_snack($n){
    $toast;
      switch ($n){
        case 1:
          $toast = "Welcome";
          break;

        case 2:
          $toast = "The data has been saved!";
          break;

        case 3:
          $toast = "";
          break;

      }
      echo '<div id="snackbar">'.$toast.'</div>';
  }






