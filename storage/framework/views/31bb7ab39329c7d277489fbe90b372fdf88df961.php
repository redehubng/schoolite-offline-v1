  <div class="row m-b-lg m-t-lg">
                <div class="col-md-5">

                    <div class="profile-image">
                        <img src="<?php echo e(is_file(asset('storage/' . $student->image)) ? asset('storage/' . $student->image) : asset('storage/images/' . strtolower($student->sex) . '.png')); ?>" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h3 class="no-margins">
                                    <?php echo e($student->name); ?>

                                </h3>
                                <h4><?php echo e(isset($student->email) ? $student->email : 'no email'); ?>( <?php echo e($student->admin_number); ?> )</h4>
                                Guardian:<a href=" <?php echo e(url('admin/guardians/' . $student->guardian->id)); ?>" title="<?php echo e('view ' . $student->guardian->name . ' profile'); ?>" target="_blank"> <?php echo e($student->guardian->title .' '. $student->guardian->name); ?></a>
                                <br>Guardian's Email: <a href="<?php echo e("mailto:" . $student->guardian->email); ?>"> <?php echo e($student->guardian->email); ?></a>
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
                                DOB <strong><?php echo e($student->dob->format('m/d/Y')); ?></strong>
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
                                <strong>Age</strong> <?php echo e($student->dob->diffInYears()); ?>

                            </td>
                            <td>
                                <strong>House </strong> <?php echo e($student->house->name); ?>

                            </td>
                            <td>
                                <strong>Address</strong> <?php echo e($student->address); ?>

                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>