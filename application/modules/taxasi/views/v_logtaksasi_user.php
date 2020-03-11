<style type="text/css">
    table#mytable tbody tr td{
        padding-top: 30px;
        padding-bottom: 30px;
    }
    table#mytable tbody tr:hover{
        background-color:#F9F6E0 !important;
    }
    table#mytable tbody tr.even{
        background: #fbf7d4;
    }
    table#mytable thead th{
        text-align: center;
        vertical-align: middle;
    } 
    table#mytable tbody tr td{
        vertical-align: middle;
    }
    label#status{
        border-radius: 40px;
        background: #98f992;
        padding: 5px;
        display:inline-block;
        color: #1e1f1f;
        font-weight:400;
    }
    table#tabletatakota tbody tr td{
        padding-top: 40px;
        padding-bottom: 40px;
    }
    table#tabletatakota tbody tr:hover{
        background-color:#F9F6E0 !important;
    }
    table#tabletatakota tbody tr.even{
        background: #fbf7d4;
    }
    table#tabletatakota thead th{
        text-align: center;
        vertical-align: middle;
    } 
    table#tabletatakota tbody tr td{
        vertical-align: middle;
    }
    ul#status>li.active a{
        color: white;
        background: #46B5A5;
    }
    label.judul{
        float: left;
        padding-bottom: 10px;
    }

    table#jenis tr td{
        border:1px solid black;
        padding:1px;
    }
    table#jenis{
        margin:0 auto 0 auto;
    }
    table#jenis tr:nth-child(1),
        table#jenis tr:nth-child(2){
        background: aqua;
    }

</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>Log Taksasi Semua User</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Status Order</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-bottom: 5%;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%; display: inline-block;">
            <div class="product-sales-chart" style="box-shadow: 0px 3px 5px 1px black;">

                <ul id="status" class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                    <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Order Taksasi</a>
                    </li>
                    <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Cek Tata Kota</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="TabProject" class="tab-pane in active  custon-tab-style1">

                        <div class="col-md-12" id="rentang">
                            <div class="col-md-4" style="padding: 25px;">
                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                    <select class="form-control" name="rentang" onchange="rentang(this)">
                                        <option>--> Pilih yang ditampilkan <--</option>
                                        <option value="semua">Semua</option>
                                        <option value="tgl">Rentang Tanggal</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2" style="padding: 25px;">
                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                    <button class="btn btn-custon-two btn-success btn-md" onclick="downloadexcel(this)"><i class="glyphicon glyphicon-print"></i> Print</button>
                                </div>
                            </div>
                        
                            <div class="col-md-6" style="display: none;padding: 5px;" id="selectrentang">
                                <div class="form-group data-custon-pick data-custom-mg">
                                    <label>Rentang Tgl Order</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="date" class="form-control" name="start"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="date" class="form-control" name="end"/>
                                    </div>
                                    <button style="float:right;margin-top: 5px;margin-bottom: 5px;" onclick="rentangwaktu(this)" class="btn btn-custon-three btn-warning btn-xs"><i class="glyphicon glyphicon-search"></i> Ok</button>
                                </div>
                            </div>
                        </div>

                        <div class="table table-responsive" style="margin-top: 2%;">
                            <table id="mytable" class="table border-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nasabah</th>
                                        <th>Karyawan</th>
                                        <th>Tgl Order</th>
                                        <th>Tgl Submit</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $no= 1;
                                        foreach ($taksasi->result() as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $value->nasabah; ?></td>
                                        <td><?php echo $value->karyawan; ?></td>
                                        <td><?php echo $value->tgl_order; ?></td>
                                        <td style="text-align: center;"><?php echo wordwrap($value->date_created,2,"<br>\n"); ?></td>
                                        <td style="text-align: center;"><?php ($value->status == "Done") ? print "<label style='color:white;background:green;'> ".$value->status ."</label>" : print "<label style='color:white;background:red;'>".$value->status."</label>";
                                            ?>
                                        </td>
                                        <td>
                                            <button class="" onclick="detail(this,'<?php echo $value->id_order_taksasi; ?>', 'taksasi')"><i class="glyphicon glyphicon-search"> Detail</i></button>
                                        </td>
                                    </tr>

                                    <?php 
                                        $no++;} 
                                    ?>
                                </tbody>

                            </table>

                        </div>
                    </div>

                    <div id="TabDetails" class="tab-pane custon-tab-style1">

                        <div class="col-md-12" id="rentangtkota">
                            <div class="col-md-4" style="padding: 25px;">
                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                    <select class="form-control" name="rentang" onchange="rentangtkota(this)">
                                        <option>--> Pilih yang ditampilkan <--</option>
                                        <option value="semua">Semua</option>
                                        <option value="tgl">Rentang Tanggal</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2" style="padding: 25px;">
                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                    <button class="btn btn-custon-two btn-success btn-md" onclick="downloadexceltkota(this)"><i class="glyphicon glyphicon-print"></i> Print</button>
                                </div>
                            </div>
                        
                            <div class="col-md-6" style="display: none;padding: 5px;" id="selectrentangtkota">
                                <div class="form-group data-custon-pick data-custom-mg">
                                    <label>Rentang Tgl Order</label>
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="date" class="form-control" name="start"/>
                                        <span class="input-group-addon">to</span>
                                        <input type="date" class="form-control" name="end"/>
                                    </div>
                                    <button style="float:right;margin-top: 5px;margin-bottom: 5px;" onclick="rentangwaktutkota(this)" class="btn btn-custon-three btn-warning btn-xs"><i class="glyphicon glyphicon-search"></i> Ok</button>
                                </div>
                            </div>
                        </div>

                        <div class="table table-responsive" style="margin-top: 2%;">
                        
                            <table id="tabletatakota" class="table border-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nasabah</th>
                                        <th>Karyawan</th>
                                        <th>Tgl Order</th>
                                        <th>Tgl Submit</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $no= 1;
                                        foreach ($tatakota->result() as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $value->nasabah; ?></td>
                                        <td><?php echo $value->karyawan; ?></td>
                                        <td><?php echo $value->date_order; ?></td>

                                        <td style="text-align: center;"><?php echo wordwrap($value->date_created,2,"<br>\n"); ?></td>

                                        <td style="text-align: center;"><?php ($value->status == "Done") ? print "<label style='background:green;color:white;'>".$value->status."</label>" : print "<label style='color:white;background:red;'>".$value->status."</label>";
                                            ?>
                                        </td>

                                        <td>
                                            <button class="" onclick="detail(this,'<?php echo $value->id_tatakota; ?>','tkota')"><i class="glyphicon glyphicon-search"> Detail</i></button>
                                        </td>
                                    </tr>

                                    <?php 
                                        $no++;} 
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Detai User -->
<div id="modaldetailtaksasi" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content">

            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>

            <div class="modal-body">

                <div class="col-md-12" id="tempel">

                </div>

            </div>

            <div class="modal-footer warning-md">
                <a data-dismiss="modal" href="#">CLOSE</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal User -->

