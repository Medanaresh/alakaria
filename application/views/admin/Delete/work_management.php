<style type="text/css">

    .btn-table {

        position: fixed;

        top: 400px;

        z-index: 99;

        right: 2px;

    }



    .btnleft, .btnright {

        background: #7ABAF2 !important;

    }

</style>

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

                    <div class="card-header"><h5 class="card-header-text"><?php echo @$page['title']; ?></h5>

                        <span><button type="button" class="btn btn-success fa fa-plus add_sub_admin" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;/*margin-top:-75px;*/"> Add Workers Management </button></span>

                    </div>



                    <div class="card-block">

                        <div class="data_table_main table-responsive">

                            <table id="advanced-table" class="table table-striped table-bordered nowrap">

                                <thead>

                                    <tr>

                                        <th>S No</th>

                                        <th>Profile</th>

                                        <th>User Name</th>

                                        <th>Email</th>

                                        <th>Phone</th>               

                                        <th>Age</th>
                                        <th>Payment</th>
                                        <th>Action</th>

                                       

                                    </tr>

                                </thead>

                                <tfoot>

                                    <tr>

                                        <th>S No</th>

                                        <th>Profile</th>

                                        <th>User Name</th>

                                        <th>Email</th>

                                        <th>Phone</th>

                                        <th>Age</th>
                                        <th>Payment</th>
                                        <th>Action</th>

                                      

                                    </tr>

                                </tfoot>

                                <tbody>

                                    <?php

                                    $i = 1;

                                    foreach ($work_management as $sub) {

                                        if ($sub->payment_status == "1") {

                                            $status = "tag tag-success";

                                            $status1 = 'Payment Completed';

                                        } else {

                                            $status = "tag tag-default";

                                            $status1 = 'Payment Not Completed';

                                        }

                                        ?>

                                        <tr>

                                            <td><?php echo $i; ?></td>

                                            <td style="width:100px;">

                                                <img src="<?php echo base_url() . $sub->cv ?>" height=50px; alt="" >

                                            </td>

                                            <td><?php echo $sub->name; ?></td>

                                            <td><?php echo $sub->email; ?></td>

                                            <td><?php echo $sub->phone; ?></td>                 





                                            <td><span><?php echo $sub->age; ?></span></td>
                                            
                                            <td><span class="<?php echo $status;?>"><?php echo $status1; ?></span></td>
                                            
                                            <td style="white-space: nowrap; width: 1%;">

                                                <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                                    <div class="btn-group btn-group-sm" style="float: none;">

                                                        <button type="button" class="btn btn-primary waves-effect waves-light add_sub_admin" data-toggle="modal"  data-target = "#add_sub_admin" data-id="<?php echo $sub->id; ?>"  style="float: none;margin: 5px;">

                                                            <span class="icofont icofont-ui-edit"></span>

                                                        </button>

                                                        <button type="button" class="btn btn-danger waves-effect waves-light delete_sub_admin" data-id="<?php echo $sub->id; ?>" style="float: none;margin: 5px;">

                                                            <span class="icofont icofont-ui-delete"></span>

                                                        </button> 



                                                    </div>

                                                </div>

                                            </td>



                                        </tr>

                                        <?php $i++;

                                    } ?>

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

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_sub_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>



<section>

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id ="add_permissions" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>



<script type="text/javascript">

    $(document).ready(function ()

    {

        var $modal = $('#add_sub_admin');

        $('.add_sub_admin').on('click', function (event)

        {

            var id = $(this).data('id');

            event.stopPropagation();

            $modal.load('<?php echo "add_work_management"; ?>', {id: id},

                    function ()

                    {

                        $modal.modal('show');

                    });

        });

        $('.delete_sub_admin').on('click', function (event)

        {

            var id = $(this).data('id');

            var key = 'id';

            var table = 'workers';

            var set = 'user_status';



            swal({

                title: "Are you sure?",

                text: "Your will not be able to recover data!",

                type: "warning",

                showCancelButton: true,

                confirmButtonClass: "btn-danger",

                confirmButtonText: "Yes, delete it!",

                closeOnConfirm: false

            },

                    function ()

                    {

                        $.ajax({

                            url: "<?php echo base_url() . 'admin/delete_testimonials'; ?>",

                            type: "POST",

                            data: {id: id, key: key, table: table, set: set},

                            //mimeType: "multipart/form-data",

                            //contentType: false,

                            //cache: false,

                            //processData:false,

                            error: function (request, response) {

                                console.log(request);

                            },

                            success: function (result) {

                                //alert(result);

                                if (result == "success") {

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

