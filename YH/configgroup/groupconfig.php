<?php session_start();
include '../js/conn.php';
?>
<div class="page-title">
        <div class="title_left">
            <h3>Connfig List <small>แก้ไขกลุ่ม/ประเภท</small></h3>
            <button type="button" class="btn btn-primary" onclick="javascript:addconfig('G')"> + เพื่มรายการ</button>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row" >
                    <div class="col-lg-4" >
                        <h2>รายการ</h2>
                        <div class="col-lg-8">
                            <select class="form-control" id="gr" onchange="javascript:confgrr()">
                                <option value="1">สินทรัพย์</option>
                                <option value="2">สิ้นเปลือง</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="confgrtable"></div>
            </div>
        </div>
    </div>
</div>
<script>
$("#confgrtable").load('configgroup/group_table.php');
function confgrr() {
    var id = $("#gr").val();
    $("#confgrtable").load('configgroup/group_table.php',{ id : id });
}
</script>