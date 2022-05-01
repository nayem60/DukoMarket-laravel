
function sizeFilter(id,type){
  var sizeId=$("#sizeId").val()
  if(type==1){
      var newId=sizeId.replace(id+':','');
      var sizeId=$("#sizeId").val(newId)
  }else{
    $("#sizeId").val(id+':'+sizeId)
    $("#size_form").submit()
  }
  $("#size_form").submit()
}


function subcategoryFilter(id,type){
     var subId=$("#subId").val()
     if(type==1){
       var newId=subId.replace(id+':','');
       var subId=$("#subId").val(newId);
     }else{
       $("#subId").val(id+':'+subId)
       $("#sub_form").submit();
     }
     $("#sub_form").submit();
}


function rating(number,type){
  var rating=$('#rating').val();
  if(type==1){
    var new_rating=rating.replace(number,'');
    $('#rating').val(new_rating);
  }else{
    var rating=$('#rating').val(number);
    $('#rating_form').submit();
  }
  
  $('#rating_form').submit();
}