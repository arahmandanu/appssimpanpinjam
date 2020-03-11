<style type="text/css">
    table#mytable tbody tr td{
        padding-top: 20px;
        padding-bottom: 20px;
    }
    table#mytable thead th{
        vertical-align: middle;
        padding: none;
    }

    label.kiri{
        padding-bottom: 20%;
        float: right;
        font-size: 16px;
    }

    label.kanan{
        float: left;
        text-align: left;
    }

    label#status{
        border-radius: 40px;
        background: #C9FFED;
        padding: 5px;
        display:inline-block;
        color: #1e1f1f;
        font-weight:400;
    }

    ul#status>li.active a{
        color: white;
        background: #46B5A5;
    }

    table#mytablepelunasan thead tr th{
        text-align:center;
        vertical-align: middle;
    }

    table#mytablepelunasan tbody tr td{
        vertical-align: middle;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    table#mytablepelunasan tbody tr:hover,
        table#mytable tbody tr:hover,
        table#mytabletaksasi tbody tr:hover,
        table#mytabletkota tbody tr:hover{
            background: #FDFBE3 !important;
        }
    table#mytablepelunasan tbody tr.even, 
        table#mytable tbody tr.even,
        table#mytabletaksasi tbody tr.even,
        table#mytabletkota tbody tr.even{
            background: #fbf7d4;
        }
    table#mytabletaksasi{
        /*font-size: 12px;*/
    }
    table#mytabletaksasi thead tr th,
        table#mytabletkota thead tr th{
        text-align: center;
    }
    table#mytabletaksasi tbody tr td,
        table#mytabletkota tbody tr td{
        padding-top: 20px;
        padding-bottom: 20px;
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
    label.judul{
        float: left;
        padding-bottom:5px;
    }
    table#ppl tr td{
        padding: 5px;
    }
