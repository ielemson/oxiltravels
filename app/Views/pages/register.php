<?= $this->extend('layouts/homeLayout'); ?>
<?= $this->section('content'); ?>

<?= $this->include('includes/header') ?>
<!-- Breadcrumbs -->
<?= $this->include('includes/banner') ?>
<!-- Why choose us-->
<section class="section section-md section-first bg-default text-md-left">
    <div class="container">
    <div class="col-md-6 mx-auto">
<?= $this->include('includes/_notification'); ?>

</div>
        <h4 class="text-spacing-50">Fill the form properly</h4>
        <form id="registerForm" action="<?=base_url('customer/register/store')?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <?= csrf_field() ?>
    
            <div class="row row-14 gutters-14">
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="name">Your Name</label>
                        <input class="form-input" id="name" type="text" name="name">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="email">E-mail</label>
                        <input class="form-input" id="email" type="email" name="email">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="phone">Phone with country code</label>
                        <input class="form-input" id="phone" type="tel" name="phone">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="gender">Gender</label>
                        <select class="form-input" id="gender" type="text" name="gender">
                            <option>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>

                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="dob">Date of Birth</label>
                        <input class="form-input" id="gender" type="date" name="dob">

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="year">Highest Level of Education</label>
                        <input class="form-input" id="year" type="text" name="education" id="education">

                    </div>
                </div> -->
                <!-- <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="year">Year of Education</label>
                        <input class="form-input" id="education_yr" type="text" name="education_yr">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="kin">Name of Nex of Kin</label>
                        <input class="form-input" id="kin" type="text" name="kin">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="Kin_address">Address of Nex of Kin</label>
                        <input class="form-input" id="kin_address" type="text" name="kin_address">

                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="referral">Password</label>
                        <input class="form-input" id="password" type="password" name="password" required>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="referral">Confirm Password</label>
                        <input class="form-input" id="password_confirm" type="password" name="password_confirm" required>

                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-wrap">
                        <label class="" for="payment">Payment Proof</label>
                        <input class="form-input" id="file" type="file" name="file">

                    </div>
                </div> -->
            </div>
            <button class="button button-primary button-pipaluk" id="btnPayment" type="submit">Submit</button>
        </form>
    </div>
</section>

<?= $this->endSection(); ?>
<!-- Page Header-->


<?= $this->section('extra-js'); ?>

<script>
    $.validator.setDefaults({
        // submitHandler: function() {
        //     $('#btnPayment').html('Sending..');
        //     $.ajax({
        //         url: "<?=base_url('customer/payment/store')?>",
        //         type: "POST",
        //         data: $('#signupForm').serialize(),
        //         dataType: "json",
        //         success: function(response) {
        //             console.log(response);
        //             document.getElementById("signupForm").reset()
        //         }
        //     });
        // }

    submitHandler: function(form) {
    form.submit();
  }
    });

    $(document).ready(function() {
        $("#registerForm").validate({
            rules: {
                name: "required",
                gender: "required",
                dob: "required",
                education: "required",
                education_yr: "required",
                kin: "required",
                Kin_address: "required",
                file: "required",
                password: {
					required: true,
					minlength: 5
				},
				password_confirm: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
                phone: {
                    required: true,
                    number: true,
                    minlength: 10
                },

                email: {
                    required: true,
                    email: true
                },
                agree: "required"
            },
            messages: {
                name: "*required",
                password: "*required",
                password_confirm: "*required",
                gender: "*required",
                dob: "*required",
                education_yr: "*required",
                education: "*required",
                kin: "*required",
                kin_address: "*required",
                file: "*required",
                phone: {
                    required: "*required",
                },
                email: "*required",
                password: {
					required: "*required",
					minlength: "Your password must be at least 5 characters long"
				},
				password_confirm: {
					required: "*required",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Password mismatch"
				},
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }
        });


    });
</script>

<?= $this->endSection(); ?>

<?= $this->section('extra-css') ?>
<style>
    .error {
        font-weight: bolder;
        color: crimson;
    }
    .border-width-4 {
  border-width: 4px !important;
}
.alert_btn{
    -webkit-box-shadow: 6px 6px 5px -1px rgba(189,189,189,1);
-moz-box-shadow: 6px 6px 5px -1px rgba(189,189,189,1);
box-shadow: 6px 6px 5px -1px rgba(189,189,189,1);
}
</style>


<?= $this->endSection('extra-css') ?>