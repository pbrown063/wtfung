#DEVELOPER DOCUMENTATION
Brian will create an account for each user that wants to do farming using 
`account_form.php`

  ##1. Plating cultures using samples stored in test tubes
  
  
  ##2. Splitting test plates into jars
  
  ##3. Sporing multiple bags using each jar
   
  ##4. Inoculating blocks with the culture from the bags
  
  ##5. Loading the blocks into greenhouses
   
  ##6. Harvesting the fruiting mycellium from greenhouses
  
##BIRDS EYE VIEW

An overview of the system as a whole is as follows:
 - `pages/bootstrap.php` includes the `includes` folder contents
 - `includes/` stores all of the functions used and is non-functional by itself
 - Each new php page should have the line ``require_once __DIR__ . '/bootstrap.php';``
 - 
