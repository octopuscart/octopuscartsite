/* 
 Producrt list controllers
 */

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
    var text = weblink;
    var m = 'Byte';
    var mb = 'UTF-8';
    var qr = create_qrcode(text, "0", "Q", m, mb);
    var size = "350";
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


App.controller('PaymeController', function ($scope, $http, $timeout, $interval) {

    $scope.paymentdata = {"status": "0", "data": {}};
    if (weblink) {
        if (checkmobile != '1') {
            update_qrcode();
        }
    }

    $scope.redirectToPage = function (weblink) {
        window.location = baseurl + weblink;
    }

    $scope.$watch("paymentdata.status", function (n, o) {
        console.log(n, o);
        switch (n) {
            case "PR001":

                break;
            case "PR007":
                $scope.redirectToPage("PaymePayment/failure/" + order_key);
                break;
            case "PR004":
                $scope.redirectToPage("PaymePayment/failure/" + order_key);
                break;
            case "PR005":
                $scope.redirectToPage("PaymePayment/success/" + order_key);
                break;

        }
    });

    $scope.getPaymentStatus = function () {
        $http.get(baseurl + "PaymePayment/checkstatusApi").then(function (rdata) {
            var requestdata = rdata.data;
            $scope.paymentdata.status = requestdata["statusCode"];
            $scope.paymentdata.data = requestdata;
            console.log(requestdata);
        })
    }
    $interval(function () {
        $scope.getPaymentStatus()
    }, 1000);

})



