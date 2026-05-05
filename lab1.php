<?php
$length = 15;
$width = 8;
$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "1. Area: $area, Perimeter: $perimeter <br><br>";

$amount = 1200;
$vat = $amount * 0.15;
echo "2. VAT (15%): $vat <br><br>";

$num = 42;
if($num % 2 == 0) {
    echo "3. $num is Even <br><br>";
} else {
    echo "3. $num is Odd <br><br>";
}

$a = 45; $b = 88; $c = 22;
if($a > $b && $a > $c) {
    echo "4. Largest is: $a <br><br>";
} elseif($b > $a && $b > $c) {
    echo "4. Largest is: $b <br><br>";
} else {
    echo "4. Largest is: $c <br><br>";
}

echo "5. Odd numbers 10-100: ";
for($i = 10; $i <= 100; $i++) {
    if($i % 2 != 0) {
        echo "$i ";
    }
}
echo "<br><br>";

$list = ["laptop", "mouse", "keyboard", "monitor"];
$find = "keyboard";
$status = "Not Found";
foreach($list as $val) {
    if($val == $find) {
        $status = "Found";
        break;
    }
}
echo "6. Search '$find': $status <br><br>";

echo "7. Shapes: <br>";
for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";

echo "8. 2D Array Shapes: <br>";
$grid = [
    [1, 2, 3, "A"],
    [1, 2, "B", "C"],
    [1, "D", "E", "F"]
];

foreach($grid as $row) {
    foreach($row as $cell) {
        echo "$cell ";
    }
    echo "<br>";
}
?>