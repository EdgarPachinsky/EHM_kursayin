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

?>
<?php
  require "connect.php";
  include "functions.php";
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
                                       <input type="text" name="product_category_name" value="<?php echo $cat['product_category_name']?>" placeholder="Category Name *" required> <br>
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

        <button class="add_product_btn btn btn-default open_modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</button>
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
            <table border='1' class = "custom-table">
              <tr>
                <td class ="tableTd nameSpace"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Product Name </td>
                <td class ="tableTd nameSpace"><i class="fa fa-bars" aria-hidden="true"></i> Product Category       </td>
                <td class ="tableTd nameSpace"><i class="fa fa-archive" aria-hidden="true"></i> Product Description </td>
                <td class ="tableTd nameSpace"><i class="fa fa-map-marker" aria-hidden="true"></i> Product Place    </td>
                <td class ="tableTd nameSpace"><i class="fa fa-money" aria-hidden="true"></i> Product Price         </td>
                <td  class="actionTd"><i class="fa fa-pencil" aria-hidden="true"></i> Actions</td>
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
                                       <input type="text" name="product_name" value="<?php echo $prodf['product_name']?>" placeholder="Product Name *" required> <br>
                                       <textarea name="product_description"  placeholder="Product Description *" required><?php echo $prodf['product_description']?></textarea><br>
                                       <input type="text" value="<?php echo $prodf['product_place']?>" name="product_place" placeholder="Product Place *" required> <br>
                                       <input type="number" name="product_price" value="<?php echo $prodf['product_price']?>" placeholder="Product Price *" required>  <br>
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
                
            <button class="add_product_btn btn btn-default open_modal" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New</button>
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
<?php 
}
else
{
  header("location:admin.php");
}

 ?>