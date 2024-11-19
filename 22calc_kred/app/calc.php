<?php
require_once dirname(__FILE__) . '/../config.php';

// Pobranie parametrów
$amount = isset($_POST['amount']) ? $_POST['amount'] : null;
$years = isset($_POST['years']) ? $_POST['years'] : null;
$rate = isset($_POST['rate']) ? $_POST['rate'] : null;

// Walidacja parametrów
$messages = [];
if (!isset($amount) || !isset($years) || !isset($rate)) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($amount == "") {
    $messages[] = 'Nie podano kwoty kredytu.';
}
if ($years == "") {
    $messages[] = 'Nie podano liczby lat.';
}
if ($rate == "") {
    $messages[] = 'Nie podano oprocentowania.';
}

if (empty($messages)) {
    if (!is_numeric($amount) || $amount <= 0) {
        $messages[] = 'Kwota kredytu musi być liczbą większą od zera.';
    }
    if (!is_numeric($years) || $years <= 0) {
        $messages[] = 'Liczba lat musi być liczbą większą od zera.';
    }
    if (!is_numeric($rate) || $rate < 0) {
        $messages[] = 'Oprocentowanie musi być liczbą nieujemną.';
    }
}

if (empty($messages)) {
    // Obliczenia
    $amount = floatval($amount);
    $years = intval($years);
    $rate = floatval($rate);

    $months = $years * 12;
    $monthly_rate = $rate / 100 / 12;

    if ($monthly_rate > 0) {
        $monthly_payment = $amount * $monthly_rate / (1 - pow(1 + $monthly_rate, -$months));
    } else {
        $monthly_payment = $amount / $months; // Gdy oprocentowanie wynosi 0
    }

    $result = number_format($monthly_payment, 2, ',', ' ') . ' zł';
}

// Załączenie widoku
include dirname(__FILE__) . '/calc_view.php';
?>
