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
    <div class="container p-2 px-0 px-md-2">
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
                <!-- 
                <div class="d-block bg-bc-primary text-white fs-4 p-2">
                    Donor Plasma
                </div>
                
                <div class="container-fluid p-2 bg-white shadow mb-3">
                    <div class="row row-cols-1 row-cols-md-1 m-0">
                        <div class="col px-md-0">
                            <button class="btn btn-outline-dark rounded-0 fs-4 w-100 active" id="button-donor">
                                <i class="bi bi-arrow-down-circle"></i> Donor
                            </button>
                        </div>
                        
                        <div class="col ps-md-0">
                            <button class="btn btn-outline-dark rounded-0 fs-4 w-100" id="button-request">
                                <i class="bi bi-arrow-up-square"></i> Permohonan
                            </button>
                        </div>
                        
                    </div>
                </div>
                -->
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
    var table_header = {
        "donor": {
            "title": "Daftar Pasien Donor Plasma",
            "header": ['ID', 'Nama', 'Tanggal Donor', 'Data', 'Status Validasi']
        },
        "request": {
            "title": "Daftar Permohonan Plasma",
            "header": ['Nama', 'Alamat', 'No. HP', 'Golongan Darah', 'Alasan Darurat', 'Timestamp']
        }
    };
    var current_data;
    var current_table;
    var items_per_page = 10;

    //on page ready load donor
    $(document).ready(function () {
        load_data("donor");
    });

    function load_data(table) {
        //add api key to header
        current_table = table;

        var api_key = "1234";
        header = {
            'secret': api_key
        };
        $.ajax({
            url: "api/v1/" + table + "/simple/plasma",
            type: "GET",
            headers: header,
            dataType: "json",
            success: function (data) {
                current_data = data['data'];
                //set table title
                $("#table-title").text(table_header[table]['title']);
                //fill header
                $("#table-header").empty();
                for (var i = 0; i < table_header[table]['header'].length; i++) {
                    $("#table-header").append("<th>" + table_header[table]['header'][i] + "</th>");
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

    function fill_table(data, table, page) {
        $("#table-body").html("");
        for (var i = page * items_per_page; i < (page * items_per_page) + items_per_page; i++) {
            html = "<tr>";
            //for each key in data
            for (var key in data[i]) {
                if (table == "donor") {
                    if (key == "status") {
                        if (data[i][key] == 0) {
                            data[i][key] = "Belum Validasi";
                        }
                        else {
                            data[i][key] = "Sudah Validasi";
                        }
                    }
                    else if (key == "req") {
                        //remove characters other than alphabet
                        data[i][key] = data[i][key].replace(/[^a-zA-Z:]/g, "");
                    }

                }
                html += "<td>" + data[i][key] + "</td>";

            }
            html += "</tr>";
            $("#table-body").append(html);
        }
    }

    function change_page(index) {
        fill_table(current_data, current_table, index);
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