
    <ul class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" id="at1" class="active"><a href="javascript:addstkpo();">Add Stock From PO</a></li>
        <li role="presentation" id="at2"><a href="javascript:addstk();">Add Stock</a></li>
    </ul>

    <div id="adstock"></div>


<script>
$(function () {
    $("#adstock").load("stock/add_stock_form_po.php");
});

function addstkpo() {
    $('#at2').removeAttr('class');
    $('#at1').attr("class","active");
    $("#adstock").load("stock/add_stock_form_po.php");
}

function addstk() {
    $('#at1').removeAttr('class');
    $('#at2').attr("class","active");
    $("#adstock").load("stock/add_stock_form.php");
}

</script>