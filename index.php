<?php
$name="Adia";
$age=27;
$favorite_color="pink";

echo "My name is $name, I am $age years old and my favorite color is $favorite_color";
?>

<br>

<?php
echo " He said, \"PHP is fun!\" and left”";
echo " First line\nSecond line";
?>

<br>

<?php
$greeting = "Hello";
echo "Welcome to the PHP world!";
echo "Your age is $age";
?>

<br>

<?php
$name = "John";
echo "Welcome to PHP!";
echo "Hello, $name";
?>

<br>

<?php
#varible for cost of product
$price = 50;
//varible for discount
$discount = 10;
$finalPrice = $price - $discount;
echo "Total price: $" . $finalPrice;

/* This formula runs a discount price for a product
I dont really need to use this
but here i am writing multiple lines of comments */
?>

<br>

<?php
$number1 = 10;
$number2 = 5;

$addition = $number1 + $number2;
$subtraction = $number1 - $number2;
$multiplication = $number1 * $number2;
$division = $number1 / $number2;
$modulus = $number1 % $number2;

echo "Number 1:" . $number1 . "<br>";
echo "Number 2:" . $number2 . "<br>";
echo "Addition:" . $addition . "<br>";
echo "Subtraction:" . $subtraction . "<br>";
echo "Multiplication:" . $multiplication . "<br>";
echo "Division:" . $division . "<br>";
echo "Modulus:" . $modulus . "<br>";

?>

<?php
$number = 7;

if ($number %2==0) {
    echo "Input:" . $number;
    echo "Output:" . $number . "is an even number.";} 
else {
    echo "Input:" . $number;
    echo "Output:" . $number . "is an odd number.";}
?>

<br>

<?php
$number = 10;

echo "Starting number:" . $number;
$number++;
echo "After increment:" . $number;
$number--;
echo "After decrement:" . $number;
?>

<?php
$grade = 85;

if ($grade >= 90) {$lettergrade = "A";} 
    elseif ($grade >= 80) {$lettergrade = "B";} 
    elseif ($grade >= 70) {$lettergrade = "C";} 
    elseif ($grade >= 60) {$lettergrade = "D";} 
    else {$lettergrade = "F";}

echo "Input: " . $grade . "<br>";
echo "Output: You got a " . $lettergrade . "!";
?>

<?php
$year = 2024;

if ($year % 4 == 0) {
    echo "Input:" . $year . "<br>";
    echo "Output:" . $year . " is a leap year.";} 
    else { 
        echo "Input:" . $year . "<br>";
        echo "Output:" . $year . " is not a leap year.";}
?>