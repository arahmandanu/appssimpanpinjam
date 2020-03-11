<style type="text/css">
    table#mytable tbody>tr>td{
        padding-top:35px;
        padding-bottom:35px;
    }

    label#status{
        color: #000;
        border-radius: 40px;
        background: #a0e5f9;
        padding: 10px;
        display:inline-block;
        font-weight:400;
    }

    label#status2{
        color: #000;
        border-radius: 40px;
        background: #ccff94;
        padding: 10px;
        display:inline-block;
        font-weight:400;
    }

    label.login2{
        font-size: 18px;
    }

     label.kiri{
        padding-bottom: 10%;
        float: right;
        font-size: 16px;
    }

    label.kanan{
        float: left;
        text-align: left;
    }
</style>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>Pengisian Form</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Form</span>
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

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="admintab-wrap edu-tab1 ">

                <ul  class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                    <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Masukkan Dokumen</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="TabProject" class="tab-pane in active animated flipInX custon-tab-style1">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-sales-chart">

                                <form method="post" id="formpinjam">

                                    <div class="form-group-inner">
                                        <div class="row">
                                            
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Tanggal Dokumen Masuk : </label>
                                            </div>

                                            <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                                                
                                                <input type="date" name="tglmasuk" class="form-control" required>
                                                
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="login2 pull-right pull-right-pro">Debitur : </label>
                                            </div>

                                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="input-group custom-go-button">
                                                                <span class="input-group-btn"><button onclick="modal()" type="button" class="btn btn-primary">Select</button></span>
                                                                <input type="text" placeholder="Pilih Debitur" class="form-control" name="debitur" required>
                                                                <input type="hidden" name="iddebitur" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                                                <button class="btn btn-custon-rounded-four btn-success" type="button" onclick="insert()">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal list debitur -->
<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog" style="width: 90% !important;">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Daftar Debitur Belum Memiliki Tanggal Masuk Dokumen</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="table table-responsive">
                    <table id="mytable" class="table border-table">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Debitur</th>
                                <th>No CIF</th>
                                <th>No APHT</th>
                                <th>Alamat</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="user">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal list debitur -->

<!-- modal detail Debitur -->
<div id="WarningModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog" style="width:55%;">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-3">
                <h4 class="modal-title">Detail User</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body" style="position: relative; overflow-y: auto; max-height: 400px;padding: 15px;">
                <div class="col-md-12">

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">Nama Debitur :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nmdeb"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">ctrl1 :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="ctrl1"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">ctrl2 :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="ctrl2"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">ctrl3 :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="ctrl3"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">cif_no :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="cif_no"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">note_no :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="note_no"></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">status :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="statuss"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">alamat_jmn :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="alamat_jmn"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">jenis_ikat :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="jenis_ikat"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">jen_dok_jm :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="jen_dok_jm"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">no_dok_jmn :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="no_dok_jmn"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">developer :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="developer"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">draw_no :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="draw_no"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">part_no :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="part_no"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">seq_no :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="seq_no"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">rc :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="rc"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">bi_code :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="bi_code"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">bii_code :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="bii_code"></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">tgl_ikat :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="tgl_ikat"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">no_ikat :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="no_ikat"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nm_notaris :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nm_notaris"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nm_asrk :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nm_asrk"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nopls_asrk :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nopls_asrk"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nilai_asrk :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nilai_asrk"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">jttmpoasrk :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="jttmpoasrk"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">bkclseasrk :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="bkclseasrk"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">sandi_wil :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="sandi_wil"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">unit_jmn :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="unit_jmn"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">luas_tanah :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="luas_tanah"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">luas_bang :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="luas_bang"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">exp_date :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="exp_date"></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nama_asj :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nama_asj"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">polis_asl :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="polis_asl"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nilai_asl :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nilai_asl"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">jt_tmp_asj :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="jt_tmp_asj"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">bk_cls_asj :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="bk_cls_asj"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">no_apht :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="no_apht"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">nilai_apht :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="nilai_apht"></label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <label class="kiri">tglapht :</label>
                        </div>
                        <div class="col-md-8">
                            <label class="kanan" id="tglapht"></label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer warning-md">
                <a data-dismiss="modal" href="#">Close</a>
                <input type="hidden" name="idsave" val="">
                <button class="btn btn-custon-four btn-success" onclick="pilihini(this)" style="padding: 10px 20px !important;">Pilih</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal detal -->

