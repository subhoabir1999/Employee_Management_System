<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>nic_employee_demo|login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        body{
            background-image: linear-gradient(whitesmoke, gray);
            height: 100vh;
        }
        img{
            height: 50px;
            margin: 0 10px;
            border-radius: 1rem;
        }
        .info{
            width: 70%;
            margin: 0 auto;
        }
    </style>

    <script>
        function showPassword() {
            let x = document.getElementById('password');
            if ((x.type || y.type) === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">NIC-employee</a> -->
            <img src="https://uxdt.nic.in/wp-content/uploads/2020/06/nic-logo-nic-logo-1-bilingual-sans-01.jpg?x88702" alt="NIC-employee">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="<?php echo base_url().'index.php/Welcome' ?>">Home</a>
                    <a class="nav-link active" href="<?php echo base_url().'index.php/Auth/register' ?>">Register</a>
                    <!-- <a class="nav-link" href="#">Login</a> -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php
            $msg = $this->session->flashdata('msg');
            if($msg != ""){
                echo "<div class='alert alert-danger'>$msg</div>";
            }
            $this->session->set_flashdata('msg', '');
        ?>
    </div>

    <div class="container my-3">
        <h2 class="text-center">Login Youself</h2>
        <form action="<?php echo base_url().'index.php/Auth/login' ?>" method="post">
            <div class="mb-3 info">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <?php echo form_error('email'); ?>
            </div>
            <div class="mb-3 info">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <?php echo form_error('password'); ?>
            </div>
            <div class="form-check my-3 info">
                <input class="form-check-input" type="checkbox" value="" id="show" onclick="showPassword()">
                <label class="form-check-label" for="flexCheckDefault">Show Password</label>
            </div>
            
            <div class="info">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>