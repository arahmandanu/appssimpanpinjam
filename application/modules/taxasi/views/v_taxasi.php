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
                            <h3>Order Taxasi</h3>
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
        <div class="col-lg-12" style="text-align: center;">
            <div style="text-align: center !important;background: #fdf8b6;display: inline-block;padding: 1%;box-shadow: 5px 10px #888888;">
                <h4 style="border-bottom: 1px solid black;display: inline-block;">Silahkan Pilih Kegiatan</h4>
                <div style="padding-top:2%;" id="menu">
                    <button class="btn btn-custon-rounded-three btn-default btn-lg" onclick="pilih(this, 'taksasi')">Order Taksasi</button>
                    <button class="btn btn-custon-rounded-three btn-default btn-lg" onclick="pilih(this, 'tkota')">Cek Tata Kota</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="formorder" style="padding-top: 2%;"></div>    

<script type="text/javascript">

     $(document).ready(function(e) {
    
    });

    $('#PrimaryModalhdbgcl').on('hidden.bs.modal', function () {
            $("#mytable").DataTable().destroy();
            $("#mytable > tbody > tr").remove();
            });

    function pilih(obj, target){

        $("#formorder").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");

        var link = "<?php echo base_url()?>taxasi/" + target  ;

        //Ubah Bentuk Tombol saat di Pencet
        var menu = $("#menu").find("button");

            menu.attr({
                class: 'btn btn-custon-rounded-three btn-default btn-lg'  
            });

        //Ubah Warna Tombol
        $(obj).attr({
            class: 'btn btn-custon-rounded-three btn-success btn-lg',
        });;

        $("#formorder").load(link);

    }

</script>

