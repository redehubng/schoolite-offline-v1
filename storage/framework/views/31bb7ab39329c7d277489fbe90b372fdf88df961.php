  <div class="row m-b-lg m-t-lg">
                <div class="col-md-5">

                    <div class="profile-image">
                        <img src="<?php echo e(asset('storage/' . $student->image)); ?>" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h3 class="no-margins">
                                    <?php echo e($student->name); ?>

                                </h3>
                                <h4><?php echo e(isset($student->email) ? $student->email : 'no email'); ?>( <?php echo e($student->admin_number); ?> )</h4>
                                Guardian:<a> <?php echo e($student->guardian->title .' '. $student->guardian->name); ?></a>
                                <br>Guardian's Email: <a href="<?php echo e("mailto:" . $student->guardian->email); ?>"> <?php echo e($student->classroom->teacher->email); ?></a>
                                <br>Guardian's Phone: <?php echo e($student->guardian->phone); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                                Sex <strong> <?php echo e($student->sex); ?> </strong>
                            </td>
                            <td>
                                Phone <strong><?php echo e($student->phone); ?></strong>
                            </td>
                            <td>
                                <strong>Class</strong> <?php echo e($student->classroom->name); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                DOB <strong><?php echo e($student->dob); ?></strong>
                            </td>
                             <td>
                                <strong>Level</strong> <?php echo e($student->classroom->level->name); ?>

                            </td>
                            <td>
                                <strong>State of origin</strong> <?php echo e($student->state->name); ?>, <?php echo e($student->lga->name); ?>

                            </td>

                        </tr>
                        <tr>
                            <td>
                                <strong>Class</strong> JSS 1A
                            </td>
                            <td>
                                <strong>House </strong> Green
                            </td>
                            <td>
                                <strong>Address</strong> <?php echo e($student->address); ?>

                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>