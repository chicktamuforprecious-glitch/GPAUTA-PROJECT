<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <?php

 $num1 = isset($_POST['num1']) ? $_POST['num1'] : null;
 $num2 = isset($_POST['num2']) ? $_POST['num2'] : null;
 $operation = isset($_POST['operation']) ? $_POST['operation'] : null;

 $result = null;
 $error = mull;

 if (!is_numeric($num1)|| !is_numberic($num2)) {
    $error = "Please enter valid numbers.";
 }else {
    $num1 = floatval($num1);
     $num2 = floatval($num2);
     switch ($operation){
        case 'add':
            $result = $num1 + $num2;
            break;
             case 'subtract':
            $result = $num1 - $num2;
            break;
             case 'multiply':
            $result = $num1 * $num2;
            break;
             case 'divide':
            if ($num2 == 0){
                $error = "Cannot divide by zero.";
            } else{
                $result =$num1 / $num2;
            }         
                break;
                default:
                $error = "Invalid operation.";
     }
}
?>
</body>
 </html>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
   <style>
    body { font-family: Arial, sans-serif; background #f2f2f2; diplay: flex; justify-content: center; padding-top: 50px; }
    .calc-box { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.15); width: 300px; }
    input[type=text] { width: 100%; padding: 8px; margin: 6px 0; box-sizing: border-box; }
    select { width: 100%; padding: 8px; margin: 6px 0; }
    input[type=submit] { width: 100%; padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
    .result { margin-top: 15px; font-size: 18px; font-weight: bold; text-align: center; }
   </style> 
</head>
<body>
    
<div class="calc-box">
    <h2>Calculator</h2>
    <form action="calculate.php" method="post">
        <input type="text" name="num1" placeholder="Enter first number" required>
        <select name="operation">
            <option value="add">+</option>
           <option value="subtract">-</option>
           <option value="multiply">x</option>
           <option value="divide">/</option> 
        </select>
        <input type="text" name="num2" placeholder="Enter second number" required>
         <input type="submit" value="Calculate">
  </form>
</div>

</body>
</html>