<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Employee</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Add Employee</h2>
    <form method="POST">
      <label>Name:</label>
      <input type="text" name="name" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Position:</label>
      <input type="text" name="position" required>

      <input type="submit" name="save" value="Save Employee">
    </form>

    <a class="back" href="view.php">⬅ Back to Employee List</a>

    <?php
    if (isset($_POST['save'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $position = $_POST['position'];

      $sql = "INSERT INTO employees (name, email, position) VALUES ('$name', '$email', '$position')";
      if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;text-align:center;'>Employee added successfully!</p>";
      } else {
        echo "<p style='color:red;text-align:center;'>Error: " . mysqli_error($conn) . "</p>";
      }
    }
    ?>
  </div>
</body>
</html>
