<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

$select = "SELECT * FROM `department`";
$checkSelect = mysqli_query($connect, $select);

if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    $delete = "DELETE FROM `department` WHERE id=$id";
    $deleteCheck = mysqli_query($connect, $delete);
    if ($deleteCheck) {
        path('departments/list-department.php#return');
    } else {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
}
?>

<h2 class="h2-departments">List Departments</h2>

<div class="container my-5 div-table">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action required</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($checkSelect) {
                while ($data = mysqli_fetch_assoc($checkSelect)) {
                    echo '<tr id="return">
                        <th scope="row">' . $data['id'] . '</th>
                        <td>' . $data['name'] . '</td>
                        <td>
                        <button class="btn btn-primary btn-edit"><a href="/odc/S6/departments/update-department.php?updateId=' . $data['id'] . '"
                        class="text-light btn-a">Edit</a></button>
                        <button class="btn btn-danger btn-remove"><a href="/odc/S6/departments/list-department.php?deleteId=' . $data['id'] . '"
                        class="text-light btn-a">Remove</a></button>
                        </td>
                        </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include '../shared/footer.php';
?>