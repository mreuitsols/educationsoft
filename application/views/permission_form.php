<h1>Form User</h1>
<form action="<?= base_url('home/permission_crud') ?>" method="POST">
    <label>Uri</label> 
    <input type="text" name="uri" placeholder="Uri" value="<?= (isset($permission)) ? $permission->uri : "" ?>" />
    <input type="hidden" name="pu_id" value="<?= (isset($permission)) ? $permission->pu_id : "" ?>" />
    <input type="hidden" name="permission_id" value="<?= (isset($permission)) ? $permission->permission_id : "" ?>" />
    <br />
    <label>User</label>
    <select name="user_id">
        <option value="">Select</option>
        <?php foreach($users as $user): ?>
            <option value="<?= $user->id ?>" <?= (isset($permission) && $user->id == $permission->user_id) ? "selected='selected'" : "" ?> ><?= $user->username ?></option>
        <?php endforeach; ?>
    </select>
    <br />
    <button type="submit">Save</button>
</form>