<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Просмотр выбранного продукта</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
        <!--Bootstrap3-->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    </head>
    <body>
      <div class="main">

            <?php
                include_once("config.php");

                // Выбираем и показываем информацию о продукте, по пришедшему из url, id.
                $id = strip_tags($_GET[id]);

                $Result = mysql_query("SELECT product_id, name, number, cost, more_information, url FROM add_product WHERE product_id=".$id);

                while($row = mysql_fetch_array($Result))
                {
                 echo '<h1 class="main__title">Вы выбрали - '.$row["name"].'</h1>';

                  echo '<div class="container">';

                    echo '<div class="product-item">';

                        echo '<h2>'.$row["name"].'</h2>';
                        if(!empty($row["url"])) {
                            echo '<a href="'.$row["url"].'" target="_blank">
                                <img src="'.$row["url"].'" alt="'.$row["name"].'" title="'.$row["name"].'" width="250px" />
                            </a>';
                        }
                        echo '<p>Кол-во <b>'.$row["number"].'кг</b></p>';
                        echo '<p>Цена за 1 кг <b>'.$row["cost"].'руб</b></p>';
                        if($row["more_information"]) {
                            echo '<p>Дополнительные сведения: <b>'.$row["more_information"].'</b></p>';
                        }


                    echo '</div>';
                }

                //Закрывает соединение с сервером MySQL
                mysql_close($connecDB);
            ?>

            <div class="form-product">
                <a href="list_products.php">Назад к списку продуктов</a>
            </div>

        </div>
      </div>

    </body>
</html>