<!-- Modal Detai User -->
<div id="downloadexcel" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>

            <div class="modal-body">

                <div class="col-md-12">
                    Pilihan Download
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                       <select name="downloadrentang" class="form-control" onchange="tglshow(this)">
                           <option value="all" selected>All</option>
                           <option value="date">Range Select</option>
                       </select> 
                    </div>
                </div>
                
                <div class="col-md-12" style="display: none;" id="picker">
                    Range Select
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="date" class="form-control" name="start"/>
                        <span class="input-group-addon">to</span>
                        <input type="date" class="form-control" name="end"/>
                    </div>
                </div>
                
                <div class="col-md-12" style="padding:10px;">
                    <div class="form-group">
                        <button class="btn btn-custon-two btn-default" onclick="cetakexcel(this)"><i class="glyphicon glyphicon-print"></i> Download</button>
                    </div>
                </div>
                

            </div>

            <div class="modal-footer warning-md">
                <a data-dismiss="modal" href="#">CLOSE</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal User -->

<!-- Modal Detai User -->
<div id="downloadexceltkota" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>

            <div class="modal-body">

                <div class="col-md-12">
                    Pilihan Download
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                       <select name="downloadrentang" class="form-control" onchange="tglshowtkota(this)">
                           <option value="all" selected>All</option>
                           <option value="date">Range Select</option>
                       </select> 
                    </div>
                </div>
                
                <div class="col-md-12" style="display: none;" id="picker">
                    Range Select
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="date" class="form-control" name="start"/>
                        <span class="input-group-addon">to</span>
                        <input type="date" class="form-control" name="end"/>
                    </div>
                </div>
                
                <div class="col-md-12" style="padding:10px;">
                    <div class="form-group">
                        <button class="btn btn-custon-two btn-default" onclick="cetakexceltkota(this)"><i class="glyphicon glyphicon-print"></i> Download</button>
                    </div>
                </div>
                

            </div>

            <div class="modal-footer warning-md">
                <a data-dismiss="modal" href="#">CLOSE</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal User -->

