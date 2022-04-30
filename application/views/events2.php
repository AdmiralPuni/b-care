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
    <div class="container-fluid p-2 px-0 px-md-2">
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
            <div class="col-12 col-md-9 px-1 px-md-0 ps-md-1" id="home-container">
                <div class="row row-cols-1 row-cols-md-1 m-0">
                    <div class="col col-md-6 p-0 ps-md-1 mb-3">
                        <div class="d-block shadow">
                            <div class="d-block  bg-bc-primary text-white fs-4 p-2">
                                Events
                            </div>
                            <div class="d-block p-2">
                                <div class="row m-0 fs-5">
                                    <div class="col-12 col-md-4">
                                        Nama Event
                                    </div>
                                    <div class="col-12 col-md-8 mb-2">
                                        <input class="form-control" type="text" id="input-name">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        Waktu
                                    </div>
                                    <div class="col-12 col-md-8 mb-2">
                                        <input class="form-control" type="datetime-local" id="input-date_time">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        Lokasi
                                    </div>
                                    <div class="col-12 col-md-8 mb-2">
                                        <input class="form-control" type="text" id="input-location">
                                    </div>
                                    <div class="col-12 col-md-4">
                                        Gambar
                                    </div>
                                    <div class="col-12 col-md-8 mb-2">
                                        <input class="form-control" type="file" id="input-image">
                                    </div>
                                    <div class="col-12">
                                        <div class="btn btn-outline-primary fs-5" id="input-submit">
                                            Submit
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 p-0 ps-md-1 mb-3">
                        <div class="d-block shadow p-2">
                            <img src="res/images/preview.jpg" class="img-fluid w-100" alt="" id="input-image-preview">
                        </div>
                    </div>
                    <div class="col p-0 ps-md-1" id="col-table">
                        <div class="d-block  bg-bc-primary text-white fs-4 p-2">
                            Event Manager
                        </div>
                        <div class="container-fluid p-2 bg-white shadow mb-3">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>TTL</th>
                                            <th>Alamat</th>
                                            <th>Domisili</th>
                                            <th>Action</th>
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
                    <div class="col p-0 ps-md-1" id="col-detail">
                        <div class="d-block  bg-bc-primary text-white fs-4 p-2 text-end">
                            <div class="d-flex bd-highlight">
                                <div class="bd-highlight fs-5 p-2 me-auto" id="selected-id">

                                </div>
                                <button class="btn btn-outline-light fs-5" id="hide-detail">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </button>
                            </div>
                        </div>
                        <div class="container-fluid p-2 bg-white shadow mb-3">
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <td id="details-id"></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td id="details-name"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal & Waktu</th>
                                    <td id="details-date_time"></td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td id="details-location"></td>
                                </tr>
                                <tr>
                                    <td colspan=2>
                                        <img src="" class="img-fluid w-100 " id="details-image" alt="">
                                    </td>
                                </tr>
                            </table>
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
    $("#col-detail").hide();
    var current_data;
    var current_table;
    var items_per_page = 10;

    //on page ready load donor
    $(document).ready(function () {
        load_data();
    });

    function load_data() {
        //add api key to header

        var api_key = "1234";
        header = {
            'secret': api_key
        };
        $.ajax({
            url: "api/v1/event/all",
            type: "GET",
            headers: header,
            dataType: "json",
            success: function (data) {
                current_data = data['data'];
                //print the keys to console
                for (var key in current_data[0]) {
                    console.log(key);
                }

                $("#table-paging").html("");
                //generate pages
                for (var i = 0; i < Math.ceil(current_data.length / items_per_page); i++) {
                    $("#table-paging").append('<li class="page-item"><a class="page-link" href="#' + i + '" onClick="change_page(' + i + ')">' + (i + 1) + '</a></li>');
                }
                //fill table
                fill_table(current_data, 0);



            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function fill_table(data, page) {
        $("#table-body").html("");
        for (var i = page * items_per_page; i < (page * items_per_page) + items_per_page; i++) {
            temp = data[i];
            if(temp['active'] == '1'){
                temp['active'] = 'AKTIF';
            }
            else{
                temp['active'] = 'TIDAK AKTIF';
            }

            $("#table-body").append(`
                <tr>
                    <td>${temp['id']}</td>
                    <td>${temp['name']}</td>
                    <td>${temp['date_time']}</td>
                    <td>${temp['location']}</td>
                    <td>${temp['active']}</td>
                    <td>
                        <button class="btn btn-outline-dark rounded-0 w-100 text-start" id="details-button" onClick="show_details(${i})">
                            <i class="bi bi-eye"></i> Lihat
                        </button>
                    </td>
                </tr>
            `);
        }
    }

    function change_page(index) {
        fill_table(current_data, index);
    }

    function show_details(id) {
        $("#col-table").slideUp(250, function () {
            //fill details

            id = id;
            temp = current_data[id];
            $("#selected-id").html(temp['id'] + " - " + temp['name']);
            $("#details-id").html(temp['id']);
            $("#details-name").html(temp['name']);
            $("#details-date_time").html(temp['date_time']);
            $("#details-location").html(temp['location']);
            $("#details-image").attr("src", "uploads/events/" + temp['image']);
            $("#col-detail").slideDown(250);
        });
    }

    //on click hide details
    $("#hide-detail").click(function () {
        $("#col-detail").slideUp(250, function () {
            $("#col-table").slideDown(250);
        });
    });

    //on image change display preview
    $("#input-image").change(function () {
        $("#input-image-preview").attr("src", URL.createObjectURL(this.files[0]));
    });

    //submit event
    $("#input-submit").click(function () {
        formdata = new FormData();
        formdata.append("name", $("#input-name").val());
        formdata.append("date_time", $("#input-date_time").val());
        formdata.append("location", $("#input-location").val());
        formdata.append("image", $("#input-image")[0].files[0]);

        $.ajax({
            url: "api/v1/event/new",
            method: "POST",
            headers: {
                "secret": "1234"
            },
            data: formdata,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                if (data.status == "success") {
                    alert("Event berhasil dibuat");
                    location.reload();
                } else {
                    alert("Event gagal dibuat");
                }
            }
        });
    });
</script>

</html>