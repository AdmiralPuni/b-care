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
            <div class="col-12 col-md-12 px-1 px-md-0" id="home-container">
                <div class="row row-cols-1 row-cols-md-2 m-0" id="datarow">
                    <div class="col ps-md-0">
                        <div class="d-block shadow">
                            <div class="d-block bg-bc-primary text-white fs-4 p-2">
                                API NAME
                            </div>
                            <div class="container-fluid p-2 bg-white mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon3">URL</span>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <table class="table table-striped table-hover mb-2">
                                    <tr>
                                        <th>Data</th>
                                        <td>name password email etc</td>
                                    </tr>
                                    <tr>
                                        <th>Method</th>
                                        <td>POST</td>
                                    </tr>
                                    <tr>
                                        <th>Desc</th>
                                        <td>desc</td>
                                    </tr>
                                </table>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
    apidata = [
        {
            name: "DONOR - NEW",
            url: "api/v1/donor/new",
            data: "user_id type(PLASMA/BLOOD) form_answers req(JSON)",
            method: "POST",
            form: {

            },
            desc: "Add new donor",
            type: "input"
        },
        {
            name: "DONOR - GET BLOOD DONORS",
            url: "api/v1/donor/blood",
            data: "",
            method: "GET",
            form: {

            },
            desc: "Get blood donors",
            type: "output"
        },
        {
            name: "DONOR - GET PLASMA DONORS",
            url: "api/v1/donor/plasma",
            data: "",
            method: "GET",
            form: {

            },
            desc: "Get plasma donors",
            type: "output"
        },
        {
            name: "USER - NEW",
            url: "api/v1/user/new",
            data: "name email password level(10)",
            method: "POST",
            form: {

            },
            desc: "register new user",
            type: "input"
        },
        {
            name: "USER - VERIFY",
            url: "api/v1/user/verify",
            data: "email password",
            method: "POST",
            form: {
                email: "test@mailto.com",
                password: "1234"
            },
            desc: "Verify user",
            type: "input"
        },
        {
            name: "USER - INFO",
            url: "api/v1/user/info",
            data: "user_id",
            method: "POST",
            form: {
                user_id: "1"
            },
            desc: "Get user info",
            type: "input"
        },
        {
            name: "USER - DONOR",
            url: "api/v1/profile",
            data: "user_id",
            method: "POST",
            form: {
                user_id: "1"
            },
            desc: "Get user donor",
            type: "input"
        },
        {
            name: "PROFILE - NEW",
            url: "api/v1/profile/new",
            data: "user_id blood_type(UPPRCASE) nik tempat_lahir jenis_kelamin(L/P) pekerjaan alamat domisili no_hp",
            method: "POST",
            form: {

            },
            desc: "Fill user information as donor",
            type: "input"
        },
        {
            name: "PROFILE - UPDATE",
            url: "api/v1/profile/update",
            data: "user_id blood_type(UPPRCASE) nik tempat_lahir jenis_kelamin(L/P) pekerjaan alamat domisili no_hp name",
            method: "POST",
            form: {

            },
            desc: "Update user information as donor",
            type: "input"
        },
        {
            name: "STOCK - BLOOD",
            url: "api/v1/stock/blood",
            data: "",
            method: "POST",
            form: {

            },
            desc: "Get blood stock",
            type: "input"
        },
        {
            name: "EVENT - NEW",
            url: "api/v1/event/new",
            data: "name date_time location image",
            method: "POST",
            form: {

            },
            desc: "Create new event",
            type: "input"
        },
        {
            name: "EVENT - ACTIVE",
            url: "api/v1/event/active",
            data: "",
            method: "POST",
            form: {

            },
            desc: "Get list of active event, add uploads/events/ to image filename",
            type: "input"
        },
        {
            name: "EMAIL_VERIFICATION - RESEND",
            url: "verification/resend",
            data: "user_id",
            method: "POST",
            form: {

            },
            desc: "Resend Verification Email, Interval per menit",
            type: "input"
        },
        {
            name: "EMAIL_VERIFICATION - STATUS",
            url: "verification/status",
            data: "user_id",
            method: "POST",
            form: {
                user_id:"10"
            },
            desc: "Check Verification Status",
            type: "input"
        }
    ]

    //clear the row
    $("#datarow").empty();

    delay = 250;
    apidata.forEach(element => {
        reply = "";
        console.log( element.url);
        //send ajax request to get data
        setTimeout(() => {
            $.ajax({
            url: element.url,
            type: element.method,
            data: element.form,
            headers: {
                'secret': '1234'
            },
            success: function (data) {
                reply = data;
                $("#datarow").append(`
                    <div class="col ps-md-0">
                        <div class="d-block shadow">
                            <div class="d-block bg-bc-primary text-white fs-4 p-2">
                                ${element.name}
                            </div>
                            <div class="container-fluid p-2 bg-white mb-3">
                                <div class="input-group mb-2">
                                    <span class="input-group-text" id="basic-addon3">URL</span>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="${element.url}">
                                </div>
                                <table class="table table-striped table-hover mb-2">
                                    <tr>
                                        <th>Data</th>
                                        <td>${element.data}</td>
                                    </tr>
                                    <tr>
                                        <th>Method</th>
                                        <td>${element.method}</td>
                                    </tr>
                                    <tr>
                                        <th>Desc</th>
                                        <td>${element.desc}</td>
                                    </tr>
                                    <tr>
                                        <th>Form Data</th>
                                        <td>${JSON.stringify(element.form)}</td>
                                    </tr>
                                </table>
                                <textarea class="form-control bg-dark text-white font-monospace" id="exampleFormControlTextarea1" rows="10">${reply}</textarea>
                            </div>
                        </div>
                    </div>
                `)
            }
        });
        }, delay*apidata.indexOf(element));
        //wait ajax to finish before next iteration

    });
</script>

</html>