<style>
    #save_form label.error {
        color:red;
    }
    #save_form input.error,textarea.error,select.error {
        border:1px solid red;
        color:red;
    }
    .popover {
    z-index: 2000;
    position:relative;
    }
    .save_form.fa-spin {
      display:block;
    }
</style>
<?php // print_r($value); exit;?>
    <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <!-- Main content starts -->
            <div>
                <!-- Header Starts -->
                <div class="row">
                    <div class="col-sm-12 p-0">
                        <div class="main-header">
                            <h4><?=@$page['title']?></h4>
                            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                <li class="breadcrumb-item">
                                    <a href="">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item"><a href="#"><?=@$page['title']?></a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- Header end -->


                <!-- Row start -->
                <div class="row">
                    <!-- Article Editor start -->
                    <div class="col-md-12">
                        <div class="card">
                          <form id="save_form"> <!--action="<?php echo base_url().'admin/save_data'; ?>" method="post"-->
                            <!-- <div class="card-header">
                                <h5 class="card-header-text">Title En</h5>
                            </div> -->
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                <label for="title_en" class="form-control-label">Title En</label>
                <input type="text" class="form-control" name="data[title_en]" value="<?php echo @$value->title_en; ?>" />

                </div>

                                    </div>
                                    <div class="col-md-6">
                                      <label for="title_ar" class="form-control-label">Title Ar</label>
                                        <input type="text" class="form-control" name="data[title_ar]" value="<?php echo @$value->title_ar; ?>" />
                                    </div>
                                </div>
                            </div>


                            <div class="card-header">
                                <h5 class="card-header-text">Text En</h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                      <label for="text_en"></label>
                                        <textarea name="data[text_en]" id="text_en"><?php echo @$value->text_en; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h5 class="card-header-text">Text Ar</h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                      <label for="text_ar"></label>
                                        <textarea name="data[text_ar]" id="text_ar"><?php echo @$value->text_ar; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                            <input type="hidden" name="id[id]" value="<?php echo @$value->id; ?>" />
                            <input type="hidden" name="table" value="banners" />
                            <input type="button" value="Save Changes" class=" btn btn-primary waves-effect waves-light m-r-30 save_form" />
                            </div>
                            <div class="clearfix"></div>
                            <br/>
                          </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- <script type="text/javascript">
        CKEDITOR.replaceALL( {
        toolbar: [{
                name: 'clipboard',
                items: ['Undo', 'Redo']
            }, {
                name: 'styles',
                items: ['Styles', 'Format']
            }, {
                name: 'basicstyles',
                items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
            }, {
                name: 'paragraph',
                items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
            }, {
                name: 'links',
                items: ['Link', 'Unlink']
            }, {
                name: 'insert',
                items: ['Image', 'EmbedSemantic', 'Table']
            }, {
                name: 'tools',
                items: ['Maximize']
            }, {
                name: 'editing',
                items: ['Scayt']
            }]
    } );
    </script> -->
    <script>
    $(document).ready(function(){
      CKEDITOR.replace('data[text_en]');
      CKEDITOR.replace('data[text_ar]');
    $("#save_form").validate({
                ignore: [],
                rules: {
                    "data[title_en]"   : "required",
                    "data[title_ar]"   : "required",
                    "data[text_en]"   : {
                        required: function(textarea)
                        {
                            CKEDITOR.instances[textarea.id].updateElement();
                              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                              return editorcontent.length === 0;
                        }
                      },
                    "data[text_ar]"   : {
                        required: function(textarea)
                        {
                            CKEDITOR.instances[textarea.id].updateElement();
                              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                              return editorcontent.length === 0;
                        }
                      },
                },
                messages : {
                    "data[title_en]"   : "required",
                    "data[title_ar]"   : "required",
                    "data[text_en]"   : "required",
                    "data[text_ar]"   : "required",

                },
        });
        $('.save_form').click(function(){

            var validator = $("#save_form").validate();
                validator.form();
                if(validator.form() == true){
                     $('.save_form').html("<i class='fa fa-spinner fa-spin'></i>");
                      var data = new FormData($('#save_form')[0]);
                    $.ajax({
                        url: "<?php echo base_url().'admin/save_data'; ?>",
                        type: "POST",
                        data: data,
                        mimeType: "multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData:false,
                        error:function(request,response){
                            console.log(request);
                        },
                        success: function(result){
                            if (result == "success") {
                               location.reload();
                            }
                        }
                    });
                }
            });
    });
    </script>
