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
        font-size: 14px;
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

    .form-group-inner {
    margin-bottom: 7px;
    }

    form#formcektatakota input{
        border: none;
        border-bottom: 1px dashed black;
    }

    label#radio{
        font-size: 14px;
    }

    table#isian{
        width: 250px;
    }

    table#isian tr>td{
        padding: 10px;
    }
    input[type=checkbox]{
        box-shadow: none;
    }

    input[type=checkbox][value~=no] {
        display: none;
    }


</style>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width: 100%;padding-bottom: 6.5%">
    <div class="product-sales-chart" style="box-shadow: 0px 8px 9px 1px #888">
        <div class="col-lg-12" style="text-align:center; padding:10px;"><h4 style="border-bottom: 1px solid black;display: inline-block;">PERMOHONAN PENGECEKAN DOKUMEN</h4></div>
        

        <form method="post" id="formcektatakota" style="max-width: 100%;">

            <div class="form-group-inner">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Divisi/BU/Cabang : </label>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <input type="text" name="divisi" class="form-control" required placeholder="Divisi/BU/Cabang">
                    </div>

                </div>
            </div>

            <div class="form-group-inner">
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Segment Loan : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        
                        <input type="text" name="segment" class="form-control" required placeholder="Segment Loan">
                        
                    </div>

                </div>
            </div>

            <div class="form-group-inner">
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Tanggal Order : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        <input type="date" name="mulai" class="form-control" required>
                    </div>

                </div>
            </div>

            <hr>

            <div class="form-group-inner" >
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Nama Nasabah : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        
                        <input type="text" name="nasabah" class="form-control" required placeholder="Nama Nasabah">
                        
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        
                        <button class="btn btn-custon-rounded-four btn-default" type="button" onclick="findnasabah(this)"><i class="glyphicon glyphicon-user"></i> Find</button>
                        
                    </div>

                </div>
            </div>

            <div class="form-group-inner" >
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">No Rekening : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        
                        <input type="text" name="no_rekening" class="form-control" required placeholder="No Rekening">
                        
                    </div>

                </div>
            </div>


            <div class="form-group-inner">
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Jenis Pengecekan : </label>
                    </div>

                    <div class="col-lg-5 col-md-9 col-sm-9 col-xs-12">
                        
                        <input type="radio" name="penilaian" value="Baru" checked><label id="radio" style="padding-right:25px;">Cek tata Kota(Cek Planning)</label> 
                        <input type="radio" name="penilaian" value="Ulang"><label id="radio">BPKB</label>
                        
                    </div>

                </div>
            </div>


            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Alamat Jaminan : </label>
                    </div>
                    <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                        <textarea type="text" class="form-control" name="alamat_jaminan" style="height:100px;" required></textarea>
                    </div>
                </div>
            </div>

     
            <div class="form-group-inner" >
                <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Kode Pos : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="pos" class="form-control" required placeholder="Kode Pos">
                    </div>

                </div>
            </div>

            <!-- Inputan Pilihan Pada Order Taksasi -->
            <div class="form-group-inner">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="admintab-wrap edu-tab1 mg-t-30" style="text-align:center;">

                            <ul id="isian" class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1" style="display: inline-block;">
                                <li class="active"><a data-toggle="tab" href="#tanah"><span class="edu-icon edu-analytics tab-custon-ic"></span>Tanah dan bangunan atau property</a>
                                </li>
                                <li><a data-toggle="tab" href="#kendaraan"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Kendaraan Bermotor</a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div id="tanah" class="tab-pane in active  custon-tab-style1" style="text-align: -webkit-center; text-align: -moz-center;">
                                    <table border="1" class="table-responsive" id="isian">
                                        <tr style="background-color: aqua;">
                                            <td colspan="2" style="text-align:center;">Tanah dan bangunan atau property</td>
                                        </tr>
                                        <tr style="background-color: aqua;">
                                            <td style="text-align:center;">Dokumen</td>
                                            <td>(&radic;)</td>
                                        </tr>
                                        <tr>
                                            <td><span>Copy Sertifikat</span></td>
                                            <td>
                                                <input type="checkbox" name="sertifikat_tanah" value="yes">
                                                <input type="checkbox" name="sertifikat_tanah" value="no" checked>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Laporan Apprasial</sup></td>
                                            <td>
                                                <input type="checkbox" name="apprasial_tanah" value="yes">
                                                <input type="checkbox" name="apprasial_tanah" value="no" checked>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div id="kendaraan" class="tab-pane custon-tab-style1" style="text-align: -webkit-center;text-align: -moz-center;">
                                    <table border="1" class="table-responsive" id="isian">
                                        <tr style="background-color: aqua;">
                                            <td colspan="2" style="text-align:center;">Kendaraan Bermotor</td>
                                        </tr>
                                        <tr style="background-color: aqua;">
                                            <td style="text-align:center;">Dokumen</td>
                                            <td>(&radic;)*)</td>
                                        </tr>
                                        <tr>
                                            <td><span>Copy BPKB*)</span></td>
                                            <td>
                                                <input type="checkbox" name="bpkb_kendaraan" value="yes" required>
                                                <input type="checkbox" name="bpkb_kendaraan" value="no" checked>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Copy STNK</span></td>
                                            <td>
                                                <input type="checkbox" name="stnk_kendaraan" value="yes">
                                                <input type="checkbox" name="stnk_kendaraan" value="no" checked>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Input Pilihan -->

            <div class="form-group-inner" style="padding-top:5%; padding-left: 15%;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       &#42;&#41;<b>Asli</b> BPKB wajib diserahkan ke petugas apprasial pada tanggal site visit ke SAMSAT/POLDA 
                    </div>
                </div>
            </div>

            <div class="form-group-inner" >
                <div class="row">
                    <h4 style="text-align: center"><b>Diajukan Oleh (Wajib Diisi) :</b></h4>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Account Officer : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        
                        <input type="text" name="acc_oficer" class="form-control" required placeholder="Nama Lengkap">
                        
                    </div>

                </div>
            </div>

            <div class="form-group-inner" >
                <div class="row">
                   
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Team Leader : </label>
                    </div>

                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-12">
                        
                        <input type="text" name="t_leader" class="form-control" required placeholder="Nama Team Leader">
                        
                    </div>

                </div>
            </div>

            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: right;padding-top: 5%;">
                        <button class="btn btn-custon-rounded-four btn-success" type="button" onclick="insert()">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

  
