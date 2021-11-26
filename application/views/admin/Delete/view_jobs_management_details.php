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
                                <a class="nav-link " data-toggle="tab" href="#user_view" role="tab"><i class=""></i>User Jobs Management Details</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active view_data" id="user_view" role="tabpanel">
                                <!--<div class="row">-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Job Title :</b></label>

                                            <span><?php echo ucwords($user_details->job_title); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                           <label><b>Email :</b></label>

                                            <span><?php echo ucwords($user_details->email); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Phone :</b></label>
                                            <span><?php echo $user_details->phone; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>City :</b></label>

                                            <span><?php echo ucwords($user_details->city); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>End date :</b></label>
                                            <span><?php echo date('Y:m:d', strtotime($user_details->end_date)); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Job responisibilies:</b></label>
                                            <span><?php echo $user_details->job_responsibilities; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label><b>Job Description:</b></label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group" style="margin-bottom: 14px !important;">
                                            <span><?php echo $user_details->job_description; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Skills Required :</b></label>

                                            <span><?php echo ucwords($user_details->skills_required); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>About :</b></label>
                                            <span><?php echo $user_details->about; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Job Type :</b></label>
                                            <span><?php echo $user_details->job_type; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Category :</b></label>
                                            <span><?php echo $user_details->category; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Location</b></label>

                                            <span><?php echo ucwords($user_details->location); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Offered Salary :</b></label>
                                            <span><?php echo $user_details->offered_salary; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Experience :</b></label>
                                            <span><?php echo $user_details->experience; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Gender :</b></label>
                                            <?php if($user_details->gender=='1'){
                       $gender='Male';
                   }else{
                        $gender='Female';
                   }?>
                                            <span><?php echo $gender; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Industry :</b></label>

                                            <span><?php echo ucwords($user_details->industry); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Qualification :</b></label>
                                            <span><?php echo $user_details->qualification; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Level :</b></label>
                                            <span><?php echo $user_details->level; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Applied :</b></label>
                                            <span><?php echo $user_details->applied; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
<div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Company Name :</b></label>
                                            <span><a href="http://maplenestinc.com/sas/home/company_details/<?php echo  $user_details->company_id;?>"><?php echo ucwords($user_details->company_name); ?></a></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Posted On :</b></label>

                                            <span><?php echo date('Y:m:d', strtotime($user_details->posted_on)); ?></span>
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
