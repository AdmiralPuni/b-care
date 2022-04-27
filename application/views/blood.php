<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="res/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="res/css/custom.css">
    <title>B-Care</title>
    <style>
        .btn-dark:hover {
            background-color: var(--bs-white);
            border-color: var(--bs-white);
            color: var(--bs-dark);
        }

        .btn-dark.active {
            background-color: var(--bs-white);
            border-color: var(--bs-white);
            color: var(--bs-dark);
        }

        #input-mode {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-2 px-0 px-md-2" id="print-area">
        <div class="d-block fs-2 fw-normal bg-white border-bottom border-5 border-bc-primary text-dark p-3 py-2 mb-3">
            <div class="d-flex justify-content-between">
                <span class="d-flex justify-content-center">
                    <img class="me-2" height="48" src="res/images/icon.png" alt="">B-Care
                </span>
                <button class="btn btn-outline-dark p-1 collapsed d-md-none" data-bs-toggle="collapse" data-bs-target="#menu-bar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="d-flex">
            <div class="flex-fill" id="print-filter">

            </div>
            <button type="button" class="btn btn-secondary me-2" id="btn-close-print">Close</button>
            <button type="button" class="btn btn-primary" id="btn-browser-print">Print Tabel</button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr id="table-print-header">
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Tanggal Donor</th>
                        <th>Data</th>
                        <th>Status Validasi</th>
                    </tr>
                </thead>
                <tbody id="table-print">

                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid p-2 px-0 px-md-2" id="main-area">
        <div class="row m-0">
            <div class="col-12 mb-2 sticky-top p-0 px-0">
                <div class="d-block fs-2 fw-normal bg-white border-bottom border-5 border-bc-primary text-dark p-3 py-2 shadow">
                    <div class="d-flex justify-content-between">
                        <span class="d-flex justify-content-center">
                            <img class="me-2" height="48" src="res/images/icon.png" alt="">B-Care
                        </span>
                        <button class="btn btn-outline-dark p-1 collapsed d-md-none" data-bs-toggle="collapse" data-bs-target="#menu-bar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 mb-2 collapse d-md-block px-1 ps-md-0" id="menu-bar">
                <?php include "nav.php" ?>
            </div>
            <div class="col-12 col-md-9 px-1 pe-md-0 ps-md-2" id="home-container">
                <div class="container-fluid p-0 shadow">
                    <div class="d-block  bg-bc-primary text-white fs-4 p-2">
                        Search
                    </div>
                    <div class="container-fluid p-2 bg-white mb-3">
                        <div class="d-flex justify-content-center">
                            <div class="flex-fill me-2 fs-6 align-self-center">
                                <div class="row row-cols-1 row-cols-md-4 m-0">
                                    <div class="col px-0 pe-md-2 mb-2">
                                        <label for="distinct-blood_type">Gol. Darah</label>
                                        <select class="form-select fs-5" id="distinct-blood_type">

                                        </select>
                                    </div>
                                    <div class="col px-0 pe-md-2 mb-2">
                                        <label for="distinct-status">Status</label>
                                        <select class="form-select fs-5" id="distinct-status">

                                        </select>
                                    </div>
                                    <div class="col px-0 pe-md-2 mb-2">
                                        <label for="distinct-year_month">Tahun-Bulan</label>
                                        <select class="form-select fs-5" id="distinct-year_month">

                                        </select>
                                    </div>
                                    <div class="col px-0 pe-md-2 mb-2">
                                        <label for="distinct-domisili">Domisili</label>
                                        <select class="form-select fs-5" id="distinct-domisili">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <button class="btn btn-outline-success fs-5 px-5 mb-1 py-1" id="btn-search">
                                    Search
                                </button>
                                <button class="btn btn-outline-success fs-5 px-5 mt-1 py-1" id="btn-print">
                                    Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-block  bg-bc-primary text-white fs-4 p-2" id="table-title">
                    -
                </div>
                <div class="container-fluid p-2 bg-white shadow mb-3">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr id="table-header">
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Tanggal Donor</th>
                                    <th>Data</th>
                                    <th>Status Validasi</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination justify-content-center" id="table-paging">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="res/js/custom.js"></script>
