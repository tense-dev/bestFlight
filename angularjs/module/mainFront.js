var app = angular.module("mainFront", []);
app.directive("owlCarousel", ['$timeout', function($timeout) {
    return {
        restrict: 'E',
        transclude: false,
        link: function(scope) {
            scope.initCarousel = function(element) {
                $timeout(function() {
                    // provide any default options you want
                    var defaultOptions = {};
                    var customOptions = scope.$eval($(element).attr('data-options'));
                    // combine the two options objects
                    for (var key in customOptions) {
                        defaultOptions[key] = customOptions[key];
                    }
                    // init carousel
                    $(element).owlCarousel(defaultOptions);
                }, 100);
            };
        }
    };
}]);

app.directive('owlCarouselItem', [function() {
    return {
        restrict: 'A',
        transclude: false,
        link: function(scope, element) {
            // wait for the last item in the ng-repeat then call init
            if (scope.$last) {
                scope.initCarousel(element.parent());
            }
        }
    };
}]);
//const configapp = { baseUrl: 'http://devbestflight.com/' }
const configapp = { baseUrl: 'http://localhost/bestFlightVersion/index.php' }
    /*const configapp = {
        baseUrl: 'http://yengyengto.com/'
    };*/

//const configapp = {baseUrl:'http://devbestflight.com/'}
app.controller('mainctl', ($scope, $http, $window) => {
    $scope.searchModel = {
        datef: '',
        datet: '',
        codeStr: '',
        countryName: ''
    }
    $scope.optionCursor = {

        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        nav: true,
        loop: true,
        lazyLoad: true,
        navText: [
            '<i class="ti-angle-left"></i>',
            '<i class="ti-angle-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            692: {
                items: 1,
                nav: false
            },
            768: {
                items: 2,
                nav: false

            },
            991: {
                items: 3,
                nav: true
            }
        }
    }
    $scope.clickCountry = (str) => {
        // var newurl = $window.location.protocol + "//" + $window.location.host + '/search' + $window.location.pathname + '?country=' + str;
        //console.log()
        var newurl = configapp.baseUrl + '/search?country=' + str;
        $window.location = newurl;
    }
    $scope.searchProgramTour = () => {
        $scope.param = [];
        var cc = '';
        if ($scope.searchModel.countryName.length > 0) {
            $scope.param.push({ 'data': "country=" + $scope.searchModel.countryName });
        }

        if ($scope.searchModel.codeStr.length > 0) {
            $scope.param.push({ 'data': "program=" + $scope.searchModel.codeStr });
        }
        if ($scope.searchModel.datef) {
            $scope.param.push({ 'data': "startdate=" + $scope.searchModel.datef });
        }
        if ($scope.searchModel.datet) {
            $scope.param.push({ 'data': "enddate=" + $scope.searchModel.datet });
        }
        //$scope.param.push({'data': ("startdate="+ $scope.searchModel.datef + "&enddate="+$scope.searchModel.datet)});      

        angular.forEach($scope.param, function(dt, $index) {
            cc = cc + ($index > 0 ? '&' + dt.data : dt.data);
        });

        var newurl = $window.location.protocol + "//" + $window.location.host + '/search' + $window.location.pathname + (cc !== '' ? '?' : '') + cc;
        //console.log()
        $window.location = newurl;
    }
    $scope.getLtPromotion = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'MainFront/getListPromotion',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            //console.log(datares);
            $scope.ltPromotion = datares;
        });

    }
    $scope.getLtPromote = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'MainFront/getListPromote',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            console.log(datares);
            $scope.ltPromotion = datares;
        });

    }
    $scope.getLtlowPrice = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'MainFront/getListLowPriceProgramtour',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            //console.log(datares);
            $scope.ltlowPrice = datares;
        });

    }
    $scope.getLtSarupByCountry = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'MainFront/getListProgramtourByCountry',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            //console.log(datares);
            $scope.ltsrBCt = datares;
        });

    }

    $scope.isOdd = (num) => { return (num % 2) === 1 ? false : true; }
    $scope.range = function(min, max, step) {
        step = step || 1;
        var input = [];
        for (var i = min; i <= max; i += step) {
            input.push(i);
        }
        return input;
    };
    $scope.getLtPromotion();
    $scope.getLtSarupByCountry();
    $scope.getLtlowPrice();
    $scope.getLtPromote();

    /*   var fd=new FormData();
             fd.append('Model',angular.toJson(data_report));  
             $http({
                method: 'POST',
                data:fd,
                url: config.newcrystalreport+'Reportsale/viewmaintour',
                responseType : 'arraybuffer',
                headers: {'Content-Type': undefined},
                cache: true
                 }).then(function successCallback(response) {   
                    var file = new Blob([response.data], {type: 'application/pdf'});
                    var fileURL = $window.URL.createObjectURL(file);
                    load_show.close();
                    printJS(fileURL);
                });  */

});




