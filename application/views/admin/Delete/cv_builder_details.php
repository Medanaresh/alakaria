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
                                <a class="nav-link " data-toggle="tab" href="#user_view" role="tab"><i class=""></i>User CV Details</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active view_data" id="user_view" role="tabpanel">
                                <!--<div class="row">-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php if($user_details->fname!=NULL)
                                        { ?>
                                        <div class="form-group">
                                            <label><b>First Name :</b></label>

                                            <span><?php echo ucwords($user_details->fname); ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <?php if($user_details->lname!=NULL)
                                        { ?>
                                        <div class="form-group">
                                            <label><b>Last Name :</b></label>
                                            <span><?php echo $user_details->lname; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                     <?php if($user_details->phone!=NULL)
                                        { ?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Phone :</b></label>
                                            <span><?php echo $user_details->phone; ?></span>
                                        </div>
                                    </div>
                                <?php  } ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php if($user_details->email!=NULL)
                                        { ?>
                                        <div class="form-group">
                                            <label><b>Email :</b></label>

                                            <span><?php echo ucwords($user_details->email); ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if($user_details->gender!=NULL)
                                        { ?>
                                        <div class="form-group">
                                            <label><b>Gender :</b></label>
                                            <span><?php echo $user_details->gender; ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php if($user_details->dob!=NULL)
                                        { ?>
                                        <div class="form-group">
                                            <label><b>Date Of birth:</b></label>
                                            <span><?php echo date('Y:m:d', strtotime($user_details->dob)); ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <?php if($user_details->marital_status!=NULL)
                                        { ?>
                                        <div class="form-group">
                                            <label><b>Marital Status :</b></label>

                                            <span><?php echo ucwords($user_details->marital_status); ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Country :</b></label>
                                            <span><?php echo $user_details->country; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>City :</b></label>
                                            <span><?php echo $user_details->city; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fontcolor"><b>Education Details</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Education Level :</b></label>

                                            <span><?php echo ucwords($user_details->education_level_1); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>College/University :</b></label>
                                            <span><?php echo $user_details->college_1; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Major :</b></label>
                                            <span><?php echo $user_details->major_1; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Period :</b></label>
                                            <span><?php echo $user_details->period_1; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Education Level :</b></label>

                                            <span><?php echo ucwords($user_details->education_level_2); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>College/University :</b></label>
                                            <span><?php echo $user_details->college_2; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Major :</b></label>
                                            <span><?php echo $user_details->major_2; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Period :</b></label>
                                            <span><?php echo $user_details->period_2; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Education Level :</b></label>

                                            <span><?php echo ucwords($user_details->education_level_3); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>College/University :</b></label>
                                            <span><?php echo $user_details->college_3; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Major :</b></label>
                                            <span><?php echo $user_details->major_3; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Period :</b></label>
                                            <span><?php echo $user_details->period_3; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Education Level :</b></label>

                                            <span><?php echo ucwords($user_details->education_level_4); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>College/University :</b></label>
                                            <span><?php echo $user_details->college_4; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Major :</b></label>
                                            <span><?php echo $user_details->major_4; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Period :</b></label>
                                            <span><?php echo $user_details->period_4; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="fontcolor"><b>Working Experiance </b></label>

                                        </div>
                                    </div>
                                 
                                </div>
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Company Name :</b></label>

                                            <span><?php echo ucwords($user_details->company_name_1); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Profession :</b></label>
                                            <span><?php echo $user_details->profession_1; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Place :</b></label>
                                            <span><?php echo $user_details->place_1; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Duration in Years:</b></label>
                                            <span><?php echo $user_details->years_1; ?></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Company Name :</b></label>

                                            <span><?php echo ucwords($user_details->company_name_2); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Profession :</b></label>
                                            <span><?php echo $user_details->profession_2; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Place :</b></label>
                                            <span><?php echo $user_details->place_2; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Duration in Years:</b></label>
                                            <span><?php echo $user_details->years_2; ?></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Company Name :</b></label>

                                            <span><?php echo ucwords($user_details->company_name_3); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Profession :</b></label>
                                            <span><?php echo $user_details->profession_3; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Place :</b></label>
                                            <span><?php echo $user_details->place_3; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Duration in Years:</b></label>
                                            <span><?php echo $user_details->years_3; ?></span>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Company Name :</b></label>

                                            <span><?php echo ucwords($user_details->company_name_4); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Profession :</b></label>
                                            <span><?php echo $user_details->profession_4; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Place :</b></label>
                                            <span><?php echo $user_details->place_4; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Duration in Years:</b></label>
                                            <span><?php echo $user_details->years_4; ?></span>
                                        </div>
                                    </div>
                                </div>
                                   <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Skills :</b></label>

                                            <span><?php echo ucwords($user_details->skills); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Achievements :</b></label>
                                            <span><?php echo $user_details->achievements; ?></span>
                                        </div>
                                    </div>
                                  
                                </div>
                                 <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="fontcolor"><b>Language :</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>Arabic :</b></label>

                                            <span><?php echo ucwords($user_details->lang_level_1); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><b>English :</b></label>
                                            <span><?php echo $user_details->lang_level_2; ?></span>
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
