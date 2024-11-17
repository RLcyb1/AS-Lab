<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Kalkulator kredytowy</title>
</head>
<body>
    <h1>Kalkulator kredytowy</h1>
    <form action="<?php print(_APP_URL); ?>/app/calc.php" method="post">
        <label for="id_amount">Kwota kredytu: </label>
        <input id="id_amount" type="text" name="amount" value=""><br>
        <label for="id_years">Okres spłaty (lata): </label>
        <input id="id_years" type="text" name="years" value=""><br>
        <label for="id_rate">Oprocentowanie (%): </label>
        <input id="id_rate" type="text" name="rate" value=""><br>
        <input type="submit" value="Oblicz">
    </form>

    <?php
    // Wyświetlenie błędów, jeśli istnieją
    if (isset($messages) && count($messages) > 0) {
        echo '<ol style="margin: 20px; padding: 10px; background-color: #f88; border-radius: 5px;">';
        foreach ($messages as $msg) {
            echo '<li>' . $msg . '</li>';
        }
        echo '</ol>';
    }
    ?>

    <?php if (isset($result)) { ?>
        <div style="margin: 20px; padding: 10px; background-color: #cff; border-radius: 5px;">
            Miesięczna rata: <?php echo $result; ?>
        </div>
    <?php } ?>
</body>
</html>
