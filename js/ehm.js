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

  


})
 
function f1(){
     $resBlock.css({
        'display':'none'
      });
  }
 