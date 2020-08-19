<?php session_start();
include '../js/conn.php';
?>

<table class="table table-striped table-bordered" id="gtabk">
    <thead>
        <tr>
            <th style="width : 5%">ลำดับ</th>
            <th style="width : 50%">ประเภท</th>
            <th style="width : 20%">รายละเอียด/แก้ไข/ลบ</th>
        </tr>
    </thead>
    <?php $sql_gru = 'SELECT * FROM typeeq_tb WHERE Teq_GeqID = "'.$_POST['id'].'" and TeqCate = "'.$_POST['id2'].'" ';
        $rsgru = mysql_query($sql_gru) or die(mysql_error());?>
    <tbody>
    <?php while ($rowgru = mysql_fetch_array($rsgru)) { ?>
        <tr>
            <td><?php echo  ++$i; ?></td>
            <td><?php echo  $rowgru['TeqName']; ?></td>
            <td> 
                <button type="button" class="btn btn-primary btn-xs" onclick="javascript:equieview(<?=$rowgru['TeqCode']?>,<?=$rowgru['Teq_GeqID']?>,<?=$rowgru['TeqCate']?>,'<?=$_POST['name']?>','<?=$rowgru['TeqName']?>')" > <span class="fa fa-eye" ></span> VIEW </button>|
                <button type="button" class="btn btn-warning btn-xs" onclick="javascript:grued(<?=$rowgru['TeqID']?>,'<?=$rowgru['TeqName']?>','T');"> <span class="fa fa-pencil"></span> แก้ไข</button>| 
                <button type="button" class="btn btn-danger btn-xs" onclick="javascript:grudel('<?=$rowgru['TeqName']?>','T',<?=$rowgru['TeqCode']?>,<?=$rowgru['TeqCate']?>,<?=$rowgru['Teq_GeqID']?>);"> <span class="fa fa-trash"></span> ลบ</button>          
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function() {
      $("#gtabk").DataTable();
    });
</script>