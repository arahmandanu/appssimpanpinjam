<style type="text/css">

    table#mytable tbody>tr>td{
        padding-top: 40px;
        padding-bottom: 40px;
    }

    label#status{
        border-radius: 40px;
        background: #98f992;
        padding: 5px;
        display:inline-block;
        color: #1e1f1f;
        font-weight:400;
    }

</style>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>Daftar Pinjaman</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Menu Pengembalian</span>
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
            <div class="product-sales-chart" style="box-shadow: 0px 4px 4px 3px black;">
                <div class="table table-responsive">

                <table id="mytable" class="table border-table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Debitur</th>
                            <th style="text-align: center">Status</th>
                            <th>Keterangan</th>
                            <th>Alasan</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $no=1; foreach ($pinjam->result() as $key => $value) { ?>
                            
                            <tr>

                                <td><?php echo $no; ?><input type="hidden" name="iduniq" value="<?php echo $value->id_debitur; ?>"></td>

                                <td><?php echo $value->pmlk_jmn; ?> rahmandanu dkasdasjdkas</td>

                                <td style="text-align: center;"><?php ($value->is_approve == 1) ? print "<label id='status'>Approve</label>" : print "<label id='status'>Prosses</label>"; ?></td>

                                <td><?php echo $value->ket_pinjam; ?></td>

                                <td><?php echo $value->alasan_pinjam; ?></td>

                                <td style="text-align: center;"><?php ($value->is_note == 1) ?  ($value->is_kembali == 0) ? print "<button type='button' class='btn btn-custon-four btn-default' onclick='haha(this)'>Tutup</button>
                                    <label id='status' style='display:none;'></label>" : print "<label id='status'>Konfirmasi Penutupan</label>" :  "" ; ?></td>

                            </tr>    


                        <?php $no++; }; ?>
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
            { sWidth: '17%' },
            { sWidth: '7%' },
            { sWidth: '23%' },
            { sWidth: '10%' },
            { sWidth: '7%' }
          ]
        });
    });

    function haha(obj){

        swal({

                title: "Pemberitahuan!",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,

            }).then((willDelete) => {
                if (willDelete) {
                    var id = $(obj).parents("tr").find("td:eq(0)").find("input[name='iduniq']").val();
                    //console.log(id);

                    var data = {

                            id_uniq : id

                        };

                    var target = "<?php echo base_url('user/selesaipinjaman'); ?>";

                    $.post(target , data, function(e){

                        var json = JSON.parse(e);

                        if(json.error == 0) {
                            // succes
                             swal("Berhasil Meminta Izin Pengembalian", { icon: "success", });

                             $(obj).parent().find("label[id='status']").text('Dikembalikan');

                             //display label
                             $(obj).parent().find("label[id='status']").removeAttr('style');

                             // hide tombol
                             $(obj).attr({
                                    Style: 'display:none;'
                                    });

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