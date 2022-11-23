<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/customer/includes/sidebar'); ?>
<div id="body" class="active">
       <!-- navbar navigation component -->
       <?= $this->include('pages/customer/includes/navbar') ?>
       <!-- end of navbar navigation -->
       <div class="content">
              <div class="container">
              <div class="col-md-12 mx-auto">
                <?= $this->include('includes/alerts'); ?>
            </div>

                     <div class="page-title">
                            <h3>View Tickets
                                   <a href="<?= base_url('user/ticket/create') ?>" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user"></i> Create Ticket</a>
                            </h3>
                     </div>
                     <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                            
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tickets as $ticket):?>
                                <tr>
                                <!-- <td>Philip Chaney</td> -->
                                <td><?=$ticket['user_email']?></td>
                                <td><?=$ticket['subject']?></td>
                                <td>
                                    <?php if($ticket['status'] == 0):?>
                                        <button class="btn btn-sm btn-warning">pending</button>
                                    <?php endif; ?>
                                </td>
                                <td><?= date("M-Y", strtotime($ticket['created_at']));?></td>
                                <td class="text-end">
                                <a href="<?=base_url('user/ticket')?>/<?=$ticket['id']?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-eye"></i></a>
                                </td>
                                </tr>
                                 
                                    <?php endforeach;?>
                                  
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