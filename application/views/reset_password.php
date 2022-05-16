<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/b-care/res/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/b-care/res/css/custom.css">
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
    <div class="container px-0" style="min-height: 100vh;">
        <div class="container-fluid bg-white p-0 p-md-2 py-0 sticky-top">
            <div class="container p-0">
                <div class="row row-cols-1 m-0">
                    <div class="col-12 col-md-12 fs-3 mb-0 mb-md-0 bg-white p-2">
                        <div class="d-block fs-2 fw-normal bg-white border-bottom border-5 border-bc-primary text-dark p-3 py-2 shadow">
                            <div class="d-flex justify-content-between">
                                <span class="d-flex justify-content-center">
                                    <img class="me-2" height="48" src="/b-care/res/images/icon.png" alt="">B-Care
                                </span>
                                <a class="d-none d-md-inline" href="/?reload=true">
                                    <button class="btn btn-outline-dark fs-5 rounded-0 me-2"><i class="bi bi-house"></i> Home</button>
                                </a>
                                <button class="btn btn-outline-dark p-1 collapsed d-md-none" data-bs-toggle="collapse" data-bs-target="#menu-bar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 mb-2 collapse d-md-none" id="menu-bar">
                        <div class="row row-cols-1 row-cols-md-1 m-0">
                            <div class="col px-0 mb-2 shadow">
                                <a href="/?reload=true">
                                    <button class="btn btn-light shadow rounded-0 w-100 fs-4 text-start">
                                        <i class="bi bi-house"></i> Home
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center  mb-3 w-100 h-100 px-2 px-md-0" style="min-height: 85vh;">
            <div class="col-12 col-md-3 align-self-center card text-dark mb-3 rounded-0 shadow h-100 border-0" style="min-width:30vw;">
                <div class="card-body bg-white px-4">
                    <form action="#" method="POST">

                        <div class="mb-4 fs-3">
                            <input type="password" class="form-control fs-4 bg-light border-0 border-bottom border-2 rounded-0 border-dark" id="password" placeholder="Password">
                        </div>
                        <div class="mb-4 fs-3">
                            <input type="password" class="form-control fs-4 bg-light border-0 border-bottom border-2 rounded-0 border-dark" id="password-re" placeholder="Ulangi Password">
                        </div>
                        <button class="btn btn-outline-dark rounded-0 w-100 fs-3 align-self-end mb-4" id="button-login">Ganti Password</button>
                        <div class="d-flex justify-content-center d-none py-2" id="loading">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="alert alert-danger d-flex align-items-center fs-5 d-none rounded-0" role="alert" id="error-div">
                            <div>
                                <i class="bi bi-exclamation-triangle"></i> <span id="error-message">Username / Password kosong</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var code = "";
    //override form default action
    $('form').submit(function (e) {
        e.preventDefault();
    });

    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }


    $(document).ready(function () {
        //get code from url
        code = getUrlParameter("code");
        //check if code is empty
        console.log(code);
        $("#button-login").click(function () {
            $("#loading").removeClass("d-none");
            $("#error-div").addClass("d-none");
            password = $("#password").val();
            password_re = $("#password-re").val();

            if(password != password_re){
                $("#loading").addClass("d-none");
                $("#error-div").removeClass("d-none");
                $("#error-message").text("Password tidak sama");
            }else{
                $.ajax({
                    url: "https://b-caremadiun.org/verification/reset/change",
                    type: "POST",
                    data: {
                        code: code,
                        password: password
                    },
                    success: function (data) {
                        $("#loading").addClass("d-none");
                        $("#error-div").removeClass("d-none");
                        $("#error-message").text(data);
                    }
                });
            }
        });
    });
</script>

</html>