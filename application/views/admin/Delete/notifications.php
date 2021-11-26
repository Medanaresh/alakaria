<!-- Side-Nav-->
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="main-header">
            <h4><?=@$page['title']?></h4>
            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
               <li class="breadcrumb-item"><a href=""><i class="icofont icofont-home"></i></a>
               </li>
               <li class="breadcrumb-item"><a href=""><?=@$page['title']?></a>
               </li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-header-text"><?php echo @$page['title']; ?></h5>
               </div>
               <div class="card-block">
                  <div class="data_table_main table-responsive">
                     <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S no</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Type of Contact</th>
                              <th>Date</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S no</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Type of Contact</th>
                              <th>Date</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value){
                              $sn=1; foreach($value as $user)
                              {?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $user->name; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td><?php echo $user->type; ?></td>
                              <td><?php echo $user->registered_at; ?></td>
                           </tr>
                           <?php } } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid ends -->
</div>
</div>