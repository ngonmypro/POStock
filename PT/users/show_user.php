<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
     <h3>Users Management <small>ระบบจัดการผู้ใช้</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>Users</h2>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
    <table class="table table-striped table-bordered">
            <thead>
                 <tr>
                    <th>ลำดับ</th>
                    <th>รหัสพนักงาน</th>
                    <th>ชื่อ</th>
                    <th>สาขา</th>
                    <th>แผนก</th>
                    <th>สถานะ</th>
                    <th>แก้ไข/ลบ</th>
                 </tr>
                </thead>
                <?php $sql_userS = 'SELECT * FROM user_tb,dep_tb,branch_tb,title_tb WHERE UserBrah = BrahCode and UserDep = DepID and UserTitle = TitleID'; 
                      $objuserS = mysql_query($sql_userS)?>
                <tbody>
                    <?php while ($row = mysql_fetch_array($objuserS)) { 
                            $usid = $row['UserID'];
                           $uscode = $row['UserCode'];
                           $ti = $row['TitleName'];
                           if($row['UserStatus'] == 0){
                            $uname = "Admin";
                           }elseif($row['UserStatus'] == 1){
                            $uname = "ทั้วไป";
                           }elseif($row['UserStatus'] == 2){
                            $uname = "ผู้อนุมัติ";
                           }elseif($row['UserStatus'] == 3){
                            $uname = "ผู้จัดการแผนก";
                           }
                           $fname = $row['UserFname'];
                           $lname = $row['UserLname'];
                           $brah = $row['BrahName'];
                           $dep = $row['DepName'];
                    ?>
                     <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $uscode; ?></td>
                        <td><?php echo $ti,$fname,' ',$lname; ?></td>
                        <td><?php echo $brah; ?></td>
                        <td><?php echo $dep; ?></td>
                        <td><?php echo $uname;?></td>
                        <td> 
                             <a href="javascript:btn_edit_user(<?=$usid?>);" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a> 
                             <a href="javascript:btn_delete_user(<?=$usid?>,'<?=$fname," ",$lname?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> 
                         </td>
                    </tr>
                   <?php }mysql_close($c);?>
                </tbody>
         </table>
     </div>
</div>
</div>
</div>