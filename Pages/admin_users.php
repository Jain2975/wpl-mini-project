<?php
include './db.php';
session_start();

// Handle Add User
if (isset($_POST['add_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user';

    mysqli_query($conn, "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");
    header("Location: admin_users.php");
    exit();
}

// Fetch only regular users
$result = mysqli_query($conn, "SELECT * FROM users WHERE role = 'user'");

// Handle Deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $check = mysqli_query($conn, "SELECT role FROM users WHERE id = $id");
    $data = mysqli_fetch_assoc($check);

    if ($data && $data['role'] !== 'admin') {
        mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    }

    header("Location: admin_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Users</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin: 120px auto;
            width: 90%;
            background: rgba(255,255,255,0.95);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.2);
            color: #000;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #0077b6;
            color: white;
        }
        .btn-delete {
            background-color: #e63946;
            color: white;
        }
        .btn-add {
            background-color: #2a9d8f;
            color: white;
        }
        .top-btns {
            margin-bottom: 15px;
            display: flex;
            justify-content: flex-end;
        }
       
    </style>
</head>
<body>

<div class="nav">
    <a href="./admin_dashboard.php">Dashboard</a>
    <a href="./admin_submissions.php">Submissions</a>
    <a href="./logout.php">Logout</a>
</div>

<div class="table-container">
    <div class="top-btns">
        <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addUserModal">+ Add User</button>
    </div>
    <h2>User Management</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password (Hashed)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['password']) ?></td>
                    <td>
                        <a class="btn btn-delete btn-sm" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete user?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<!-- Modal for Adding User -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="add_user" class="btn btn-success">Add User</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
