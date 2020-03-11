<style type="text/css">

    table#mytable tbody>tr>td{
        padding-top: 35px;
        padding-bottom: 35px; 
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
                            <h3>History Peminjaman</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Peminjaman Saya</span>
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
                <div class="table table-responsive">
                <table id="mytable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Debitur</th>
                            <th>Peminjam</th>
                            <th>Keterangan Pinjam</th>
                            <th>Alasan Pinjam</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                            $no = 1;

                            foreach ($history->result() as $key => $value) { ?>
                            
                        <tr>

                            <td><?php echo $no; ?></td>

                            <td><?php echo $value->pmlk_jmn; ?></td>

                            <td><?php echo $value->nama_user; ?></td>

                            <td><?php echo $value->ket_pinjam; ?></td>

                            <td><?php echo $value->alasan_pinjam; ?></td>

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
</script>