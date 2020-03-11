<style type="text/css">
    
    table#mytable tbody>tr>td{
        padding-top: 40px;
        padding-bottom: 40px;
    }

</style>
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-8 col-md-3 col-sm-6 col-xs-12">
                            <h3>Daftar Peminjaman (<label id="judul" style="font-style: italic;">-</label> )</h3>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Daftar Cetak</span>
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
            <div class="product-sales-chart" style="box-shadow:1px 3px 6px 1px black">

                <div class="button-ap-list responsive-btn">

                    <div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10">
                        <button type="button" class="btn btn-default" onclick="nocover(this)"><span>Belum Ada Cover Note</span></button>
                        <button type="button" class="btn btn-default" onclick="allpinjam(this)"><span>Di Pinjam</span></button>
                        <button type="button" class="btn btn-default" onclick="bataswaktu(this)"><span>Melebihi Batas Peminjaman</span></button>
                    </div>

                    <div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10" style="float: right;">
                        <a href="" id="cetak"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button></a>
                    </div>
                    
                </div>


                <hr>

                <div class="table table-responsive">

                <table id="mytable" class="table border-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Debitur</th>
                            <th>Peminjam</th>
                            <th>Barang dipinjam</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                        </tr>
                    </thead>

                    <tbody id="tablepeminjaman">

                    </tbody>

                </table>
                
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(e) {
        $("#mytable").DataTable({
            "language": {
                "emptyTable" : "Silahkan tekan tombol untuk memilih yang ingin ditampilkan"
            }
        });

        $("a[id='cetak']").attr('style', 'display:none');

           });

    function nocover(obj){

        $("a[id='cetak']").removeAttr('style');

        var a = $("button[class='btn btn-primary']");
            a.attr('class', 'btn btn-default');

        $(obj).attr('class', 'btn btn-primary');


        $("#judul").text("");
            var judul = $(obj).find("span").text();
        $("#judul").text(judul);

        var table = $("#mytable").DataTable();
            table.destroy();
            $("#mytable > tbody > tr").remove();


        var target = "<?php echo base_url('debitur/getnocover'); ?>";   

        $.get(target , function(data){            

            var json = JSON.parse(data);
            // console.log(json.isi);

            $("#tablepeminjaman").append(json.isi);

                var table = $("#mytable").DataTable({
                "language": {
                        "emptyTable" : "Semua Peminjaman Sudah Memiliki Cover Note"
                        }
                });

            });

        var bcetak = $("a[id='cetak']");

        bcetak.attr({
            href: '<?php echo base_url('debitur/printdata/nocover');?>'
        });

    }

    function bataswaktu(obj){

        $("a[id='cetak']").removeAttr('style');

        var a = $("button[class='btn btn-primary']");
            a.attr('class', 'btn btn-default');

        $(obj).attr('class', 'btn btn-primary');

        $("#judul").text("");
            var judul = $(obj).find("span").text();
        $("#judul").text(judul);

        var table = $("#mytable").DataTable();
            table.destroy();
            $("#mytable > tbody >tr").remove();

        var target = "<?php echo base_url('debitur/getlebihbataswaktu'); ?>";

        $.get(target, function(data){

            var json = JSON.parse(data);
            // console.log(json.isi);

            $("#tablepeminjaman").append(json.isi);

            var table = $("#mytable").DataTable({
            "language": {
                            "emptyTable" : "Peminjaman Tidak Ada Yang Melebihi Batas Waktu",
                    }
            });

        });

        var bcetak = $("a[id='cetak']");

        bcetak.attr({
            href: '<?php echo base_url('debitur/printdata/waktu');?>'
        });
        

    }

    function cetak(obj){

        var jenis = $(obj).attr('print');

        data = {

            jenis:jenis

        }

        var target = "<?php echo base_url('debitur/printdata') ;?>";

        $.post(target, data, function(e){

            console.log(e);

        });

        
    }

    function allpinjam(obj){

        $("a[id='cetak']").removeAttr('style');

        var a = $("button[class='btn btn-primary']");
            a.attr('class', 'btn btn-default');

        $(obj).attr('class', 'btn btn-primary');

        $("#judul").text("");
            var judul = $(obj).find("span").text();
        $("#judul").text(judul);

        var table = $("#mytable").DataTable();
            table.destroy();
            $("#mytable > tbody >tr").remove();

        var target = "<?php echo base_url('debitur/allpinjam'); ?>";

        $.get(target, function(data){

            var json = JSON.parse(data);
            // console.log(json.isi);

            $("#tablepeminjaman").append(json.isi);

            var table = $("#mytable").DataTable({
            "language": {
                            "emptyTable" : "Tidak Ada Peminjaman Yang Berlangsung",
                    }
            });

        });

        var bcetak = $("a[id='cetak']");

        bcetak.attr({
            href: '<?php echo base_url('debitur/printdata/semua');?>'
        });

    }

</script>