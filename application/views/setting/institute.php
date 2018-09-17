<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Institute Information Setup </h1>
                <div class="col-md-12">  

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">General Settings</div>
                        <div class="panel-body">
                            <form class="" method="post" action="<?php echo base_url(); ?>settings/edit_settings" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Institute Name</label>
                                    <input type="text" class="form-control" name="Institute" value="<?php echo $Institute; ?>" id="formGroupExampleInput" placeholder="Institute Name">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Institute Email</label>
                                    <input type="text" class="form-control" name="institue_email" value="<?php echo $institue_email; ?>" id="formGroupExampleInput" placeholder="Institute Email">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Address</label>
                                    <textarea class="form-control summernote" name="address" placeholder="Address"><?php echo $address; ?></textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">History</label>
                                    <textarea class="form-control summernote" name="history" placeholder="History"><?php echo $history; ?></textarea>  
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Copyright</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="copyright" value="<?php echo $copyright; ?>" placeholder="Copyright">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <img width="200"   style="border: 1px solid #efefef" src="<?php echo base_url(); ?>public/uploads/images/<?php
                                    if ($logo) {
                                        echo $logo;
                                    } else {
                                        echo 'default-logo.png';
                                    }
                                    ?>" />
                                    <input type="file" id="logo" name="file" placeholder="Select file">  
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Save</button>
                            </form>
                        </div>

                        <!-- Table -->

                    </div>



                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
