<!DOCTYPE html>
<html>
<head>
    <title>JSSample</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body>

<script type="text/javascript">
    $(function() {
        var params = {"client_id":"a989d65f-52eb-4fca-abeb-971c883d50ea","client_secret":"7L8_VpY21_JE6fR4Bs_lw0tVl.~kNdC-m1"};
      
        $.ajax({
            url: "https://sandbox.api.payme.hsbc.com.hk/oauth2/token?" + $.param(params),
            beforeSend: function(xhrObj){
                // Request headers
                xhrObj.setRequestHeader("Content-Type","");
                xhrObj.setRequestHeader("Accept","");
                xhrObj.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                xhrObj.setRequestHeader("api-version","0.12");
            },
            type: "POST",
            // Request body
            data: "{body}",
        })
        .done(function(data) {
            alert("success");
        })
        .fail(function() {
            alert("error");
        });
    });
</script>
</body>
</html>