app.controller('mainpgi', ($scope, $http) => {
    $scope.getLtAsiaPass = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Packagespass/getLtAsiaPass',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            console.log(datares);
            $scope.ltasiapass = datares;
        });

    }
    $scope.getLtJapan = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Packagespass/getLtJapan',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            console.log(datares);
            $scope.ltjapan = datares;
        });

    }
    $scope.getLtAsiaPass();
    $scope.getLtJapan();

});




app.controller('mainpgitour', ($scope, $http) => {

    $scope.getListIndependent1 = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Packagestour/getListIndependent1',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.lstIndependen1 = datares;
        });

    }

    $scope.getListIndependent2 = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Packagestour/getListIndependent2',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.lstIndependen2 = datares;
        });

    }

    $scope.getListIndependent3 = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Packagestour/getListIndependent3',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.lstIndependen3 = datares;
        });


    }
    $scope.getListIndependent4 = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Packagestour/getListIndependent4',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.lstIndependen4 = datares;
        });
    }

    $scope.funcGenPDF = function(msg) {
        $http({
            method: 'POST',
            url: configapp.baseUrl,
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {});
    }

    $scope.getListIndependent1();
    $scope.getListIndependent2();
    $scope.getListIndependent3();
    $scope.getListIndependent4();

});


/////////ticketplane/////////////
app.controller('mainticketplan', ($scope, $http) => {
    $scope.getListticketplane_byid = (id) => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Ticketplane/getticketplane_byid',
            data: JSON.stringify({ id: id }),
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            console.log(datares);
            $scope.ticketplane = datares;
        });
    }
    $scope.getListticketplane = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Ticketplane/getListticketplane',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.lstticketplancontry = datares;
        });
    }
    $scope.getListticketplane_byid();
    $scope.getListticketplane();
});


app.controller('mainticketplan_details', ($scope, $http) => {
    $scope.getlistticketplan_details = (ticketplane_id) => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Ticketplane/getListticketplane_details_byticketplaneID',
            data: JSON.stringify({ ticketplane_id: ticketplane_id }),
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            var datares = response.data;
            console.log(datares);
            const groups = datares.reduce(function(obj, item) {
                obj[item.ticket_to] = obj[item.ticket_to] || [];
                obj[item.ticket_to].push(item);
                return obj;
            }, {});
            const myArray = Object.keys(groups).map(function(key) {
                return { rowlength: datares.length, groupname: key, rowgrouplength: groups[key].length, listgroup: groups[key] };
            });
            $scope.lstticketplan_details = myArray;
        });
    }

    $scope.getlistticketplan_detailsbymenu = (ticketplanmenu_id) => {
        if (ticketplanmenu_id > 0) {
            $http({
                method: 'POST',
                url: configapp.baseUrl + 'Ticketplane/getListticketplane_details_bymenuid',
                data: JSON.stringify({ ticketplanmenu_id: ticketplanmenu_id }),
                headers: { 'Content-Type': undefined },
            }).then(successCallback = (response) => {
                var datares = response.data;
                const groups = datares.reduce(function(obj, item) {
                    obj[item.ticket_to] = obj[item.ticket_to] || [];
                    obj[item.ticket_to].push(item);
                    return obj;
                }, {});
                const myArray = Object.keys(groups).map(function(key) {
                    return { rowlength: datares.length, groupname: key, rowgrouplength: groups[key].length, listgroup: groups[key] };
                });
                $scope.lstticketplan_detailsbymenu = myArray;
            });
        }
    }

    //$scope.getlistticketplan_detailsbymenu();
    $scope.getlistticketplan_details();
});



/* รถไฟ ๆ  ๆ ๆ  ๆ ๆ */

