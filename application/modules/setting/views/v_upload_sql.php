<style type="text/css">
    table#mytable tbody>tr>td{
        padding-top:35px;
        padding-bottom:35px;
    }

    label#status{
        color: #000;;
        border-radius: 40px;
        background: #a0e5f9;
        padding: 10px;
        display:inline-block;
        font-weight:400;
    }

    label.login2{
        font-size: 16px;
    }

</style>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>Download Data Debitur</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Download Data</span>
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
            <div class="product-sales-chart">

                <form method="post" id="formupload">

                    <div class="form-group-inner">
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Pilih Tanggal : </label>
                            </div>

                            <div class="col-lg-4 col-md-9 col-sm-9 col-xs-12">
                                
                                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Download" value="">
                                
                                
                            </div>

                            <div class="col-lg-5 col-md-9 col-sm-9 col-xs-12">
                                <button class="btn btn-custon-rounded-four btn-success" type="button" onclick="upload()"><i class="glyphicon glyphicon-upload"></i> Download</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function upload(){

        var tgldownload = $("input[name='tanggal']").val();


        if(tgldownload == ""){

            swal("Mohon Untuk Memilih Tanggal!","","error");

        } else {

        var data = {
            tgl : tgldownload
        };

        $("#konten").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");

        $.ajax({
                    url: '<?php echo base_url("setting/insertdatabaru"); ?>',
                    method: "POST",
                    data: data,
                })
                .done(function(e) {
                    var json = JSON.parse(e);

                    if(json.error == 0){
                        swal("Data Berhasil di Update",+json.count+" Data Baru","success");
                    } else if (json.error == 1) {
                        swal("Gagal Update Data","","error");
                    } else {
                        swal("Periksa Koneksi ODBC Anda","","error")
                    }
                })
                .fail(function() {
                    console.log("error");
                });

        $("#konten").load("<?php echo base_url('setting/Uploadmasterdata');?>");
        }

    }


</script>

