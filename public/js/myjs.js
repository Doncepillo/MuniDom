$(document).ready(function () {

    $("#remember").change(function () {
        var isChecked = $(this).prop("checked");
        if (isChecked) {
            var email = $("#email").val();
            localStorage.setItem("email", email);
        } else {
            localStorage.setItem("email", "");
        }
    })
    window.addEventListener("load", function () {
        var remember = localStorage.getItem("email");
        if (remember) {
            $("#remember").prop("checked", true)
            $("#email").val(remember)
        }
    })

   //ejemplo codigo select dependientes
   $('select[name="article_id"]').change(function () {
       
        var articleID = $(this).val();
        var berrieID = $('#berrie_id').val();
        if (articleID && berrieID) {
            $.ajax({
                url: '/admin/trays/tray_return/ajax1/' + articleID+ '/'+ berrieID,
                type: "GET",
                dataType: "json",
                data:{articleID:articleID,berrieID:berrieID},
                success: function (data) {

                    $('select[name="articulo"]').empty();
                    $.each(data, function (key, value) {
                        $('#b_p').val(key)
                        
                    });
                }
            });
        } else {
            $('select[name="articulo"]').empty();
        }
    })

    $('select[name="article_id"]').change(function () {
        var articleID = $(this).val();
        var berrieID = $('#berrie_id').val();
        if (articleID && berrieID) {
            $.ajax({
                url: '/admin/trays/tray_return/ajax2/' + articleID+ '/'+ berrieID,
                type: "GET",
                dataType: "json",
                data:{articleID:articleID,berrieID:berrieID},
                success: function (data) {

                    $('select[name="articulo"]').empty();
                    $.each(data, function (key, value) {
                        $('#b_d').val(key)
                        
                    });
                    
                    var b_p = $("#b_p").val();
                    var b_d = $("#b_d").val();
                    
                    var b_s =(parseInt(b_p)-parseInt(b_d));
            
            
                    $("#s_b").val(b_s);
                }
            });
        } else {
            $('select[name="articulo"]').empty();
        }
    })
});