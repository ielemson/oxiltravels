<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
<div id="body" class="active">
       <!-- navbar navigation component -->
       <?= $this->include('pages/dashboard/includes/navbar') ?>
       <!-- end of navbar navigation -->
       <div class="content">
              <div class="container">
                     <div class="page-title">
                            <h3>Createe Post Category
                                   <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Dashboard</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                            <div class="box-body">
                                   Create Post Category
                            </div>
                     </div>
                     <div class="row">
                     <div class="col-lg-6">
                            <div class="col-md-12 mx-auto">
                                   <?= $this->include('includes/alerts'); ?>
                            </div>

                            <div class="card">
                                   <div class="card-header">Create new post category</div>
                                   <div class="card-body">
                                          <form id="paymentForm" action="<?= base_url('admin/post/category/save') ?>" class="needs-validation" novalidate method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                                                 <?= csrf_field() ?>
                                                 <div class="row g-2">
                                                        <div class="mb-3 col-md-12">
                                                               <label for="title" class="form-label">Category</label>
                                                               <input type="text" class="form-control" name="name" placeholder="post category" required>
                                                               <div class="valid-feedback">Looks good!</div>
                                                               <div class="invalid-feedback">Please enter your post category.</div>
                                                        </div>


                                                        <div class="mb-3 col-md-12">
                                                               <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Create Category</button>
                                                        </div>
                                                 </div>

                                          </form>
                                   </div>
                            </div>

                          
                     </div>
                     <div class="col-lg-6">
                            <div class="col-md-12 mx-auto">
                                   <?= $this->include('includes/alerts'); ?>
                            </div>

                            <div class="card">
                                   <div class="card-header">Category List</div>
                                   <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                           <?php if(count($categories)>0):?>
                                                 <tbody>
                                               
                                                   
                                                    <?php foreach($categories as $category):?>
                                                         <tr>
                                                        <td><?=$category['name']?></td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm delete" data-id="<?=$category['id']?>" >delete</button>
                                                        <button class="btn btn-info btn-sm update" data-id="<?=$category['id']?>" data-name="<?=$category['name']?>">update</button>
                                                    </td> 
                                                 </tr>
                                                        <?php endforeach; ?>
                                                        <?php else: ?>
                                                          <tr>
                                                      
                                                    <td>
                                                    <i class="alert-info p-2"> No Category found</i> 

                                                    </td> 
                                                 </tr>
                                                 <?php endif; ?>
                                               
                                          
                                            </tbody>
                                                 
                                        </table>
                                    </div>
                                   </div>
                            </div>

                          
                     </div>
                     </div>
                     
              </div>
       </div>
</div>
<?= $this->endSection(); ?>


<?=$this->section('extra_js');?>
<script>

$( ".delete" ).click(function() {
 var attr = $(this).attr("data-id");
   
 $.confirm({
    title: 'Warning!',
    content: 'Proceed with action ?',
    type: 'red',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Delete',
            btnClass: 'btn-red',
            action: function(){
              var id = {'id': attr}
            $.ajax({
                url: "<?=base_url('admin/post/category/destroy')?>",
                type: "POST",
                data: id,
                dataType: "json",
                success: function(res) {
                 if(res.success == true){
                    $.alert('Category removed');
                    setTimeout(function(){
                    window.location.reload()
                    }, 2000);
                 }else if(res.error == true){
                    $.alert('Category is used in a post, kindly delete post associated with this category.');
                 }else{
                     $.alert('Error! contact admin');
                 }
                }
            });
            }
        },
        close: function () {
        }
    }
});


});

// Upddate
$( ".update" ).click(function() {
 var id = $(this).attr("data-id");
 var name = $(this).attr("data-name");

 $.confirm({
    type: 'blue',
    title: 'Prompt!',
    content: '' +
    '<form action="" class="formName">' +
    '<div class="form-group">' +
    '<label>Enter category to update</label>' +
    `<input type="text" placeholder="Your name" class="name form-control" required  value="${name}"/>` +
    '</div>' +
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                var name = this.$content.find('.name').val();
                if(!name){
                    $.alert('provide a valid name');
                    return false;
                }
                var cate_data = {
                     'id': id, 
                     'name':name
                   }
                $.ajax({
                url: "<?=base_url('admin/post/category/update')?>",
                type: "POST",
                data: cate_data,
                dataType: "json",
                success: function(res) {
                 if(res.success == true){
              //       setTimeout(function(){
                    window.location.reload()
              //       }, 2000);
                 }else{
                    $.alert('Error!');
                 }
                }
            });
            }
        },
        cancel: function () {
            //close
        },
    },
    onContentReady: function () {
        // bind to events
        var jc = this;
        this.$content.find('form').on('submit', function (e) {
            // if the user submits the form by pressing enter in the field.
            e.preventDefault();
            jc.$$formSubmit.trigger('click'); // reference the button and click it
        });
    }
});
});
</script>
<?=$this->endSection();?>