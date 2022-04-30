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
            <div class="col-12 col-md-9  px-1 px-md-0 ps-md-2" id="home-container">
                
                <div class="d-block bg-bc-primary text-white fs-4 p-2 mb-2" id="page-title">
                    Stock Darah
                </div>
                <div class="container-fluid px-2 shadow">
                    <div class="row row-cols-1 row-cols-md-2 m-0">
                        <div class="col ps-md-0 mb-3">
                            <select class="form-select fs-2 mb-2" id="blood-types">

                            </select>
                            <div class="d-flex font-monospace display-1 mb-5">
                                <div class="btn btn-danger fs-1 pt-3 rounded-0 rounded-start" id="selected-red">
                                    -
                                </div>
                                <div class="flex-fill text-center bg-light" id="selected-amount">
                                    10
                                </div>
                                <div class="btn btn-success fs-1 pt-3 rounded-0 rounded-end" id="selected-add">
                                    +
                                </div>
                            </div>

                            <button class="btn btn-success fs-4 w-100" id="update-stock">
                                Update stock
                            </button>
                        </div>
                        <div class="col pe-md-0">
                            <div class="row row-cols-2 m-0 font-monospace" id="stock-table">

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
    var blood_types = [];

    function getDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        //set month to month name
        var mm = new Date(today).toLocaleString('id-id', {
            month: 'long'
        });
        var yyyy = today.getFullYear();
        var dow = new Date(today).toLocaleString('id-id', {
            weekday: 'long'
        });

        today = dow + ', ' + dd + ' ' + mm + ' ' + yyyy;
        return today;
    }

    //on load add current date to title
    $(document).ready(function () {
        $("#page-title").html("Stock Darah - " + getDate());

        //load data
        load_data();

        //on select change selected value
        $("#blood-types").change(function () {
            var selected = $(this).children("option:selected").val();
            $("#selected-amount").html(blood_types[selected-1]["amount"]);
        });

        //on plus or red change value of selected amount by 1
        $("#selected-add").click(function () {
            var selected = $("#blood-types").children("option:selected").val();
            var amount = parseInt($("#selected-amount").html());
            amount++;
            $("#selected-amount").html(amount);
        });

        $("#selected-red").click(function () {
            var selected = $("#blood-types").children("option:selected").val();
            var amount = parseInt($("#selected-amount").html());
            if (amount > 0) {
                amount--;
                $("#selected-amount").html(amount);
            }
        });

        //on update stock button click
        $("#update-stock").click(function () {
            var selected = $("#blood-types").children("option:selected").val();
            if (selected - 1 == -2) {
                alert("Pilih jenis darah yang akan diupdate");
            }
            else {
                selected = blood_types[selected - 1]['blood_type'];
                var amount = $("#selected-amount").html();
                var data = {
                    "blood_type": selected,
                    "amount": amount
                };
                $.ajax({
                    url: "api/v1/stock/blood/update",
                    type: "POST",
                    data: data,
                    headers: {
                        'secret': "1234"
                    },
                    success: function (response) {
                        alert(response);
                        load_data();
                    }
                });
            }

        });
    });

    function load_data() {
        var api_key = "1234";
        header = {
            'secret': api_key
        };
        $.ajax({
            url: "api/v1/stock/blood",
            type: "GET",
            headers: header,
            dataType: "json",
            success: function (data) {
                console.log(data);
                data = data['data'];
                //clear the table
                $("#stock-table").html("");
                //clear blood types
                blood_types = [];
                //clear select
                $("#blood-types").html("");
                //add - to select
                $("#blood-types").append("<option value='-1'>-</option>");
                //clear selected value
                $("#selected-amount").html("-");
                for (var i = 0; i < data.length; i++) {
                    blood_types.push({
                        'id': data[i]['id'],
                        'blood_type': data[i]['blood_type'],
                        'amount': data[i]['amount']
                    });
                    //add to select
                    $("#blood-types").append(
                        '<option value="' + data[i].id + '">' + data[i].blood_type + '</option>'
                    );
                    var blood_type = data[i].blood_type;
                    var stock = data[i].amount;
                    var id = data[i].id;
                    var row = '<div class="col fw-bold mb-2">' +
                        '<div class="d-block border border-3 border-bc-primary fs-4">' +
                        '<div class="row row-cols-2 m-0 g-0 text-center">' +
                        '<div class="col bg-bc-primary text-white fs-2 p-2">' +
                        blood_type +
                        '</div>' +
                        '<div class="col fs-2 p-2">' +
                        stock +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $("#stock-table").append(row);
                }

            },
            error: function (data) {
                console.log(data);
            }
        }
        );
    }
</script>

</html>