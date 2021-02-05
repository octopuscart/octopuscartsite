/* 
 Producrt list controllers
 */
App.controller('PaymentController', function ($scope, $http, $timeout, $interval) {

  var urlcheck = `http://118.140.3.194:8081/eopg_testing_env/ForexTradeRecetion.jsp?merch_ref_no=20200525225039pm&mid=852202005040001&payment_typ e=ALIPAY&service=SALE&trans_amount=10.00&return_url=http://www.woodlandshk.com&goods_subject=mobile phone&app_pay=WEB&goods_body=goods_body&api_version=2.8&lang=en&reuse=Y&signature=e00bb846cb5efef8597020f17ad9c9cf405db88fefc7df5324d7b7e53a2a6474`;
    
    $http.get(urlcheck).then(function(rdata){
        console.log(rdata)
    })

})
