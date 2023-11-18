<?php 
    $conn = new mysqli('localhost', 'root', '', 'products_db');
    
    print_r($_POST);
    if (empty($_POST['product_name2']) || empty($_POST['product_price2'])) {
        echo 'missed input';
    }else {
        echo 'kain <br>';
        echo $_POST['product_id'];
        $sqlUpdateData = "UPDATE `products` SET `product_name` = '{$_POST['product_name2']}', `product_price` = '{$_POST['product_price2']}' WHERE `id` = {$_POST['product_id']}";
        
        mysqli_query($conn, $sqlUpdateData);
    }
?>