<script type="text/javascript">

     $(document).ready(function(e) {
    
    });

    $('#PrimaryModalhdbgcl').on('hidden.bs.modal', function () {
              $("#mytable").DataTable().destroy();
               $("#mytable > tbody > tr").remove();
            });

    function insert(){
        var tglmasuk = $("input[name='tglmasuk']").val();
        var iddeb = $("input[name='iddebitur']").val();
       
        if( (tglmasuk == "") || (iddeb == "") ){

            swal("GAGAL","Mohon diisi Semua","error");

        } else {

            var data = $("#formpinjam").serialize();

             // console.log(data);return false;

            var target = ("<?php  echo base_url('user/masukkantgldokumen')?>");

            $("#konten").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");


            $.ajax({
                method: "POST",
                url: target,
                data : data
            })
                .done(function(respond){

                    // console.log(respond); return false;
                    var json = JSON.parse(respond);

                    if(json.error == 0){

                        swal("Berhasil","Data Berhasil di Inputkan","success");

                        $("#formpinjam").find("input,textarea").val("");

                    } else {

                        swal("GAGAL","Gagal Input Data","error");

                    }

                })
                .fail(function() {

                    swal("GAGAL","Gagal Input Data","error");

                });

        }

        $("#konten").load("<?php echo base_url('user/masukkandokumen');?>");
    }


    function modal(){

        $("#mytable").DataTable().destroy();
        $("#mytable > tbody > tr").remove();

        var target = "<?php echo base_url('user/daftarusertgldokumen')?>";

        $.get(target, function(data) {

            var json = JSON.parse(data);
            
            $("#user").append(json.user);

            var table = $("#mytable").DataTable();

            $('#PrimaryModalhdbgcl').modal('show');            
            
        });

    }

    function ambiluser(obj){

        var id = $(obj).parents("tr").find("td:eq(0)").find("input[name='id']").val();
        var nama = $(obj).parents("tr").find("td:eq(1)").find("label").text();

        $(":input[name='iddebitur']").val(id);
        $(":input[name='debitur']").val(nama);
        

            $('#PrimaryModalhdbgcl').modal('hide');
    }

    function det(obj){

        var iddeb = $(obj).parents("tr").find("td:eq(0)").find("input[name='id']").val();
        $("input[name='idsave']").val(iddeb);
        
        var data = {
            iddeb :iddeb
        };

        var target = "<?php echo base_url('user/lihatdetaildebitur'); ?>";

        $.post(target, data, function(e){

            var json = JSON.parse(e);

                // console.log(json.isi[0].nilai_asrk);

                $("label#nmdeb").text(json.isi[0].pmlk_jmn);

                $("label#ctrl1").text(json.isi[0].ctrl1);

                $("label#ctrl2").text(json.isi[0].ctrl2);

                $("label#ctrl3").text(json.isi[0].ctrl3);

                $("label#cif_no").text(json.isi[0].cif_no);

                $("label#note_no").text(json.isi[0].note_no);

                $("label#statuss").text(json.isi[0].status);

                $("label#alamat_jmn").text(json.isi[0].alamat_jmn);

                $("label#jenis_ikat").text(json.isi[0].jenis_ikat);

                $("label#jen_dok_jm").text(json.isi[0].jen_dok_jm);

                $("label#no_dok_jmn").text(json.isi[0].no_dok_jmn);

                $("label#developer").text(json.isi[0].developer);

                $("label#draw_no").text(json.isi[0].draw_no);

                $("label#part_no").text(json.isi[0].part_no);

                $("label#seq_no").text(json.isi[0].seq_no);

                $("label#rc").text(json.isi[0].rc);

                $("label#bi_code").text(json.isi[0].bi_code);

                $("label#bii_code").text(json.isi[0].bii_code);

                $("label#tgl_ikat").text(json.isi[0].tgl_ikat);

                $("label#no_ikat").text(json.isi[0].no_ikat);

                $("label#nm_notaris").text(json.isi[0].nm_notaris);

                $("label#nm_asrk").text(json.isi[0].nm_asrk);

                $("label#nopls_asrk").text(json.isi[0].nopls_asrk);

                $("label#nilai_asrk").text(json.isi[0].nilai_asrk);

                $("label#jttmpoasrk").text(json.isi[0].jttmpoasrk);

                $("label#bkclseasrk").text(json.isi[0].bkclseasrk);

                $("label#sandi_wil").text(json.isi[0].sandi_wil);

                $("label#unit_jmn").text(json.isi[0].unit_jmn);

                $("label#luas_tanah").text(json.isi[0].luas_tanah);

                $("label#luas_bang").text(json.isi[0].luas_bang);

                $("label#exp_date").text(json.isi[0].exp_date);

                $("label#nama_asj").text(json.isi[0].nama_asj);

                $("label#polis_asl").text(json.isi[0].polis_asl);

                $("label#nilai_asl").text(json.isi[0].nilai_asl);

                $("label#jt_tmp_asj").text(json.isi[0].jt_tmp_asj);

                $("label#bk_cls_asj").text(json.isi[0].bk_cls_asj);

                $("label#no_apht").text(json.isi[0].no_apht);

                $("label#nilai_apht").text(json.isi[0].nilai_apht);

                $("label#tglapht").text(json.isi[0].tglapht);

        });

        $('#PrimaryModalhdbgcl').modal('hide');

        $("#WarningModalhdbgcl").modal("show");


    }

    function pilihini(obj){

        var id = $(obj).parent().find("input[name='idsave']").val()
        var nama = $("label#nmdeb").text();


        $(":input[name='iddebitur']").val(id);
        $(":input[name='debitur']").val(nama);
        

        $('#WarningModalhdbgcl').modal('hide');    

    }

 
</script>

