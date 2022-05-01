function size(sizeId) {
  $("#variant_id").val(sizeId);
  $('.choose-color').hide();
  $('.choose-size').show();
  $('.sizes_'+sizeId).show();
  $('.choose-size').css('color','black');
  $('#size_'+sizeId).css('color','red');
  var price = $("#size_"+sizeId).data('price');
  $('.price').html('<span>$'+price.toFixed(2)+'</span>');

}


function color(colorId) {
  $("#variant_id").val(colorId);
  $('.choose-size').hide();
  $('.choose-color').show();
  $('.colors_'+colorId).show();
  $('.choose-color').css('color','black');
  $('#color_'+colorId).css('color','red');
  var price = $("#color_"+colorId).data('price');
  $('.price').html('<span>$'+price.toFixed(2)+'</span>');


}
function cartWithVariant(productId,variant_id){
    var variant=$("#variant_id").val();
    var quantity=$("#quantity").val();
    if(variant==""){
       alert('Please Select Size Or Color');
    }else{
    $.ajax({
      url:"/add-cart/"+productId,
      type:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
      data:{variant:variant,quantity:quantity},
      success:function(data){
        alert('thank you');
      }
    });
  }
}
function add_cart(productId){
    var variant=$("#variant_id").val();
    var quantity=$("#quantity").val();
    $.ajax({
      url:"/add-cart/"+productId,
      type:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
      data:{variant:variant,quantity:quantity},
      success:function(data){
        alert('thank you');
      }
    });
  }
    