<script>
    //hide print area
    $("#print-area").hide();

    var table_header = {
        "donor": {
            "title": "Daftar Pasien Donor Darah",
            "header": ['ID', 'Nama', 'Status', ' Gol. Darah', 'Alamat', 'Tanggal Donor', 'Tanggal Request']
        }
    };

    var distinct_data = {
        "blood_type": [],
        "status": [],
        "year_month": [],
        "domisili": []
    };

    var current_data;
    var current_table;
    var filtered_data;
    var items_per_page = 10;


    //on page ready load donor
    $(document).ready(function () {
        load_data("donor");
    });


    //on button print open the modal
    $("#btn-print").click(function () {
        //hide main and show print area
        $("#main-area").hide();
        $("#print-area").show();



        fill_print_table(filtered_data);


        distincts = {
            "Tanggal" : new Date().toLocaleDateString(),
            "Gol. Darah": $("#distinct-blood_type").val(),
            "Status": $("#distinct-status").val(),
            "Tahun-Bulan": $("#distinct-year_month").val(),
            "Domisili": $("#distinct-domisili").val()
        };
        //clear filter
        $("#print-filter").html("");
        //fill filter in print area
        for(var key in distincts){
            if(distincts[key] != ""){
                $("#print-filter").append(key + " : " + distincts[key] + " ");            }
        }

    });

    //call print
    $("#btn-browser-print").click(function () {
        window.print();
    });

    //show main and close print area
    $("#btn-close-print").click(function () {
        $("#main-area").show();
        $("#print-area").hide();
    });

    function load_data(table) {
        //add api key to header
        current_table = table;

        var api_key = "1234";
        header = {
            'secret': api_key
        };
        $.ajax({
            url: "api/v1/" + table + "/simple/blood",
            type: "GET",
            headers: header,
            dataType: "json",
            success: function (data) {
                current_data = data['data'];
                filtered_data = data['data'];
                //set table title
                $("#table-title").text(table_header[table]['title']);
                //fill header
                $("#table-header").empty();
                $("#table-print-header").empty();
                for (var i = 0; i < table_header[table]['header'].length; i++) {
                    $("#table-header").append("<th>" + table_header[table]['header'][i] + "</th>");
                    $("#table-print-header").append("<th>" + table_header[table]['header'][i] + "</th>");
                }

                $("#table-paging").html("");
                //generate pages
                for (var i = 0; i < Math.ceil(current_data.length / items_per_page); i++) {
                    $("#table-paging").append('<li class="page-item"><a class="page-link" href="#' + i + '" onClick="change_page(' + i + ')">' + (i + 1) + '</a></li>');
                }
                //fill table
                change_page(0);



            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function fill_print_table(data) {
        $("#table-print").empty();
        for (var i = 0; i < data.length; i++) {
            html = "<tr>";
            //for each key in data
            for (var key in data[i]) {
                //ignore first key
                if (key == "id" || key == "type" || key == "req") {
                    continue;
                }
                html += "<td>" + data[i][key] + "</td>";
            }
            html += "</tr>";
            $("#table-print").append(html);
        }
    }

    function fill_table(data, table, page, rebuild_distinct = false) {
        $("#table-body").html("");
        for (var i = page * items_per_page; i < (page * items_per_page) + items_per_page; i++) {
            html = "<tr>";
            //for each key in data
            for (var key in data[i]) {
                //ignore first key
                if (key == "id" || key == "type" || key == "req") {
                    continue;
                }
                if (key == "status" && rebuild_distinct) {
                    if (data[i][key] == "0") {
                        data[i][key] = "Belum Validasi";
                    }
                    else {
                        data[i][key] = "Sudah Validasi";
                    }
                }
                html += "<td>" + data[i][key] + "</td>";


                //check for distinct data, only for keys in distinct_data
                if (rebuild_distinct) {
                    if (distinct_data[key] != undefined) {
                        if (distinct_data[key].indexOf(data[i][key]) == -1) {
                            distinct_data[key].push(data[i][key]);
                        }
                    }
                    //fill year_month with donor_date
                    if (key == "donor_date") {
                        var date = new Date(data[i][key]);
                        var year_month = date.getFullYear() + "-" + (date.getMonth() + 1);
                        if (distinct_data["year_month"].indexOf(year_month) == -1) {
                            distinct_data["year_month"].push(year_month);
                        }
                    }

                }
            }
            html += "</tr>";
            $("#table-body").append(html);
        }

        if (rebuild_distinct) {
            for (var key in distinct_data) {
                $("#distinct-" + key).empty();
                $("#distinct-" + key).append('<option value="">Semua</option>');
                for (var i = 0; i < distinct_data[key].length; i++) {
                    $("#distinct-" + key).append('<option value="' + distinct_data[key][i] + '">' + distinct_data[key][i] + '</option>');
                }
            }
        }
    }

    //on btn search
    $("#btn-search").click(function () {
        distincts = {
            "blood_type": $("#distinct-blood_type").val(),
            "status": $("#distinct-status").val(),
            "year_month": $("#distinct-year_month").val(),
            "domisili": $("#distinct-domisili").val()
        };

        //remove if empty
        for (var key in distincts) {
            if (distincts[key] == "") {
                delete distincts[key];
            }
        }

        //if there's nothing left in distincts, fill with current_data
        if (Object.keys(distincts).length == 0) {
            load_data("donor");
        }
        else {
            //copy current_data
            var new_data = current_data.slice();
            //search current data, if theres no match in the row then remove it
            for (var i = 0; i < new_data.length; i++) {
                var match = true;
                for (var key in distincts) {
                    //if key is year_month, perform date comparison
                    if (key == "year_month") {
                        var date = new Date(new_data[i]["donor_date"]);
                        var year_month = date.getFullYear() + "-" + (date.getMonth() + 1);
                        if (year_month != distincts[key]) {
                            match = false;
                            break;
                        }
                    }
                    else {
                        if (new_data[i][key] != distincts[key]) {
                            match = false;
                            break;
                        }
                    }
                }
                if (!match) {
                    //remoev the line
                    new_data.splice(i, 1);
                    i--;
                }
            }

            filtered_data = new_data;

            //fill table
            fill_table(filtered_data, current_table, 0, false);
        }
    });

    function change_page(index) {
        fill_table(current_data, current_table, index, true);
    }

    //change active button
    $("#button-donor").click(function () {
        $("#button-donor").addClass("active");
        $("#button-request").removeClass("active");
        load_data("donor");
    });

    $("#button-request").click(function () {
        $("#button-request").addClass("active");
        $("#button-donor").removeClass("active");
        load_data("request");

    });
</script>

</html>