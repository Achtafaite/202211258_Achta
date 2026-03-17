<?php

$name  = "ACHTA FAITE";
$food  = "pizza";
$email = "achtafaite@gmail.com";


$age      = 30;
$users    = 1000;
$quantity = 10;


$price    = 10.99;
$tax_rate = 0.07;
$gpa      = 3.5;


$online   = false;
$employed = true;
$for_sale = true;


$total_price = $price * $quantity;
$tax_amount  = $total_price * $tax_rate;
$total_with_tax = $total_price + $tax_amount;


echo "The total price of the order is $total_price<br>";
echo "This is $name<br>";
echo "This is my $age year old<br>";
echo "hello $name<br>";
echo "I like $food<br>";
echo "My email is $email<br>";
echo "My name is $name and I am $age years old.<br>";
echo "The price of the pizza is $<br>";
echo "$price You are $age years old and your email is $email<br>";
echo "There are $users users and the quantity is $quantity<br>";
echo "The total price is $<br>";
echo "$total_price You would like to order $quantity pizzas and the total price is $<br>";
echo "$total_price Your GPA is $gpa<br>";
echo "Your pizza is $$price<br>";
echo "The tax is 7%<br>";
echo "The total price with tax is $<br>";
echo "$tax_amount The total price for $quantity pizzas with tax is $<br>";
echo "$total_with_tax The total price for $quantity pizzas with tax is $<br>";
echo "$total_with_tax The total price for $quantity pizzas with tax is $<br>";
echo "$total_with_tax The total price for $quantity pizzas with tax is $<br>";
echo "$total_with_tax Online status: " . ($online ? "Online" : "Offline") . "<br>";
echo "Employment status: " . ($employed ? "Employed" : "Unemployed") . "<br>";
echo "For sale: " . ($for_sale ? "Yes" : "No") . "<br>";
echo "You have ordered $quantity pizzas and the total price with tax is $<br>";
echo "$total_with_tax You have ordered $quantity x pizzas<br>";
echo "Your total price with tax is $total_price";
?>