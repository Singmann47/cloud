<?php 
include 'includes/header.php'; 
?>

<form method="post" action="calculator.php">
    <input type="number" name="num1" placeholder="Prvé číslo">
    <select name="operation">
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="number" name="num2" placeholder="Druhé číslo">
    <input type="submit" name="submit" value="Spočítaj">
</form>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (isset($_POST['submit'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            $operation_symbol = "+";
            break;
        case "krát":
            $result = $num1 - $num2;
            $operation_symbol = "-";
            break;
        case "multiply":
            $result = $num1 * $num2;
            $operation_symbol = "*";
            break;
        case "divide":
            if ($num2 != 0) {
                $result = $num1 / $num2;
                $operation_symbol = "/";
            } else {
                echo "Nulou sa NEDELIIII!!!";
                exit();
            }
            break;
    }

    echo "<p>Výsledok je: " . $result . "</p>";

    $file = fopen("vypocet.txt", "a");
    $write = fwrite($file, $num1 . " " . $operation_symbol . " " . $num2 . " = " . $result . "\n");
        
    if($write === false) {
        echo 'Nezapísalo do súboru';
    } else {
        echo 'Zapísalo do súboru';
    }

    fclose($file);
}
?>

<?php include 'includes/footer.php'; ?>
