<?= $this->extend('layouts/dashboardLayout'); ?>

<?= $this->section('content'); ?>
<?= $this->include('pages/customer/includes/sidebar'); ?>
        <div id="body" class="active">
            <!-- navbar navigation component -->
           <?= $this->include('pages/customer/includes/navbar')?>
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    <?= $this->include('pages/customer/includes/cards'); ?>
                    <?= $this->include('pages/customer/includes/postCard'); ?>
                   
                </div>
            </div>
        </div>
<?= $this->endSection(); ?>

<?php if (!$biodata): ?>

<?=$this->section('extra_js');?>
<script>
$().ready(function(){
    $.confirm({
    title: 'Complete Your Profile!',
    content: '',
    type: 'red',
    typeAnimated: true,
    buttons: {
      
        cancel: function () {
            $.alert('Canceled!');
        },
        somethingElse: {
            text: 'Proceed',
            btnClass: 'btn-blue',
            keys: ['enter', 'shift'],
            action: function(){
                $.confirm({
            title: 'Prompt!',
            row:'row',
            columnClass: 'col-md-6',
            content: '' +
            '<form action="" class="formName">' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>State</label>' +
            '<input type="text" placeholder="Your state" name="state" class="state form-control" required />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>Country</label>' +
            '<input type="text" placeholder="Your country" name="country" class="country form-control" required />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>DOB</label>' +
            '<input type="date" placeholder="DOB" name="dob" class="dob form-control" required />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>Education</label>' +
            '<input type="text" placeholder="Highest education" name="education" class="education form-control" required />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>Graduate Yr</label>' +
            '<input type="text" placeholder="Year Graduate" name="education_yr" class="education_yr form-control" required />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>Residential Address</label>' +
            '<textarea type="text" placeholder="Your address" name="address" class="address form-control" required></textarea/>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>Next of Kin</label>' +
            '<input type="text" placeholder="Next of Kin" name="nexofkin" class="nexofkin form-control" required />' +
            '</div>' +
            '</div>' +
            '<div class="col-md-6">' +
            '<div class="form-group">' +
            '<label>Address of next of kin</label>' +
            '<textarea type="text" placeholder="Next of kin address" name="nexofkin_address" class="nexofkin_address form-control" required></textarea/>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</form>',
    buttons: {
        formSubmit: {
            text: 'Submit',
            btnClass: 'btn-blue',
            action: function () {
                var state = this.$content.find('.state').val();
                var country = this.$content.find('.country').val();
                var address = this.$content.find('.address').val();
                var dob = this.$content.find('.dob').val();
                var education = this.$content.find('.education').val();
                var education_yr = this.$content.find('.education_yr').val();
                var nexofkin = this.$content.find('.nexofkin').val();
                var nexofkin_address = this.$content.find('.nexofkin_address').val();
                if(!state || !country || !address || !dob || !nexofkin || !nexofkin_address || !education_yr || !education){
                    $.alert('provide a valid input');
                    return false;
                }
                
                var biodata = {
                     'state':state,
                     'country':country,
                     'address':address,
                     'dob':dob,
                     'nexofkin_address':nexofkin_address,
                     'nexofkin':nexofkin,
                     'education':education,
                     'education_yr':education_yr,
                   }
                $.ajax({
                url: "<?=base_url('user/biodata/update')?>",
                type: "POST",
                data: biodata,
                dataType: "json",
                success: function(res) {
                 if(res.success == true){
              //       setTimeout(function(){
                    // window.location.reload()
              //       }, 2000);
              $.confirm({
                title:'Your profile has been updated',
                     content: '',
                            icon: 'fa fa-smile-o',
                            theme: 'modern',
                            closeIcon: true,
                            animation: 'scale',
                            type: 'green',
                        });

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
            jc.$formSubmit.trigger('click'); // reference the button and click it
        });
    }
});
            }
        }
    }
});
   
})
</script>
<?=$this->endSection();?>

<?php endif; ?>
