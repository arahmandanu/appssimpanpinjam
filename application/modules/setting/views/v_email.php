<style type="text/css">

    table#mytable tbody>tr>td{
        padding-top: 40px;
        padding-bottom: 40px; 
    }

    table#mytable tr.even{
        background-color: #ffffd1 !important;
    }
    
    input.form-control{
        border-radius: 15px 50px;
        background: #d4d8d8;
        padding: 20px;
        font-family: monospace;
        font-weight: 500;
        color: black;
    }

    select.form-control{
        border-radius: 15px 50px;
        background: #d4d8d8;
        font-family: monospace;
        font-weight: 500;
        color: black;
    }
</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>List Email Notifikasi</h3>
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
                       <button type="button" class="btn btn-custon-four btn-success" onclick="newrow(this)"><i class="glyphicon glyphicon-plus"></i> Add Email</button>
                    </div>

                </div>

                <hr>

                <div class="table table-responsive">

                <table id="mytable" class="table border-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                            $no = 1;

                            foreach ($email->result() as $key => $value) { ?>
                            
                        <tr>

                            <td style="vertical-align: middle; "> <?php echo $no;?> <input type="hidden" name="idemail" value="<?php echo $value->id; ?>"> </td>

                            <td> <input class="form-control" type="text" name="nama" value="<?php echo $value->nama;?>"> </td>

                            <td> <input class="form-control" type="text" name="email" value="<?php echo $value->email;?>"> </td>

                            <td>  <select class="form-control" id="statusemail" >

                                        <option <?php if ($value->status == 0 ) echo 'selected' ?> value="0">Off</option>
                                        <option <?php if ($value->status == 1 ) echo 'selected' ?> value="1">On</option>

                                    </select> </td>

                            <td> <button onclick="simpan(this)" class="btn btn-custon-two btn-success" type="button" ><i class="glyphicon glyphicon-floppy-disk"></i>Save</button> <button class="btn btn-custon-four btn-danger" type="button" onclick="hapus(this)"><i class="glyphicon glyphicon-trash"></i>Hapus</button> </td>

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
    $(document).ready( function(){
        $("#mytable").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '5%' },
            { sWidth: '20%' },
            { sWidth: '20%' },
            { sWidth: '7%' },
            { sWidth: '12%' }
          ]
        });
    });

    function simpan(obj){

        var idemail = $(obj).parents("tr").find("td:eq(0)").find("input[name='idemail']").val();
        var nama = $(obj).parents("tr").find("td:eq(1)").find("input[name='nama']").val();
        var email = $(obj).parents("tr").find("td:eq(2)").find("input[name='email']").val();
        var status = $(obj).parents("tr").find("td:eq(3)").find("#statusemail :selected").val();

        var data= {
            idemail :idemail,
            nama : nama,
            email:email,
            status:status
        }       

        var target = "<?php echo base_url('setting/simpaneditemail'); ?>";

        $.post(target, data, function(e){

            var json = JSON.parse(e);

            if(json.error == 1){
                swal("Gagal Edit Data","","error");
            } else {
                swal("Berhasil Edit Data","","success");
            }
            
        });

    }

    function hapus(obj){

        swal({
                title: "Pemberitahuan!",
                text: "Apakah Anda Ingin Menghapus Data Ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var idemail = $(obj).parents("tr").find("td:eq(0)").find("input[name='idemail']").val();

                    var data = {
                        idemail:idemail
                    }

                    var target = "<?php echo base_url('setting/hapusemail'); ?>";

                    $.post(target, data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 1){

                            swal("Gagal Hapus Data","","error");

                        } else {

                            swal("Berhasil Hapus Data","","success");
                            $(obj).parents("tr").remove();
                            
                        }
                    });

                } else {
                    // swal("Dibatalkan!");
                }
         });            
    }

    function newrow(obj){

        var cekrow = $("#mytable tr").length;
        console.log(cekrow);

        var table = document.getElementById("mytable");

        var row = table.insertRow(cekrow);

        row.setAttribute("role", "newdata");

       
            var col0 = row.insertCell(0);
            var col1 = row.insertCell(1);
            var col2 = row.insertCell(2);
            var col3 = row.insertCell(3);
            var col4 = row.insertCell(4);

        col0.innerHTML = cekrow+"<input type='hidden' name='idemail' value=''>";
        col1.innerHTML = "<input class='form-control' type='text' name='nama' value=''>";
        col2.innerHTML = "<input class='form-control' type='text' name='email' value=''>";
        col3.innerHTML = "<select class='form-control' id='statusemail'><option value='0'>Off</option><option value='1'>On</option></select>";
        col4.innerHTML = "<button style='display:none;' onclick='simpan(this)' class='btn btn-custon-two btn-success' type='button' ><i class='glyphicon glyphicon-floppy-disk'></i>Save</button> <button style='display:none;' class='btn btn-custon-four btn-danger' type='button' onclick='hapus(this)'><i class='glyphicon glyphicon-trash'></i>Hapus</button>  <button onclick='simpanbaru(this)' class='btn btn-custon-four btn-warning' type='button' ><i class='glyphicon glyphicon-ok'></i> Add</button> <button class='btn btn-custon-four btn-danger' type='button' onclick='hapusrow(this)'><i class='glyphicon glyphicon-remove'></i> Cancel</button>";

        // console.log(obj);

    }

    function simpanbaru(obj){

        var nama = $(obj).parents("tr").find("td:eq(1)").find("input[name='nama']").val();
        var email = $(obj).parents("tr").find("td:eq(2)").find("input[name='email']").val();
        var status = $(obj).parents("tr").find("td:eq(3)").find("#statusemail :selected").val();

        var data = {
            nama:nama,
            email:email,
            status:status
        }

        var target = "<?php echo base_url('setting/simpanbaruemail'); ?>";

        $.post(target, data, function(e) {

            var json = JSON.parse(e);

            if(json.error==1){

                swal("Gagal Insert Data" , "" ,"error");

            } else {
                // Hide Button sebelumnya
                $(obj).parent().find("button:eq(2)").attr('style', 'display:none;');
                $(obj).parent().find("button:eq(3)").attr('style', 'display:none;');

                // Tampilkan Button Baru
                $(obj).parent().find("button:eq(0)").removeAttr("style");
                $(obj).parent().find("button:eq(1)").removeAttr("style");


                swal("Data Berhasil di Inputkan","","success");

            }

        });
        

    }

    function hapusrow(obj){

        $(obj).parents("tr").remove();
    }
</script>