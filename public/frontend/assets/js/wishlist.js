function remove(id){
      $.ajax({
        url:'/remove-wishlist/'+id,
        type:'get',
        success:function(){
          $("#wishlist_reload").load(location.href + " #wishlist_reload");
          $(".reload-wishlist").load(location.href + " .reload-wishlist");
          
        }
      });
    }
    
function wishlistToCart(id){
   $.ajax({
     url:'/wishlist/to-cart/'+id,
     type:'get',
     success:function(data){
        $("#wishlist_reload").load(location.href + " #wishlist_reload");
        $(".reload-wishlist").load(location.href + " .reload-wishlist");
          
       
          
     }
   });
}