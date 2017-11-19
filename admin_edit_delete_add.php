<?php 
session_start();
if(isset($_SESSION['login']))
{
  require "connect.php";
  include "functions.php";
  //////////////////////////product delete/////////////////////////
if(isset($_POST['product_delete']))
	{    
		$id_values = array('field_id' => 'id', 'field_value' => $_POST['delete_product']);
		delete('products',$id_values);
		unset($_POST['product_delete']);
		header("location:admin_index.php");
	}

///////////////////////////////product add//////////////////////////////////////
if(isset($_POST['product_add']))
	{    
		unset($_POST['product_add']);	
		add('products',$_POST);
		header("location:admin_index.php");
	}

///////////////////////////////product edit//////////////////////////////////////
if(isset($_POST['product_edit']))
	{    
		unset($_POST['product_edit']);	
		$id_values = array('id_field' => 'id', 'id_value' => $_POST['id']);
		unset($_POST['id']);
		edit('products',$_POST,$id_values);
		header("location:admin_index.php");
	}

///////////////////////////////category add//////////////////////////////////////
if(isset($_POST['add_category']))
	{    
		unset($_POST['add_category']);	
	
		add('product_categories',$_POST);
		header("location:admin_index.php");
	}

///////////////////////////////category edit//////////////////////////////////////
if(isset($_POST['category_edit']))
	{    
		unset($_POST['category_edit']);	
		$id_values = array('id_field' => 'id', 'id_value' => $_POST['id']);
		unset($_POST['id']);
		edit('product_categories',$_POST,$id_values);
		header("location:admin_index.php");
	}
  //////////////////////////category delete/////////////////////////
if(isset($_POST['category_delete']))
	{    
		$id_values = array('field_id' => 'id', 'field_value' => $_POST['category_delete']);
		delete('product_categories',$id_values);
		unset($_POST['category_delete']);
		header("location:admin_index.php");
	}



}
else
{
  header("location:admin.php");
}

 ?>
