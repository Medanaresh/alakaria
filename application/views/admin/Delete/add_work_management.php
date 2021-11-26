<style>
    #insert_sub_admin label.error {
        color:red;
    }
    #insert_sub_admin input.error,textarea.error,select.error {
        border:1px solid red;
        color:red;
    }
    .popover {
        z-index: 2000;
        position:relative;
    }
    @media (min-width: 768px) {
        .modalwidthnew {
            max-width: 70%;
        }
    }

</style>

<div class="modal-dialog modalwidthnew" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Workers Management</h4>
        </div>
        <div class="modal-body">
            <form id="insert_sub_admin">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">User Name</label>
                        <input class="form-control" type="text" name="data[name]" value="<?php
                        if ($value != NULL) {
                            echo $value->name;
                        }
                        ?>" placeholder="Name">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Age</label>
                        <input class="form-control" type="number" name="data[age]" value="<?php
                        if ($value != NULL) {
                            echo $value->age;
                        }
                        ?>" placeholder="User Age">
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Gender</label>
                        <select class="form-control" name="data[gender]">
                            <option value="1" <?php
                            if ($value != NULL) {
                                if ($value->gender == '1') {
                                    echo "Selected";
                                }
                            }
                            ?>>Male</option>
                            <option value="0" <?php
                            if ($value != NULL) {
                                if ($value->gender == '0') {
                                    echo "Selected";
                                }
                            }
                            ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Speciality </label>
                        <input class="form-control" type="text" name="data[speciality]" value="<?php
                        if ($value != NULL) {
                            echo $value->speciality;
                        }
                        ?>" placeholder="Speciality">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Email</label>
                        <input class="form-control" type="email" name="data[email]" value="<?php
                        if ($value != NULL) {
                            echo $value->email;
                        }
                        ?>" placeholder="Email" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Phone</label>
                        <input class="form-control" type="number" name="data[phone]" value="<?php echo @$value->phone ?>" placeholder="Phone" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Country </label>
                        <input class="form-control" type="text" name="data[country]" value="<?php
                        if ($value != NULL) {
                            echo $value->country;
                        }
                        ?>" placeholder="Country">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">City</label>
                        <input class="form-control" type="text" name="data[city]" value="<?php
                        if ($value != NULL) {
                            echo $value->city;
                        }
                        ?>" placeholder="City" required>
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">cv</label>
                        <div>
                        <input type="file" name="cv_file" onchange="validateimage()" id="customFile" class="form-control">
                        </div>
                        <input type="hidden" name="cv_file" value="<?php
                        if ($value != NULL) {
                            echo $value->cv;
                        }
                        ?>">
                        <?php if ($value != NULL) { ?>  <img src="<?php
                            if ($value != NULL) {
                                echo base_url() . $value->cv;
                            }
                            ?>" style="height: 100px; width: 100px;"><?php } ?>
                    </div>
                </div>
               <!--education1-->
                <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Education </label>
                        <input class="form-control" type="text" name="data[education1]" value="<?php
                        if ($value != NULL) {
                            echo $value->education1;
                        }
                        ?>" placeholder="Education">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
<!--                        <div class="input-group date" id="education1_to">-->
<?php if($value == NULL){?>
                         <input type="date" class="form-control" name="data[education1_to]" value="">
                        <?php } else{?>
                        
                            <input type="date" class="form-control" name="data[education1_to]" value="<?php $dateet1=date_create(@$value->education1_to); echo date_format($dateet1,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>-->
                        <!--</div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="education1_from">-->
                        <?php if($value == NULL){?>
                         <input type="date" class="form-control" name="data[education1_from]" value="">
                        <?php } else{?>
                        
                            <input type="date" class="form-control" name="data[education1_from]" value="<?php $dateef1=date_create(@$value->education1_from); echo date_format($dateef1,"Y-m-d"); ?>">
                        <?php }?>
                    
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">description</label>
                        <textarea name="data[education1_desc]"  class="form-control" placeholder="Description" rows="3" cols="5" required=""><?php echo @$value->education1_desc; ?></textarea>
                    </div>
                </div>
                 <!--education2-->
                 <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Education </label>
                        <input class="form-control" type="text" name="data[education2]" value="<?php
                        if ($value != NULL) {
                            echo $value->education1;
                        }
                        ?>" placeholder="Education">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date</label>
                        <!--<div class="input-group date" id="education2_to">
                        echo date_format($date,"Y/m/d H:i:s");
                        --><?php if($value == NULL){?>
                         <input type="date" class="form-control" name="data[education2_to]" value="">
                        <?php } else{?>
                        
                            <input type="date" class="form-control" name="data[education2_to]" value="<?php $dateet2=date_create(@$value->education2_to); echo date_format($dateet2,"Y-m-d"); ?>">
                        <?php }?>
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="education2_from">-->
                        <?php if($value == NULL){?>
                         <input type="date" class="form-control" name="data[education2_from]" value="">
                        <?php } else{?>
                        
                           <input type="date" class="form-control" name="data[education2_from]" value="<?php $dateef2=date_create(@$value->education2_from); echo date_format($dateef2,"Y-m-d"); ?>">
                        <?php }?>
                          
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">description</label>
                        <textarea name="data[education2_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->education2_desc; ?></textarea>
                    </div>
                </div>
                 <!--education3-->
                 <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Education </label>
                        <input class="form-control" type="text" name="data[education3]" value="<?php
                        if ($value != NULL) {
                            echo $value->education3;
                        }
                        ?>" placeholder="Education">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="education3_to">-->
                         <?php if($value == NULL){?>
                        <input type="date" class="form-control" name="data[education3_to]" value="">
                        <?php } else{?>
                        
                           <input type="date" class="form-control" name="data[education3_to]" value="<?php $dateet3=date_create(@$value->education3_to); echo date_format($dateet3,"Y-m-d"); ?>">
                        <?php }?>
                          
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="education3_from">-->
                         <?php if($value == NULL){?>
                       <input type="date" class="form-control" name="data[education3_from]" value="">
                        <?php } else{?>
                        
                          <input type="date" class="form-control" name="data[education3_from]" value="<?php $dateef3=date_create(@$value->education3_from); echo date_format($dateef3,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">description</label>
                        <textarea name="data[education3_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->education3_desc; ?></textarea>
                    </div>
                </div>
                  <!--education4-->
                        <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Education </label>
                        <input class="form-control" type="text" name="data[education4]" value="<?php
                        if ($value != NULL) {
                            echo $value->education4;
                        }
                        ?>" placeholder="Education">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="education4_to">-->
                          <?php if($value == NULL){?>
                      <input type="date" class="form-control" name="data[education4_to]" value="">
                        <?php } else{?>
                         <input type="date" class="form-control" name="data[education4_to]" value="<?php $dateet4=date_create(@$value->education4_to); echo date_format($dateet4,"Y-m-d"); ?>">
                        <?php }?>
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="education4_from">-->
                         <?php if($value == NULL){?>
                      <input type="date" class="form-control" name="data[education4_from]" value="">
                        <?php } else{?>
                        <input type="date" class="form-control" name="data[education4_from]" value="<?php $datef4=date_create(@$value->education4_from); echo date_format($datef4,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">description</label>
                        <textarea name="data[education4_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->education4_desc; ?></textarea>
                    </div>
                </div>
                  <!--education5-->
                     <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Education </label>
                        <input class="form-control" type="text" name="data[education5]" value="<?php
                        if ($value != NULL) {
                            echo $value->education5;
                        }
                        ?>" placeholder="Education">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="education5_to">-->
                         <?php if($value == NULL){?>
                       <input type="date" class="form-control" name="data[education5_to]" value="">
                        <?php } else{?>
                       <input type="date" class="form-control" name="data[education5_to]" value="<?php $dateef5=date_create(@$value->education5_to); echo date_format($dateef5,"Y-m-d"); ?>">
                        <?php }?>
                        
                           
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="education5_from">-->
                         <?php if($value == NULL){?>
                      <input type="date" class="form-control" name="data[education5_from]" value="">
                        <?php } else{?>
                     <input type="date" class="form-control" name="data[education5_from]" value="<?php $dateet5=date_create(@$value->education5_from); echo date_format($dateet5,"Y-m-d"); ?>">
                        <?php }?>
                           
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Description</label>
                        <textarea name="data[education5_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->education5_desrequiredc; ?></textarea>
                    </div>
                </div>
                    <!--work1-->
                           <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Work </label>
                        <input class="form-control" type="text" name="data[work1]" value="<?php
                        if ($value != NULL) {
                            echo $value->work1;
                        }
                        ?>" placeholder="work">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="work1_from">-->
                         <?php if($value == NULL){?>
                     <input type="date" class="form-control" name="data[work1_from]" value="">
                        <?php } else{?>
                       <input type="date" class="form-control" name="data[work1_from]" value="<?php $datewf1=date_create(@$value->work1_from); echo date_format($datewf1,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="work1_to">-->
                         <?php if($value == NULL){?>
                       <input type="date" class="form-control" name="data[work1_to]" value="">
                        <?php } else{?>
                         <input type="date" class="form-control" name="data[work1_to]" value="<?php $datewt1=date_create(@$value->work1_to); echo date_format($datewt1,"Y-m-d"); ?>">
                        <?php }?>
                           
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Description</label>
                        <textarea name="data[work1_desc]"  class="form-control" placeholder="Description" rows="3" cols="5" required=""><?php echo @$value->work1_desc; ?></textarea>
                    </div>
                </div>
                <!--work2-->
                 <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Work </label>
                        <input class="form-control" type="text" name="data[work2]" value="<?php
                        if ($value != NULL) {
                            echo $value->work2;
                        }
                        ?>" placeholder="work">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="work2_from">-->
                         <?php if($value == NULL){?>
                       <input type="date" class="form-control" name="data[work2_from]" value="">
                        <?php } else{?>
                   <input type="date" class="form-control" name="data[work2_from]" value="<?php $datewf2=date_create(@$value->work2_to); echo date_format($datewf2,"Y-m-d"); ?>">
                        <?php }?>
                           
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="work2_to">-->
                         <?php if($value == NULL){?>
                       <input type="date" class="form-control" name="data[work2_to]" value="">
                        <?php } else{?>
                        <input type="date" class="form-control" name="data[work2_to]" value="<?php $datewt2=date_create(@$value->work2_to); echo date_format($datewt2,"Y-m-d"); ?>">
                        <?php }?>
                           
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Description</label>
                        <textarea name="data[work2_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->work2_desc; ?></textarea>
                    </div>
                </div>
                <!--work3-->
                 <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Work </label>
                        <input class="form-control" type="text" name="data[work3]" value="<?php
                        if ($value != NULL) {
                            echo $value->work3;
                        }
                        ?>" placeholder="work">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="work3_from">-->
                         <?php if($value == NULL){?>
                     <input type="date" class="form-control" name="data[work3_from]" value="">
                        <?php } else{?>
                      <input type="date" class="form-control" name="data[work3_from]" value="<?php $datewf3=date_create(@$value->work3_from); echo date_format($datewf3,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="work3_to">-->
                         <?php if($value == NULL){?>
                      <input type="date" class="form-control" name="data[work3_to]" value="">
                        <?php } else{?>
                         <input type="date" class="form-control" name="data[work3_to]" value="<?php $datewt3=date_create(@$value->work3_to); echo date_format($datewt3,"Y-m-d"); ?>">
                        <?php }?>
                          
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Description</label>
                        <textarea name="data[work3_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->work3_desc; ?></textarea>
                    </div>
                </div>
                 <!--work4-->
                 <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Work </label>
                        <input class="form-control" type="text" name="data[work4]" value="<?php
                        if ($value != NULL) {
                            echo $value->work4;
                        }
                        ?>" placeholder="work">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="work4_from">-->
                         <?php if($value == NULL){?>
                   <input type="date" class="form-control" name="data[work4_from]" value="">
                        <?php } else{?>
                     <input type="date" class="form-control" name="data[work4_from]" value="<?php $datewf4=date_create(@$value->work4_from); echo date_format($datewf4,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="work4_to">-->
                         <?php if($value == NULL){?>
                       <input type="date" class="form-control" name="data[work4_to]" value="">
                        <?php } else{?>
                        <input type="date" class="form-control" name="data[work4_to]" value="<?php $datewt4=date_create(@$value->work4_to); echo date_format($datewt4,"Y-m-d"); ?>">
                        <?php }?>
                           
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Description</label>
                        <textarea name="data[work4_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->work4_desc; ?></textarea>
                    </div>
                </div>
              
                  <!--work5-->
                    <div class="row">
                      <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Work </label>
                        <input class="form-control" type="text" name="data[work5]" value="<?php
                        if ($value != NULL) {
                            echo $value->work5;
                        }
                        ?>" placeholder="work">
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Start Date </label>
                        <!--<div class="input-group date" id="work5_from">-->
                         <?php if($value == NULL){?>
                      <input type="date" class="form-control" name="data[work5_from]" value="">
                        <?php } else{?>
                       <input type="date" class="form-control" name="data[work5_from]" value="<?php $datetf5=date_create(@$value->work5_from); echo date_format($datetf5,"Y-m-d"); ?>">
                        <?php }?>
                            
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">End date</label>
                        <!--<div class="input-group date" id="work5_to">-->
                         <?php if($value == NULL){?>
                        <input type="date" class="form-control" name="data[work5_to]" value="">
                        <?php } else{?>
                         <input type="date" class="form-control" name="data[work5_to]" value="<?php $datet5=date_create(@$value->work5_to); echo date_format($datet5,"Y-m-d"); ?>">
                        <?php }?>
                          
<!--                            <span class="input-group-addon bg-primary">
                                <span class="icofont icofont-ui-calendar"></span>
                            </span>
                        </div>-->
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Description</label>
                        <textarea name="data[work5_desc]"  class="form-control" placeholder="Description" rows="3" cols="5"><?php echo @$value->work5_desc; ?></textarea>
                    </div>
                </div>
                  <!--/skill-->
                  <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Port folio </label>
                        <input class="form-control" type="text" name="data[portfolio]" value="<?php
                        if ($value != NULL) {
                            echo $value->portfolio;
                        }
                        ?>" placeholder="Port Folio">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Job Title </label>
                        <input class="form-control" type="text" name="data[job_title]" value="<?php
                        if ($value != NULL) {
                            echo $value->job_title;
                        }
                        ?>" placeholder="Job Title">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Category </label>
                        <select class="form-control form-control-sm" id="category_name" name="category_name">
                            <option value="">Select Category </option>
                            <?php
                            
                                foreach ($category as  $category){
//                                    echo "<pre>";$category->category_name;exit;
                                    ?>
                                        <option  value = ""><?php echo $category['category_name']; ?></option>
                                    
                                    <?php
                                }
                         
                            ?>
                        </select>
                    </div>
                      
                  </div>
                  <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> Experiance of years</label>
                        <input class="form-control" type="number" name="data[experiance]" value="<?php
                        if ($value != NULL) {
                            echo $value->experiance;
                        }
                        ?>" placeholder=" Experiance of years">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Expected Salary </label>
                        <input class="form-control" type="Number" name="data[expected_salary]" value="<?php
                        if ($value != NULL) {
                            echo $value->expected_salary;
                        }
                        ?>" placeholder="Expected Salary">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> About me </label>
                         <textarea name="data[about_me]"  class="form-control" placeholder="About me" rows="3" cols="5"><?php echo @$value->about_me; ?></textarea>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">University 1</label>
                        <input class="form-control" type="text" name="data[university1]" value="<?php
                        if ($value != NULL) {
                            echo $value->university1;
                        }
                        ?>" placeholder="University 1">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">University2 </label>
                        <input class="form-control" type="Number" name="data[university2]" value="<?php
                        if ($value != NULL) {
                            echo $value->university2;
                        }
                        ?>" placeholder="University 2">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label"> university 3 </label>
                          <input class="form-control" type="Number" name="data[university3]" value="<?php
                        if ($value != NULL) {
                            echo $value->university3;
                        }
                        ?>" placeholder="university 3">
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">work company 1</label>
                        <input class="form-control" type="text" name="data[work_company1]" value="<?php
                        if ($value != NULL) {
                            echo $value->work_company1;
                        }
                        ?>" placeholder="work company 1">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">work company 2 </label>
                        <input class="form-control" type="Number" name="data[work_company2]" value="<?php
                        if ($value != NULL) {
                            echo $value->work_company2;
                        }
                        ?>" placeholder="work company 2">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">work company 3 </label>
                          <input class="form-control" type="Number" name="data[work_company3]" value="<?php
                        if ($value != NULL) {
                            echo $value->work_company3;
                        }
                        ?>" placeholder="work company 3">
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Facebook</label>
                        <input class="form-control" type="text" name="data[facebook]" value="<?php
                        if ($value != NULL) {
                            echo $value->facebook;
                        }
                        ?>" placeholder="Facebook">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Twitter </label>
                        <input class="form-control" type="text" name="data[twitter]" value="<?php
                        if ($value != NULL) {
                            echo $value->twitter;
                        }
                        ?>" placeholder="Twitter">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">linkdin </label>
                          <input class="form-control" type="text" name="data[linkdin]" value="<?php
                        if ($value != NULL) {
                            echo $value->linkdin;
                        }
                        ?>" placeholder="Linked in">
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Job Type</label>
                        <input class="form-control" type="text" name="data[job_type]" value="<?php
                        if ($value != NULL) {
                            echo $value->job_type;
                        }
                        ?>" placeholder="Job Type">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">location </label>
                        <textarea name="data[location]"  class="form-control" placeholder="Location" rows="3" cols="5"><?php echo @$value->location; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill 1</label>
                        <input class="form-control" type="text" name="data[skill1]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill1;
                        }
                        ?>" placeholder="Skill 1" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill Percentage</label>
                        <input class="form-control" type="number" name="data[skill1_percentage]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill1_percentage;
                        }
                        ?>" placeholder="Skill Percentage" required>
                       
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill 2</label>
                        <input class="form-control" type="text" name="data[skill2]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill2;
                        }
                        ?>" placeholder="Skill 2" >
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill Percentage</label>
                        <input class="form-control" type="number" name="data[skill2_percentage]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill2_percentage;
                        }
                        ?>" placeholder="Skill Percentage" >
                       
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill 3</label>
                        <input class="form-control" type="text" name="data[skill3]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill3;
                        }
                        ?>" placeholder="Skill 3" >
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill  Percentage</label>
                        <input class="form-control" type="number" name="data[skill3_percentage]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill3_percentage;
                        }
                        ?>" placeholder="skill percentage" >
                       
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill 4 </label>
                        <input class="form-control" type="text" name="data[skill4]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill4;
                        }
                        ?>" placeholder="skill 4" >
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Skill Percentage</label>
                        <input class="form-control" type="number" name="data[skill4_percentage]" value="<?php
                        if ($value != NULL) {
                            echo $value->skill4_percentage;
                        }
                        ?>" placeholder="skill percentage" >
                       
                    </div>
                </div>
             
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">award 1 </label>
                        <input class="form-control" type="text" name="data[award1]" value="<?php
                        if ($value != NULL) {
                            echo $value->award1;
                        }
                        ?>" placeholder="Award 1" >
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">award 1 description</label>
                        <input class="form-control" type="text" name="data[award1_desc]" value="<?php
                        if ($value != NULL) {
                            echo $value->award1_desc;
                        }
                        ?>" placeholder="Award 1 description">
                       
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">award 2 </label>
                        <input class="form-control" type="text" name="data[award2]" value="<?php
                        if ($value != NULL) {
                            echo $value->award2;
                        }
                        ?>" placeholder="Award 2" >
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">award 2 description</label>
                        <input class="form-control" type="text" name="data[award2_desc]" value="<?php
                        if ($value != NULL) {
                            echo $value->award2_desc;
                        }
                        ?>" placeholder="Award 2 Description" >
                       
                    </div>
                </div>
                       <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Award 3 </label>
                        <input class="form-control" type="text" name="data[award3]" value="<?php
                        if ($value != NULL) {
                            echo $value->award3;
                        }
                        ?>" placeholder="Award 3" >
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="example-tel-input" class="col-form-label form-control-label">Award 3 Description</label>
                        <input class="form-control" type="text" name="data[award3_desc]" value="<?php
                        if ($value != NULL) {
                            echo $value->award3_desc;
                        }
                        ?>" placeholder="Award 3 Description" >
                       
                    </div>
                </div>
                  
                
                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">
                <input type="hidden" name="cv_file" value="<?php
                if ($value != NULL) {
                    echo @$value->cv;
                }
                ?>">
                <input type="hidden" name="table" value="workers">
            </form>
        </div>
        <div class="modal-footer">
            <input type="button"  class="btn btn-primary waves-effect waves-light insert_sub_admin" value="Save changes">
        </div> 

    </div>       
