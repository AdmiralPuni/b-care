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
                <div class="row row-cols-1 row-cols-md-2 m-0">
                    <div class="col p-0 pe-md-1">
                        <div class="container-fluid bg-white p-0 shadow">
                            <div class="d-block bg-bc-primary text-white fs-4 p-2">
                                Donor Darah
                            </div>
                            <div class="d-block p-2">
                                <div class="mb-3">
                                    <label for="blood-start" class="form-label">Tgl. Mulai</label>
                                    <input type="date" class="form-control" id="blood-start">
                                </div>
                                <div class="mb-3">
                                    <label for="blood-end" class="form-label">Tgl. Akhir</label>
                                    <input type="date" class="form-control" id="blood-end">
                                </div>
                                <button class="btn btn-outline-success fs-5" id="btn-blood">
                                    Tampilkan
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col p-0 pe-md-1">
                        <div class="container-fluid bg-white p-0 shadow">
                            <div class="d-block bg-bc-primary text-white fs-4 p-2">
                                Donor Plasma
                            </div>
                            <div class="d-block p-2">
                                <div class="mb-3">
                                    <label for="plasma-start" class="form-label">Tgl. Mulai</label>
                                    <input type="date" class="form-control" id="plasma-start">
                                </div>
                                <div class="mb-3">
                                    <label for="plasma-end" class="form-label">Tgl. Akhir</label>
                                    <input type="date" class="form-control" id="plasma-end">
                                </div>
                                <button class="btn btn-outline-success fs-5" id="btn-plasma">
                                    Tampilkan
                                </button>
                            </div>
                        </div>
                    </div>
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

    //set default date, end to now and start to 12 months ago
    var now = new Date();
    var start = new Date(now.getFullYear(), now.getMonth() - 12, now.getDate());
    $("#blood-start").val(start.toISOString().substring(0, 10));
    $("#blood-end").val(now.toISOString().substring(0, 10));
    $("#plasma-start").val(start.toISOString().substring(0, 10));
    $("#plasma-end").val(now.toISOString().substring(0, 10));


    //on btn-blood click
    $("#btn-blood").click(function() {
        //get date
        let start_date = $("#blood-start").val();
        let end_date = $("#blood-end").val();

        var api_key = "1234";
        header = {
            'secret': api_key
        };

        //get data
        $.ajax({
            url: "api/v1/donor/simple/blood/range",
            method: "GET",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            headers: header,
            dataType: "json",
            success: function(data) {
                data = data.data;

                //set keys as table header
                let keys = Object.keys(data[0]);
                $("#table-print-header").html("");
                for (let i = 0; i < keys.length; i++) {
                    $("#table-print-header").append(`<th class="text-center">${keys[i]}</th>`);
                }

                //fill table
                $("#table-print").html("");
                for (let i = 0; i < data.length; i++) {
                    //skip form_answers, user_id, and donor_id
                    if (keys[i] == "form_answers" || keys[i] == "user_id" || keys[i] == "donor_id") {
                        continue;
                    }

                    let row = `<tr>`;
                    for (let j = 0; j < keys.length; j++) {
                        row += `<td class="text-center">${data[i][keys[j]]}</td>`;
                    }
                    row += `</tr>`;
                    $("#table-print").append(row);
                }

                //show print area
                $("#print-area").show();
                $("#main-area").hide();
            }
        });
    });

    //on btn-blood click
    $("#btn-plasma").click(function() {
        //get date
        let start_date = $("#plasma-start").val();
        let end_date = $("#plasma-end").val();

        var api_key = "1234";
        header = {
            'secret': api_key
        };

        //get data
        $.ajax({
            url: "api/v1/donor/simple/plasma/range",
            method: "GET",
            data: {
                start_date: start_date,
                end_date: end_date
            },
            headers: header,
            dataType: "json",
            success: function(data) {
                data = data.data;

                //set keys as table header
                let keys = Object.keys(data[0]);
                $("#table-print-header").html("");
                for (let i = 0; i < keys.length; i++) {
                    $("#table-print-header").append(`<th class="text-center">${keys[i]}</th>`);
                }

                //fill table
                $("#table-print").html("");
                for (let i = 0; i < data.length; i++) {
                    //skip form_answers, user_id, and donor_id
                    if (keys[i] == "form_answers" || keys[i] == "user_id" || keys[i] == "donor_id") {
                        continue;
                    }
                    
                    let row = `<tr>`;
                    for (let j = 0; j < keys.length; j++) {
                        row += `<td class="text-center">${data[i][keys[j]]}</td>`;
                    }
                    row += `</tr>`;
                    $("#table-print").append(row);
                }

                //show print area
                $("#print-area").show();
                $("#main-area").hide();
            }
        });
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
</script>

</html>