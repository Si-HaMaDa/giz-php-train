<?php
require_once 'header.php';
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        <a href="users.php" class="btn btn-warning"> < back</a>
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

            <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>

        </form>
    </div>
</main>

<?php require_once 'footer.php'; ?>
