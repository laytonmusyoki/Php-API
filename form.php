<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter name">
        <input type="email" name="email" placeholder="Enter email">
        <input type="text" name="phone" placeholder="Enter phone">
        <input type="date" name="date" placeholder="Enter date">
        <button name="btn">Submit</button>
    </form>



   <?php


include 'connection.php';


if (isset($_POST['btn'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';

    $sql = "INSERT INTO students (name, email, phone, date) VALUES ('$name', '$email', '$phone', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>



</body>
</html>