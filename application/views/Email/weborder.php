
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Woodlands Hong Kong</title>
    </head>

    <body style="margin:0px; background: #f8f8f8; ">
        <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
            <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background: #FBB316">
                    <tbody>
                        <tr>
                            <td style="vertical-align: top; padding-bottom:30px;" align="center">
                                <a href="<?php echo site_url("/"); ?>" target="_blank">
                                    <img src="<?php echo site_mail_logo; ?>" alt="Woodlands Hong Kong" style="border:none;height:100px;"/></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div style="padding: 40px; background: #fff;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <tbody>

                            <tr>
                                <td style="    text-align: center;font-size: 18px;">


                                    <b>Dear <?php echo $appointment['name']; ?>,</b>
                                    <p>Thank you for your reservation which is now a confirmed booking as follows:</p>

                                    <table style="font-size: 12px;    font-size: 12px;
                                           text-align: center;
                                           /* width: 300px; */
                                           margin: 10px 100px;
                                           background: white;
                                           color: black;
                                           border-radius: 39px;">
                                        <tr>
                                            <th style="text-align: right;width:45%;padding-right: 10px;">Name</th>
                                            <td style="    text-align: left;"><?php echo $appointment['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: right;width:200px;padding-right: 10px;">Email</th>
                                            <td style="    text-align: left;"><?php echo $appointment['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: right;width:200px;padding-right: 10px;">Contact No.</th>
                                            <td style="    text-align: left;"><?php echo $appointment['contact']; ?></td>
                                        </tr>

                                        <tr>
                                            <th style="text-align: right;width:200px;padding-right: 10px;">Date</th>
                                            <td style="    text-align: left;"><?php echo $appointment['select_date']; ?></td>
                                        </tr>

                                        <tr>
                                            <th style="text-align: right;width:200px;padding-right: 10px;">Time</th>
                                            <td style="    text-align: left;"><?php echo $appointment['select_time']; ?></td>
                                        </tr>

                                        <tr>
                                            <th style="text-align: right;width:200px;padding-right: 10px;">Guest(s)</th>
                                            <td style="    text-align: left;"><?php echo $appointment['people']; ?></td>
                                        </tr>


                                    </table>



                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div style="    text-align: center;
    font-size: 12px;
    background: #8CC646;
    color: antiquewhite;
    padding: 10px;">
                    <p><a href="<?php echo site_url("cancleOrder/" . $orderid); ?>" target="_blank" style="color:white">Click here</a> to cancel or update this reservation..</p>
                    <b>- Thanks -</b> 
                    <br/>
                    <img src="<?php echo site_mail_logo; ?>" style="margin: 10px; height: 50px;   width: auto;"/>

                </div>
            </div>
        </div>
    </body>

</html>
