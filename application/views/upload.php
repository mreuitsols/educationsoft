<h1>Form User</h1>
<form action="<?= base_url('Imageupload/addImg') ?>" method="POST" enctype="multipart/form-data">
    <label>Name</label>
    <input type="file" name="file" placeholder="Name" />
  
    
    <br />
    <button type="submit" name="submit">Save</button>
</form>