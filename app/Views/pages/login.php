  <?= $this->extend('layouts/homeLayout'); ?>
  <?= $this->section('content'); ?>

  <?= $this->include('includes/header') ?>
  <!-- Breadcrumbs -->
  <?= $this->include('includes/banner') ?>
  <!-- Why choose us-->
  <section class="section section-xl bg-default text-md-left">

    <div class="container">
      <div class="col-md-6 mx-auto">
        <?= $this->include('includes/alerts'); ?>
      </div>
      <div class="row row-50 justify-content-md-center">

        <div class="col-md-10 col-lg-8">
          <div class="card-login-register" id="card-l-r">
            <div class="card-top-panel">
              <div class="card-top-panel-left">
                <h4 class="card-title card-title-login">Login</h4>
                <h4 class="card-title card-title-register">Register</h4>
              </div>

            </div>
            <div class="card-form card-form-login">
              <div class="button-social"><a class="button button-icon button-icon-left button-facebook button-pipaluk" href="#"><span class="icon fa fa-facebook"></span>Facebook</a><a class="button button-icon button-icon-left button-twitter button-pipaluk" href="#"><span class="icon fa fa-twitter"></span>Twitter</a><a class="button button-icon button-icon-left button-google button-pipaluk" href="#"><span class="icon fa fa-google"></span>Google</a></div>
              <div class="text-decoration-lines text-center"><span class="text-decoration-lines-content">or</span></div>

              <form id="loginForm"  action="<?= base_url('auth/user/login') ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-wrap">
                  <label class="form-label" for="form-login-name-1">Email</label>
                  <input class="form-input" id="form-login-name-1" type="email" name="email" data-constraints="@Required">
                </div>
                <div class="form-wrap">
                  <label class="form-label" for="form-login-password-1">Password</label>
                  <input class="form-input" id="form-login-password-1" type="password" name="password" data-constraints="@Required">
                </div>
                <label class="checkbox-inline">
                  <input name="input-checkbox-1" value="checkbox-1" type="checkbox">Remember Me
                </label>
                <button class="button button-block button-primary button-pipaluk" type="submit">Sign in</button>
              </form>
            </div>

          </div>
        </div>
      </div>
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
      //         url: "<?= base_url('customer/payment/store') ?>",
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
      $("#loginForm").validate({
        rules: {
          
          password: {
            required: true,
            minlength: 5
          },
          
          email: {
            required: true,
            email: true
          },
   
        },
        messages: {
          
          email: "*required",
          password: {
            required: "*required",
            minlength: "Your password must be at least 5 characters long"
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

    .alert_btn {
      -webkit-box-shadow: 6px 6px 5px -1px rgba(189, 189, 189, 1);
      -moz-box-shadow: 6px 6px 5px -1px rgba(189, 189, 189, 1);
      box-shadow: 6px 6px 5px -1px rgba(189, 189, 189, 1);
    }
  </style>


  <?= $this->endSection('extra-css') ?>