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

                                        <th>S No123</th>

                                        <th>Company Name</th>

                                        <th>Labour name</th>

                                        <th>Worker Name</th>



                                        <th>status</th>

                                      

                                    </tr>

                                </thead>

                                <tfoot>

                                    <tr>

                                        <th>S No</th>
                                        <th>Company Name</th>
                                        <th>Labour name</th>
                                        <th>Worker Name</th>
                                        <th>status;</th>

                                    </tr>

                                </tfoot>

                                <tbody>

                                    <?php
									echo "<pre>";print_r($labour_process);exit;

                                    $i = 1;

                                    foreach ($labour_process as $sub) {
                                          if ($sub->labour_company_status == "0") {
                                            $statusp = "tag tag-success";
                                            $statusp1 = 'Free';
                                        } else {
                                            $statusp = "tag tag-default";
                                            $statusp1 = $sub->labour_company_status;
                                        }

                                    ?>

                                    <tr>



                                        <td><?php echo $i; ?></td>

                                        <td><?php echo $sub->company_name; ?>

                                        <td><?php echo $sub->labour_name; ?>
                             
                                        <td><?php echo $sub->worker_name; ?>
								      <td><span class="<?php echo $statusp; ?>"><?php echo ucfirst($statusp1); ?>

                                        
                                       

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