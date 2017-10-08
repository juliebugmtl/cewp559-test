<?php

// Author: Julie Martin, 2017


$conn = mysqli_connect('mysql', 'root', 'root', 'CCE_PHPMySQL2');

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$result = mysqli_query($conn, 'SELECT ID, Name, Price FROM items');

if ($result) {

    while($row = mysqli_fetch_assoc($result)) {

    	echo "{$row['ID']} - {$row['Name']} - \${$row['Price']} <br/>";

    }

}

mysqli_close($conn);

$conn = mysqli_connect('mysql', 'root', 'root', 'CCE_PHPMySQL2');

if (!$conn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$result2 = mysqli_query($conn, 'SELECT SUM(price) FROM items');

if ($result2) {

    while($row2 = mysqli_fetch_assoc($result2)) {

    	$sumvalue = $row2['SUM(price)'];
    	var_dump($sumvalue);
    	$realnumber = floatval($sumvalue);
    	var_dump($realnumber);
    	$nicenumber = round($realnumber, 2, php_round_half_up);
    	var_dump($nicenumber);
    }

    	echo "<b>Total Price:</b> $" . $nicenumber;
    	
	}



mysqli_close($conn);
