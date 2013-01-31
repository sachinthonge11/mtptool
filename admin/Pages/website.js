$(function () {
    $("#dialog-form").dialog({
        autoOpen: false,
        height: 225,
        width: 350,
        modal: true,
        draggable: false,
        resizable: false,
        buttons: {

            close: function () {
                $(this).dialog("close");
            }
        }
    });

    $(".userinfo").click(function () {
        $("#dialog-form").dialog("open");
        var atext = $(this).text();
       // alert("this is atest="+atext);
        $.ajax({
              type: "POST",
              url: "userinfo.php",
              data: { name: atext, location: "Boston" },
              dataType: "html",

              success: function(data){
                  $('#dialog-form').html(data);
              }
          });
    });

    
    
});