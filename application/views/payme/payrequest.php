<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">


    <div class="container mb-15">
        <div class="row ">
            <?php
            $amount = isset($paymentdata['totalAmount']) ? $paymentdata['totalAmount'] : "";

            $paymentdata2 = $paymentdata;
            $paylink = isset($paymentdata2['webLink']) ? $paymentdata2['webLink'] : "";
            $paymentid = isset($paymentdata2['paymentRequestId']) ? $paymentdata2['paymentRequestId'] : "";
            ?>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="ml-md-3 mt-5">
                    <h2>Order ID: <?php echo $order_details['order_data']->order_no; ?></h2>
                    <h4>Price: <b>{{<?php echo $order_amount; ?> |currency:"HKD"}}</b></h4>

                    <table class="table">
                        <tr>
                            <th style="width:150px">Customer Name</th>
                            <td><?php echo $order_details['order_data']->name; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $order_details['order_data']->email; ?></td>
                        </tr>
                        <tr>
                            <th>Contact No.</th>
                            <td> <?php echo $order_details['order_data']->contact_no; ?></td>
                        </tr>
                    </table>

                    <img id="logo" style="display: none" width="30" height="30" src="<?php echo base_url(); ?>assets/paymeassets/Icon-192.png" onload="update_qrcode()">
                    <hr/>
                    <div class="col-md-12 mt-5">
                        <b>Paying with PayMe	</b>
                        <ul>
                            <li>1. Open the PayMe app.	</li>
                            <li>2. Scan the PayCode to authorise payment.	</li>
                            <li>3. Complete payment in the app and wait for confirmation.	</li>
                        </ul>
                    </div>
                    <table class="table table-borderd" style="display: block">
                        <?php
                        foreach ($paymentdata2 as $key => $value) {
                            echo "<tr>";
                            echo "<td>$key</td>";
                            echo "<td class='responsedatatd' >" . print_r($value, true) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                </div>
            </div>
            <div class="col-md-5">
                <div class="col-md-12 mt-5 text-center">
                    <h4>Scan this PayCode with PayMe	</h4>
                    <div id="qr"></div>
                    <canvas id="payCodeCanvas" width="344" height="344"></canvas>
                    <p>Please do not close this page before payment is complete</p>
                </div>

            </div>
            <div class="col-md-1"></div>

        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<script src="<?php echo base_url(); ?>assets/paymeassets/paycode.js"></script>
<script src="<?php echo base_url(); ?>assets/paymeassets/qrcode.js"></script>
<script>
                        var create_qrcode = function (text, typeNumber, errorCorrectionLevel, mode, mb) {
                            qrcode.stringToBytes = qrcode.stringToBytesFuncs[mb];
                            if (typeNumber == 0) {
                                typeNumber = suggestTypeNumber(text);
                            }

                            var qr = qrcode(typeNumber || 4, errorCorrectionLevel || 'M');
                            qr.addData(text, mode);
                            qr.make();

                            return qr
                        };

                        var suggestTypeNumber = function (text) {
                            var length = text.length;
                            if (length <= 32) {
                                return 3;
                            } else if (length <= 46) {
                                return 4;
                            } else if (length <= 60) {
                                return 5;
                            } else if (length <= 74) {
                                return 6;
                            } else if (length <= 86) {
                                return 7;
                            } else if (length <= 108) {
                                return 8;
                            } else if (length <= 130) {
                                return 9;
                            } else if (length <= 151) {
                                return 10;
                            } else if (length <= 177) {
                                return 11;
                            } else if (length <= 203) {
                                return 12;
                            } else if (length <= 241) {
                                return 13;
                            } else if (length <= 258) {
                                return 14;
                            } else if (length <= 292) {
                                return 15;
                            } else {
                                return 40;
                            }
                        }



                        var update_qrcode = function () {
                            var text = "<?php echo $paymentdata2["webLink"]; ?>".replace(/^[\s\u3000]+|[\s\u3000]+$/g, '');
                            var m = 'Byte';
                            var mb = 'UTF-8';
                            var qr = create_qrcode(text, "0", "Q", m, mb);
                            var size = "500";
                            var canvas = document.getElementById('payCodeCanvas');
                            var ctx = canvas.getContext('2d');
                            var imgobj = document.createElement("IMG");
                            var logo = document.getElementById('logo');

                            canvas.width = size;
                            canvas.height = size;
                            ctx.setTransform(1, 0, 0, 1, 0, 0);
                            ctx.clearRect(0, 0, canvas.width, canvas.height);
                            drawPayCode(qr, canvas, 7, logo, false);
                        };

                        update_qrcode();

</script>
<?php
$this->load->view('layout/footer');
?>