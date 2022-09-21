<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

if (isset($_POST['add'])) {
    $name = $_POST['empName'];
    $email = $_POST['empEmail'];
    $password = $_POST['empPassword'];
    $salary = $_POST['empSalary'];
    $depId = $_POST['depId'];

    $insert = "INSERT INTO `employee` values(null, '$name', '$email', '$password', $salary, $depId)";
    $checkInsert = mysqli_query($connect, $insert);
    if ($checkInsert) {
        path('employees/create-employee.php');
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Something wrong right now!
                </div>';
    }
}

?>

<h2 class="h2-employee">Employees</h2>
<div class="container my-5">
    <form method="POST">
        <fieldset class="border p-4">
            <div class="form-group">
                <label for="empName">Name</label>
                <input type="text" class="form-control" placeholder="" autocomplete="off" id="empName" name="empName" required autofocus />
            </div>
            <div class="form-group">
                <label for="empEmail">Email</label>
                <input type="email" class="form-control" autocomplete="off" id="empEmail" name="empEmail" required />
            </div>
            <div class="form-group">
                <label for="empPassword">Password</label>
                <input type="password" class="form-control" autocomplete="off" id="empPassword" name="empPassword" required />
            </div>
            <div class="form-group">
                <label for="empSalary">Salary</label>
                <input type="text" class="form-control" autocomplete="off" id="empSalary" name="empSalary" required />
            </div>
            <div class="form-group">
                <label for="depId">Department</label>
                <select class="custom-select" type="text" id="depId" name="depId" autocomplete="off">
                    <option value="" selected>Select Department</option>
                    <?php
                    $depSelect = "SELECT * FROM `department`";
                    $departments = mysqli_query($connect, $depSelect);
                    ?>
                    <?php
                    foreach ($departments as $data) { ?>
                        <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="add" class="btn btn-primary mt-1">Add</button>
        </fieldset>
    </form>
</div>

<?php
include '../shared/footer.php';
?>