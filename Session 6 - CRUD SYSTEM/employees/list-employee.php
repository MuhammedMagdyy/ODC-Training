<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/nav.php';

$selectJoin = "SELECT * FROM `display`";
$jointCheck = mysqli_query($connect, $selectJoin);

if (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId'];
    $delete = "DELETE FROM `employee` WHERE id=$id";
    $deleteCheck = mysqli_query($connect, $delete);
    if ($deleteCheck) {
        path('employees/list-employee.php#return');
    } else {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
}
?>

<h2 class="h2-employee">List Employees</h2>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Salary</th>
                <th scope="col">Department</th>
                <th scope="col">Action required</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($jointCheck) {
                while ($data = mysqli_fetch_assoc($jointCheck)) {
                    echo '<tr id="return">
                    <th scope="row">' . $data['empId'] . '</th>
                    <td>' . $data['empName'] . '</td>
                    <td>' . $data['email'] . '</td>
                    <td>' . $data['salary'] . '$' . '</td>
                    <td>' . $data['depName'] . '</td>
                    <td>
                    <button class="btn btn-primary btn-edit"><a href="/odc/S6/employees/update-employee.php?updateId=' . $data['empId'] . '"
                    class="text-light btn-a">Edit</a></button>
                    <button class="btn btn-danger btn-remove"><a href="/odc/S6/employees/list-employee.php?deleteId=' . $data['empId'] . '"
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