<!-- CONTENT-WRAPPER-->
<style>
    .fontcolor{
        color: #1b8bf9;
    }
</style>
<div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-header">
                    <h4><?= @$page['title'] ?></h4>
                    <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <i class="icofont icofont-home">Home</i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#:"><?= @$page['title'] ?></a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 5%">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link " data-toggle="tab" href="#user_view" role="tab"><i class=""></i>Fee Management Details</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active view_data" id="user_view" role="tabpanel">
                                <!--<div class="row">-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>platform_fee :</b></label>

                                            <span><?php echo $user_details->platform_fee; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                           <label><b>Guarantee Fee :</b></label>

                                            <span><?php echo $user_details->guarantee_fee; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Worker Fee :</b></label>

                                            <span><?php echo $user_details->worker_fee; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>CV Builder Fee</b></label>
                                            <span><?php echo ucwords($user_details->pack_fee); ?></span>
                                        </div>
                                    </div>
                                    
                                </div>
								                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Advance Fee :</b></label>

                                            <span><?php echo $user_details->grant_fee; ?></span>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                
                                
                                   
                              
                               
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Container-fluid ends -->
</div>
<!-- CONTENT-WRAPPER-->
