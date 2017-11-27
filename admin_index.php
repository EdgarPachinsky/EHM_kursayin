<?php 
session_start();
error_reporting(0);
if(isset($_SESSION['login']))
{
   if(isset($_POST['log_out']))
   {
    unset($_SESSION['login']);
    header("location:index.php");
   }


  require "connect.php";
  include "functions.php";
  $sql = "SELECT * FROM `product_categories`";
  $stmt_catsN = $db->prepare($sql);
  $stmt_catsN->execute();
  $cats = $stmt_catsN->fetchAll();
  $stmt_catsN->closeCursor();


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
else
{
  $sql = "SELECT * FROM `products`";
}
  $stmt_catsN = $db->prepare($sql);
  $stmt_catsN->execute();
  $prodsf = $stmt_catsN->fetchAll();
  $stmt_catsN->closeCursor();
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
            <button class="action_buttons action_edit open_edit_modal cat_buttons" value="<?php echo $prodf['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>   
                      <!-- edit modal -->
                        <div class='modal_div edit_modal'>
                            <div class="modal_div-content">
                                <div class="modal_div-header">
                                    <button class="close_modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <h4 class="modal_title">Edit Category</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Edit <?php echo $cat['product_category_name']?></p>
                                     <form action="admin_edit_delete_add.php" method="post">
                                       <p>Category Name</p>
                                       <input type="text" name="product_category_name" value="<?php echo $cat['product_category_name']?>" placeholder="Category Name *" required> <br>
                                       <p>Category Description</p>
                                       <textarea name="product_category_description"  placeholder="Category Description *" required><?php echo $cat['product_category_description']?></textarea><br>

                                       <input type="hidden" name="category_edit" value="15">
                                       <input type="hidden" name="id" value="<?php echo $cat['id']?>">
                                       <button class='btn_sumbit'>EDIT</button>
                                     </form>    
                                </div>
                                <div class="modal_div-footer">
                                  <button class="close_modal">Close</button>
                                </div>
                            </div>
                        </div>
               <!-- edit modal end -->  
               <button class="action_buttons cat_dbuttons action_delete open_modal"><i class="fa fa-trash" aria-hidden="true"></i>
                      </button> 
  

               <!-- delete modal -->
                        <div class='modal_div delete_modal'>
                            <div class="modal_div-content">
                                <div class="modal_div-header">
                                    <button class="close_modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <h4 class="modal_title">Delete Category</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete <?php echo $cat['product_category_name']?></p>
                                     <div class=btn_group>
                                       <button class="close_modal No_btn">NO</button>
                                     <form action="admin_edit_delete_add.php" method="post">
                                       <button class="yes_btn" name='category_delete' value="<?php echo $cat['id']; ?>">Yes !
                                       </button>
                                     </form>  
                                     </div>
                                </div>
                                <div class="modal_div-footer">
                                  <button class="close_modal">Close</button>
                                </div>
                            </div>
                        </div>
               <!-- delete modal end -->
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

        <button class="add_product_btn btn btn-default open_modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Category</button>
               <!-- add modal -->
                        <div class='modal_div add_modal'>
                            <div class="modal_div-content">
                                <div class="modal_div-header">
                                    <button class="close_modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <h4 class="modal_title">Add Category</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Add Category</p>
                                     <form action="admin_edit_delete_add.php" method="post">
                                       <input type="text" name="product_category_name" placeholder="Category Name *" required> <br>
                                       <textarea name="product_category_description" placeholder="Category Description *" required></textarea><br>
                                       <input type="hidden" name="add_category" value="5">
                                       <button class='btn_sumbit'>ADD</button>
                                     </form>    
                                </div>
                                <div class="modal_div-footer">
                                  <button class="close_modal">Close</button>
                                </div>
                            </div>
                        </div>
               <!-- add modal end -->

    </ul>
      </div>
        
      <div class='result'>
       <div class="log_out">
        <form action="admin_index.php" method="post">
         <button name="log_out" value="log_out">Log Out</button>
       </form>
      </div>

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
             <button class="add_product_btn btn btn-default open_modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Product</button>
               <!-- add modal -->
                        <div class='modal_div add_modal'>
                            <div class="modal_div-content">
                                <div class="modal_div-header">
                                    <button class="close_modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <h4 class="modal_title">Add Product</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Add Product</p>
                                     <form action="admin_edit_delete_add.php" method="post">
                                       <input type="text" name="product_name" placeholder="Product Name *" required> <br>
                                       <textarea name="product_description" placeholder="Product Description *" required></textarea><br>
                                       <input type="text" name="product_place" placeholder="Product Place *" required> <br>
                                       <input type="number" name="product_price" placeholder="Product Price *" required>  <br>
                                       <input type="number" name="product_count" placeholder="Product Count *" required>  <br>
                                       <p>Product Category</p>
                                       <select name='category_id'>
                                        <option></option>
                                         <?php foreach ($cats as $cat) {?>
                                           <option value="<?php echo $cat['id'] ?>"><?php echo $cat['product_category_name'] ?></option>
                                        <?php } ?>
                                       </select> <br>
                                       <input type="hidden" name="product_add">
                                       <button class='btn_sumbit'>ADD</button>
                                     </form>    
                                </div>
                                <div class="modal_div-footer">
                                  <button class="close_modal">Close</button>
                                </div>
                            </div>
                        </div>
               <!-- add modal end -->

          <!-- sorting inputs -->
          <input type="hidden" value="<?php if(isset($_POST['sorting'])){ if($sort=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="sorting">

          <input type="hidden" value="<?php if(isset($_POST['price_sort'])){ if($sort_price=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="price_sort">
           
         <input type="hidden" value="<?php if(isset($_POST['count_sort'])){ if($sort_count=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="count_sort">

         <input type="hidden" value="<?php if(isset($_POST['sort_category'])){ if($sort_category=="DESC"){echo "ASC";}else{echo "DESC";}}else{echo "ASC"; } ?>" id="sort_category">
          <!-- end sorting inputs -->


            <table border='1' class = "custom-table">
               <tr>
                <td class ="tableTd nameSpace" width="50">#</td>
                <td class ="tableTd nameSpace sorting-by-name" title="Sorting By Name"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Product Name <?php if(isset($_POST['sorting'])){echo $_POST['sorting'];} ?></td>
                <td class ="tableTd nameSpace sorting-by-category" title="Sorting By Category"><i class="fa fa-bars" aria-hidden="true"></i> Product Category<?php if(isset($_POST['sort_category'])){echo $_POST['sort_category'];} ?></td>
                <td class ="tableTd nameSpace"><i class="fa fa-archive" aria-hidden="true"></i> Product Description </td>
                <td class ="tableTd nameSpace"><i class="fa fa-map-marker" aria-hidden="true"></i> Product Place    </td>
                <td class ="tableTd nameSpace sorting-by-price" title="Sorting By Price"><i class="fa fa-money" aria-hidden="true"></i>Product Price
                <?php if(isset($_POST['price_sort'])){echo $_POST['price_sort'];} ?></td>
                <td class ="tableTd nameSpace sorting-by-count" title="Sorting By Count"><i class="fa fa-check-square-o" aria-hidden="true"></i> Product Count<?php if(isset($_POST['count_sort'])){echo $_POST['count_sort'];} ?></td>
              </tr>
              <?php
              foreach($prodsf as $prodf){?>
                <tr width = 200 class = "click-to-see-product">
                  <td class ="tableTd" width="50"><?php echo $prod_index;$prod_index++;?></td>
                  <td class ="tableTd" ><?php echo $prodf['product_name']?></td>

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

                  <?php if($prodf['product_count'] == 0){?>
                  <td class ="tableTd" style="background: rgba(244, 95, 95, 0.41);"><?php echo $prodf['product_count']?></td>
                  <?php } else if($prodf['product_count'] > 0 && $prodf['product_count'] < 20 ){ ?>
                  <td class ="tableTd" style="background: #247eab"><?php echo $prodf['product_count']?></td>
                  <?php } else if($prodf['product_count'] > 20 ){ ?>
                  <td class ="tableTd" style="background: rgba(35, 188, 35, 0.5)"><?php echo $prodf['product_count']?></td>
                  <?php }?>


                  <td  class="actionTd">
                  	
                  		<button class="action_buttons action_edit open_edit_modal" value="<?php echo $prodf['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>   
                      <!-- edit modal -->
                        <div class='modal_div edit_modal'>
                            <div class="modal_div-content">
                                <div class="modal_div-header">
                                    <button class="close_modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <h4 class="modal_title">Edit Product</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Edit <?php echo $prodf['product_name']?></p>
                                     <form action="admin_edit_delete_add.php" method="post">
                                       <p>Product Name</p>
                                       <input type="text" name="product_name" value="<?php echo $prodf['product_name']?>" placeholder="Product Name *" required> <br>
                                       <p>Product Description</p>
                                       <textarea name="product_description"  placeholder="Product Description *" required><?php echo $prodf['product_description']?></textarea><br>
                                       <p>Product Place</p>
                                       <input type="text" value="<?php echo $prodf['product_place']?>" name="product_place" placeholder="Product Place *" required> <br>
                                       <p>Product Price</p>
                                       <input type="number" name="product_price" value="<?php echo $prodf['product_price']?>" placeholder="Product Price *" required>  <br>
                                       <p>Product Count</p>
                                       <input type="number" name="product_count" value="<?php echo $prodf['product_count']?>" placeholder="Product Price *" required>  <br>
                                       <p>Product Category</p>
                                       <select name='category_id' value="<?php echo $prodf['category_id']?>">
                                        <option></option>
                                         <?php foreach ($cats as $cat) {?>
                                           <option value="<?php echo $cat['id'] ?>" <?php if ( $cat['id']==$prodf['category_id']): ?>
                                             selected
                                           <?php endif ?>><?php echo $cat['product_category_name'] ?></option>
                                        <?php } ?>
                                       </select> <br>
                                       <input type="hidden" name="product_edit" value="5">
                                       <input type="hidden" name="id" value="<?php echo $prodf['id']?>">
                                       <button class='btn_sumbit'>EDIT</button>
                                     </form>    
                                </div>
                                <div class="modal_div-footer">
                                  <button class="close_modal">Close</button>
                                </div>
                            </div>
                        </div>
               <!-- edit modal end -->    
                    	<button class="action_buttons action_delete open_modal"><i class="fa fa-trash" aria-hidden="true"></i>
                    	</button> 

                      <!-- delete modal -->
                        <div class='modal_div delete_modal'>
                            <div class="modal_div-content">
                                <div class="modal_div-header">
                                    <button class="close_modal" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <h4 class="modal_title">Delete Product</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete <?php echo $prodf['product_name']?></p>
                                     <div class=btn_group>
                                       <button class="close_modal No_btn">NO</button>
                                     <form action="admin_edit_delete_add.php" method="post">
                                      <input type="hidden" name="product_delete" value="2">
                                       <button class="yes_btn" name='delete_product' value="<?php echo $prodf['id']; ?>">Yes !
                                       </button>
                                     </form>  
                                     </div>
                                </div>
                                <div class="modal_div-footer">
                                  <button class="close_modal">Close</button>
                                </div>
                            </div>
                        </div>
               <!-- delete modal end -->




                  </td>
                </tr>

              <?php }?>
            </table>
                





              <!-- <div class='cub_pages col-md-12 col-md-offset-0' >
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
              </div> -->



          </div>

      </div>

<script src="js/ehm.js"></script>
</body>
</html>
<?php 
}
else
{
  header("location:admin.php");
}

 ?>