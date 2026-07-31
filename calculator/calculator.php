<?php
$result = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $operator = $_POST['operator'] ?? '';

    if (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Please enter valid numbers.";
    } else {
        $num1 = (float) $num1;
        $num2 = (float) $num2;

        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $error = "Cannot divide by zero.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $error = "Invalid operator selected.";
        }

        // Clean up whole numbers (e.g. 4.0 -> 4)
        if ($result !== null && $result == (int) $result) {
            $result = (int) $result;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Calculator</title>
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Arial, sans-serif;
}

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgb(255, 255, 255);
}

.calculator {
  background: #179737;
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 10px 30px rgba(33, 155, 8, 0.4);
  width: 320px;
}

h1 {
  color: #fff;
  font-size: 20px;
  margin-bottom: 20px;
  text-align: center;
}

.field {
  margin-bottom: 15px;
}

input[type="text"],
select {
  width: 100%;
  padding: 12px;
  font-size: 16px;
  border: none;
  border-radius: 8px;
  background: #14141f;
  color: #0cb53c;
}

select {
  cursor: pointer;
}

button {
  width: 100%;
  padding: 14px;
  font-size: 16px;
  border: none;
  border-radius: 8px;
  background: #d1c737;
  color: #fff;
  cursor: pointer;
  margin-top: 5px;
  transition: background 0.15s ease;
}

button:hover {
  background: #5fe14a;
}

.result {
  margin-top: 20px;
  padding: 15px;
  background: #14141f;
  border-radius: 8px;
  color: #4cd137;
  font-size: 22px;
  text-align: right;
}

.error {
  margin-top: 20px;
  padding: 15px;
  background: #14141f;
  border-radius: 8px;
  color: #ee5253;
  text-align: center;
}
</style>
</head>
<body>

  <div class="calculator">
    <h1>Calculator</h1>

    <form method="POST" action="">
      <div class="field">
        <input type="text" name="num1" placeholder="Enter Number One"
               value="<?= isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : '' ?>">
      </div>

      <div class="field">
        <select name="operator">
          <option value="+" <?= (($_POST['operator'] ?? '') === '+') ? 'selected' : '' ?>>+</option>
          <option value="-" <?= (($_POST['operator'] ?? '') === '-') ? 'selected' : '' ?>>−</option>
          <option value="*" <?= (($_POST['operator'] ?? '') === '*') ? 'selected' : '' ?>>×</option>
          <option value="/" <?= (($_POST['operator'] ?? '') === '/') ? 'selected' : '' ?>>÷</option>
        </select>
      </div>

      <div class="field">
        <input type="text" name="num2" placeholder="Enter Number Two"
               value="<?= isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : '' ?>">
      </div>

      <button type="submit">Calculate</button>
    </form>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($result !== null): ?>
      <div class="result">= <?= htmlspecialchars($result) ?></div>
    <?php endif; ?>

  </div>

</body>
</html>