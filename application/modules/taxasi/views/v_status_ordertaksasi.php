<style type="text/css">
    table#mytable tbody tr td{
        padding-top: 30px;
        padding-bottom: 30px;
    }
    table#mytable tbody tr:hover{
        background-color:#F9F6E0 !important;
    }
    table#mytable tbody tr.even{
        background: #fbf7d4;
    }
    table#mytable thead th{
        text-align: center;
        vertical-align: middle;
    } 
    table#mytable tbody tr td{
        vertical-align: middle;
    }
    label#status{
        border-radius: 40px;
        background: #98f992;
        padding: 5px;
        display:inline-block;
        color: #1e1f1f;
        font-weight:400;
    }
    table#tabletatakota tbody tr td{
        padding-top: 40px;
        padding-bottom: 40px;
    }
    table#tabletatakota tbody tr:hover{
        background-color:#F9F6E0 !important;
    }
    table#tabletatakota tbody tr.even{
        background: #fbf7d4;
    }
    table#tabletatakota thead th{
        text-align: center;
        vertical-align: middle;
    } 
    table#tabletatakota tbody tr td{
        vertical-align: middle;
    }
    ul#status>li.active a{
        color: white;
        background: #46B5A5;
    }

</style>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                            <h3>Status Order</h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Status Order</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-bottom: 5%;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="width:100%; display: inline-block;">
            <div class="product-sales-chart" style="box-shadow: 0px 3px 5px 1px black;">

                <ul id="status" class="nav nav-tabs custom-menu-wrap custon-tab-menu-style1">
                    <li class="active"><a data-toggle="tab" href="#TabProject"><span class="edu-icon edu-analytics tab-custon-ic"></span>Order Taksasi</a>
                    </li>
                    <li><a data-toggle="tab" href="#TabDetails"><span class="edu-icon edu-analytics-arrow tab-custon-ic"></span>Cek Tata Kota</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="TabProject" class="tab-pane in active  custon-tab-style1">
                        <div class="table table-responsive" style="margin-top: 2%;">
                            <table id="mytable" class="table border-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nasabah</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Tgl Order</th>
                                        <th>Tgl Submit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $no= 1;
                                        foreach ($taksasi->result() as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $value->nasabah; ?></td>
                                        <td><?php echo $value->alamat_lengkap; ?></td>
                                        <td><?php echo $value->tgl_order; ?></td>
                                        <td style="text-align: center;"><?php echo wordwrap($value->date_created,2,"<br>\n"); ?></td>
                                        <td><label id="status"><?php echo $value->status; ?></label></td>
                                    </tr>

                                    <?php 
                                        $no++;} 
                                    ?>
                                </tbody>

                            </table>

                        </div>
                    </div>

                    <div id="TabDetails" class="tab-pane custon-tab-style1">
                        <div class="table table-responsive" style="margin-top: 2%;">
                        
                            <table id="tabletatakota" class="table border-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nasabah</th>
                                        <th>Alamat Jaminan</th>
                                        <th>Tgl Order</th>
                                        <th>Tgl Submit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $no= 1;
                                        foreach ($tatakota->result() as $key => $value) {
                                    ?>

                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $value->nasabah; ?></td>
                                        <td><?php echo $value->alamat_jaminan; ?></td>
                                        <td><?php echo $value->date_order; ?></td>
                                        <td style="text-align: center;"><?php echo wordwrap($value->date_created,2,"<br>\n"); ?></td>
                                        <td><label id="status"><?php echo $value->status; ?></label></td>
                                    </tr>

                                    <?php 
                                        $no++;} 
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready( function(){

        var li = $("ul#status").find("li");
        li.each(function(index, el) {

            li[index].onclick = function(e){
                // var cek = $(this).attr("class");
                // if(cek == "active"){

                // }
                console.log($(this).attr("class"));
            }

        });

        $("#mytable").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '24%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' }
          ]
        });

        $("#tabletatakota").DataTable({
          bAutoWidth: false, 
          aoColumns : [
            { sWidth: '3%' },
            { sWidth: '20%' },
            { sWidth: '24%' },
            { sWidth: '7%' },
            { sWidth: '7%' },
            { sWidth: '7%' }
          ]
        });
    });

</script>