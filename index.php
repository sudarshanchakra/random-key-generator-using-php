<?php
if(isset($_POST['input'])){
   
    $random = random_strings(15);
    $name = $_POST['input'];
    $key = $name . "_" . $random ;
  
  }
  
  function random_strings($length_of_string){
  
      // String of all alphanumeric character
      $str_result = 'abcdefghijklmnopqrstuvwxyz0123456789';
  
      // Shufle the $str_result and returns substring
      // of specified length
      return substr(str_shuffle($str_result),
                      0, $length_of_string);
  }
  
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Key Generator</title>
</head>
<body>
   <form action="random_key.php" method="post">
	<input type="text" name="input"></input>
	<button type="submite">Generate</button>
   </form>
   <h3><b><?php if(isset($key)){echo $key;} ?></b></h3>

</body>
</html>
