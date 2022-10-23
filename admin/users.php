<?php
require_once 'header.php';

if (!empty($_GET['delete'])) {
    $id = (int) $_GET['delete'];

    $sql = "DELETE FROM users WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt = $stmt->execute();

    $_SESSION['success'] = "User Deleted!";

    header("location: users.php");
    die;
}

try {
    $sql = "SELECT * FROM users";

    // die($sql);

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // set the resulting array to associative
    // $users = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
        </button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="users-edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                        <!-- <a href="?delete=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a> -->
                        <button type="button" data-id="<?= $user['id'] ?>" onclick="deleteClick(this)" class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function deleteClick(e) {
        console.log(e)
        let id = e.getAttribute('data-id');
        let answer = confirm("Are you sure to delete user " + id + "?")
        if (answer) {
            window.location = "?delete=" + id
        }

    }
</script>

<?php require_once 'footer.php'; ?>
