<?php session_start();
include '../js/conn.php';
?>
<table class="table table-striped table-bordered" id="etabk">
    <thead>
        <tr>
            <th style="width : 5%">ลำดับ</th>
            <th style="width : 50%">กลุ่ม</th>
            <th style="width : 20%">แก้ไข/ลบ</th>
        </tr>
    </thead>
    <?php $sql_gru = 'SELECT * FROM equip_tb WHERE Equip_TeqCode = "'.$_POST['id'].'" and Equip_GeqCode = "'.$_POST['id2'].'" and EquipCate = "'.$_POST['id3'].'" ';
        $rsgru = mysql_query($sql_gru) or die(mysql_error());?>
    <tbody>
    <?php while ($rowgru = mysql_fetch_array($rsgru)) { ?>
        <tr>
            <td><?php echo  ++$i; ?></td>
            <td><?php echo  $rowgru['EquipName'];; ?></td>
            <td> 
                <button type="button" class="btn btn-warning btn-xs" onclick="javascript:grued(<?=$rowgru['EquipID']?>,'<?=$rowgru['EquipName']?>','E');"> <span class="fa fa-pencil"></span> แก้ไข</button>| 
                <button type="button" class="btn btn-danger btn-xs" onclick="javascript:grudel('<?=$rowgru['EquipName']?>','E',<?=$rowgru['EquipCode']?>,<?=$rowgru['Equip_GeqCode']?>,<?=$rowgru['Equip_TeqCode']?>,<?=$rowgru['EquipCate']?>);"> <span class="fa fa-trash"></span> ลบ</button>          
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $(function() {
      $("#etabk").DataTable();
    });
</script>