app.controller('train_japan', ($scope, $http) => {
    const data = "";
    $scope.getListtrainJapan = () => {
        $http({
            method: 'GET',
            url: configapp.baseUrl + 'Train/getListtrainJapan',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            if (datares.length > 0) {
                $scope.getListtrain_details_Japan(datares);
            }
        });
    }

    $scope.getListtrain_details_Japan = (res) => {
        if (res.length > 0) {
            const datas = [];
            for (var i = 0; i < res.length; i++) {
                const row = i;
                const dataheader = res[i];
                const data_new = {
                    'Code': dataheader.Code,
                    'Description': dataheader.Description,
                    'ImagePath': dataheader.ImagePath,
                    'Name': dataheader.Name,
                    'region': dataheader.region,
                };
                datas.push(data_new);

                $http({
                    method: 'POST',
                    url: configapp.baseUrl + 'Train/getListtrain_details_Japan',
                    data: JSON.stringify({ train_oid: dataheader.ObjectID }),
                    headers: { 'Content-Type': undefined },
                }).then(successCallback = (response) => {
                    const dataresx = response.data;
                    datas[row].details = dataresx;

                });
            }
            $scope.lsttrainjapan = datas;
        }
    }
    $scope.getListtrainJapan();
});

app.controller('train_euroup', ($scope, $http) => {
    $scope.getListtrainJEurope = () => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Train/getListtrainJEurope',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            if (datares.length > 0) {
                getListtrain_details(datares);
            }
        });
    }

    function getListtrain_details(res) {
        if (res.length > 0) {
            const datas = [];
            for (var i = 0; i < res.length; i++) {
                const row = i;
                const dataheader = res[i];
                const data_new = {
                    'ObjectID': dataheader.ObjectID,
                    'Code': dataheader.Code,
                    'Description': dataheader.Description,
                    'ImagePath': dataheader.ImagePath,
                    'Name': dataheader.Name,
                    'region': dataheader.region,
                };
                datas.push(data_new);
                $http({
                    method: 'POST',
                    url: configapp.baseUrl + 'Train/getListtrain_details',
                    data: JSON.stringify({ train_id: dataheader.ObjectID }),
                    headers: { 'Content-Type': undefined },
                }).then(successCallback = (response) => {
                    const dataresx = response.data;
                    datas[row].details = dataresx;

                });
            }
            $scope.lsttrainrurope = datas;
        }
    }
    $scope.getListtrainJEurope();
});


app.controller('train_euroup_detail', ($scope, $http) => {
    $scope.getListtrain_details_euroup_Group = (train_id) => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Train/getListtrain_details_euroup_Group',
            data: JSON.stringify({ train_id: train_id }),
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.list_group = datares;
            $scope.getListtrain_details_euroup_bygroup(train_id, datares[0].Group);

        });
    }
    $scope.getListtrain_details_euroup_bygroup = function(train_id, Group) {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Train/getListtrain_details_euroup_bygroup',
            data: JSON.stringify({ train_id: train_id, Group: Group }),
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.listtrain_bygroup = datares;
        });
    }
});

