<!-- CONTENT-WRAPPER-->
<style>
    .fontcolor{
        color: #1b8bf9;
    }
.main-header {
    padding: 51px 0 20px 20px !important;
}
.btn-lg {
        cursor: pointer !important;

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
                                <a class="nav-link " data-toggle="tab" href="#user_view" role="tab"><i class=""></i>Add /Edit City</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                     
                        <div class="tab-content">
                            <div class="tab-pane active view_data" id="user_view" role="tabpanel">
                                <!--<div class="row">-->
                                    <form class="application_form" method="POST" action="<?php echo base_url().'/admin/save_city';?>" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                      




                                 


                                        <div class="form-group">
                                            <label><b>country Names  :</b></label>
                                             <?php if($citydata->id==''){?>
                                                 <select class="form-control form-control-sm col-md-4"  name="country_id" required>
                                            <option value="">Select country </option>
                                                <?php
                                                    foreach ($countrys as  $value){
                                                                                           ?>
                                                            <option  value ="<?php echo $value['country_en']; ?>"><?php echo $value['country_en']." / ". $value['country_ar']; ?></option>
                                                        
                                                        <?php
                                                    }
                                             
                                                ?>
                                            </select>


                                               <?php } else {?>
                                          <select class="form-control form-control-sm col-md-4"  name="country_id">
                                            <option value="">Select country </option>
                                                <?php
                                                    foreach ($countrys as  $value){
                                                                                           ?>
                                                            <option  value ="<?php echo $value['country_en']; ?>"<?php if ($citydata->country_id== $value['country_en']) echo "selected"; ?>><?php echo $value['country_en']." / ". $value['country_ar']; ?></option>
                                                        
                                                        <?php
                                                    }
                                             
                                                ?>
                                            </select>
                                               <?php }?>
                                        </div>
                                     
                                        <div class="form-group">
                                            <label><b>City Name En </b></label>

                                            <span><input type="text" name="city_name_en" class="form-control col-md-4" value="<?php echo $citydata->city_name_en;?>" required></span>
                                        </div>
 <div class="form-group">
                                            <label><b>City Name ar</b></label>
<input type="hidden" name="id" class="form-control col-md-4" value="<?php echo $citydata->id;?>" >

                                            <span><input type="text" name="city_name_ar" class="form-control col-md-4" value="<?php echo $citydata->city_name_ar;?>"></span>
                                        </div>

                                     
                                     
                                    </div>
                               
                                </div>
                                  <div class="form-group">
        <button type="submit" class="btn btn-default-styles btn-blue text-uppercase btn-lg" >Submit</button>
        </div>
    </form>
                               
                                
                                
                                
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
