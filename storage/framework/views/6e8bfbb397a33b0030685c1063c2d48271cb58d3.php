<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('styles'); ?>
    <link href="vendor/iCheck/custom.css" rel="stylesheet">
    <link href="vendor/steps/jquery.steps.css" rel="stylesheet">
    <link href="vendor/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="vendor/animate/animate.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <h1>
                        Welcome, we need few clicks to set your system up.
                    </h1>
                </div>
            </div>
        </div>
                        
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <h2>
                            Choose username and password
                        </h2>
                        <p>
                            This account serves as the administrative account, it manages other accounts, choose your password wisely!
                        </p>

                        <form id="form" method="POST" class="wizard-big" action="<?php echo e(url('/install')); ?>">
                         <?php echo e(csrf_field()); ?>

                         <?php if(count($errors) > 0): ?>
                             <div class="alert alert-danger">
                                 <ul>
                                     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                         <li><?php echo e($error); ?></li>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </ul>
                             </div>
                         <?php endif; ?>
                            <h1>Account</h1>
                            <fieldset>
                                <h2>Account Information</h2>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input id="username" name="username" type="email" class="form-control required" placeholder="a valid email address">
                                        </div>
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <input id="password" name="password" type="password" class="form-control required" placeholder="enter password, keep it safe">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password *</label>
                                            <input id="confirm" name="password_confirmation" type="password" class="form-control required" placeholder="reenter password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-center">
                                            <div style="margin-top: 20px">
                                                <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            
                            <h1>Terms and condition</h1>
                            <fieldset class="text-center" style="margin-top: 100px;">
                                <h2>Terms and Conditions</h2>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                            </fieldset>

                            <h1>Finish</h1>
                            <fieldset>
                                <div class="text-center" style="margin-top: 120px">
                                    <h2>You made it :-)</h2>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Click to start</button> 
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>        
                 
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script src="vendor/pace/pace.min.js"></script>

<!-- Steps -->
<script src="vendor/steps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="vendor/validate/jquery.validate.min.js"></script>

<!-- jasny -->
<script src="vendor/jasny/jasny-bootstrap.min.js"></script>

<script>
    $(document).ready(function(){

        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
                });
   });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>