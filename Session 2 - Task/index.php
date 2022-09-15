<?php
function myGPA($gpa)
{
    if ($gpa > 4 or $gpa < 0) {
        return "Error";
    }
    if ($gpa >= 3.50) {
        return "Excellent";
    } else if ($gpa >= 2.75 and $gpa < 3.50) {
        return "Very Good";
    } else if ($gpa >= 2.30 and $gpa < 2.75) {
        return "Good";
    } else if ($gpa >= 2.00 and $gpa < 2.30) {
        return "Pass";
    } else {
        return "Academic Warning";
    }
}

$Admins = array(
    array(
        "Id" => "1",
        "Username" => "Admin1",
    ),
    array(
        "Id" => "2",
        "Username" => "Admin2",
    ),
    array(
        "Id" => "3",
        "Username" => "Admin3",
    )
);

$Teachers = array(
    array(
        "Name" => "Ayman",
        "Subject" => "English",
        "Degree" => "Dr",
    ),
    array(
        "Name" => "Samy",
        "Subject" => "Math",
        "Degree" => "Dr",
    ),
    array(
        "Name" => "Maged",
        "Subject" => "Physics",
        "Degree" => "Dr",
    ),
    array(
        "Name" => "Nasser",
        "Subject" => "Human Rights",
        "Degree" => "Dr",
    )
);

$Students = array(
    array(
        "Id" => "12345",
        "Name" => "Mohamed",
        "Department" => "CS",
        "GPA" => "3.5",
        "Level" => "4",
    ),
    array(
        "Id" => "23456",
        "Name" => "Ahmed",
        "Department" => "IS",
        "GPA" => "2.8",
        "Level" => "3",
    ),
    array(
        "Id" => "34567",
        "Name" => "Mahmoud",
        "Department" => "IT",
        "GPA" => "2.5",
        "Level" => "2",
    ),
    array(
        "Id" => "456789",
        "Name" => "Omar",
        "Department" => "SE",
        "GPA" => "2.1",
        "Level" => "1",
    ),
    array(
        "Id" => "567891",
        "Name" => "Omar",
        "Department" => "AI",
        "GPA" => "1.5",
        "Level" => "2",
    )
);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Show data</title>
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">University</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#admin">Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#teacher">Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#student">Students</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <br>
    <p class="p-admin"> Admin's table </p>
    <br>
    <!--Table for Admins-->
    <div class="div-admin" id="admin">
        <table class="table table-striped div-admin">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($Admins as $key => $value) {
                    echo "<tr> 
                    <td>" . $value['Id'] . "</td> <td>" . $value['Username'] . "</td>" .
                        "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <p class="p-teacher"> Teacher's table </p>
    <br>
    <!--Table for Teacher-->
    <div>
        <div class="div-teacher" id="teacher">
            <table class="table table-striped div-teacher">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Degree</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Teachers as $key => $value) {
                        echo "<tr>
                    <td>" . $value['Name'] . "</td> <td>" . $value['Subject'] . "</td> <td>" . $value['Degree'] . "</td>"
                            . "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <p class="p-student"> Students's table </p>
        <br>
        <!--Table for Students-->
        <div class="div-student" id="student">
            <table class="table table-striped div-student">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">GPA</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($Students as $key => $value) {
                        echo "<tr>
                    <td>" . $value['Id'] . "</td> <td>" . $value['Name'] . "</td> <td>" . $value['Department'] . "</td><td>" . $value['GPA'] . "</td><td>"
                            .  myGPA($value['GPA']) . "</td> <td>" . $value['Level'] . "</td>"
                            . "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        <!--Footer-->
        <div class="footer">
            <footer class="bg-light text-center text-lg-start footer">
                <!-- Grid container -->
                <div class="container p-4 footer">
                    <!--Grid row-->
                    <div class="row footer">
                        <!--Grid column-->
                        <div class="col-lg-6 col-md-12 mb-4 mb-md-0 footer">
                            <h5 class="text-uppercase footer">University</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                                aliquam voluptatem veniam, est atque cumque eum delectus sint!
                            </p>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Grid container -->
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="text-dark" href="#">Mohamed Magdy</a>
                </div>
                <!-- Copyright -->
            </footer>
        </div>
        <!--Scripts-->
        <script src="./js/jquery.slim.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
</body>

</html>