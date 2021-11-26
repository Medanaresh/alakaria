<!-- Side-Nav-->
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="main-header">
                <h4><?= @$page['title'] ?></h4>
                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                    <li class="breadcrumb-item"><a href=""><i class="icofont icofont-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href=""><?= @$page['title'] ?></a>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text"><?php echo @$page['title']; ?></h5>
                        <!--<span><button type="button" class="btn btn-success fa fa-plus add_coupons" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add Coupon </button></span>-->
                    </div>
                    <div class="card-block">
                        <div class="data_table_main table-responsive">
                            <table id="advanced-table" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                      <!--   <th>View</th> -->
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S No</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                       <!--  <th>View</th> -->
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($send_message as $sub) {
                                    ?>
                                    <tr>

                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $sub->fname; ?></td>
                                        <td><?php echo $sub->phone; ?></td>
                                        <td><?php echo $sub->email; ?></td>
                                         <td><?php echo $sub->message; ?></td>
                                           
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                            </table>
                            <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnleft btn-sm" style=""><i class="fa fa-angle-right"></i></a></div>
                            <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnright btn-sm" style="display: none;"><i class="fa fa-angle-left"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid ends -->
</div>
</div>
<section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_coupons" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>

<script>
    $(function () {
        $(".btnright").hide('');
        $('.btnleft').click(function () {

            $(".table-bordered").css('margin-left', '-200px');
            $(".btnleft").hide('');
            $(".btnright").show('');
        });

        $('.btnright').click(function () {

            $(".table-bordered").css('margin-left', '0px');
            $(".btnright").hide('');
            $(".btnleft").show('');
        });
    });

</script>