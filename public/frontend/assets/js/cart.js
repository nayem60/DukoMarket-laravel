function cartDel(id){
  
     $.ajax({
      url:"remove/cart/"+id,
      type:'get',
      success:function(data){
        $(".reload-cart").load(location.href + " .reload-cart");
    
      }
    });
  }