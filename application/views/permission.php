<h1>Listing Permission</h1>
<table border="1" cellpadding="5">
    <caption><a href="<?= base_url('home/permission_crud') ?>">Add Permission</a></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>Uri</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($permissions as $permission): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $permission->uri ?></td>
                <td><?= $permission->username ?></td>
                <td>
                    <a href="<?= base_url('home/permission_crud/'.$permission->pu_id) ?>">Edit</a> |
                    <a href="<?= base_url('home/permission_delete/'.$permission->permission_id) ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>