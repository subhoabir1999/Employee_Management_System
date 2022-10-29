<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center my-3">Edit Your Information</h2>
        <form action="<?php echo base_url().'index.php/Welcome/edit/'.$emp['emp_id'] ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name', $emp['name']) ?>" aria-describedby="emailHelp">
                <?php echo form_error('name'); ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email', $emp['email']) ?>" aria-describedby="emailHelp">
                <?php echo form_error('email'); ?>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone', $emp['phone']) ?>" aria-describedby="emailHelp">
                <?php echo form_error('phone'); ?>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"><?php echo set_value('address', $emp['address']) ?></textarea>
                <?php echo form_error('address'); ?>
            </div>
            <div class="mb-3">
                <label for="job" class="form-label">Job</label>
                <input type="text" class="form-control" name="job" id="job" value="<?php echo set_value('job', $emp['job_dept']) ?>" aria-describedby="emailHelp">
                <?php echo form_error('job'); ?>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="text" class="form-control" name="salary" id="salary" value="<?php echo set_value('salary', $emp['salary']) ?>" aria-describedby="emailHelp">
                <?php echo form_error('salary'); ?>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a type="button" class="btn btn-secondary" href="<?php echo base_url().'index.php/Welcome' ?>">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>