app.filter('trustAsHtml', ['$sce', function($sce) {
    return function(text) {
        return $sce.trustAsHtml(text);
    };
}]);
app.controller('searchProgramtour', ($scope, $http, $window, $filter) => {
    $scope.searchModel = {
        datef: '',
        datet: '',
        codeStr: '',
        countryName: ''
    }
    $scope.searchAgain = () => {
        var newurl = $window.location.href;
        var url = new URL(newurl);
        $scope.sortcontry = (url.searchParams.get("country") == null ? '' : url.searchParams.get("country"));
        $scope.sortprogramtour = (url.searchParams.get("program") == null ? '' : url.searchParams.get("program"));
        const df = url.searchParams.get("startdate");
        const dt = url.searchParams.get("enddate");
        if (df !== null && dt !== null && $scope.sValidDate(df) == true && $scope.sValidDate(dt) == true) {
            const udf = moment(df, 'DD/MM/YYYY').toDate();
            const udt = moment(dt, 'DD/MM/YYYY').toDate();
            $scope.start_date = moment(udf).format("DD/MM/YYYY");
            $scope.end_date = moment(udt).format("DD/MM/YYYY");
        }
        if (!df) $scope.start_date = null;
        if (!dt) $scope.end_date = null;
        $scope.searchModel.codeStr = $scope.sortprogramtour;
        $scope.searchModel.countryName = $scope.sortcontry;
        $scope.searchModel.datef = df;
        $scope.searchModel.datet = dt;

        //#endregion  
        $scope.list_view_by_web();
    }
    $scope.datepk_value = function(req) {
        if (!req) return;
        if (req instanceof Date === false) {
            return new Date(req.split("/").reverse().join("-"));
        }
        return new Date($scope.date_format_datepk(req).split("/").reverse().join("-"));
    }
    $scope.sValidDate = (dt) => {
        var date = moment(dt, 'DD/MM/YYYY', true);
        return date.isValid();
    }
    $scope.getListCountryAll = () => {

        $http({
            method: 'post',
            url: configapp.baseUrl + 'SeachProgramTour/getListCountryAll',
            headers: { 'Content-Type': undefined }
        }).then(successCallback = (res) => {
            //console.log(res.data)
        })
    }
    $scope.list_view_by_web = () => {
        $scope.loader_search = true;
        //console.log($scope.sortprogramtour);
        var fd = new FormData();
        var date_start_from = $scope.datepk_value($scope.start_date);
        var date_start_to = $scope.datepk_value($scope.end_date);
        fd.append('data', angular.toJson({ 'datef': date_start_from, 'datet': date_start_to, 'codestr': $scope.sortprogramtour, 'countryName': $scope.sortcontry }));
        const str = (!date_start_from || !date_start_to) ? 'getListProgramtourBySearchNotDate' : 'getListProgramtourBySearch';
        //console.log(str)
        $http({
            method: 'post',
            url: configapp.baseUrl + 'SeachProgramTour/' + str,
            data: fd,
            headers: { 'Content-Type': undefined }
        }).then(successCallback = (res) => {
            const datares = res.data;
            const pgtGroub = $scope.groubBy(datares, 'pgtID');
            const pgtfil = pgtGroub.filter(o => (o.group_by_key));
            const pgtGroubByPgtID = pgtfil.map((o) => {
                const pr = pgtGroub.filter(r => r.pgtID === o.pgtID);
                const priceLow = $filter('orderBy')(pr, '-prTwin');
                o['groubVal'] = pr;
                o.priceLow = priceLow[0].prTwin;
                return o;
            })
            $scope.seklsoo = pgtGroubByPgtID;
            //console.log($scope.seklsoo);

        });
    }
    $scope.range = function(min, max, step) {
        step = step || 1;
        var input = [];
        for (var i = min; i <= max; i += step) {
            input.push(i);
        }
        return input;
    };
    $scope.groubBy = function(array, groupByField) {
        var result = [];
        var prev_item = null;
        var groupKey = false;
        var num_row;
        var filteredData = $filter('orderBy')(array, groupByField);
        if (!filteredData) { return; }
        for (var i = 0; i < filteredData.length; i++) {
            groupKey = false;
            if (prev_item !== null) {
                if (prev_item[groupByField] !== filteredData[i][groupByField]) {
                    groupKey = true;
                }
            } else {
                groupKey = true;
            }
            if (groupKey) {
                filteredData[i]['group_by_key'] = true;

                num_row = i;
            } else {
                filteredData[i]['group_by_key'] = false;
            }
            result.push(filteredData[i]);
            prev_item = filteredData[i];
        }
        return result;

    }
    $scope.convertDateShot = function(date_start, date_end) {
        var year_thai = 543; //ความห่างขอคริสต์ศักราชกับพุทธศักราช
        var date_day = moment(new Date(date_start.replace(' ', 'T'))).locale('th').format('DD-') + moment(new Date(date_end)).locale('th').format('DD');
        var date_month = moment(new Date(date_end.replace(' ', 'T'))).locale('th').format('MMM');
        var date_year = moment(new Date(date_end.replace(' ', 'T'))).locale('th').format('YYYY');
        date_year = parseInt(date_year) + year_thai;
        return date_day + '  ' + date_month + '  ' + date_year.toString();
    }
    $scope.clickSearch = () => {
        //console.log($scope.searchModel)
        $scope.param = [];
        var cc = '';
        if ($scope.searchModel.countryName.length > 0) {
            $scope.param.push({ 'data': "country=" + $scope.searchModel.countryName });
        }

        if ($scope.searchModel.codeStr.length > 0) {
            $scope.param.push({ 'data': "program=" + $scope.searchModel.codeStr });
        }
        if ($scope.searchModel.datef) {
            $scope.param.push({ 'data': "startdate=" + $scope.searchModel.datef });
        }
        if ($scope.searchModel.datet) {
            $scope.param.push({ 'data': "enddate=" + $scope.searchModel.datet });
        }
        //$scope.param.push({'data': ("startdate="+ $scope.searchModel.datef + "&enddate="+$scope.searchModel.datet)});      

        angular.forEach($scope.param, function(dt, $index) {
            cc = cc + ($index > 0 ? '&' + dt.data : dt.data);
        });

        var newurl = $window.location.protocol + "//" + $window.location.host + $window.location.pathname + (cc !== '' ? '?' : '') + cc;
        $window.location = newurl;
        console.log(newurl);
        $window.history.pushState({ path: newurl }, '', newurl);
        $scope.searchAgain();
    }
    $scope.getListCountryAll();
    $scope.searchAgain();
});



