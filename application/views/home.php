<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>nic_employee_demo|home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        body{
            background-image: linear-gradient(rgb(255, 246, 246), rgb(199, 225, 255));
            height: 100vh;
        }
        img{
            height: 50px;
            margin: 0 10px;
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">NIC-employee</a> -->
            <img src="https://uxdt.nic.in/wp-content/uploads/2020/06/nic-logo-nic-logo-1-bilingual-sans-01.jpg?x88702" alt="NIC-employee">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                    <a class="nav-link active" aria-current="page"
                        href="<?php echo base_url().'index.php/Auth/logout' ?>">Logout</a>
                </div>

            </div>
            <h2 class="text-right text-white mx-5">Welcome
                <!-- <?php echo $user['name'] ?> -->
            </h2>
        </div>
    </nav>

    <div class="container-fluid">
        <?php
            $msg = $this->session->flashdata('msg');
            if($msg != ""){
                echo "<div class='alert alert-success'>$msg</div>";
            }
            $this->session->set_flashdata('msg', '');
        ?>
    </div>
    
    <div class="mx-3">
        <h2 class="my-3">Employee List</h2>
        <hr>

        <table class="table table-warning table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Job</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Joining</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($emps)) {foreach($emps as $item) {?>
                <tr>
                    <th scope="row"><?php echo $item['emp_id']?></th>
                    <td><?php echo $item['name']?></td>
                    <td><?php echo $item['email']?></td>
                    <td><?php echo $item['phone']?></td>
                    <td><?php echo $item['address']?></td>
                    <td><?php echo $item['job_dept']?></td>
                    <td><?php echo $item['salary']?></td>
                    <td><?php echo $item['joined_at']?></td>
                    <td><a type="button" class="btn btn-sm btn-success" href="<?php echo base_url().'index.php/Welcome/edit/'.$item['emp_id'] ?>">Edit</a></td>
                    <td><a type="button" class="btn btn-sm btn-danger" href="<?php echo base_url().'index.php/Welcome/delete/'.$item['emp_id'] ?>">Delete</a></td>
                </tr>
                <?php }} else {?>
                    <tr>
                        <td>No records found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="float-end mx-3">
    <a type="button" class="btn btn-primary" aria-current="page"
        href="<?php echo base_url().'index.php/Welcome/create' ?>">Add Employee</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>