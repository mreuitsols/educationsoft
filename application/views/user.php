<h1>Listing User</h1>
<table border="1" cellpadding="5">
    <caption><a href="<?= base_url('home/user_crud') ?>">Add User</a></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($users as $user): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $user->username ?></td>
                <td><?= $user->email ?></td>
                <td>
                    <a href="<?= base_url('home/user_crud/'.$user->id) ?>">Edit</a> |
                    <a href="<?= base_url('home/user_delete/'.$user->id) ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>