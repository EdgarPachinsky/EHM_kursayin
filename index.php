<?php
  require "connect.php";
  error_reporting(0);
  $sql = " SELECT * FROM `product_categories`";
  $cats =sql_query($sql);
    $prodCount=80;
    $page_array=array(); 
    $page_array[0]=0;
    $lastId =0;
  
    if(isset($_POST['pageIndex']) && $_POST['pageIndex']!=0 ){
        $lastId = $_POST['pageIndex'];
        $prod_sql="SELECT * FROM `products` WHERE `id` < '$lastId' ORDER BY `id` DESC LIMIT $prodCount ";
    }
    else {
         $prod_sql="SELECT * FROM `products`  ORDER BY `id` DESC LIMIT $prodCount ";
    }


    $prodsf = sql_query($prod_sql);
    $buttonsQuery="SELECT `id` FROM `products`  ORDER BY `id` DESC";
    $buttonRes=sql_query($buttonsQuery);
   
    $array_id=1;
    $id_count=0;
    
     for ($i=0; $i < count($buttonRes) ; $i++) { 
         $id_count++ ;
         if($id_count%$prodCount==0 && isset($buttonRes[$i+1]['id']))        {
             $page_array[$array_id]=$buttonRes[$i]['id'];
             $array_id++ ;
         }
     }    

   /*  if(isset($_POST['product_index']))
     {
      $index=$_POST['product_index'];
      unset($_POST['product_index']);
     }
     else*/
   $index=0;
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
                <tr width = 200>

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
              
              <div class='cub_pages col-md-12 col-md-offset-0' >
                <div class='pages'> 
                  <form action="index.php" method="post">

                    <?php         
                    for($i=0;$i<count($page_array);$i++){?>   
                            
                            <button name="pageIndex" class='page_but' value="<?php echo $page_array[$i]; ?>" >
                                <?php echo ($i+1); ?>    
                            </button>
                            <input type="hidden" name="product_index" value="<?php echo $index ?>">
                           
                    <?php  } ?>
                  </form>
                </div> 
              </div>



          </div>

      </div>

<script src="js/ehm.js"></script>

</body>
</html>
