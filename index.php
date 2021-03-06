<?php
  require "connect.php";

if(isset($_POST['sorting']))
{  $sort=$_POST['sorting'];
   $sql = "SELECT * FROM `products` ORDER BY `products`.`product_name`".$sort;
}
else if(isset($_POST['price_sort']))
{  $sort_price=$_POST['price_sort'];
   $sql = "SELECT * FROM `products` ORDER BY `products`.`product_price`".$sort_price;
}
else if(isset($_POST['count_sort']))
{  $sort_count=$_POST['count_sort'];
   $sql = "SELECT * FROM `products` ORDER BY `products`.`product_count`".$sort_count;
}
else if(isset($_POST['sort_category']))
{  $sort_category=$_POST['sort_category'];
   $sql = "SELECT * FROM `products` JOIN `product_categories` ON `products`.`category_id`=`product_categories`.`id` ORDER BY `product_categories`.`product_category_name` ".$sort_category;
}
else if(isset($_POST['sort_date']))
{  $sort_date=$_POST['sort_date'];
   $sql = "SELECT * FROM `products` ORDER BY `products`.`create_date`".$sort_date;
}
else
{
  $sql = "SELECT * FROM `products`";
}
  $stmt_prod = $db->prepare($sql);
  $stmt_prod->execute();
  $prodsf = $stmt_prod->fetchAll();
  $stmt_prod->closeCursor();


  $sql = " SELECT * FROM `product_categories`";
  $stmt_prod = $db->prepare($sql);
  $stmt_prod->execute();
  $cats = $stmt_prod->fetchAll();
  $stmt_prod->closeCursor();
  $prod_index = 1;
?>

<!DOCTYPE html>
<html>
  <head >
      <meta charset="UTF-8">
      <title>YeTRI</title>
      <link rel="icon" href="img/logo.jpg" sizes="16x16">
      <link rel="stylesheet" href="css/sm-core-css.css">
      <link rel="stylesheet" href="css/sm-blue.css">
      <link rel='stylesheet'  href='css/css_fontawesome/font-awesome.css'>
      <link rel='stylesheet' href='css/style.css'>
      <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.ehm.min.js"></script>
  </head>
