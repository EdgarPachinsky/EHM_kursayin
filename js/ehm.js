 $resBlock = $('.search_result');
$(document).ready(function() {


  $('.close_modal').click(function(){

  $(this).parents('.delete_modal').hide('slow')
})


    $('.open_modal').click(function(){
  $(this).siblings('.delete_modal').show('slow')
})




  $('.close_modal').click(function(){

  $(this).parents('.add_modal').hide('slow')
})


    $('.open_modal').click(function(){
  $(this).siblings('.add_modal').show('slow')
})



  $('.close_modal').click(function(){

  $(this).parents('.edit_modal').hide('slow')
})


    $('.open_edit_modal').click(function(){
  $(this).siblings('.edit_modal').show('slow')
})



  $searchWord = $('.inpCheck');
 
  $resBlock.css({
  		'display':'none'
  });
  $searchWord.keyup(function(){
  	var checklen=0;
  	var searchArray = [5];
  	for (var i = 0; i < 5; i++) {
  		searchArray[i]=$('#search-input'+i).val();
  		if(searchArray[i].length==0){
  			checklen++;
  		}
  	}
  	if(checklen == 5){
  		$resBlock.html(null);
  		$resBlock.css({
  			'display':'none'
  		});
  	}
  	else{
  		$resBlock.css({
  			'display':'block'
  		});
	    $.post("searchEngine.php", { taxi: searchArray } , function(res){
	      $('.search_result').html(res);
	    });
	}
  })

  $('.click-to-see-product').click(function(){
    $('.click-to-see-product').css({
      'background':'transparent',
    })
    $(this).css({
      'background':'black',
    })
  })

  ///////////////////////sorting by name/////////////

  $('.sorting-by-name').click(function(){
       var sort=$('#sorting').val()
    $.post('index.php',{sorting:sort},function(res){
      $('body').html(res);
    })

  })

  ///////////////////////sorting by price/////////////

  $('.sorting-by-price').click(function(){
       var price=$('#price_sort').val()
    $.post('index.php',{price_sort:price},function(res){
      $('body').html(res);
    })

  })

  ///////////////////////sorting by count/////////////

  $('.sorting-by-count').click(function(){
       var count=$('#count_sort').val()
    $.post('index.php',{count_sort:count},function(res){
      $('body').html(res);
    })

  })


})
 
function f1(){
     $resBlock.css({
        'display':'none'
      });
  }
 