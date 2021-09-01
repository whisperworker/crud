<?php

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<style>
    th, td {
        padding: 10px;
    }
    th {
        background-color: blue;
        color: aliceblue;
    }
    td {
        background-color: aquamarine;
    }

</style>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <!--Чтение данных из базы-->
        <?php
            $products = mysqli_query($connect, "SELECT * FROM products");
            //Функция получает все строки преобразовывает в массив и присваивает переменные products
            $products = mysqli_fetch_all($products);
            //Получаем нужный товар
            foreach ($products as $product) {
                ?>

                <tr>
                    <td><?=$product[0]?></td>
                    <td><?=$product[1]?></td>
                    <td><?=$product[2]?>$</td>
                    <td><?=$product[3]?></td>
                    <td><a href="product.php?id=<?=$product[0]?>">View</a></td>
                    <td><a href="update.php?id=<?=$product[0]?>">Update</a></td>
                    <td><a style="color: red" href="vendor/delete.php?id=<?=$product[0] ?>">Delete</a></td>
                </tr>

                <?php
            }
        ?>

    </table>
    <h3>Add new product</h3>
    <form action="vendor/create.php" method="post">
        <p>Title</p>
        <input type="text" name="title">
        <p>Description</p>
        <textarea name="description"></textarea>
        <p>Price</p>
        <input type="number" name="price"> <br> <br>
        <button type="submit">Add new product</button>
    </form>
</body>
</html>
