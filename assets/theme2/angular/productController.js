/* 
 Producrt list controllers
 */
App.controller('ProductController', function ($scope, $http, $timeout, $interval) {

    $scope.selectedProduct = {'product': {}};



    $.HSCore.components.HSRangeSlider.init('.js-range-slider');






    $scope.productResults = {"price": {"maxprice": 0, "minprice": 0}};
    $scope.init = 0;
    $scope.checkproduct = 0;
    $scope.pricerange = {'min': 0, 'max': 0};
    $scope.productProcess = {'state': 1, 'pagination': {'paginate': [1, 16], 'perpage': 16}, 'products': []};

    $scope.getProducts = function (attrs) {
        $scope.productProcess.state = 1;
        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pricelist = [];
        $(".pricefilter").each(function (i, o) {

            if ($(this).is(":checked")) {
                pricelist.push($(this).val());
            }

        })
        var pricestr = pricelist.join("--");
        var pricefilters = "pfilter=" + pricestr;
        argsk.push(pricefilters);
        var pmm = $scope.productResults.price.minprice;
        var pmx = $scope.productResults.price.maxprice;

        var elempm = "maxprice=" + pmx;

        var elempx = "minprice=" + pmm;



        if (pmm != 0) {

            argsk.push(elempx);
            argsk.push(elempm);
        }

        if (searchdata) {
            var search = "search=" + searchdata;
            argsk.push(search);
        }


        var countdata = [0];//$(".info_text").text().split(" ")[1];
        if (Number(countdata[0])) {
            if (countdata) {
                countdata = countdata.split("-");
            }
        } else {
            countdata = [1, 16];
        }

        var paginationdata = "start=" + countdata[0] + "&end=" + countdata[1];

        argsk.push(paginationdata);

        var stargs = argsk.join("&");





        var url = baseurl + "Api/productListApi/" + category_id + "/" + custom_id;

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {
            if ($scope.productResults.products) {
                $scope.productProcess.state = 2;
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                } else {
//                    $scope.productProcess.state = 2;
                }
            }

            var totalcountdata = result.data.product_count;
            var productscounter = [];
            for (i = 1; i <= totalcountdata; i++) {
                productscounter.push(i);
            }

            $scope.productResults['productscounter'] = productscounter;


            if ($scope.productResults.products.length) {
                $scope.productProcess.state = 2;
            } else {
                $scope.productProcess.state = 0;
            }


//            $timeout(function () {
//                $scope.productProcess.state = 2;
//            }, 2000)

            $timeout(function () {

                $('#paging_container3').pajinate({
                    items_per_page: 16,
                    num_page_links_to_display: 5,
                });

                $scope.checkProduct();

                $(".page_link").click(function () {
                    $("html, body").animate({scrollTop: 0}, "slow")
                })

                $timeout(function () {


//                    $(".js-range-slider").ionRangeSlider();

                    // 2. Save instance to variable
                    let my_range = $(".js-range-slider").data("ionRangeSlider");

                    // 3. Update range slider content (this will change handles positions)
                    my_range.update({
                        from:  Number($scope.productResults.price.minprice),
                        to:  Number($scope.productResults.price.maxprice),
                        max:  Number($scope.productResults.price.maxprice),
                        maxResult: "#rangeSliderExample3MinResult",
                        maxResult: "#rangeSliderExample3MaxResult",
                        onChange:function(result){
                            console.log(result.from, result.to);
                        }
                    });
                    
                
                    $("#rangeSliderExample3MinResult").text($scope.productResults.price.minprice);
                    $("#rangeSliderExample3MaxResult").text($scope.productResults.price.maxprice);

//                    // 4. Reset range slider to initial values
//                    my_range.reset();
//
//                    // 5. Destroy instance of range slider
//                    my_range.destroy();


                    var priceSlider = document.getElementById('price-range-filter');
                    if (priceSlider) {
                        noUiSlider.create(priceSlider, {
                            start: [Number($scope.productResults.price.minprice), Number($scope.productResults.price.maxprice)],
                            connect: true,
                            /*tooltips: true,*/
                            range: {
                                'min': Number($scope.productResults.price.minprice),
                                'max': Number($scope.productResults.price.maxprice)
                            },
                            format: wNumb({
                                decimals: 0
                            }),
                        });
                        var marginMin = Number($scope.productResults.price.minprice),
                                marginMax = Number($scope.productResults.price.maxprice);
                        priceSlider.noUiSlider.on('update', function (values, handle) {
                            if (handle) {
                                $timeout(function () {
                                    $scope.productResults.price.maxprice = values[handle];
                                })

                            } else {
                                $timeout(function () {
                                    $scope.productResults.price.minprice = values[handle];
                                })
                            }
                        });
                    }

                }, 1000)


                var priceui = document.getElementById("price-range");
                var minp = Number($scope.productResults.price.minprice) - 1;
                var maxp = Number($scope.productResults.price.maxprice)


            }, 1000)

            $scope.init = 1;
        }, function () {
            $scope.productProcess.state = 0;
        });
    }
    $scope.getProducts2 = function (attrs) {
        $scope.productProcess.state = 1;
        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pmm = $("#price-range-min").text().replace("$", "");
        var pmx = $("#price-range-max").text().replace("$", "");

        var elempm = "maxprice=" + pmx;
        var elempx = "minprice=" + pmm;

        var pricelist = [];
        $(".pricefilter").each(function (i, o) {

            if ($(this).is(":checked")) {
                pricelist.push($(this).val());
            }

        })
        var pricestr = pricelist.join("--");
        var pricefilters = "pfilter=" + pricestr;
        argsk.push(pricefilters);

        if (pmm.trim()) {
            $scope.pricerange.max = pmx;
            $scope.pricerange.min = pmm;
            argsk.push(elempx);
            argsk.push(elempm);
        }


        var countdata = $(".info_text").text().split(" ")[1];
        if (Number(countdata[0])) {
            if (countdata) {
                countdata = countdata.split("-");
            }
        } else {
            countdata = [1, 12];
        }

        var paginationdata = "start=" + countdata[0] + "&end=" + countdata[1];

        argsk.push(paginationdata);

        var stargs = argsk.join("&");





        var url = baseurl + "Api/productListApi/" + category_id + "/" + custom_id;

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {
            if ($scope.productResults.products) {
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                } else {
//                    $scope.productProcess.state = 2;
                }
            }

            var totalcountdata = result.data.product_count;



            if ($scope.productResults.products.length) {
                $scope.productProcess.state = 2;
            } else {
                $scope.productProcess.state = 0;
            }



            $scope.init = 1;
        }, function () {
            $scope.productProcess.state = 0;
        });
    }

    $scope.attribute_checked = {};
    $scope.getProducts();

    $scope.attribute_checked_pre = {};

    $scope.attributeProductGet = function (atv) {

        //check attribute id
        if (atv.checked) {
            if ($scope.attribute_checked[atv.attribute_id]) {
                var attrlist = $scope.attribute_checked[atv.attribute_id];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked[atv.attribute_id].push(atv.id)
                }
            } else {
                $scope.attribute_checked[atv.attribute_id] = [atv.id];
            }
        } else {
            var attrlist = $scope.attribute_checked[atv.attribute_id];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked[atv.attribute_id].splice(ind, 1);
            if ($scope.attribute_checked[atv.attribute_id].length == 0) {
                delete $scope.attribute_checked[atv.attribute_id];
            }
        }


        //check attribute lable
        if (atv.checked) {
            if ($scope.attribute_checked_pre[atv.attribute]) {
                var attrlist = $scope.attribute_checked_pre[atv.attribute];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked_pre[atv.attribute].push(atv)
                }
            } else {
                $scope.attribute_checked_pre[atv.attribute] = [atv];
            }
        } else {
            var attrlist = $scope.attribute_checked_pre[atv.attribute];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked_pre[atv.attribute].splice(ind, 1);
            if ($scope.attribute_checked_pre[atv.attribute].length == 0) {
                delete $scope.attribute_checked_pre[atv.attribute];
            }
        }

        console.log($scope.attribute_checked_pre);


