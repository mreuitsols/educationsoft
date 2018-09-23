<script>
    $(document).ready(function () {


        $(".practical").keyup(function () {
            var isTyping = $(this).val();
//    var data = 'result=' + isTyping;
//    var msg = $('#msg');
            $.ajax({
                type: 'POST',
                url: "includes/control.php",
                data: data,
                cache: false,
                success: function () {
                    msg.html(html);
                }
            });
        });
    });

    setInterval(function () {
        onload_data();
        onload_data_deactive();
    }, 300);

    function onload_data() {
        var lastId = document.getElementById('tbodyid');
        var trList = lastId.getElementsByTagName('tr');
        //alert(trList);

        var totalTr = trList.length;
        var lastTrTag = trList[trList.length - 1].id;
        var trSplit = lastTrTag.split('__');
        var lastIdData = trSplit[1];
        var data = '';

        var SL = Number(totalTr + 1);

        $.ajax({
            type: 'GET',
            url: "<?php echo base_url(); ?>/ajax/ajaxGet?last=" + lastIdData,
            datatype: 'JSON',
            cache: false,
            success: function (dataView) {
                var dataJson = JSON.parse(dataView);
                var lengthJson = JSON.parse(dataView).length;
                for (var m = 0; m < lengthJson; m++) {
                    // alert(dataJson[m].s_id);
                    var creTr = document.createElement('tr');
                    creTr.setAttribute('id', 'tr__' + dataJson[m].s_id);
                    for (var n = 1; n < 8; n++) {
                        var ctrTd = document.createElement('td');
                        if (n == 1) {
                            ctrTd.innerHTML = SL;
                        } else if (n == 2) {
                            ctrTd.innerHTML = dataJson[m].username;
                        } else if (n == 3) {
                            ctrTd.innerHTML = dataJson[m].student_id;
                        } else if (n == 4) {
                            ctrTd.innerHTML = dataJson[m].student_name;
                        } else if (n == 5) {
                            ctrTd.innerHTML = dataJson[m].mobile_no;
                        } else if (n == 6) {
                            ctrTd.innerHTML = dataJson[m].email;
                        } else if (n == 7) {
                            ctrTd.innerHTML = 'ff';
                        }
                        creTr.appendChild(ctrTd);
                    }

                    lastId.appendChild(creTr);

                    SL++;
                }
            }
        });

    }


    function onload_data_deactive() {
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url(); ?>/ajax/ajaxGetDeactive",
            datatype: 'JSON',
            cache: false,
            success: function (dataView) {
                //alert(dataView);
                var dataJson = JSON.parse(dataView);
                var lengthJson = JSON.parse(dataView).length;
               
                for (var m = 0; m < lengthJson; m++) {
                    //alert(dataJson[m]);
                    var editId = document.getElementById("tr__" + dataJson[m].s_id);
                    //alert(editId);
                    if(editId){
                        if (editId.style.display == "none") {
                            //editId.style.display = "";
                        } else if(dataJson[m].status == '1'){
                            //editId.style.display = "none";
                        }
                        var tdTr = editId.getElementsByTagName('td');

                        for (var n = 0; n < tdTr.length; n++) {
                            var ctrTd = tdTr[n];
                            // alert(ctrTd);
                            if (n == 0) {
                                //ctrTd.innerHTML = SL;
                            } else if (n == 1) {
                                ctrTd.innerHTML = dataJson[m].username;
                            } else if (n == 2) {
                                ctrTd.innerHTML = dataJson[m].student_id;
                            } else if (n == 3) {
                                ctrTd.innerHTML = dataJson[m].student_name;
                            } else if (n == 4) {
                                ctrTd.innerHTML = dataJson[m].mobile_no;
                            } else if (n == 5) {
                                ctrTd.innerHTML = dataJson[m].email;
                            } else if (n == 6) {
                                ctrTd.innerHTML = 'ff';
                            }

                        }
                    }else{
                       // alert(dataJson[m].s_id);
                       var updateId = dataJson[m].s_id;
                        var lastId = document.getElementById('tbodyid');
                        var trList = lastId.getElementsByTagName('tr');
                        //alert(trList);
                        var checkId = 0;
                        var totalTr = trList.length;
                        for(var m =0; m < totalTr; m++){
                             var lastTrTag = trList[m].id;
                             var trSplit = lastTrTag.split('__');
                             var lastIdData = trSplit[1];
                             //alert(lastIdData);
                             if(updateId <  lastIdData && checkId == 0){
                                console.log(updateId);
                                  var creTr = document.createElement('tr');
                                    creTr.setAttribute('id', 'tr__' + dataJson[m].s_id);
                                    for (var n = 1; n < 8; n++) {
                                        var ctrTd = document.createElement('td');
                                        if (n == 1) {
                                            ctrTd.innerHTML = 1;
                                        } else if (n == 2) {
                                            ctrTd.innerHTML = dataJson[m].username;
                                        } else if (n == 3) {
                                            ctrTd.innerHTML = dataJson[m].student_id;
                                        } else if (n == 4) {
                                            ctrTd.innerHTML = dataJson[m].student_name;
                                        } else if (n == 5) {
                                            ctrTd.innerHTML = dataJson[m].mobile_no;
                                        } else if (n == 6) {
                                            ctrTd.innerHTML = dataJson[m].email;
                                        } else if (n == 7) {
                                            ctrTd.innerHTML = 'ff';
                                        }
                                        creTr.appendChild(ctrTd);
                                    }
                                    
                                     var list = document.getElementById("tr__"+lastIdData);
                                        lastId.insertBefore(creTr, list);
                                    //lastId.appendChild(creTr);
                                checkId = 1;
                             }
                        }
                       
                    }

                }
            }
        });
    }
</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Student List</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student List
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">  

                                <table width="100%" class="table table-bordered " id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <!--<th>User Name</th>-->
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>

                                            <th width="200" class="text-center">Action</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbodyid">
                                        <?php for ($i = 0; $i < sizeof($students); $i++) { ?> 
                                            <tr id="tr__<?= $students[$i]->s_id; ?>">
                                                <td><?php echo $i + 1; ?></td>
<!--                                                <td><?php
                                                    $user_name = $this->General_model->select_any_where('users', array('user_id' => $students[$i]->user_id));

                                                    echo $user_name['username'];
                                                    ?></td>-->
                                                <td><?php echo $students[$i]->student_id; ?></td>
                                                <td><?php echo $students[$i]->student_name; ?></td>
                                                <td><?php echo $students[$i]->mobile_no; ?></td>
                                                <td><?php echo $students[$i]->email; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                        <a href="<?php echo base_url(); ?>students/edit/<?php echo $students[$i]->s_id; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="<?php echo base_url(); ?>students/view_details/<?php echo $students[$i]->s_id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                                                        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Print</a>
                                                    </div>
                                                </td>
                                            </tr>
<?php } ?>

                                    </tbody>
                                </table>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
