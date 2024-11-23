
<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Kredytowy</title>
</head>
<body>
    <h1>Kalkulator Kredytowy</h1>
    <form method="post" action="calc.php">
        <label>Kwota: <input type="text" name="amount" value="{$form->amount}" /></label><br />
        <label>Oprocentowanie (%): <input type="text" name="interest" value="{$form->interest}" /></label><br />
        <label>Lata: <input type="text" name="years" value="{$form->years}" /></label><br />
        <button type="submit">Oblicz</button>
    </form>
    {if $messages}
        <ul>
            {foreach $messages as $message}
                <li>{$message}</li>
            {/foreach}
        </ul>
    {/if}
    {if $result->monthlyPayment}
        <h2>Wynik</h2>
        <p>Miesięczna rata: {$result->monthlyPayment}</p>
        <p>Całkowita kwota: {$result->totalPayment}</p>
    {/if}
</body>
</html>
