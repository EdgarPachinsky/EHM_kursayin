<?php
  require "connect.php";

  $sql = "SELECT * FROM `products`";
  $stmt_prod = $db->prepare($sql);
  $stmt_prod->execute();
  $prodsf = $stmt_prod->fetchAll();
  $stmt_prod->closeCursor();

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
                          <li class = "littleone"><div class = "icon_"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> PRODUCT NAME: </div>  
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
          <label id='file'>
              <input type="file">
              <i class="fa fa-file" aria-hidden="true"></i>
              <div class="txt">Add the<br>file...</div>
          </label> 
          <div class='search'>
              <input class="inpCheck" type="search" id="search-input0" value="" name="search-input0" placeholder="Prod name">
              <input class="inpCheck" type="search" id="search-input1" value="" name="search-input1" placeholder="Prod description">
              <input class="inpCheck" type="search" id="search-input2" value="" name="search-input2" placeholder="Prod place">
              <input class="inpCheck" type="search" id="search-input3" value="" name="search-input3" placeholder="Prod price">
              <input class="inpCheck" type="search" id="search-input4" value="" name="search-input4" placeholder="Prod category">
              <button ><i class="fa fa-search" aria-hidden="true"></i></button>   
              
              <!-- RESULT -->
                <div class="search_result"></div>
              <!-- END RESULT -->
          </div>


          <div class="all-prods">
            <table border='1' class = "custom-table">
              <tr>
                <td class ="tableTd nameSpace"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Product Name </td>
                <td class ="tableTd nameSpace"><i class="fa fa-bars" aria-hidden="true"></i> Product Category       </td>
                <td class ="tableTd nameSpace"><i class="fa fa-archive" aria-hidden="true"></i> Product Description </td>
                <td class ="tableTd nameSpace"><i class="fa fa-map-marker" aria-hidden="true"></i> Product Place    </td>
                <td class ="tableTd nameSpace"><i class="fa fa-money" aria-hidden="true"></i> Product Price         </td>
              </tr>
              <?php
              foreach($prodsf as $prodf){?>
                <tr width = 200 class = "click-to-see-product" style="cursor: pointer;">

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
                </tr>
              <?php }?>
            </table>
            

          </div>

      </div>

<script src="js/ehm.js"></script>

</body>
</html>
