<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/dashboard/includes/sidebar'); ?>
<div id="body" class="active">
       <!-- navbar navigation component -->
       <?= $this->include('pages/dashboard/includes/navbar') ?>
       <!-- end of navbar navigation -->
       <div class="content">
              <div class="container">
                     <div class="col-md-12 mx-auto">
                            <?= $this->include('includes/alerts'); ?>
                     </div>
                     <div class="page-title">
                            <h3>Users
                                   <a href="<?= base_url('admin/user/create') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user-plus"></i> Ceate User</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                            <div class="box-body">
                                   <table width="100%" class="table table-hover" id="dataTables-example">
                                          <thead>
                                                 <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                        <!-- <th>Type</th> -->
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                 </tr>
                                          </thead>
                                          <tbody>
                                                 <?php if ($users) { ?>
                                                        <?php foreach ($users as $key => $user) { ?>

                                                               <tr>
                                                                      <td><?= $user['name'] ?></td>
                                                                      <td><?= $user['email'] ?></td>
                                                                      <td><?= $user['role'] ?></td>
                                                                      <!-- <td><?= $user['role'] ?></td> -->
                                                                      <td>Active</td>
                                                                      <td class="text-end">
                                                                             <a href="<?= base_url('admin/user/edit') ?>/<?= $user['id'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                                                             <a href="#" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash" data-id="<?=$user['id']?>"></i></a>
                                                                      </td>
                                                               </tr>
                                                        <?php }
                                                 } else { ?>
                                                        <!-- =============== SECTION BANNER =============== -->
                                                        <section class="padding-bottom mx-auto">
                                                               <article class="box d-flex flex-wrap align-items-center p-5 bg-info">
                                                                      <div class="text-white mr-auto">
                                                                             <h3>Opps!! :(</h3>
                                                                             <p> We do not have these products in stock, please check back later. </p>
                                                                      </div>
                                                                      <!-- <div class="mt-3 mt-md-0"><a href="#" class="btn btn-outline-light">Learn more</a></div> -->
                                                               </article>
                                                        </section>
                                                        <!-- =============== SECTION BANNER .//END =============== -->
                                                 <?php } ?>



                                          </tbody>
                                   </table>
                            </div>
                     </div>
              </div>
       </div>
</div>
<?= $this->endSection(); ?>




<?=$this->section('extra_js');?>
<script>

$( ".fa-trash" ).click(function() {
 var attr = $(this).attr("data-id");
   
 $.confirm({
    title: 'Warning!'+attr,
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
                url: "<?=base_url('admin/user/destroy')?>",
                type: "POST",
                data: id,
                dataType: "json",
                success: function(res) {
                 if(res.success == true){
                    $.alert('User deleted');
                    setTimeout(function(){
                    window.location.reload()
                    }, 2000);
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

</script>
<?=$this->endSection();?>