<script type="text/javascript">

    $(document).ready( function(){

        var li = $("ul#status").find("li");
        li.each(function(index, el) {

            li[index].onclick = function(e){
                // var cek = $(this).attr("class");
                // if(cek == "active"){

                // }
                // console.log($(this).attr("class"));
            }

        });

        $("#mytable").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '24%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' }
          ]
        });

        $("#tabletatakota").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '24%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' }
          ]
        });
    });

    function detail(obj, id, jenis){

        if(jenis == "taksasi"){
            
            $.post('<?php echo base_url('taxasi/detailtaksasi') ?>', {id_taksasi : id}, function(e) {

                var data = JSON.parse(e);

                $("#modaldetailtaksasi").find("div#tempel").html(data.user);
                $("#modaldetailtaksasi").modal("show");

            });

        }
        else if (jenis == "tkota") {
            
            $.post('<?php echo base_url('taxasi/detailtatakota') ?>', {id_tkota: id}, function(e) {
                
                var data = JSON.parse(e);

                $("#modaldetailtaksasi").find("div#tempel").html(data.user);
                $("#modaldetailtaksasi").modal("show");
                               
            });
            
        }
    }

    function rentang(obj){
        var pilih = $(obj).val();

        if(pilih == "semua"){
            var iptdiv = $(obj).parents("div#rentang").find("div#selectrentang");
                iptdiv.attr('style', 'display:none');

            $.get('<?php echo base_url("taxasi/taksasisemua") ?>', function(data) {

                var tempel = $("table#mytable > tbody");
                     tempel.html("<tr><td colspan='7' style='text-align:center;'><img src='<?php echo site_url("vendors/ajax-loader.gif")?>'/><br>Loadig Data...!</td></tr>");

                setTimeout(function(){
                    $("#mytable").DataTable().destroy();
                    $("#mytable > tbody > tr").remove();

                    var json = JSON.parse(data);
                            tempel.append(json.list);

                     $("#mytable").DataTable();
                }, 2000);
            });
        }
        else if(pilih == "tgl"){

            var iptdiv = $(obj).parents("div#rentang").find("div#selectrentang");
                iptdiv.attr('style', 'display:');

        }

    }

    function rentangwaktu(obj){

        var start = $(obj).parent().find("input[name=start][type=date]").val();
        var end = $(obj).parent().find("input[name=end][type=date]").val();

        if((start != "") && (end != "")){

            if(new Date(start) <= new Date(end)) {

                $.get('<?php echo base_url("taxasi/taksasitgl") ?>',{start:start,end:end}, function(data) {
                    var tempel = $("table#mytable > tbody");
                         tempel.html("<tr><td colspan='7' style='text-align:center;'><img src='<?php echo site_url("vendors/ajax-loader.gif")?>'/><br>Loadig Data...!</td></tr>");

                    setTimeout(function(){
                        $("#mytable").DataTable().destroy();
                        $("#mytable > tbody > tr").remove();

                        var json = JSON.parse(data);
                                tempel.append(json.list);

                         $("#mytable").DataTable();
                    }, 2000);
                });

            }
            else {
             swal("Rentang waktu harus benar","","error");
            }

        }
        else {

            swal("Rentang tanggal perlu diisi","","error");

        }

        // console.log(start + end);
    }

    function rentangtkota(obj){
        var pilih = $(obj).val();

        if(pilih == "semua"){
            var iptdiv = $(obj).parents("div#rentangtkota").find("div#selectrentangtkota");
                iptdiv.attr('style', 'display:none');

            $.get('<?php echo base_url("taxasi/taksasisemuatkota") ?>', function(data) {

                var tempel = $("table#tabletatakota > tbody");
                     tempel.html("<tr><td colspan='7' style='text-align:center;'><img src='<?php echo site_url("vendors/ajax-loader.gif")?>'/><br>Loadig Data...!</td></tr>");

                setTimeout(function(){
                    $("#tabletatakota").DataTable().destroy();
                    $("#tabletatakota > tbody > tr").remove();

                    var json = JSON.parse(data);
                            tempel.append(json.list);

                     $("#tabletatakota").DataTable();
                }, 2000);
            });
        }
        else if(pilih == "tgl"){

            var iptdiv = $(obj).parents("div#rentangtkota").find("div#selectrentangtkota");
                iptdiv.attr('style', 'display:');

        }

    }

    function rentangwaktutkota(obj){

        var start = $(obj).parent().find("input[name=start][type=date]").val();
        var end = $(obj).parent().find("input[name=end][type=date]").val();

        if((start != "") && (end != "")){

            if(new Date(start) <= new Date(end)) {

                $.get('<?php echo base_url("taxasi/taksasitgltkota") ?>',{start:start,end:end}, function(data) {
                    var tempel = $("table#tabletatakota > tbody");
                         tempel.html("<tr><td colspan='7' style='text-align:center;'><img src='<?php echo site_url("vendors/ajax-loader.gif")?>'/><br>Loadig Data...!</td></tr>");

                    setTimeout(function(){
                        $("#tabletatakota").DataTable().destroy();
                        $("#tabletatakota > tbody > tr").remove();

                        var json = JSON.parse(data);
                                tempel.append(json.list);

                         $("#tabletatakota").DataTable();
                    }, 2000);
                });

            }
            else {
             swal("Rentang waktu harus benar","","error");
            }

        }
        else {

            swal("Rentang tanggal perlu diisi","","error");

        }

        // console.log(start + end);
    }

    function downloadexcel(obj){

        $("div#downloadexcel").modal("show");

    }

    function tglshow(obj){
         $(obj).parents("div.modal-body").find("div#picker").find("input[type=date]").val("");

        var select = $(obj).val();
        // console.log(select);
        if( select == "date" ){
            $(obj).parents("div.modal-body").find("div#picker").attr('style', 'display:');
        }
        else if (select == "all") {
            $(obj).parents("div.modal-body").find("div#picker").attr('style', 'display:none');
        }
    }

    function cetakexcel(obj){
        var pilih = $(obj).parents("div.modal-body").find("select[name=downloadrentang]").val();

        if(pilih == "date"){
            var start = $(obj).parents("div.modal-body").find("input[name=start][type=date]").val();
            var end = $(obj).parents("div.modal-body").find("input[name=end][type=date]").val();
            console.log(start + end);

                if((start != "") && (end != "")){

                    if(new Date(start) <= new Date(end)) {

                        var url = "<?php echo base_url('taxasi/downloadexceltaksasi?jenis=')?>"+pilih+"&start="+start+"&end="+end;

                        window.open(url, "_blank");
                    }
                    else {
                     swal("Rentang waktu harus benar","","error");
                    }

                }
                else {

                    swal("Rentang tanggal perlu diisi","","error");

                }

                // console.log(start + end);
        }
        else if(pilih = "all"){

            var url = "<?php echo base_url('taxasi/downloadexceltaksasi?jenis=')?>"+pilih;

                        window.open(url, "_blank");
            
        }
    }

    function downloadexceltkota(obj){

        $("div#downloadexceltkota").modal("show");

    }

    function tglshowtkota(obj){
         $(obj).parents("div.modal-body").find("div#picker").find("input[type=date]").val("");

        var select = $(obj).val();
        // console.log(select);
        if( select == "date" ){
            $(obj).parents("div.modal-body").find("div#picker").attr('style', 'display:');
        }
        else if (select == "all") {
            $(obj).parents("div.modal-body").find("div#picker").attr('style', 'display:none');
        }
    }

    function cetakexceltkota(obj){
        var pilih = $(obj).parents("div.modal-body").find("select[name=downloadrentang]").val();

        if(pilih == "date"){
            var start = $(obj).parents("div.modal-body").find("input[name=start][type=date]").val();
            var end = $(obj).parents("div.modal-body").find("input[name=end][type=date]").val();
            // console.log(start + end);

                if((start != "") && (end != "")){

                    if(new Date(start) <= new Date(end)) {

                        var url = "<?php echo base_url('taxasi/downloadexceltaksasitkota?jenis=')?>"+pilih+"&start="+start+"&end="+end;

                        window.open(url, "_blank");
                    }
                    else {
                     swal("Rentang waktu harus benar","","error");
                    }

                }
                else {

                    swal("Rentang tanggal perlu diisi","","error");

                }

                // console.log(start + end);
        }
        else if(pilih = "all"){

            var url = "<?php echo base_url('taxasi/downloadexceltaksasitkota?jenis=')?>"+pilih;

                        window.open(url, "_blank");
            
        }
    }

</script>