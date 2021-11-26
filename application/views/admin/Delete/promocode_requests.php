<!-- Side-Nav-->

<div class="content-wrapper">

    <!-- Container-fluid starts -->

    <div class="container-fluid">

        <div class="row">

            <div class="main-header">

                <h4><?= @$page['title'] ?></h4>

                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

                    <li class="breadcrumb-item"><a href="<?= base_url() . 'admin'; ?>"><i class="icofont icofont-home"></i></a>

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

                  <!--<span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:85%;"> Add Packages</button></span>-->

                    </div>

                    <div class="card-block">

                        <div class="data_table_main table-responsive">

                            <table id="advanced-table" class="table table-striped table-bordered nowrap">

                                <thead>

                                    <tr>

                                        <th>S no</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Send Mail</th>
                                        <!--<th>Status</th>-->
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S no</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Send Mail</th>
                                        <!--<th>Status</th>-->
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if (@$value) {

                                        $sn = 1;
                                        foreach ($value as $package) {
                                            if ($package->status == "0") {
                                                $status = "tag tag-success";
                                                $status1 = 'Send Mail';
                                            } else {
                                                $status = "tag tag-default";
                                                $status1 = 'sent a mail';
                                            }
                                            $user_email = $package->email;
                                            $user_offer_id = $package->offer_id;
                                            ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?= $package->name; ?></td>
                                                <td><?= $package->email; ?></td>
                                                 <?php if ($package->status == "0") {?>
                                                <td> <?php echo '<span class="' . $status . ' changes_ustatus" style="cursor:pointer;" data-id="' . $package->id . '" data-status="' . $user_email . '" data-code="' . $user_offer_id . '">' . ucfirst($status1) . '</span>'; ?>  
                                                 <?php } else {?>
                                                <td> <?php echo '<span class="' . $status . '">' . ucfirst($status1) . '</span>'; ?>  
                                        <?php }?>
                                                <!--<td><?//= $package->status; ?></td>-->
                                            </tr>

                                        <?php }
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

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "update_packages" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>

<script type="text/javascript">

    $(document).on("click", ".changes_ustatus", function () {
        var id = $(this).data('id');
        var email = $(this).data('status');
        var promocode = $(this).data('code');
//       alert(promocode);
        $.ajax({
            url: "<?php echo base_url(); ?>admin/send_promocode_tomail",
            type: "POST",
            data: {id:id,email:email,promocode:promocode},
            // mimeType: "multipart/form-data",
            // contentType: false,
            // cache: false,
            // processData:false,
            error:function(request,response){
                console.log(request);
            },                  
            success: function(result){
                
                if(result) 
                {
                  location.reload();  
                  //console.log();                        
                }else{
               location.reload();  
                }
            }
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