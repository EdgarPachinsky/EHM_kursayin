<?php
	require "connect.php";

	$searchArray = $_POST['taxi'];
	if(isset($searchArray)){
		$prodName  = $searchArray[0];
		$prodDes   = $searchArray[1];
		$prodPlace = $searchArray[2];
		$prodPrice = $searchArray[3];
		$prodCat   = $searchArray[4];
		$prodCount = $searchArray[5];
		$prodDate  = $searchArray[6];

		$sql = "	SELECT * FROM `products`
									     	JOIN   `product_categories` ON `products`.`category_id` = `product_categories`.`id`
									     	WHERE  `product_categories`.`product_category_name` LIKE '%$prodCat%'
									     	AND    `products`.`product_name`                    LIKE '%$prodName%'
										 	AND    `products`.`product_description` 			LIKE '%$prodDes%'  
										 	AND    `products`.`product_place`       			LIKE '%$prodPlace%'
									     	AND    `products`.`product_price`       			LIKE '%$prodPrice%'
									     	AND    `products`.`product_count`       			LIKE '%$prodCount%'
									     	AND    `products`.`create_date`       				LIKE '%$prodDate%'
				";

		$stmt_prod = $db->prepare($sql);
		$stmt_prod->execute();
		$prods = $stmt_prod->fetchAll();
		$stmt_prod->closeCursor();
		$index = 1;

		if(count($prods)==0){
			echo '<center>Name:'.$prodName.', Description:'.$prodDes.', Place:'.$prodPlace.', Price:'.$prodPrice.', Category:'.$prodCat.', Count:'.$prodCount.', Date:'.$prodDate.' <br><br><span class="no_matches">No Matches</span></center>';
			echo '<div class="search_result_close" onclick="f1()"><i class="fa fa-times" aria-hidden="true"></i></div>';
		}
		else{
			echo 'SEARCH DATA-> Name:'.$prodName.', Description:'.$prodDes.', Place:'.$prodPlace.', Price:'.$prodPrice.', Count:'.$prodCount.', Date:'.$prodDate.'<br><hr><ul class = "result_list">';
			foreach ($prods as $prod ) {
				echo '<li>'.$index.')'.'Name:'.$prod['product_name'].', Short Description:'.$prod['product_description'].', Place:'.$prod['product_place'].', Price:'.$prod['product_price'].', Category:'.$prod['product_category_name'].', Count:'.$prod['product_count'].', Date:'.$prod['create_date'].'</li>';
				$index++;
			}
			echo '</ul><hr><br><center><span class = "matches_found">Matches Found</span> '.count($prods).'</center>';
			echo '<div class="search_result_close" onclick="f1()"><i class="fa fa-times" aria-hidden="true"></i></div>';
		}
	}
?>