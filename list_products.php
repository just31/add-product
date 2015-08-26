<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Список добавленных продуктов</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
        <!--Bootstrap3-->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    </head>
    <body>
      <div class="main">

      <h1 class="main__title">Список добавленных продуктов</h1>

        <div class="container">

            <?php
                include_once("config.php");

                $Result = mysql_query("SELECT product_id, name, number, cost, more_information, url FROM add_product");

                while($row = mysql_fetch_array($Result))
                {
                    echo '<div class="product-item">';

                        echo '<h2><a href="product.php?id='.$row["product_id"].'">'.$row["name"].'</a></h2>';
                        if(!empty($row["url"])) {
                            echo '<img src="'.$row["url"].'" alt="'.$row["name"].'" title="'.$row["name"].'" width="150px" />';
                        }
                        echo '<p>Кол-во <b>'.$row["number"].'кг</b></p>';
                        echo '<p>Цена за 1 кг <b>'.$row["cost"].'руб</b></p>';

                    echo '</div>';
                }

                //Закрывает соединение с сервером MySQL
                mysql_close($connecDB);
            ?>

            <div class="form-product">
                <a href="/add_product">Назад к форме добавления</a>
            </div>

        </div>
      </div>

    </body>
</html>