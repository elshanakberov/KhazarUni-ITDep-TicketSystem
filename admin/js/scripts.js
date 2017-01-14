$(document).ready(function(){
  $('#selectAllBoxes').click(function(event){
    if(this.checked){
      $('.checkBox').each(function(){
        this.checked = true;
        console.log("true");
           });
    }else{
      $('.checkBox').each(function(){
        this.checked = false;
        console.log("false");

      });
    }
  });
});
