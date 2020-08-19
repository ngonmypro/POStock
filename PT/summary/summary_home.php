<?php session_start(); 
include '../js/conn.php';?>
<div class="page-title">
    <div class="title_left">
     <h3>Summary List <small>รายงาน</small></h3>
         </div>
    </div>
<div class="row">
 <div class="col-md-12">
    <div class="x_panel">
     <div class="x_title">
        <h2>รายงาน</h2>
        <div class="row">
            <div class="col-lg-1">
                <select class="form-control" id="yearsum" onchange="javascript:sumtable();">
                <option value="0">-- --- Year --- --</option>
                <?php for ($i=2017; $i <= Date("Y") ; $i++) { ?>
                <option value="<?php echo $i; ?>" <?if(Date("Y") == $i){ echo "selected"; }?> ><?php echo $i; ?></option>
         <?php } ?>
                </select>
            </div>
            <div class="col-lg-2">
                <select class="form-control" id="catesum" onchange="javascript:sumtable();">
                    <option value="0">-- --- ประเภท --- --</option>
                    <option value="606">-- --- สินทรัพท์ --- --</option>
                    <option value="607">-- --- สินเปลือง --- --</option>
                </select>
            </div>
            <div class="col-lg-2">
                    <?php $sql = 'SELECT * FROM branch_tb';
                        $rs = mysql_query($sql) or die(mysql_error()); ?>
                <select class="form-control" id="brahsum" onchange="javascript:sumtable();">
                    <option value="0">-- --- สาขา --- --</option>
                    <?php while($roww = mysql_fetch_array($rs)) { ?>
                        <option value="<?php echo $roww['BrahID']; ?>"><?php echo $roww['BrahName'],'/',$roww['BrahCode']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
       <div class="clearfix"></div>
     </div>
     <div class="x_content">
        <div id="sumy"></div>
     </div>
</div>
</div>
</div>
<script>
 $("#sumy").load("summary/summary_table.php");
 
 function sumtable() {
     var yearsum = $("#yearsum").val();
     var catesum = $("#catesum").val();
     var brahsum = $("#brahsum").val();
     $("#sumy").load("summary/summary_table.php",{
        yearsum : yearsum,
        catesum : catesum,
        brahsum : brahsum
     });
 }
</script>