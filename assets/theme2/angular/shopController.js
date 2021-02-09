/* 
 Shop Cart product controllers
 */





App.controller('ShopController', function ($scope, $http, $timeout, $interval, $filter) {


    $('.typeahead').bind('typeahead:select', function (ev, suggestion) {
        //  window.location = baseurl + "Product/ProductDetails/" + suggestion.id;
    });

    $(document).on("typeahead:beforeselect", function (event, data) {
        event.preventDefault();
    });


    //search data
    $(function () {
//        function log(message) {
//            $("<div>").text(message).prependTo("#log");
//            $("#log").scrollTop(0);
//        }
//
//        $("#searchdata").autocomplete({
//            source: function (request, response) {
//                $.ajax({
//                    url: baseurl + "Api/SearchSuggestApi",
//                    dataType: "jsonp",
//                    data: {
//                        term: request.term
//                    },
//                    success: function (data) {
//                        response(data);
//                    }
//                });
//            },
//            minLength: 2,
//            select: function (event, ui) {
//                console.log(ui.item)
////                log("Selected: " + ui.item.value + " aka " + ui.item.id);
//            }
//        });
    });

    //searchdata 

    var globlecart = baseurl + "Api/cartOperation";
    $scope.product_quantity = 1;

    var currencyfilter = $filter('currency');

    $scope.globleCartData = {'total_quantity': 0};//cart data

    //get cart data
    $scope.getCartData = function () {
        $http.get(globlecart).then(function (rdata) {
            $scope.globleCartData = rdata.data;
            $scope.globleCartData['grand_total'] = $scope.globleCartData['total_price'];
            $(".cartquantity").text($scope.globleCartData.total_quantity);
        }, function (r) {
        })
    }
    $scope.getCartData();


    //change productverient
    $scope.changeProductVarient = function (verient, productobj) {
        console.log(productobj, verient)
    }
    //
    //remove cart data
    $scope.removeCart = function (product_id) {
        $http.get(globlecart + "Delete/" + product_id).then(function (rdata) {
            console.log("asdfsadf");
            $scope.getCartData();
        }, function (r) {
        })
    }

    //update cart
    $scope.updateCart = function (productobj, oper) {
        if (oper == 'sub') {
            if (productobj.quantity == 1) {
            } else {
                productobj.quantity = Number(productobj.quantity) - 1;
            }
        }
        if (oper == 'add') {
            if (productobj.quantity > 5) {
            } else {
                productobj.quantity = Number(productobj.quantity) + 1;
            }
        }
        console.log(productobj.quantity)
        $http.get(globlecart + "Put/" + productobj.product_id + "/" + productobj.quantity).then(function (rdata) {
            $scope.getCartData();
        }, function (r) {
        })
    }

    //add cart product
    $scope.addToCart = function (product_id, quantity) {
        var productdict = {
            'product_id': product_id,
            'quantity': quantity,
        }
        var form = new FormData()
        form.append('product_id', product_id);
        form.append('quantity', quantity);
        swal({
            title: 'Adding to Cart',
            onOpen: function () {
                swal.showLoading()
            }
        })
        $http.post(globlecart, form).then(function (rdata) {
            $(".cartquantitysearch").text("1");
            swal.close();
            $scope.getCartData();
            swal({
                title: 'Added To Cart',
                type: 'success',
                html: "<p class='swalproductdetail'><span>" + rdata.data.title + "</span><br>" + "Total Price: " + currencyfilter(rdata.data.total_price, ' ' + globlecurrency + '  ') + ", Quantity: " + rdata.data.quantity + "</p>",
                imageUrl: rdata.data.file_name,
                imageWidth: 100,
                timer: 1500,
//                 background: '#fff url(//bit.ly/1Nqn9HU)',
                imageAlt: 'Custom image',
                showConfirmButton: false,
                animation: true

            }).then(
                    function () {
                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                        }
                    }
            )
        }, function () {
            swal.close();
            swal({
                title: 'Something Wrong..',
            })
        });
    }


    $scope.addToBuy = function (product_id, quantity) {
        var productdict = {
            'product_id': product_id,
            'quantity': quantity,
        }
        var form = new FormData()
        form.append('product_id', product_id);
        form.append('quantity', quantity);
        swal({
            title: 'Adding to Cart',
            onOpen: function () {
                swal.showLoading()
            }
        })
        $http.post(globlecart, form).then(function (rdata) {
            $(".cartquantitysearch").text("1");
            swal.close();
            $scope.getCartData();
            swal({
                title: 'Added To Cart',
                type: 'success',
                html: "<p class='swalproductdetail'><span>" + rdata.data.title + "</span><br>" + "Total Price: " + currencyfilter(rdata.data.total_price, ' ' + globlecurrency + '  ') + ", Quantity: " + rdata.data.quantity + "</p>",
                imageUrl: rdata.data.file_name,
                imageWidth: 100,
                timer: 1500,
//                 background: '#fff url(//bit.ly/1Nqn9HU)',
                imageAlt: 'Custom image',
                showConfirmButton: false,
                animation: true

            }).then(
                    function () {
                        window.location = baseurl + "CartGuest/checkoutInit";
                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            window.location = baseurl + "CartGuest/checkoutInit";
                        }
                    }
            )
        }, function () {
            swal.close();
            swal({
                title: 'Something Wrong..',
            })
        });
    }

    $scope.avaiblecredits = avaiblecredits;

    $scope.checkOrderTotal = function () {
        if ($scope.globleCartData.used_credit) {
            $scope.globleCartData.grand_total = $scope.globleCartData.total_price - $scope.globleCartData.used_credit;
        } else {
            $scope.globleCartData.used_credit = 0;
            $scope.globleCartData.grand_total = $scope.globleCartData.total_price;
            alert("Invalid Credit Entered.")
        }
    }

    function equalHeight() {
        $('.products-container').each(function () {
            var mHeight = 0;
            $(this).children('div').children('div').height('auto');
            $(this).children('div').each(function () {
                var itemHeight = $(this).height();
                if (itemHeight > mHeight) {
                    mHeight = itemHeight;
                }
                $(this).children('div').height(mHeight + 'px');
            });
        });
    }

    //Get Menu data
    var globlemenu = baseurl + "Api/categoryMenu";
    $http.get(globlemenu).then(function (r) {
        $scope.categoriesMenu = r.data;

    }, function (e) {
    })
    var substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            substrRegex = new RegExp(q, 'i');

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            $.each(strs, function (i, str) {
                if (substrRegex.test(str.title)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    var templatesearch2 = `
<ul class="media-list">
  <li class="media">
    <div class="media-left">
      <a href="#">
                                   <div class="product_image_back serachbox-image" style="background:url({{file_name}});"></div>

      </a>
    </div>
    <div class="media-body searchbody">
        <div class="row">
            <div class="col-md-7">

                <h4 class="media-heading"><span class="textoverflow searchtitle">{{title}}</span></h4>
            </div>
            <div class="col-md-3 searchtext">
                 ` + globlecurrency + ` {{price}}                
             </div>
        
           <div class="col-md-2">
                  <button class="btn-add-cart btn-primary transition-3d-hover searchbutton" onclick="addToCartExt({{id}}, 1, this)"><i class="ec ec-add-to-cart"></i></button>  
    
             </div>
       </div>
    </div>
  </li>
</ul>`;
    var templateserach = `<div class="searchholder">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="product_image_back serachbox-image" style="background:url( ` + imageurlg + `{{file_name}});"></div>
                     
                            <span class="textoverflow searchtitle">{{title}}</span>
                        </div>
                        <div class="col-md-3">
                            {{price}}
                        </div>
                    
                        <div class="col-md-2">
                            <button class="btn btn-xs btn-primary " onclick="addToCartExt({{id}}, 1)">Add</button>
                        </div>
                    </div>
                </div>`;

    $scope.prefetchdata = {};
    $http.get(baseurl + "Api/prefetchdata.json").then(function (rdata) {
        $scope.prefetchdata = rdata.data;
        $timeout(function () {
            equalHeight(); // Call Equal height function
            var searchProducts = new Bloodhound({
                initialize: false,
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                identify: function (obj) {
                    return obj.title;
                },
                prefetch: baseurl + "Api/prefetchdata.json",
                remote: {
                    url: baseurl + "Api/SearchSuggestApi?query=" + '%QUERY%',
                    wildcard: '%QUERY%'
                }
            });

            $('.typeahead').typeahead(null, {
                name: 'search-products',
                display: 'title',
                limit: 8,
//                source: substringMatcher($scope.prefetchdata),
                source: searchProducts,
                templates: {
                    empty: [
                        '<div class="empty-message">',
                        "Can't Find!, Try Something Else",
                        '</div>'
                    ].join('\n'),
                    suggestion: Handlebars.compile(templatesearch2)
                }
            });

        }, 500);
    })




    $scope.projectDetailsModel = {'productobj': {}, 'quantity': 1};
    //get product detail model
    $scope.viewShortDetails = function (detailobj) {
        $scope.projectDetailsModel.productobj = detailobj;
    }


    $scope.modelProductQuantity = function () {
        $timeout(function () {
            var quantity = $("#model_quantity").val();
            $scope.projectDetailsModel.quantity = quantity;
        })
    }




})


App.controller('HomeController', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.homeInit = {"offers": ""};
    var url = baseurl + "Api/productListOffersApi/";
    $http.get(url).then(function (rdata) {
        $scope.homeInit.offers = rdata.data;
    }, function () {

    })
})





