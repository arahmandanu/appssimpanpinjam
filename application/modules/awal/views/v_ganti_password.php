<div class="container-fluid">
    <div class="row" style="padding-top: 10%;">
        <div class="col-lg-12">
            <div class="product-sales-chart">

                <form method="post" id="formpass">

                    <div class="form-group-inner">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Masukkan Password Lama : </label>
                            </div>

                            <div class="col-lg-5 col-md-9 col-sm-9 col-xs-12">
                                <input type="Password" name="old" class="form-control">
                            </div>

                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Masukkan Password Baru : </label>
                            </div>

                            <div class="col-lg-5 col-md-9 col-sm-9 col-xs-12">
                                <input type="Password" name="new" class="form-control">
                            </div>

                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Konfirmasi Password Baru : </label>
                            </div>

                            <div class="col-lg-5 col-md-9 col-sm-9 col-xs-12">
                                <input type="Password" name="new2" class="form-control">
                            </div>

                        </div>
                    </div>

                     <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="text-align: right;">
                                <button class="btn btn-custon-rounded-four btn-success" type="button" onclick="gantipass()">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

     $("input[name='new'],input[name='new2']").focus(function(){
         $("input[name='new'],input[name='new2'],input[name='old']").removeAttr('style');
    });

    function gantipass(){

        var old = $("input[name='old']").val();
        var npass = $("input[name='new']").val();
        var npass2 = $("input[name='new2']").val();

        if((old=="")||(npass=="")||(npass2=="")){

            swal("Mohon Isi Semuanya","","error");

        } else {

            if(npass!=npass2){

                swal("Konfirmasi Password Tidak Sesuai","","error");

                $("input[name='new'],input[name='new2']").attr('style', 'border: 1px solid #ed5565;');

            } else {

                var data = $("#formpass").serialize();

                var target = "<?php echo base_url('awal/gantipass');?>";

                $.post(target, data, function(e){

                    var json = JSON.parse(e);

                    if(json.error == 0 ){
                        swal("Password Berhasil Diubah","","success");
                    } else if(json.error = 2 ) {
                        swal("Pasword Lama Anda Tidak Sesuai");
                         $("input[name='old']").attr('style', 'border: 1px solid #ed5565;');                        
                    } else {
                        swal("Gagal Ubah Password","","error");
                    }

                });
            }
        }
    }


</script>