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
                            <h3>Edit User</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Edit User</span>
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

                <form method="post" id="formpinjam">

                    <div class="form-group-inner">
                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Nama User : </label>
                            </div>

                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->row()->nama_user; ?>">
                                <input type="hidden" name="id_user" value="<?php echo $user->row()->id_user;?>">
                            </div>

                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Username : </label>
                            </div>

                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->row()->username; ?>">
                                
                            </div>

                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Email : </label>
                            </div>

                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->row()->email_user; ?>">
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Password : </label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                <input type="Password" name="password" class="form-control" placeholder="Password" value="">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Konfirmasi Password : </label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                <input type="password" name="password2" class="form-control" placeholder="Konfirmasi Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Level User : </label>
                            </div>
                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="level">
                                    <option <?php if($user->row()->previleg == "user" ){ echo "selected";} ?> value="user">User</option>
                                    <option <?php if($user->row()->previleg == "admin" ){ echo "selected";} ?> value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="text-align: right;">

                                <button class="btn btn-custon-rounded-four btn-success" type="button" onclick="saveedit()"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                                
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $("input[type='password']").focus(function(){
         $("input[type='password']").removeAttr('style');
    });

    $('#PrimaryModalhdbgcl').on('hidden.bs.modal', function () {
              $("#mytable").DataTable().destroy();
               $("#mytable > tbody > tr").remove();
            });

    $(document).ready(function(e) {

    });

    function saveedit(){

        var nama = $("input[name='Nama']").val();
        var username = $("input[name='username']").val();
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var password2 = $("input[name='password2']").val();
        var level = $("select[name='level']").val();
        var id_user = $("input[name='id_user']").val();

       
        // console.log(nama + username + email + password + level +password2); 

        if( (nama == "") || (username == "") || (email == "") || (password == "") ){

            swal("GAGAL","Mohon diisi Semua","error");

        } else {

            if(password != password2){

               swal("GAGAL","Password tidak sesuai dengan yang di konfirmasi","error"); 

               $("input[type='password']").attr('style', 'border: 1px solid #ed5565;');

            } else {

                var data = $("#formpinjam").serialize() ;

                // console.log(data);return false;

                var target = "<?php  echo base_url('setting/simpanedituser')?>";

                $.post(target, data , function(e) {

                    var json = JSON.parse(e);

                    console.log(json);

                    if(json.status == "ada"){

                        swal("Gagal","Username Sudah Dipakai","error");

                    } else if (json.status == "error") {

                        swal("Gagal","Gagal Input User","error");
                        
                    } else {

                        swal("Profile User Berhasil di Update", { icon: "success", });

                        
                         $("#konten").html("<div class='loadingpage'><br><img src='<?php echo site_url("vendors/ajax-loader.gif")?>' /><div style='color:#555;'>Please wait . . .</div></div>");    
                         
                        $("#konten").load("<?php echo base_url('setting/main') ?>");   
                    }

                });

            }

        }

    }

</script>

