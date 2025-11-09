<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Employee</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Edit Employee</h2>

    <?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    ?>

    <form method="POST">
      <label>Name:</label>
      <input type="text" name="name" value="<?php echo $row['name']; ?>">

      <label>Email:</label>
      <input type="email" name="email" value="<?php echo $row['email']; ?>">

      <label>Position:</label>
      <input type="text" name="position" value="<?php echo $row['position']; ?>">

      <input type="submit" name="update" value="Update Employee">
    </form>

    <a class="back" href="view.php">⬅ Back to Employee List</a>

    <?php
    if (isset($_POST['update'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $position = $_POST['position'];

      mysqli_query($conn, "UPDATE employees SET name='$name', email='$email', position='$position' WHERE id=$id");
      echo "<p style='color:green;text-align:center;'>Employee updated successfully!</p>";
    }
    ?>
  </div>
</body>
</html>
