<style type="text/css">

    table#mytable tbody>tr>td{
        padding-top: 40px;
        padding-bottom: 40px; 
    }

    table#mytable tbody>tr>td[data]:hover{
        background-color: black;
    }
    label#status{
        border-radius: 40px;
        background: #c1ff9a;
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
                            <h3>List Semua Debitur</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Daftar Debitur</span>
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

                <div class="button-ap-list responsive-btn">

                    <div class="btn-group btn-custom-groups btn-custom-groups-one btn-mg-b-10">
                        <a href="<?php echo base_url('debitur/cetaklistdebitur') ?>" id="cetak"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"> Excel</span></button></a>
                    </div>

                </div>

                <hr>


                <div class="table table-responsive">

                <table id="mytable" class="table border-table"> 
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Debitur</th>
                            <th>Alamat Jaminan</th>
                            <th>Jenis Ikat</th>
                            <th>Jenis Dok</th>
                            <th>No Dokumen</th>
                            <th>Developer</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                            $no = 1;

                            foreach ($debitur->result() as $key => $value) { ?>
                            
                        <tr <?php ($value->is_pinjam ==1)? print "data='ada'" : "" ?>>

                            <td 
                                <?php

                                    if(($value->is_pinjam == 1) && ($value->is_note == 0) && ($value->is_approve==1)) { 
                                        echo "style='background-color:red'"; } 

                                    elseif (($value->is_pinjam == 1) && ($value->is_note == 1)) { 
                                        echo "style='background-color:yellow'"; }

                                    elseif(($value->is_pinjam == 1) && ($value->is_approve == 0)) { 
                                        echo "style='background-color:#25f025'"; }

                                    else { }; ?> >         

                                <?php echo $no; ?> </td>

                            <td><?php echo $value->pmlk_jmn; ?></td>

                            <td><?php echo $value->alamat_jmn; ?></td>

                            <td><?php echo $value->jenis_ikat; ?></td>

                            <td><?php echo $value->jen_dok_jm; ?></td>

                            <td><?php echo $value->no_dok_jmn; ?></td>

                            <td><?php echo $value->developer; ?></td>

                            <td><?php  ($value->status_lunas == "lunas") ? print "<label id='status'>Lunas</label>" : "<label></label>"; ?></td>

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