</div>

<script>
  

    $("#insert_sub_admin").validate({
        rules: {
<?php if ($value == '') { ?>
                "profile_image": "required",
<?php } ?>
            "data[name]": {
                required: true,
            },

            "data[age]": {
                required: true,
            },
            "data[gender]": {
                required: true,
            },

            "data[speciality]": {
                required: true,
            },
            "data[email]": {
                required: true,
            },
            "data[phone]": {
                required: true,
            },
            "data[country]": {
                required: true,
            },
            "data[city]": {
                required: true,
            },
//            education 1
            "data[education1]": {
                required: true,
            },
                    "data[education1_to]": {
                required: true,
            },
                    "data[education1_from]": {
                required: true,
            },
                    "data[education1_desc]": {
                required: true,
            },
//            education 1
            "data[work1]": {
                required: true,
            },
                    "data[work1_from]": {
                required: true,
            },
                    "data[work1_to]": {
                required: true,
            },
                    "data[work1_desc]": {
                required: true,
            },
            "data[portfolio]": {
                required: true,
            },
                    "data[skill1]": {
                required: true,
            },
                    "data[skill1_percentage]": {
                required: true,
            },
                   
                
        },
        messages: {

        },
    });

    $('.insert_sub_admin').click(function () {
        var validator = $("#insert_sub_admin").validate();
        validator.form();
        if (validator.form() == true) {
            var data = new FormData($('#insert_sub_admin')[0]);

            $.ajax({
                url: "<?php echo base_url(); ?>admin/save_add_work_management",
                type: "POST",
                data: data,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                error: function (request, response) {
                    console.log(request);
                },
                success: function (result) {
                    if (result)
                    {
                        location.reload();
                    }
                }
            });
        }
    });

</script>
<script type="text/javascript">
    
 
    jQuery.validator.addMethod("check_email", function (value, element) {
        var check_email = false;
        var user_id = "<?php echo @$value->user_id; ?>";
        //    alert(doc_id);
        $.ajax({
            url: "<?php echo base_url('admin/check_email'); ?>",
            type: "POST",
            data: {"email": value, "user_id": user_id},
            async: false,
            success: function (result) {
                if (result == 1) {
                    check_email = true;
                } else {
                    check_email = false;
                }
            }
        });
        return check_email;
    }, 'Email Address already taken.');
</script>
<script type="text/javascript">

    function validateimage() {
        var img = document.getElementById('customFile');
        var fileName = img.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

        if (ext == "jpeg" || ext == "jpg" || ext == "png" || ext == "PNG" || ext == "JPG" || ext == "JPEG")
        {
            $('.add_category').removeAttr("disabled");
            $('.validate-file').css("border-color", "#d2d6de");
            //message_alerts("Only png files are allowed","danger");
        } else
        {
            $('.add_category').attr("disabled", "disabled");
            $('.validate-file').css("border", "2px solid red");
            alert("Only png or jpg or jpeg files are allowed", "danger");
        }
    }

</script>