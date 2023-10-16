<?php
if(isset($_POST['input'])){
    $input = $_POST['input'];

    // Validate the input
    if (strlen($input) >= 6 && preg_match('/^[A-Za-z0-9_]+$/', $input)) {
        // Generate a secure random string for added security
        $random = bin2hex(random_bytes(16));

        // Concatenate the input and random string
        $key = $input . "_" . $random;
    } else {
        $error = "Input should be at least 6 characters long and contain only letters, numbers, and underscores.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Key Generator</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        h3 {
            text-align: center;
            color: #007bff;
        }

        p.error {
            color: red;
        }
    </style>
</head>
<body>
   <h1>API Key Generator</h1>
   <form action="random_key.php" method="post">
        <input type="text" name="input" placeholder="Enter a valid input"></input>
        <button type="submit">Generate</button>
   </form>
   <?php if(isset($key)) : ?>
      <h3><b>Generated API Key:</b></h3>
      <p><?php echo $key; ?></p>
   <?php endif; ?>
   <?php if(isset($error)) : ?>
      <p class="error"><?php echo $error; ?></p>
   <?php endif; ?>
</body>
</html>