//        var stargs = encodeURIComponent(fargs);
        $scope.getProducts();




    }


    $scope.filterPrice = function () {
        $scope.getProducts();
    }

    $scope.checkProduct = function () {
        var countdata = $(".info_text").text().split(" ")[1];
        if (countdata) {
            var countdata1 = countdata.split("-");
            countdata = [Number(countdata1[0]), Number(countdata1[1])];
        } else {
            countdata = [1, 12];
        }
        console.log(countdata);



    }

    $(document).on("click", ".page_link", function () {
        $scope.productProcess.currentpage = $(this).attr("longdesc");
        $scope.getProducts2();
    });

    $(document).on("click", ".last_link", function () {
        $scope.productProcess.currentpage = "last";
        $scope.getProducts2();
    });
    $(document).on("click", ".first_link", function () {
        $scope.productProcess.currentpage = "last";
        $scope.getProducts2();
    });

    $(document).on("click", ".next_link", function () {
        $scope.productProcess.currentpage = Number($scope.productProcess.currentpage) + 1;
        $scope.getProducts2();
    });
    $(document).on("click", ".previous_link", function () {
        $scope.productProcess.currentpage = Number($scope.productProcess.currentpage) - 1;
        $scope.getProducts2();
    });

    console.log("hello")



})

App.controller('ProductController2', function ($scope, $http, $timeout, $interval) {

    $scope.productResults = {};
    $scope.init = 0;
    $scope.checkproduct = 0;
    $scope.pricerange = {'min': 0, 'max': 0};

    $scope.getProducts = function (attrs) {


        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pmm = $("#price-range-min").text().replace("$", "");
        var pmx = $("#price-range-max").text().replace("$", "");

        var elempm = "maxprice=" + pmx;
        var elempx = "minprice=" + pmm;



        if (pmm.trim()) {
            $scope.pricerange.max = pmx;
            $scope.pricerange.min = pmm;
            argsk.push(elempx);
            argsk.push(elempm);
        }
        var stargs = argsk.join("&");



        var url = baseurl + "Api/productListApi/" + category_id + "";

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {
            if ($scope.productResults.products) {
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                }
            }
            $scope.offerProducts = result.data.offers;
            console.log(result.data.products);
            if ($scope.init == 0) {

                $timeout(function () {


                    var priceSlider = document.getElementById('price-range-filter');
                    if (priceSlider) {
                        noUiSlider.create(priceSlider, {
                            start: [Number($scope.productResults.price.minprice), Number($scope.productResults.price.maxprice)],
                            connect: true,
                            /*tooltips: true,*/
                            range: {
                                'min': Number($scope.productResults.price.minprice),
                                'max': Number($scope.productResults.price.maxprice)
                            },
                            format: wNumb({
                                decimals: 0
                            }),
                        });
                        var marginMin = Number($scope.productResults.price.minprice),
                                marginMax = Number($scope.productResults.price.maxprice);
                        priceSlider.noUiSlider.on('update', function (values, handle) {
                            if (handle) {
                                $timeout(function () {
                                    $scope.productResults.price.maxprice = values[handle];
                                })

                            } else {
                                $timeout(function () {
                                    $scope.productResults.price.minprice = values[handle];
                                })
                            }
                        });
                    }

                }, 1000)
            }
            $scope.init = 1;
        }, function () {
        });
    }

    $scope.attribute_checked = {};
    $scope.getProducts();

    $scope.attribute_checked_pre = {};

    $scope.attributeProductGet = function (atv) {

        //check attribute id
        if (atv.checked) {
            if ($scope.attribute_checked[atv.attribute_id]) {
                var attrlist = $scope.attribute_checked[atv.attribute_id];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked[atv.attribute_id].push(atv.id)
                }
            } else {
                $scope.attribute_checked[atv.attribute_id] = [atv.id];
            }
        } else {
            var attrlist = $scope.attribute_checked[atv.attribute_id];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked[atv.attribute_id].splice(ind, 1);
            if ($scope.attribute_checked[atv.attribute_id].length == 0) {
                delete $scope.attribute_checked[atv.attribute_id];
            }
        }


        //check attribute lable
        if (atv.checked) {
            if ($scope.attribute_checked_pre[atv.attribute]) {
                var attrlist = $scope.attribute_checked_pre[atv.attribute];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked_pre[atv.attribute].push(atv)
                }
            } else {
                $scope.attribute_checked_pre[atv.attribute] = [atv];
            }
        } else {
            var attrlist = $scope.attribute_checked_pre[atv.attribute];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked_pre[atv.attribute].splice(ind, 1);
            if ($scope.attribute_checked_pre[atv.attribute].length == 0) {
                delete $scope.attribute_checked_pre[atv.attribute];
            }
        }

        console.log($scope.attribute_checked_pre);


