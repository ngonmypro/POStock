<?php session_start();
include '../js/conn.php';

if($_POST['chk'] == "G"){
    $sql_edc = 'SELECT * FROM groupeq_tb WHERE GeqID = "'.$_POST['id'].'" ';
    $rsedc = mysql_query($sql_edc) or die(mysql_error());
    while ($row = mysql_fetch_array($rsedc)) {
        $val = $row['GeqName'];
    }
}elseif($_POST['chk'] == "T"){
    $sql_edc = 'SELECT * FROM typeeq_tb WHERE TeqID = "'.$_POST['id'].'" ';
    $rsedc = mysql_query($sql_edc) or die(mysql_error());
    while ($row = mysql_fetch_array($rsedc)) {
        $val = $row['TeqName'];
    }
}elseif ($_POST['chk'] == "E") {
    $sql_edc = 'SELECT * FROM equip_tb WHERE EquipID = "'.$_POST['id'].'" ';
    $rsedc = mysql_query($sql_edc) or die(mysql_error());
    while ($row = mysql_fetch_array($rsedc)) {
        $val = $row['EquipName'];
    }
}
?>

<div  class="form-horizontal form-label-left">
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru">Name </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="edconf" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $val; ?>">
        </div>
    </div>
</div>