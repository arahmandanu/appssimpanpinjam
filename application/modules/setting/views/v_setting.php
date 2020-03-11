<style type="text/css">

    table#mytable tbody>tr>td{
        padding-top: 40px;
        padding-bottom: 40px; 
    }

    table#mytable tbody>tr>td[data]:hover{
        background-color: black;
    }
    
</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>List User</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Dashboard V.1</span>
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
            <div class="product-sales-chart">

                 <div class="button-ap-list responsive-btn" style="text-align: right;">

                    <div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10">
                        <button type="button" class="btn btn-custon-four btn-success" onclick="adduser()"><i class="glyphicon glyphicon-plus"></i> Tambah User</button>
                    </div>
                    
                </div>

                <hr>

                <div class="table table-responsive">

                <table id="mytable" class="table border-table"> 
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                            $no = 1;

                            foreach ($user->result() as $key => $value) { ?>
                            
                        <tr>

                            <td> <input type="hidden" name="id_user" value="<?php echo $value->id_user; ?>"> <?php echo $no; ?> </td>

                            <td> <?php echo $value->nama_user; ?></td>

                            <td> <?php echo $value->email_user; ?></td>

                            <td> <?php echo $value->username; ?></td>

                            <td> <?php echo $value->previleg; ?></td>

                            <td style="text-align: center;"> <button onclick="edit(this)" data="<?php echo site_url('setting/edituser/'.$value->id_user) ?>" class="btn btn-custon-four btn-warning" type="button"> <i class="glyphicon glyphicon-pencil"></i></button> <button onclick="hapus(this)" class="btn btn-custon-four btn-danger" type="button"><i class="glyphicon glyphicon-trash"></i></button> <button onclick="reset(this)" class="btn btn-custon-four btn-default"><i class="glyphicon glyphicon-refresh"></i> Reset</button> </td>

                        </tr>

                        <?php $no++; } ?>
                        
                    </tbody>
                </table>

                </div>
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        $("#mytable").DataTable();
    } );


    function edit(obj){

        var target = $(obj).attr("data");

        $.post(target, "" , function(e){

            // console.log(e);   

             $("#konten").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");

            setTimeout(function(){
            var target = "<?php echo base_url('setting/tambahuser')?>";
            $("#konten").html(e);

            },500);
        
        });


    }

    function hapus(obj){

        swal({
          title: "Are you sure?",
          text: "Anda akan menghapus data user ini!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            var id = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_user']").val();

            var data = {
                id_user :id
            };

            var target = "<?php echo base_url('setting/hapususer'); ?>";

            $.post(target, data, function(e){


            });
            

            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });

          } else {

            // swal("Batal Menghapus Data User ini");
          }

        });

    }

    function adduser(){

        $("#konten").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");

        setTimeout(function(){

        var target = "<?php echo base_url('setting/tambahuser')?>";
        $("#konten").load(target);

        },1000);

        
    }

    function reset(obj){

        swal({
          title: "Are you sure?",
          text: "Apa Anda Ingin Mereset Password Untuk User Ini?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            var iduser = $(obj).parents("tr").find("td:eq(0)").find("input[name='id_user']").val();

            var data = {
                iduser:iduser
            }

            var target = "<?php echo base_url('setting/resetpass'); ?>";

            $.post(target, data , function(e){

                var json = JSON.parse(e);

                if(json.error == 1){

                    swal("Terjadi Kesalahan", {
                      icon: "error",
                    });

                } else {

                    swal("Reset Password Berhasil", {
                      icon: "success",
                    });
                }

            });            

          } else {

            // swal("Batal Menghapus Data User ini");
          }

        });

    }

</script>