//        var stargs = encodeURIComponent(fargs);
        $scope.getProducts();




    }


    $scope.filterPrice = function () {
        $scope.getProducts();

    }


})


App.controller('ProductSearchController', function ($scope, $http, $timeout, $interval) {

    $scope.productResults = {};
    $scope.init = 0;
    $scope.checkproduct = 0;
    $scope.pricerange = {'min': 0, 'max': 0};



    $scope.getProducts = function (attrs) {


        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pmm = $("#price-min").text().replace("$", "");
        var pmx = $("#price-max").text().replace("$", "");

        var elempm = "maxprice=" + pmx;
        var elempx = "minprice=" + pmm;



        if (pmm.trim()) {
            $scope.pricerange.max = pmx;
            $scope.pricerange.min = pmm;
            argsk.push(elempx);
            argsk.push(elempm);
        }
        var stargs = argsk.join("&");



        var url = baseurl + "Api/productListSearchApi/" + keywords + "";

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {


            if ($scope.productResults.products) {
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                }
            }
            if ($scope.init == 0) {


            }
            $scope.init = 1;
        }, function () {
        });
    }

    $scope.attribute_checked = {};
    $scope.getProducts();

    $scope.attribute_checked_pre = {};

    $scope.attributeProductGet = function (atv) {

        //check attribute id
        if (atv.checked) {
            if ($scope.attribute_checked[atv.attribute_id]) {
                var attrlist = $scope.attribute_checked[atv.attribute_id];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked[atv.attribute_id].push(atv.id)
                }
            } else {
                $scope.attribute_checked[atv.attribute_id] = [atv.id];
            }
        } else {
            var attrlist = $scope.attribute_checked[atv.attribute_id];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked[atv.attribute_id].splice(ind, 1);
            if ($scope.attribute_checked[atv.attribute_id].length == 0) {
                delete $scope.attribute_checked[atv.attribute_id];
            }
        }


        //check attribute lable
        if (atv.checked) {
            if ($scope.attribute_checked_pre[atv.attribute]) {
                var attrlist = $scope.attribute_checked_pre[atv.attribute];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked_pre[atv.attribute].push(atv)
                }
            } else {
                $scope.attribute_checked_pre[atv.attribute] = [atv];
            }
        } else {
            var attrlist = $scope.attribute_checked_pre[atv.attribute];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked_pre[atv.attribute].splice(ind, 1);
            if ($scope.attribute_checked_pre[atv.attribute].length == 0) {
                delete $scope.attribute_checked_pre[atv.attribute];
            }
        }

        console.log($scope.attribute_checked_pre);


//        var stargs = encodeURIComponent(fargs);
        $scope.getProducts();




    }


    $scope.filterPrice = function () {
        $scope.getProducts();

    }


})



App.controller('ShippingController', function ($scope, $http, $timeout, $interval) {
    $scope.shippingInit = {"delivery_date": delivery_date, "delivery_time": delivery_time};
    console.log($scope.shippingInit);
})