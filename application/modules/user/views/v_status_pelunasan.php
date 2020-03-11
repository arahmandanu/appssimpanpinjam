<style type="text/css">

    table#mytable tbody>tr>td{
        padding-top: 35px;
        padding-bottom: 35px; 
    }

    table#mytable tbody>tr>td[data]:hover{
        background-color: black;
    }

    label#status{
        border-radius: 40px;
        background: #e7ff65;
        padding: 5px;
        display:inline-block;
        color: #1e1f1f;
        font-weight:400;
    }

    label#statuss{
        border-radius: 40px;
        background: #a6d6ff;;
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
                            <h3>Status Pelunasan</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Status</span>
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
                    <col style="width: 10%;">
                    <col style="width: 35%;">
                    <col style="width: 35%;">
                    <col style="width: 20%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Debitur</th>
                            <th>Karyawan</th>
                            <th>Keterangan Pelunasan</th>
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

                            <td style="text-align: center;"><?php ($value->is_approve == 0)? print "<label id='status'>Menunggu Konfirmasi</label>" : print "<label id='statuss'>Sudah di Konfirmasi (Lunas)</label>"; ?></td>

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