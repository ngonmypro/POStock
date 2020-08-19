<?php session_start();
include '../js/conn.php';
?>
<div class="form-horizontal form-label-left">
<?php $sql_das = 'SELECT * FROM stock_tb,product_tb WHERE StkID = "'.$_POST['id'].'" and ProdID = "'.$_POST['id2'].'" ';
    $rsdas = mysql_query($sql_das) or die(mysql_error()); 
    $chk = mysql_fetch_array($rsdas);
    if(isset($chk['StkMinimum'])){ ?>
                <h4>ตั้งค่าจำนวนขั้นต้ำ <?php echo $chk['ProdName']; ?></h4>
        <hr>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru"> Minimum </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="minimum"  class="form-control col-md-7 col-xs-12" value="<?php echo $chk['StkMinimum']; ?>" >
            </div>
        </div>
    <?php }else{ ?>
        <h4>ตั้งค่าจำนวนขั้นต้ำ <?php echo $_POST['ProdName']; ?></h4>
        <hr>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="useru"> Minimum </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="minimum"  class="form-control col-md-7 col-xs-12" >
            </div>
        </div>
    <?php } ?>

</div>