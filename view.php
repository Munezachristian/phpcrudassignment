<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee List</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Employee Management System</h2>
    <a href="add.php">➕ Add New Employee</a>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Position</th>
        <th>Action</th>
      </tr>

      <?php
      $result = mysqli_query($conn, "SELECT * FROM employees");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['position']}</td>
                <td>
                  <a href='edit.php?id={$row['id']}'>✏️ Edit</a> |
                  <a href='delete.php?id={$row['id']}'
                     onclick=\"return confirm('Are you sure you want to delete this employee?');\">🗑 Delete</a>
                </td>
              </tr>";
      }
      ?>
    </table>
  </div>
</body>
</html>
