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
                            <h3>Status Order</h3>
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
                        <div class="table table-responsive" style="margin-top: 2%;">
                            <table id="mytable" class="table border-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nasabah</th>
                                        <th>Alamat Lengkap</th>
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
                                        <td><?php echo $value->alamat_lengkap; ?></td>
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
                        <div class="table table-responsive" style="margin-top: 2%;">
                        
                            <table id="tabletatakota" class="table border-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nasabah</th>
                                        <th>Alamat Jaminan</th>
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
                                        <td><?php echo $value->alamat_jaminan; ?></td>
                                        <td><?php echo $value->date_order; ?></td>
                                        <td style="text-align: center;"><?php echo wordwrap($value->date_created,2,"<br>\n"); ?></td>
                                        <td style="text-align: center;"><?php ($value->status == "Approved") ? print "<label style='background:green;color:white;'>".$value->status."</label>" : print "<label style='color:white;background:red;'>".$value->status."</label>";
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

<script type="text/javascript">

    $(document).ready( function(){

        var li = $("ul#status").find("li");
        li.each(function(index, el) {

            li[index].onclick = function(e){
                // var cek = $(this).attr("class");
                // if(cek == "active"){

                // }
                console.log($(this).attr("class"));
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
            
            $.post('<?php echo base_url('user/detailtaksasi') ?>', {id_taksasi : id}, function(e) {

                var data = JSON.parse(e);

                $("#modaldetailtaksasi").find("div#tempel").html(data.user);
                $("#modaldetailtaksasi").modal("show");

            });

        }
        else if (jenis == "tkota") {
            
            $.post('<?php echo base_url('user/detailtatakota') ?>', {id_tkota: id}, function(e) {
                
                var data = JSON.parse(e);

                $("#modaldetailtaksasi").find("div#tempel").html(data.user);
                $("#modaldetailtaksasi").modal("show");
                               
            });
            
        }
    }

</script>