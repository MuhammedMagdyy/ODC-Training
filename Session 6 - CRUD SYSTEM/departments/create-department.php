<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

if (isset($_POST['addDep'])) {
    $name = $_POST['depName'];
    $insert = "INSERT INTO `department` values(null, '$name')";
    $check = mysqli_query($connect, $insert);
    if ($check) {
        path('departments/create-department.php');
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Something wrong right now!
                </div>';
    }
}
?>

<h2 class="h2-departments">Departments</h2>
<div class="container my-5">
    <form method="POST">
        <fieldset class="border p-4">
            <div class="form-group">
                <label for="depName">Department Name</label>
                <input type="text" class="form-control" autocomplete="off" id="depName" name="depName" required autofocus />
            </div>
            <button type="submit" name="addDep" class="btn btn-primary mt-1">Add</button>
        </fieldset>
    </form>
</div>

<?php
include '../shared/footer.php';
?>