app.controller('insurance', ($scope, $http) => {

    $scope.getListinsurance = () => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Insurance/getListinsurance',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            if (datares.length > 0) {
                getListinsurance_details(datares);
            }
        });
    }

    function getListinsurance_details(res) {
        if (res.length > 0) {
            const datas = [];
            for (var i = 0; i < res.length; i++) {
                const row = i;
                const dataheader = res[i];
                const data_new = {
                    'ObjectID': dataheader.ObjectID,
                    'Code': dataheader.Code,
                    'Description': dataheader.Description,
                    'ImagePath': dataheader.ImagePath,
                    'Name': dataheader.Name,
                };
                datas.push(data_new);
                $http({
                    method: 'POST',
                    url: configapp.baseUrl + 'Insurance/getListinsurance_details_byheaderid',
                    data: JSON.stringify({ insuranceOID: dataheader.ObjectID }),
                    headers: { 'Content-Type': undefined },
                }).then(successCallback = (response) => {
                    const dataresx = response.data;
                    datas[row].details = dataresx;

                });
            }
            $scope.insurance = datas;
        }
    }
    $scope.getListinsurance();
});


app.controller('insurance_details', ($scope, $http) => {

    $scope.getListinsurance_details_byid = (id) => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Insurance/getListinsurance_details_byid',
            data: JSON.stringify({ id: id }),
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            const res = [];
            if (datares.length > 0) {
                for (let i = 0; i < datares.length; i++) {
                    datares[i].coverage = datares[i].coverage.replace('<style type="text/css"><!--td {border: 1px solid #ccc;}br {mso-data-placement:same-cell;}--></style>', '');
                    datares[i].condition = datares[i].condition.replace('<style type="text/css"><!--td {border: 1px solid #ccc;}br {mso-data-placement:same-cell;}--></style>', '');
                    datares[i].price = datares[i].price.replace('<style type="text/css"><!--td {border: 1px solid #ccc;}br {mso-data-placement:same-cell;}--></style>', '');
                    //  console.log(datares[i]);
                    //datares[i].price = datares[i].price.replace('<!--', '');
                    //datares[i].price = datares[i].price.replace('-->', '');
                    res.push(datares[i]);
                }
            }


            $scope.insurance_details = res;



            //datares.replace("<!--", ""); //datares;
        });
    }

});




app.controller('visa', ($scope, $http) => {

    $scope.getListvisa = () => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Visa/getListvisa',
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            getListvisa_details(datares);
            // $scope.listvisa = datares;
        });
    }

    function getListvisa_details(res) {
        if (res.length > 0) {
            const datas = [];
            for (var i = 0; i < res.length; i++) {
                const row = i;
                const dataheader = res[i];
                const data_new = {
                    'ObjectID': dataheader.ObjectID,
                    'Country': dataheader.Country,
                    'ImagePath': dataheader.ImagePath,
                    'SubImagePath': dataheader.SubImagePath,
                };
                datas.push(data_new);
                $http({
                    method: 'POST',
                    url: configapp.baseUrl + 'Visa/getListvisa_details',
                    data: JSON.stringify({ visaoid: dataheader.ObjectID }),
                    headers: { 'Content-Type': undefined },
                }).then(successCallback = (response) => {
                    const dataresx = response.data;
                    datas[row].details = dataresx;

                });
            }
            $scope.listvisa = datas;
            console.log(datas);
        }
    }


    $scope.getListvisa();
});



app.controller('visa_details', ($scope, $http) => {

    $scope.getListvisa_detailsbyid = (id) => {
        $http({
            method: 'POST',
            url: configapp.baseUrl + 'Visa/getListvisa_detailsbyid',
            data: JSON.stringify({ id: id }),
            headers: { 'Content-Type': undefined },
        }).then(successCallback = (response) => {
            const datares = response.data;
            $scope.listvisadetails = datares;
        });
    }
});