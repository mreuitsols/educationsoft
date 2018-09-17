<h1>Form User</h1>
<form action="<?= base_url('home/user_crud') ?>" method="POST">
    <label>Name</label>
    <input type="text" name="name" placeholder="Name" value="<?= (isset($user)) ? $user->username : "" ?>" />
    <input type="hidden" name="id" value="<?= (isset($user)) ? $user->id : "" ?>" />
    <br />
    <label>Email</label>
    <input type="email" name="email" placeholder="Email" value="<?= (isset($user)) ? $user->email : "" ?>" />
    <br />
    <label>Password</label>
    <input type="password" name="password" placeholder="Password" />
    <br />
    <button type="submit">Save</button>
</form>