</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>List Approval</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">approval</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%; display: inline-block;">
            <div class="product-sales-chart" style="box-shadow: 0px 8px 9px 1px #888;">

                <ul id="status" class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                    <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Approve Peminjaman User</a>
                    </li>
                    <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Approve Pelunasan</a>
                    </li>
                    <li ><a data-toggle="tab" href="#Tabtaksasi"><span class="edu-icon edu-analytics tab-custon-ic"></span>Approve Order Taksasi</a>
                    </li>
                    <li><a data-toggle="tab" href="#Tabtkota"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Approve Cek TataKota</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="TabProject" class="tab-pane in active  custon-tab-style1">
                        <div class="table table-responsive" style="margin-top: 2%;">
                           <table id="mytable" class="table border-table">

                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Karyawan</th>
                                        <th>Debitur</th>
                                        <th>tgl Pinjam</th>
                                        <th>tgl Kembali</th>
                                        <th>Aprve</th>
                                        <th>Aprve Note</th>
                                        <th>Aksi</th>
                                    </tr>    
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach ($user->result() as $key => $value) { ?>
                                        
                                        <tr>
                                            
                                            <td style="vertical-align: middle;" ><?php echo $no;?><input type="hidden" name="id_debitur" value="<?php echo $value->id_debitur; ?>"></td>

                                            <td style="vertical-align: middle;"><?php echo $value->nama_user; ?></td>

                                            <td style="vertical-align: middle;"><?php echo $value->pmlk_jmn; ?></td>

                                            <td style="vertical-align: middle;"><?php echo $value->date_pinjam; ?></td>
             
                                            <td style="vertical-align: middle;"><?php echo $value->date_kembali; ?></td>

                                            <td style="vertical-align: middle; text-align: center;"><?php ($value->is_approve == 0) ? print "<button onclick='confirmapprove(this)' class='btn btn-custon-four btn-primary btn-xs' type='button'><i class='fa fa-check edu-checked-pro' aria-hidden='true'></i></button>"  : print "<label id='status'>Approved</label>" ;  ?> </td>  

                                            <td style="vertical-align: middle;text-align: center;"><?php ($value->is_approve == 1 ) ? ($value->is_note == 0) ? print "<button onclick='confirmnote(this)' class='btn btn-custon-four btn-primary btn-xs' type='button'><i class='fa fa-check edu-checked-pro' aria-hidden='true'></i></button>" : print "<label id='status'>Noted"  :   print "<button style='display:none;' onclick='confirmnote(this)' class='btn btn-custon-four btn-primary btn-xs' type='button'><i class='fa fa-check edu-checked-pro' aria-hidden='true'></i></button>" ; ?> </td>

                                            <td style="text-align: center;vertical-align: middle;">
                                                <?php ($value->is_kembali == 1) ? print "<button onclick='setujupengembalian(this)' class='btn btn-custon-four btn-success' style='display:block;margin:auto;' type='button'>Tutup</button>" : "";

                                                      ($value->is_approve == 0) ? print "<button onclick='hapusini(this)' class='btn btn-custon-four btn-danger' type='button'><i class='glyphicon glyphicon-trash'></i>Delete</button>"  : "";
                                                ?>
                                                <button onclick="detail(this)" class="btn btn-default" type="button" style="display: block;margin: auto;margin-top: 5%;"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Detail</button></td>    
                                                
                                        </tr>

                                    <?php $no++;} ?>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div id="TabDetails" class="tab-pane custon-tab-style1">
                        <div class="table table-responsive" style="margin-top: 2%;">
                            <table id="mytablepelunasan" class="table border-table">

                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Karyawan</th>
                                        <th>Debitur</th>
                                        <th>tgl Pelunasan</th>
                                        <th>Aprove</th>
                                    </tr>    
                                </thead>

                                <tbody>
                                    <?php $no=1; foreach ($pelunasan->result() as $key => $value) { ?>
                                        
                                        <tr>
                                            
                                            <td><?php echo $no;?><input type="hidden" name="id_debitur" value="<?php echo $value->id_debitur; ?>"></td>

                                            <td><?php echo $value->nama_user; ?></td>

                                            <td><?php echo $value->pmlk_jmn; ?></td>

                                            <td style="text-align: center;"><?php echo $value->tgl_lunas; ?></td>

                                            <td style="text-align: center;"> <?php

                                             ($value->is_approve == 0) ? print "<button onclick='confirmpelunasan(this)' class='btn btn-custon-four btn-primary btn-xs' type='button'><i class='fa fa-check edu-checked-pro' aria-hidden='true'></i></button> <button onclick='hapuspelunasan(this)' class='btn btn-custon-four btn-danger btn-xs' type='button'><i class='glyphicon glyphicon-trash'></i></button>"  : print "<label id='status'>Approved</label>"?> </td>
                                                
                                        </tr>

                                    <?php $no++;} ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>

                    <div id="Tabtaksasi" class="tab-pane custon-tab-style1">
                        <div class="table table-responsive" style="margin-top: 2%;">
                            <table id="mytabletaksasi" class="table border-table">

                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Karyawan</th>
                                        <th>Nasabah</th>
                                        <th>tgl Order</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>    
                                </thead>

                                <tbody>

                                    <?php 
                                        $no=1;
                                        foreach ($taksasi->result() as $key => $value) { 
                                    ?>

                                    <tr id="<?php echo $value->id_order_taksasi; ?>">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $value->nama_user; ?></td>
                                        <td><?php echo $value->nasabah; ?></td>
                                        <td style="text-align: center;"><?php echo $value->tgl_order; ?></td>
                                        <td><label id="status"><?php echo $value->status; ?></label></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-custon-four btn-default btn-sm" onclick="detailtaksasi(this,'<?php echo $value->id_order_taksasi; ?>')"><i class="glyphicon glyphicon-search">Detail</i></button>
                                            <button class="btn btn-custon-four btn-danger btn-sm" onclick="hapustaksasi(this,'<?php echo $value->id_order_taksasi; ?>')"><i class="glyphicon glyphicon-trash">Hapus</i></button>
                                        </td>
                                    </tr>

                                    <?php $no++; }?>
                                </tbody>

                            </table>
                            
                        </div>
                    </div>

                    <div id="Tabtkota" class="tab-pane custon-tab-style1">
                        <div class="table table-responsive" style="margin-top: 2%;">
                            <table id="mytabletkota" class="table border-table">

                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Karyawan</th>
                                        <th>Nasabah</th>
                                        <th>tgl Order</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>    
                                </thead>

                                <tbody>

                                    <?php 
                                        $no=1;
                                        foreach ($tkota->result() as $key => $value) { 
                                    ?>

                                    <tr id="<?php echo $value->id_tatakota; ?>">
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $value->nama_user; ?></td>
                                        <td><?php echo $value->nasabah; ?></td>
                                        <td style="text-align: center;"><?php echo $value->date_order; ?></td>
                                        <td><label id='status'><?php echo $value->status; ?></label></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-custon-four btn-default btn-sm" onclick="detailtkota(this,'<?php echo $value->id_tatakota; ?>')"><i class="glyphicon glyphicon-search">Detail</i></button>
                                            <button class="btn btn-custon-four btn-danger btn-sm" onclick="hapustkota(this,'<?php echo $value->id_tatakota; ?>')"><i class="glyphicon glyphicon-trash">Hapus</i></button>
                                        </td>
                                    </tr>

                                    <?php $no++; }?>
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
<div id="modaldetail" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog" style="width:60%;">
        <div class="modal-content">

            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>

            <div class="modal-body">
            	<div class="col-md-12">

            		<div class="col-md-12">
            			<div class="col-md-4">
            				<label class="kiri">Nama Debitur :</label>
            			</div>
            			<div class="col-md-8">
            				<label class="kanan" id="mdebitur"></label>
            			</div>
            		</div>

            		<div class="col-md-12">
            			<div class="col-md-4">
            				<label class="kiri">Nama Peminjam :</label>
            			</div>
            			<div class="col-md-8">
            				<label class="kanan" id="mpeminjam"></label>
            			</div>
            		</div>

            		<div class="col-md-12">
            			<div class="col-md-4">
            				<label class="kiri">Tanggal Pinjam :</label>
            			</div>
            			<div class="col-md-8">
            				<label class="kanan" id="mtglpinjam"></label>
            			</div>
            		</div>

            		<div class="col-md-12">
            			<div class="col-md-4">
            				<label class="kiri">Tanggal Kembali :</label>
            			</div>
            			<div class="col-md-8">
            				<label class="kanan" id="mtglbalik"></label>
            			</div>
            		</div>

            		<div class="col-md-12">
            			<div class="col-md-4">
            				<label class="kiri">Keterangan :</label>
            			</div>
            			<div class="col-md-8">
            				<label class="kanan" id="mket"></label>
            			</div>
            		</div>

            		<div class="col-md-12">
            			<div class="col-md-4">
            				<label class="kiri">Alasan :</label>
            			</div>
            			<div class="col-md-8">
            				<label class="kanan" id="malasan"></label>
            			</div>
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
<div id="modaldetailorder" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog" style="width:80%;">
        <div class="modal-content">

            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>

            <div class="modal-body">

                <div class="col-md-12" id="tempel" style="background: #f7f7f7;">

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
	
    $(document).ready(function(){

         $("#mytable").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '5%' },
            { sWidth: '18%' },
            { sWidth: '24%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' }
          ]
        });

        $("#mytablepelunasan").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '20%' },
            { sWidth: '10%' },
            { sWidth: '10%' }
          ]
        });

         $("#mytabletaksasi").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '20%' },
            { sWidth: '10%' },
            { sWidth: '10%' },
            { sWidth: '10%' }
          ]
        });

        $("#mytabletkota").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '20%' },
            { sWidth: '10%' },
            { sWidth: '10%' },
            { sWidth: '10%' }
          ]
        });

    });

    function verifdokumentkota(obj,id){

       swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    $.post('<?php echo base_url("approve/verifdokumentkota")?>', {id: id}, function(data, textStatus, xhr) {
            
                        swal("Verifikasi Dokumen Berhasil","","success");

                        var a = $("#mytabletkota").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");
                        console.log(a);
                         a.empty();
                         a.html("<label id='status'>Verified</label>");

                    });


                } else {
                    // swal("Dibatalkan!");
                }
         });    

    }

    function tutuptaksasitkota(obj, id){
        
        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    $.post('<?php echo base_url("approve/tutuptaksasitkota")?>', {id: id}, function(data, textStatus, xhr) {
            
                        swal("Done","","success");

                        var a = $("#mytabletkota").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");
                         a.empty();
                         a.html("<label id='status'>Done</label>");

                    });


                } else {
                    // swal("Dibatalkan!");
                }
         }); 

    }

    function verifdokumen(obj, id){

         swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    $.post('<?php echo base_url("approve/verifdokumen")?>', {id: id}, function(data, textStatus, xhr) {
            
                        swal("Verifikasi Dokumen Berhasil","","success");

                        var a = $("#mytabletaksasi").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");

                         a.empty();
                         a.html("<label id='status'>Verified</label>");

                    });


                } else {
                    // swal("Dibatalkan!");
                }
         });   
            
    }

    function tutuptaksasi(obj, id){
        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    $.post('<?php echo base_url("approve/tutuptaksasi")?>', {id: id}, function(data, textStatus, xhr) {
            
                        swal("Done","","success");

                        var a = $("#mytabletaksasi").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");
                         a.empty();
                         a.html("<label id='status'>Done</label>");

                    });


                } else {
                    // swal("Dibatalkan!");
                }
         });   

    }

    function detailtaksasi(obj, id){

        var data = {
            id_taksasi : id
        }

        $.post('<?php echo base_url('approve/detailtaksasi') ?>',data , function(data, textStatus, xhr) {
            
            var datajson = JSON.parse(data);
            // console.log(datajson);

            $("#modaldetailorder").find("div#tempel").html(datajson.user);

        });

        $("#modaldetailorder").modal("show");
        // console.log(id);
    
    }

    function approvetaksasi(obj, id) {

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Menyetujui Kegiatan Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    var data = {
                        id_taksasi:id
                    };
                    
                    $.post('<?php echo base_url("approve/approvetaksasi") ?>',data , function(e) {
                        swal("Berhasil Approve Kegiatan","","success");
                         $("#modaldetailorder").modal("hide");

                         var a = $("#mytabletaksasi").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");
                         a.empty();
                         a.html("<label id='status'>Approved</label>");
                    });

                } else {
                    // swal("Gagal Approve Kegiatan","","error");
                }
            });

    }

    function rejecttaksasi(obj, id) {

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Menyetujui Kegiatan Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    var alasan = $(obj).parent().find("textarea[name='alasanreject']").val();

                    if(alasan == "" ){
                        swal("Mohon Memberikan Alasan Reject","","warning");
                    }
                    else {
                        var data = {
                            id_taksasi : id,
                            alasan : alasan
                        };

                        $.post('<?php echo base_url("approve/rejecttaksasi") ?>',data , function(e) {
                          swal("Berhasil Melakukan Reject Kegiatan","","success");
                          $("#modaldetailorder").modal("hide");

                        var a = $("#mytabletaksasi").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");
                            a.empty();
                            a.html("<label style='background:red;color:white;'>REJECTED</label>");

                        var b = $("#mytabletaksasi").find("tbody").find("tr[id='"+id+"']").find("td:eq(5)");
                            b.empty();
                            
                        });
                    }
                } else {
                    // swal("Gagal Melakukan Reject Transaksi","","error");
                }
            });

    }

    function hapustaksasi(obj, id) {

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Menghapus Kegiatan Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                var data = {
                    id_taksasi:id
                };

                $.post('<?php echo base_url("approve/hapustaksasi") ?>',data , function(e) {
                    
                    var td = $(obj).parent();
                    // Hapus BUTTON
                        td.empty();

                    // SHOW LABEL STATUS
                        td.html("<label style='background:red;color:white;font-weight500;'>DELETED</label>");
                });
                
                } else {
                    swal("Gagal Melakukan Reject Transaksi","","error");
                }
            });
    }

    function detailtkota(obj, id) {

        var data = {
            id_tkota : id
        }

        $.post('<?php echo base_url('approve/detailtatakota') ?>',data , function(data, textStatus, xhr) {
            
            var datajson = JSON.parse(data);
            // console.log(datajson);

            $("#modaldetailorder").find("div#tempel").html(datajson.user);

        });

        $("#modaldetailorder").modal("show");
        // console.log(id);
    }

    function approvettkota(obj ,id) {

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Menyetujui Kegiatan Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    var data = {
                        id_tkota:id
                    };

                    $.post('<?php echo base_url("approve/approvetkota") ?>',data , function(e) {
                        swal("Berhasil Approve Kegiatan","","success");
                         $("#modaldetailorder").modal("hide");

                         var a = $("#mytabletkota").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)")
                         console.log(a);
                         a.empty();
                         a.html("<label id='status'>Approved</label>")

                    });

                } else {
                    swal("Gagal Approve Kegiatan","","error");
                }
            });
    }

    function rejecttkota(obj, id) {

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Menyetujui Kegiatan Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    var alasan = $(obj).parent().find("textarea[name='alasanreject']").val();

                    if(alasan == "" ){
                        swal("Mohon Memberikan Alasan Reject","","warning");
                    }
                    else {
                        var data = {
                            id_tkota : id,
                            alasan : alasan
                        };

                        $.post('<?php echo base_url("approve/rejecttkota") ?>',data , function(e) {
                            swal("Berhasil Melakukan Reject Kegiatan","","success");
                            $("#modaldetailorder").modal("hide");

                            var a = $("#mytabletkota").find("tbody").find("tr[id='"+id+"']").find("td:eq(4)");
                                a.empty();
                                a.html("<label style='background:red;color:white;'>REJECTED</label>");

                            var b = $("#mytabletkota").find("tbody").find("tr[id='"+id+"']").find("td:eq(5)");
                                b.empty();

                        });
                    }
                } else {
                    swal("Gagal Melakukan Reject Transaksi","","error");
                }
            });

    }

    function hapustkota(obj, id) {

       
        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Menghapus Kegiatan Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                 var data = {
                        id_tkota:id
                    };

                    $.post('<?php echo base_url("approve/hapustkota") ?>',data , function(e) {
                            var td = $(obj).parent();
                        // Hapus BUTTON
                            td.empty();

                        // SHOW LABEL STATUS
                            td.html("<label style='background:red;color:white;font-weight500;'>DELETED</label>");
                    });

                } else {
                    swal("Gagal Melakukan Reject Transaksi","","error");
                }
            });


    }

    function confirmapprove(obj) {

        var note = $(obj).parents("tr").find("td:eq(6)").find("button");
        
        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin untuk approve peminjaman ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    var iddebitur = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

                    var data = {

                            id_debitur : iddebitur

                        }

                    var target = "<?php echo base_url('approve/confirmapprove'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0) {
                            // succes
                             swal("Approve berhasil dilakukan", { icon: "success", });

                             $(obj).parent().append('<label id="status">Approved</label>');

                             // hide tombol
                             $(obj).attr({
                                    Style: 'display:none;'
                                    });

                             // show tombol cofirmnote
                             $(note).attr({
                                    style: 'display:'
                                    });

                             //hide tombol hapus
                             $(obj).parents("tr").find("td:eq(7)").find("button:eq(0)").remove();

                        } else {
                            // error
                            swal("Gagal Approve" , "" , "error");
                        }
                    });    

                } else {
                    // swal("Dibatalkan!");
                }
            });

    }

    function confirmnote(obj){

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin Cover Note sudah Diterima?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var iddebitur = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

                    var data = {

                            id_debitur : iddebitur

                        }

                    var target = "<?php echo base_url('approve/confirmnote'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0) {
                            // succes
                             swal("Approve berhasil dilakukan", { icon: "success", });

                             $(obj).parent().append('<label id="status">Noted</label>');

                             // hide tombol
                             $(obj).attr({
                                    Style: 'display:none;'
                                    });                            

                        } else {
                            // error
                            swal("Gagal Approve" , "" , "error");
                        }
                    });    

                } else {
                    // swal("Dibatalkan!");
                }
            });

    }

    function detail(obj){

        var iddebitur = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

        //console.log(iddebitur);

        var data = {
            iddebitur : iddebitur
        };

        var target = "<?php echo base_url('approve/lihatdetail'); ?>"

        $.post(target, data, function(e) {

            var json = JSON.parse(e);
                
                var keterangan = json.ket_pinjam;
                var alasan     = json.alasan_pinjam;
                var tgl_pinjam = json.date_pinjam;
                var tgl_kembali = json.date_kembali;
                var nama_debitur = json.pmlk_jmn;
                var nama_peminjam = json.nama_user;

            console.log(json);

            $("#modaldetail").modal("show");

            $("#mdebitur").text(nama_debitur);
            $("#mpeminjam").text(nama_peminjam);
            $("#mtglpinjam").text(tgl_pinjam);
            $("#mtglbalik").text(tgl_kembali);
            $("#mket").text(keterangan);
            $("#malasan").text(alasan);

        });

    }

    function setujupengembalian(obj){

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    var id_debitur = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

                    //console.log(id_debitur);

                    var data = {

                            id_uniq : id_debitur

                        }

                    var target = "<?php echo base_url('approve/approvepengembalian'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0 ) {

                            // succes
                             swal("Data Berhasil Dipindahkan Kehistory Peminjaman", { icon: "success", });

                             // hide tombol
                             $(obj).parents("tr").remove();

                        } else {
                            // error
                            swal("Gagal" , "" , "error");
                        }
                    });    

                } else {
                    // swal("Dibatalkan!");
                }
         });      

    }

    function confirmpelunasan(obj){

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                   var iddeb = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

                    //console.log(id_debitur);

                    var data = {

                            id_uniq : iddeb

                        }

                    var target = "<?php echo base_url('approve/approvepelunasan'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0 ) {

                            // succes
                             swal("Konfirmasi Pelunasan Berhasil", { icon: "success", });

                             // hide tombol
                             $(obj).parents("tr").remove();

                        } else {
                            // error
                            swal("Gagal" , "" , "error");
                        }
                    });    

                } else {
                    // swal("Dibatalkan!");
                }
         });   

    }

    function hapuspelunasan(obj){

        swal({
                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                   var iddeb = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

                    //console.log(id_debitur);

                    var data = {

                            id_uniq : iddeb

                        }

                    var target = "<?php echo base_url('approve/hapuspelunasan'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0 ) {

                            // succes
                             swal("Data Berhasil di Hapus", { icon: "success", });

                             // hide tombol
                             $(obj).parents("tr").remove();

                        } else {
                            // error
                            swal("Gagal" , "" , "error");
                        }
                    });    

                } else {
                    // swal("Dibatalkan!");
                }
         });   
        // console.log(obj);
    }

    function hapusini(obj){

        swal({
                title: "Pemberitahuan!",
                text: "Anda Hanya Bisa Menghapus Data Yang Belum Di Approve",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                   var iddeb = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_debitur']").val();

                    //console.log(id_debitur);

                    var data = {

                            id_uniq : iddeb

                        }

                    var target = "<?php echo base_url('approve/hapuspeminjaman'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0 ) {

                            // succes
                             swal("Data Berhasil di Hapus", { icon: "success", });

                             // hide tombol
                             $(obj).parents("tr").remove();

                        } else {
                            // error
                            swal("Gagal" , "" , "error");
                        }
                    });    

                } else {
                    // swal("Dibatalkan!");
                }
         });   
    }
</script>

