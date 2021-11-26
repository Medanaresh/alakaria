<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
<!-- Container-fluid starts -->
<div class="container-fluid">
   <!-- Row Starts -->
   <div class="row">
      <div class="col-sm-12">
         <div class="main-header">
            <h4>Home</h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
               <li class="breadcrumb-item">
                  <a href="#">
                  <i class="icofont icofont-home"></i>
                  </a>
               </li>
               <li class="breadcrumb-item"><a href="#:" >Add/Edit Sub Categories</a></li>
            </ol>
         </div>
      </div>
   </div>
   <!-- Row end -->
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5 class="card-header-text"> Sub Categories</h5>
               <span>
               <button class="btn btn-primary waves-effect waves-light pull-right insert_sub_category" data-name="<?php echo @$current_page; ?>" style="margin-left:65%">Add SubCategories</button></span>
            </div>
            <div class="card-block">
               <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
                  <thead>
                     <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Sub Category Name En</th>
                        <th>Sub Category Name Ar</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Sub Category Name En</th>
                        <th>Sub Category Name Ar</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                        $counter = 1;
                        foreach($sub_categories as $sub) 
                        {   
                        if ($sub->status == "1") 
                        {
                            $status = "tag tag-success" ;
                            $status1='Active';
                        } else 
                        {
                           $status = "tag tag-default" ;
                           $status1='InActive';
                        }  ?>
                     <tr id="hide<?php echo $sub->sub_id;?>">
                        <td style="width:30px;"><?php echo $counter;?></td>
                        <?php $cat_name=$this->db->select('category_name_en')->from('categories')->where('cat_id',$sub->cat_id)->get()->row_array()['category_name_en']; ?>
                        <td style="width:30px;"><?php echo $cat_name;?></td>
                        <td style="width:30px;"><?php echo $sub->sub_category_name_en;?></td>
                        <td style="width:30px;"><?php echo $sub->sub_category_name_ar;?></td>
                        <td style="width:30px;"><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                        <td style="white-space: nowrap; width: 1%;">
                           <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                              <div class="btn-group btn-group-sm" style="float: none;">
                                 <div class="btn-group btn-group-sm" style="float: none;">                            
                                    <button type="button" data-id="<?php echo $sub->sub_id;?>" class="btn btn-primary waves-effect waves-light insert_sub_category" style="float: none;margin: 5px;"> <span class="icofont icofont-ui-edit"></span></button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light delete_sub_cat" data-id="<?php echo $sub->sub_id?>"  style="float: none;margin: 5px;"><span class="icofont icofont-ui-delete"></span></button>
                                 </div>
                              </div>
                        </td>
                     </tr>
                     <?php  $counter++;
                        }
                        ?>                            
                  </tbody>
               </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid ends -->
</div>
<!-- CONTENT-WRAPPER-->
<section>
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "insert_sub_category" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
<script>     
   var $modal = $('#insert_sub_category');
   $('.insert_sub_category').on('click',function(event){          
       var id = $(this).data('id'); 
   //  alert(id);
       event.stopPropagation();
       $modal.load('<?php echo site_url('admin/add_sub_categories');?>', {id: id},
       function(){           
       $modal.modal('show');
       });
   });
     //delete 
    $('.delete_sub_cat').on('click',function(event){      
       var id = $(this).data('id');
       swal({
       title: "Are you sure?",
       text: "Your will not be able to recover data!",
       type: "warning",
       showCancelButton: true,
       confirmButtonClass: "btn-danger",
       confirmButtonText: "Yes, delete it!",
       closeOnConfirm: false
       },
       function()
       {     
        $.ajax({                
               url: "<?php echo base_url();?>admin/delete_sub_categories",
               type: "POST",
               data: {id:id},
               error:function(request,response){
                   console.log(request);
               },                  
               success: function(result){
                   var res = jQuery.parseJSON(result);
                   if(res.status='success'){
                       $("#hide"+id).hide();
                       location.reload();
                   }                   
               }
         });
       });        
   });              
</script>