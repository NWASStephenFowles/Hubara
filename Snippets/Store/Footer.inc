
<script>

  $(window).ready(function() {
    
    var time = 120
    var PageAutoRefresh = setInterval( function() {   
      time--;  
      $('#time').html(time);
        if (time === 0) {
          location.reload()
        }      
      }, 1000 
    );
        
    $("#show-stop").click(function () {
        $("#show-stop").addClass('d-none'); 
        $("#show-restart").removeClass('d-none'); 
        clearInterval(PageAutoRefresh);
        clearInterval(AutoPaging);
    });
    
    $("#show-restart").click(function () {
      location.reload();
    });

          
  });
  
  
</script>