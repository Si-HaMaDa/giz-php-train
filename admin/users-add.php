<?php
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // TODO:: Validation data first
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // TODO:: skip if validation error
    // you can do it better when using funtion or OOP
    try {
        $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";

        $stmt = $conn->prepare($sql);

        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $stmt->execute($params);

        $_SESSION['success'] = "Account created successfully";

        // header("location: users.php"); # mostly will result error (Cannot modify header information - headers already sent)
        echo "<script>window.location = 'users.php'</script>";
        die;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add User</h1>
    <a href="users.php" class="btn btn-warning">
        < back</a>
</div>
<div class="container card my-3 p-3">
    <form method="POST">
        <div class="form-floating my-3">
            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            <label for="name">Name</label>
        </div>
        <div class="form-floating my-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating my-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>

    </form>
</div>


<?php require_once 'footer.php'; ?>
