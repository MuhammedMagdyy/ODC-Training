<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';


$id = $_GET['updateId'];
$select = "SELECT * FROM `department` WHERE id=$id";
$selectCheck = mysqli_query($connect, $select);
$data = mysqli_fetch_assoc($selectCheck);
$depName = $data['name'];

if (isset($_POST['updateDep'])) {
    $name = $_POST['depName'];
    $update = "UPDATE `department` SET id=$id, name='$name' WHERE id=$id";
    $checkUpdate = mysqli_query($connect, $update);
    if ($checkUpdate) {
        path('departments/list-department.php');
    } else {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
}
?>

<h2 class="h2-departments">Update Department</h2>

<div class="container my-5">
    <form method="POST">
        <fieldset class="border p-4">
            <div class="form-group">
                <label for="depName">Department Name</label>
                <input type="text" class="form-control" value="<?= $depName ?>" autocomplete="off" id="depName" name="depName" required autofocus />
            </div>
            <button type="submit" name="updateDep" class="btn btn-primary mt-1">Update</button>
        </fieldset>
    </form>
</div>

<?php
include '../shared/footer.php';
?>