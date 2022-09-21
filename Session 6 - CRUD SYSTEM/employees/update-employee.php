<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';


$id = $_GET['updateId'];
$select = "SELECT * FROM `employee` WHERE id=$id";
$check = mysqli_query($connect, $select);
$row = mysqli_fetch_assoc($check);
$name = $row['name'];
$email = $row['email'];
$salary = $row['salary'];
$depName = $row['departmentId'];

$test = "SELECT * FROM `department` WHERE id=$depName";
$test2 = mysqli_query($connect, $test);
$test3 = mysqli_fetch_assoc($test2);
$id_dep = $test3['id'];
$namedp = $test3['name'];


if (isset($_POST['update'])) {

    $empName = $_POST['empName'];
    $empEmail = $_POST['empEmail'];
    $empPassword = $_POST['empPassword'];
    $empSalary = $_POST['empSalary'];
    $depId = $_POST['depId'];

    $update = "UPDATE `employee` SET id=$id, name='$empName', email='$empEmail', password='$empPassword, salary=$empSalary, departmentId=$depId WHERE id=$id";
    $checkUpdate = mysqli_query($connect, $update);
    if ($checkUpdate) {
        path('employees/list-employee.php');
    } else {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
}
?>

<h2 class="h2-employee">Update Employees</h2>
<div class="container my-5">
    <form method="POST">
        <fieldset class="border p-4">
            <div class="form-group">
                <label for="empName">Name</label>
                <input type="text" class="form-control" value=<?php echo $name; ?> autocomplete="off" id="empName" name="empName" required autofocus />
            </div>
            <div class="form-group">
                <label for="empEmail">Email</label>
                <input type="email" class="form-control" value=<?php echo $email; ?> autocomplete="off" id="empEmail" name="empEmail" required />
            </div>
            <div class="form-group">
                <label for="empPassword">Password</label>
                <input type="password" class="form-control" value=<?php echo $password; ?> autocomplete="off" id="empPassword" name="empPassword" required />
            </div>
            <div class="form-group">
                <label for="empSalary">Salary</label>
                <input type="text" class="form-control" value=<?php echo $salary; ?> autocomplete="off" id="empSalary" name="empSalary" required />
            </div>
            <div class="form-group">
                <label for="depId">Department</label>
                <select class="custom-select" type="text" id="depId" name="depId" autocomplete="off">
                    <?php
                    $depSelect = "SELECT * FROM `department`";
                    $departments = mysqli_query($connect, $depSelect);
                    ?>
                    <option value="<?php $id_dep ?>" selected disabled><?php echo $namedp  ?></option>
                    <?php
                    foreach ($departments as $data) {
                    ?>
                        <option value="<?php $data['id']; ?>"> <?= $data['name'] ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-primary mt-1">Update</button>
        </fieldset>
    </form>
</div>

<?php
include '../shared/footer.php';
?>