App.controller('ProductDetails', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.productver = {'quantity': 1};

    $scope.updateCartDetail = function (oper) {
        console.log(oper)
        if (oper == 'sub') {
            if ($scope.productver.quantity == 1) {
            } else {
                $scope.productver.quantity = Number($scope.productver.quantity) - 1;
            }
        }
        if (oper == 'add') {
            if ($scope.productver.quantity > 5) {
            } else {
                $scope.productver.quantity = Number($scope.productver.quantity) + 1;
            }
        }
    }

    $(function () {
        $(".select2").on('select2:select', function (e) {
            var data = e.params.data;
            var url = baseurl + "Product/ProductDetails/" + data.id + "";
            window.location = url;
        });
    })
})



function addToCartExt(productid, qnty, obj) {
    var qntyobj = $(obj).parents(".searchbody").find(".cartquantitysearch").text();

    angular.element(document.getElementById("ShopController")).scope().addToCart(productid, qnty);
}

function incQuantity(obj) {
    var qntyobj = $(obj).parents(".searchinputgroup").find(".cartquantitysearch")
    $(qntyobj).text(Number($(qntyobj).text()) + 1)
}

function decQuantity(obj) {
    var qntyobj = $(obj).parents(".searchinputgroup").find(".cartquantitysearch");
    $(qntyobj).text(Number($(qntyobj).text()) > 1 ? (Number($(qntyobj).text()) - 1) : Number($(qntyobj).text()));
}




