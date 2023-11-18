<?php 
    session_start(); 
    $conn = new mysqli('localhost', 'root', '', 'products_db');
    $sqlSelect = "SELECT * FROM `products`"; 

    $result = mysqli_query($conn, $sqlSelect);
    $data = mysqli_fetch_all($result);

    $userId = $_SESSION['userId'];
    $html = '';
    foreach($data as $product) {
        if ($product[1] == $userId) {
            $html = $html .  '
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg" src="img/bicycle.avif" alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">'.$product[2].'</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">'.$product[3].'$</p>
                    <a id="'.$product[0].'" class="EDITING cursor-pointer inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit
                    </a>
                </div>
            </div>';
        }
    }
    echo $html;
?>