<body>

  <script>
      $(document).ready(function() {
        $('.sm').smartmenus({
          showFunction: function($ul, complete) {
            $ul.slideDown(250, complete);
          },
          hideFunction: function($ul, complete) {
           $ul.slideUp(250, complete); 
          }
        });
        $(".e").hide();
        $(".a").click(function(){
          var a=$(this).attr("id");
          $("."+a).show();
        });
      }); 
  </script>
    
     <ul class="sm sm-blue">
        <li><h1>Categories</h1></li><br><br>
        
        <?php foreach($cats as $cat){?>
          <li><a><?php echo $cat['product_category_name'] ?></a>
              <ul>
              <?php 
                $catId = $cat['id']; 
                $sql = "SELECT * FROM `products` WHERE `category_id` = $catId";
                $stmt_prod = $db->prepare($sql);
                $stmt_prod->execute();
                $prods = $stmt_prod->fetchAll();
                $stmt_prod->closeCursor();
              ?>
                <?php foreach ($prods as $prod) { ?>
                  <li>
                    <a><?php echo $prod['product_name']; ?></a>
                      <ul>
                        <div style="width: auto;padding: 10px 30px 10px 30px;font-family: 'Inconsolata', monospace;">
                          <h2><i class="fa fa-info-circle" aria-hidden="true"></i> MORE DETALED</h2>
                          <hr>
                          <li class = "littleone"><div class = "icon_"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> PRODUCT NAME:</div>  
                                <?php echo $prod['product_name']; ?>       
                          </li>
                          <hr>
                          <li class = "littleone"><div class = "icon_"><i class="fa fa-archive" aria-hidden="true"></i> PRODUCT DESCRIPTION:</div>  
                            <?php echo $prod['product_description']; ?>
                          </li>
                          <hr>
                          <li class = "littleone"><div class = "icon_"><i class="fa fa-map-marker" aria-hidden="true"></i> PRODUCT PLACE:</div>       
                            <?php echo $prod['product_place']; ?>
                          </li>
                          <hr>
                          <li class = "littleone"><div class = "icon_"><i class="fa fa-money" aria-hidden="true"></i> PRODUCT PRICE:</div>        
                           <?php echo $prod['product_price']; ?>       
                          </li>
                          <hr>
                        </div>
                      </ul>
                  </li>
                <?php }?>
              </ul>
          </li>
        <?php }?>

    </ul>
      </div>
        
      <div class='result'>
          <div class='search'>
              <input class="inpCheck" type="search" id="search-input0" value="" name="search-input0" placeholder="Prod name">
              <input class="inpCheck" type="search" id="search-input1" value="" name="search-input1" placeholder="Prod description">
              <input class="inpCheck" type="search" id="search-input2" value="" name="search-input2" placeholder="Prod place">
              <input class="inpCheck" type="search" id="search-input3" value="" name="search-input3" placeholder="Prod price">
              <input class="inpCheck" type="search" id="search-input4" value="" name="search-input4" placeholder="Prod category">
              <input class="inpCheck" type="search" id="search-input5" value="" name="search-input5" placeholder="Prod Count">
              <input class="inpCheck" type="search" id="search-input6" value="" name="search-input6" placeholder="Create Date">
              <button ><i class="fa fa-search" aria-hidden="true"></i></button>   
              
              <!-- RESULT -->
                <div class="search_result"></div>
              <!-- END RESULT -->
          </div>
          <!-- sorting inputs -->
          <input type="hidden" value="<?php if(isset($_POST['sorting'])){ if($sort=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="sorting">

          <input type="hidden" value="<?php if(isset($_POST['price_sort'])){ if($sort_price=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="price_sort">
           
         <input type="hidden" value="<?php if(isset($_POST['count_sort'])){ if($sort_count=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="count_sort">

         <input type="hidden" value="<?php if(isset($_POST['sort_category'])){ if($sort_category=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="sort_category">

         <input type="hidden" value="<?php if(isset($_POST['sort_date'])){ if($sort_date=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="sort_date">
          <!-- end sorting inputs -->
          <div class="all-prods">
            <table border='1' class = "custom-table">
              <tr>
                <td class ="tableTd nameSpace" width="50">#</td>
                <td class ="tableTd nameSpace sorting-by-name" title="Sorting By Name"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Product Name <?php if(isset($_POST['sorting'])){echo $_POST['sorting'];} ?></td>
                <td class ="tableTd nameSpace sorting-by-category" title="Sorting By Category"><i class="fa fa-bars" aria-hidden="true"></i> Product Category <?php if(isset($_POST['sort_category'])){echo $_POST['sort_category'];} ?></td>
                <td class ="tableTd nameSpace"><i class="fa fa-archive" aria-hidden="true"></i> Product Description </td>
                <td class ="tableTd nameSpace"><i class="fa fa-map-marker" aria-hidden="true"></i> Product Place    </td>
                <td class ="tableTd nameSpace sorting-by-price" title="Sorting By Price"><i class="fa fa-money" aria-hidden="true"></i>Product Price 
                <?php if(isset($_POST['price_sort'])){echo $_POST['price_sort'];} ?></td>
                 <td class ="tableTd nameSpace sorting-by-date" title="Sorting By Date"><i class="fa fa-calendar" aria-hidden="true"></i>Product Date <?php if(isset($_POST['sort_date'])){echo $_POST['sort_date'];} ?></td>
                <td class ="tableTd nameSpace sorting-by-count" title="Sorting By Count"><i class="fa fa-check-square-o" aria-hidden="true"></i>Product Count <?php if(isset($_POST['count_sort'])){echo $_POST['count_sort'];} ?></td>
              </tr>
              <?php
              foreach($prodsf as $prodf){?>
                <tr class = "click-to-see-product">

                  <td class ="tableTd" width="50"><?php echo $prod_index;$prod_index++;?></td>
                  <td class ="tableTd"><?php echo $prodf['product_name']?></td>

                  <?php 
                    $prodCatd = $prodf['category_id'];
                    $sql = "SELECT * FROM `product_categories` WHERE `product_categories`.`id` = $prodCatd";
                    $stmt_catsN = $db->prepare($sql);
                    $stmt_catsN->execute();
                    $cat_name = $stmt_catsN->fetchAll();
                    $stmt_catsN->closeCursor();
                  ?>

                  <td class ="tableTd"><?php echo $cat_name[0][1]; ?></td>
                  <td class ="tableTd"><?php echo $prodf['product_description']?></td>
                  <td class ="tableTd"><?php echo $prodf['product_place']?></td>
                  <td class ="tableTd"><?php echo $prodf['product_price']?></td>
                  <td class ="tableTd"><?php echo $prodf['create_date']?></td>
                  <?php if($prodf['product_count'] == 0){?>
                  <td class ="tableTd" style="background: rgba(244, 95, 95, 0.41);"><?php echo $prodf['product_count']?></td>
                  <?php } else if($prodf['product_count'] > 0 && $prodf['product_count'] < 20 ){ ?>
                  <td class ="tableTd" style="background: #247eab"><?php echo $prodf['product_count']?></td>
                  <?php } else if($prodf['product_count'] > 20 ){ ?>
                  <td class ="tableTd" style="background: rgba(35, 188, 35, 0.5)"><?php echo $prodf['product_count']?></td>
                  <?php }?>
                </tr>
              <?php }?>
            </table>
            
          </div>

      </div>

<script src="js/ehm.js"></script>

</body>
</html>
