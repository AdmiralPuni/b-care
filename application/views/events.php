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
            <div class="col-12 col-md-9  px-1 px-md-0 ps-md-1" id="home-container">
                <div class="row row-cols-1 row-cols-md-1 m-0">
                    <div class="col ps-md-0 mb-3">
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
                                    <div class="col-12 mb-2">
                                        <div class="btn btn-outline-primary fs-5" id="input-submit">
                                            Submit
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <img class="img-fluid w-100" src="" alt="" id="input-image-preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 p-0">
                        <div class="row row-cols-1 row-cols-md-2 m-0" id="active-events">

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

    //fill active events
    $.ajax({
        url: "api/v1/event/active",
        method: "GET",
        headers: {
            "secret": "1234"
        },
        dataType: "json",
        success: function (data) {
            data = data.data;
            console.log(data);

            //clear active events
            for (let i = 0; i < data.length; i++) {
                if(i%2==0){
                    padding = "pe-md-2";
                }
                else{
                    padding = "ps-md-2";
                }
                $("#active-events").append(`
                    <div class="col px-0 ${padding}">
                        <div class="d-block shadow mb-2">
                        <div class="d-block  bg-bc-primary text-white fs-4 p-2">
                            ${data[i].name}
                        </div>
                        <div class="container-fluid px-2 py-2">
                            <img src="uploads/events/${data[i].image}" class="img-fluid w-100" alt="">
                            <div class="d-block p-2 border-bottom border-bc-primary border-3 fs-5">
                                Tanggal & Waktu
                            </div>
                            <div class="d-block p-2 fs-4 py-1">
                                ${data[i].date_time}
                            </div>
                            <div class="d-block p-2 border-bottom border-bc-primary border-3 fs-5">
                                Lokasi
                            </div>
                            <div class="d-block p-2 fs-4 py-1 mb-2">
                                ${data[i].location}
                            </div>
                        </div>
                    </div>
                    </div>
                `);
            }
        }
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