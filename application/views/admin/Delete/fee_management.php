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

                                        <th>Platform fee</th>

                                        <th>Guarantee Fee</th>

                                        <th>Worker Fee</th>

                                        <th>CV Builder Fee</th>
                                     
                                        <!--<th>advance Fee</th>-->


                                        <th>Action</th>

                                        <th>View</th>

                                    </tr>

                                </thead>

                                <tfoot>

                                    <tr>

                                        <th>S No</th>

                                        <th>Platform Fee</th>

                                        <th>Guarantee Fee</th>

                                        <th>Worker Fee</th>

                                        <th>CV Builder Fee</th>
                                        <!--<th>Advance Fee</th>-->

                                        <th>Action</th>

                                        <th>View</th>

                                    </tr>

                                </tfoot>

                                <tbody>

                                    <?php

                                    $i = 1;

                                    foreach ($workers_management as $sub) {
                                         if ($sub->free_fee == "1") {
                                            $status = "tag tag-success";
                                            $status1 = 'Free Fee';
                                        } else {
                                            $status = "tag tag-default";
                                            $status1 = 'NOT Free Fee';
                                        }




                                          if ($sub->platform_fee == "0") {
                                            $statusp = "tag tag-success";
                                            $statusp1 = 'Free';
                                        } else {
                                            $statusp = "tag tag-default";
                                            $statusp1 = $sub->platform_fee;
                                        }


                                         if ($sub->guarantee_fee == "0") {
                                            $statusg = "tag tag-success";
                                            $statusg1 = 'Free Fee';
                                        } else {
                                            $statusg = "tag tag-default";
                                            $statusg1 = $sub->guarantee_fee;
                                        }
 if ($sub->worker_fee == "0") {
                                            $statusw = "tag tag-success";
                                            $statusw1 = 'Free Fee';
                                        } else {
                                            $statusw = "tag tag-default";
                                            $statusw1 = $sub->worker_fee;
                                        }
                                         if ($sub->pack_fee == "0") {
                                            $statuspe = "tag tag-success";
                                            $statuspe1 = 'Free Fee';
                                        } else {
                                            $statuspe = "tag tag-default";
                                            $statuspe1 = $sub->pack_fee;
                                        }
 if ($sub->grant_fee == "0") {
                                            $statusge = "tag tag-success";
                                            $statusge1 = 'Free Fee';
                                        } else {
                                            $statusge = "tag tag-default";
                                            $statusge1 = $sub->grant_fee;
                                        }




                                    ?>

                                    <tr>



                                        <td><?php echo $i; ?></td>

                                        <td><span class="<?php echo $statusp; ?>"><?php echo ucfirst($statusp1); ?>

                                        <td><span class="<?php echo $statusg; ?>"><?php echo ucfirst($statusg1); ?>

                                   <!--      <td><span class="<?php echo $statusg; ?>"><?php echo ucfirst($statusg1); ?> -->

                                        <td><span class="<?php echo $statusw; ?>"><?php echo ucfirst($statusw1); ?>
                                             <td><span class="<?php echo $statuspe; ?>"><?php echo ucfirst($statuspe1); ?>
											 <!-- <td><span class="<?php echo $statusge; ?>"><?php echo ucfirst($statusge1); ?>-->
                                       <!-- <td><span class="<?php echo $status; ?>"><?php echo ucfirst($status1); ?></span></td>-->
                                        
                                        <td style="white-space: nowrap; width: 1%;">

                                            <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                                <div class="btn-group btn-group-sm" style="float: none;">

                                                    <button type="button" class="btn btn-primary waves-effect waves-light add_coupons" data-toggle="modal"  data-target = "#add_coupons" data-id="<?php echo $sub->id; ?>"  style="float: none;margin: 5px;">

                                                        <span class="icofont icofont-ui-edit"></span>

                                                    </button>

                                                </div>

                                            </div>

                                        </td>

                                        <td style="white-space: nowrap; width: 1%;">

                                                <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                                    <div class="btn-group btn-group-sm" style="float: none;">

                                                        <a href="<?php echo base_url(); ?>admin/view_fee_management_details/<?php echo $sub->id; ?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">

                                                            <span class="icofont icofont-eye"></span>

                                                        </a>

                                                    </div>

                                                </div>

                                            </td>

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

<script type="text/javascript">

    $(document).ready(function ()

    {

        var $modal = $('#add_coupons');

        $('.add_coupons').on('click', function (event)

        {

            var id = $(this).data('id');

            event.stopPropagation();

            $modal.load('<?php echo site_url('admin/edit_fee_management'); ?>', {id: id},

                    function () {

                        $modal.modal('show');

                    });

        });

        $('.delete_coupon').on('click', function (event) {



            var id = $(this).data('id');

            var key = 'coupon_id';

            var table = 'coupons';

            //  alert(id);alert(table);

            swal({

                title: "Are you sure?",

                text: "Your will not be able to recover data!",

                type: "warning",

                showCancelButton: true,

                confirmButtonClass: "btn-danger",

                confirmButtonText: "Yes, delete it!",

                closeOnConfirm: false

            },

                    function () {

                        $.ajax({

                            url: "<?php echo base_url() . 'admin/delete_data'; ?>",

                            type: "POST",

                            data: {id: id, key: key, table: table},

                            error: function (request, response)

                            {

                                console.log(request);

                            },

                            success: function (result)

                            {

                                if (result == "success")

                                {

                                    location.reload();

                                }

                            }

                        });

                    });

        });

    });

</script>

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