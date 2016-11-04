<?php



function generate_student_admin_number($format = '2018/2019'){

    $session = \App\Session::where('status', '=', 'active')->first();

    if(isset($session) && !is_null($session)){


        $last_admin_number = \App\Student::where('admin_number', 'like', '%' . $format . '%')->count();

        $admin_number =  str_pad(++$last_admin_number, 4, '0', 0);

        return $admin_number;
    }else{
        return '';
    }
}