<!-- modal list debitur -->
<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog" style="width: 90% !important;">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Silahkan pilih debitur yang akan dipinjam</h4>
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
                                <th>Nasabah</th>
                                <th>Alamat Jaminan</th>
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



<script type="text/javascript">

    $(document).ready(function(e) {
        $.scrollUp();
    });

    $('#PrimaryModalhdbgcl').on('hidden.bs.modal', function () {
              $("#mytable").DataTable().destroy();
               $("#mytable > tbody > tr").remove();
            });

    // Ngubah Warna Jadi Item saat di klick 
    var ipt = $("form#formcektatakota").find("input[type=text][required], input[type=date][required], textarea[required]");
        ipt.each(function(index, el) {
            ipt[index].onclick=function(){
                if($(this).prop("tagName") == "INPUT"){
                    $(this).css('border-bottom', '1px dashed black' );
                }
                else if ($(this).prop("tagName") == "TEXTAREA") {
                    $(this).css('border', '1px solid black' );
                }
            }
        });
    // End Ngubah Warna Inputan

    // Ngilangin Yang Di Cek Kalo Pindah Pilihan
    var ilangin = $("form#formcektatakota").find("ul#isian").find("li");
        for(i=0; i<ilangin.length; i++ ){
           ilangin[i].onclick = function(el){

            var radyes= $("div.tab-content").find("input[type=checkbox][value=yes]");
            radyes.prop('checked', false);

            var radno = $("div.tab-content").find("input[type=checkbox][value=no]");
            radno.prop('checked',true);

            var baris3 = $("div.tab-content").find("tr:nth-child(n+3)");
                baris3.find("span").attr('style', 'color:black');

           }
        }
    // End Ngilangin yang di cek

    // Balikin Cek Ke No kalo Di klik lagi    
    var ubah = $("div.tab-content").find("input[type=checkbox][value=yes]");
        ubah.each(function(index, el) {
            ubah[index].onclick = function(){

                var x = $(this).is(":checked");
                if(x == true){
                    $(this).parent("td").find("input[type=checkbox][value=no]").prop("checked",false);
                } else {
                    $(this).parent("td").find("input[type=checkbox][value=no]").prop("checked",true);
                }

            };
        });
    //End Balikin cek kalo di klick lagi

    function insert(){
        var error = false;

        // Validasi Inputan Text
        var ipttext = $("form#formcektatakota").find("input[type=text][required], input[type=date][required], textarea[required]");
            ipttext.each(function(index, el) {
                var txt = $(this).val();
                    if(txt == ""){
                        console.log($(this).prop("tagName"));
                        if($(this).prop("tagName") == "TEXTAREA"){
                            $(this).css('border', '1px solid red');
                        }
                        else if ($(this).prop("tagName") == "INPUT") {
                            $(this).css('border-bottom', '1px dashed red' );
                        } 

                       error = true;
                    }
            });
        // End Validasi Inputan Text

        // Validasi Isian ISIAN LI
        var li = $("ul#isian").find("li.active").find("a").attr("href");
            li = li.substring(1, li.length);

        var cekrad = $("div.tab-content").find("div#"+li+"").find("input[type=checkbox][value=yes][required]");
            cekrad.each(function(index, el) {
                var tes1 = $(this).is(":checked");
                    if(tes1 != true){
                        $(this).parents("tr").find("td:eq(0)").find("span").css('color', 'red');
                        error = true;
                    }
            });
        // END Validasi ISIAN LI

        if(error == true){
            swal("Mohon Isi Data Yang Diperlukan","","error");
        }
        else {

            var data = $("form#formcektatakota").serializeArray();
                data.push({"name": 'jenis', "value" : li});

            $.ajax({
                url: '<?php echo base_url('taxasi/ordertkota') ?>',
                type: 'POST',
                data: data,
            })
            .done(function(e) {
                
                var status = JSON.parse(e);

                if(status.error == 0){
                    swal("Data Berhasil Dimasukkan","","success");
                    var url = "<?php echo base_url('taxasi/cetakordertkota?id_ordertkota=')?>"+status.id_tkota+"&jenis="+status.jenis+"";
                    console.log(url);false;
                    window.open( url, "_blank");
                }
                else{
                    swal("Error","","error");
                }

                $("form#formcektatakota").find("input[type=text],textarea[type=text],input[type=date]").val("");
                
            })
            .fail(function() {
             // console.log(error);
            });
            
            $("div#formorder").empty();
        }
    }





     function findnasabah(obj){

            $("#mytable").DataTable().destroy();
                $("#mytable > tbody > tr").remove();

                var target = "<?php echo base_url('taxasi/daftarnasabah')?>";

                $.get(target, function(data) {

                    // console.log(data);

                    var json = JSON.parse(data);
                    
                    $("#mytable > tbody#user").append(json.user);

                    var table = $("#mytable").DataTable();

                    $('#PrimaryModalhdbgcl').modal('show');
                    
                });

    }

    function ambiluser(obj){
        var id = $(obj).parents("tr").find("td:eq(0)").find("input[name=id]").val();
            nama = $(obj).parents("tr").find("td:eq(1)").find("label[id=nama]").text();
            alamat = $(obj).parents("tr").find("td:eq(2)").find("label[id=alamat]").text();

        $("form#formcektatakota").find("input[name=nasabah]").val(nama);
        $("form#formcektatakota").find("textarea[name=alamat_jaminan]").text(alamat);

        $('#PrimaryModalhdbgcl').modal('hide');
    }
</script>

