
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

function brandFilter(id,type){
  var brand=$("#brandId").val()
  if(type==1){
    var new_id=brand.replace(id+':','')
    $("#brandId").val(new_id)
  }else{
    $("#brandId").val(id+':'+brand)
    $("#brand_form").submit ()
  }
  $("#brand_form").submit ()
  
  
}

function colorFilter(id,type){
  var color=$("#colorId").val()
  if(type==1){
    var new_id=color.replace(id+':','')
    $("#colorId").val(new_id)
  }else{
    $("#colorId").val(id+':'+color)
    $("#color_form").submit()
  }
    
  $("#color_form").submit()
}