
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Kalkulator kredytowy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background-color: #6200ea;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        .button-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .custom-button {
            background-color: #333;
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
        .custom-button:hover {
            background-color: #444;
        }
        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            color: white;
            background-color: #6200ea;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45009d;
        }
        .messages {
            margin: 20px 0;
            padding: 10px;
            background-color: #ffcccc;
            border-left: 4px solid #ff0000;
            border-radius: 5px;
        }
        .result {
            margin: 20px 0;
            padding: 10px;
            background-color: #ccffcc;
            border-left: 4px solid #00cc00;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<header>
    <h1>Kalkulator kredytowy</h1>
</header>
<div class="button-container">
    <button class="custom-button" onclick="alert('Button clicked!')">Click Me!</button>
</div>
<main>
    <form action="<?php print(_APP_URL); ?>/app/calc.php" method="post">
        <label for="id_amount">Kwota kredytu:</label>
        <input id="id_amount" type="text" name="amount" value="">
        <label for="id_years">Okres spłaty (lata):</label>
        <input id="id_years" type="text" name="years" value="">
        <label for="id_rate">Oprocentowanie (%):</label>
        <input id="id_rate" type="text" name="rate" value="">
        <input type="submit" value="Oblicz">
    </form>
    <?php if (isset($messages) && count($messages) > 0): ?>
        <div class="messages">
            <ul>
                <?php foreach ($messages as $msg): ?>
                    <li><?php echo $msg; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <?php if (isset($result)): ?>
        <div class="result">
            <p>Miesięczna rata: <?php echo $result; ?></p>
        </div>
    <?php endif; ?>
</main>
</body>
</html>
