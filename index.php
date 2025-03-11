<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $message = $_POST['message'];
    mysqli_query($conn, "INSERT INTO messages (name, message) VALUES ('$name', '$message')");
}

$result = mysqli_query($conn, "SELECT * FROM messages");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Form</title>
</head>
<body>

<h2>Leave a Message</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="text" name="message" placeholder="Message" required><br>
    <button type="submit">Submit</button>
</form>

<h3>Messages:</h3>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <p><strong><?php echo $row['name']; ?>:</strong> <?php echo $row['message']; ?></p>
<?php } ?>

</body>
</html>
