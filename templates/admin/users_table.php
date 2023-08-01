<section>
    <h3>Users</h3>
    <table>
        <tr>
            <th>UserKey</th>
            <th>Username</th>
            <th>UserPassword</th>
            <th>AccountType</th>
            <th>UserFirstName</th>
            <th>UserLastName</th>
            <th>UserEmail</th>
            <th>Delete</th>
        </tr>
        <?php if (count($users) > 0): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['UserKey']) ?></td>
                    <td><?= htmlspecialchars($user['Username']) ?></td>
                    <td><?= htmlspecialchars($user['UserPassword']) ?></td>
                    <td><?= htmlspecialchars($user['AccountType']) ?></td>
                    <td><?= htmlspecialchars($user['UserFirstName']) ?></td>
                    <td><?= htmlspecialchars($user['UserLastName']) ?></td>
                    <td><?= htmlspecialchars($user['UserEmail']) ?></td>
                    <td>
                        <form method="post" action="src/admin/delete_user.php">
                            <input type="submit" name="deleteUser" value="Delete">
                            <input type="hidden" name="UserKey" value="<?= htmlspecialchars($user['UserKey']) ?>">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </table>
</section>