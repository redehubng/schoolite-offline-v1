<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/




Route::get('/install', 'HomeController@install')->name("install");
Route::post('/install', 'HomeController@setup');

Route::get('', 'Auth\LoginController@showLoginForm');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::post('get_list_of_states/{country_id}', function($country_id){

       return \App\Country::with('states')->findOrFail($country_id)->states;
    });

    Route::post('get_list_of_lgas/{state_id}', function($state_id){

        return \App\State::with('lgas')->findOrFail($state_id)->lgas;
    });

    Route::group(['middleware' => 'admin'], function () {

        Route::get('admin', 'AdminController@dashboard')->name('admin_dashboard');
        Route::get('admin/sessions', 'SessionController@index')->name('sessions');
        Route::post('admin/sessions/create', 'SessionController@store')->name('create_sessions');

        Route::put('admin/sessions/{session_id}/close', 'SessionController@closeSession')->name('close_session');

        Route::put('admin/sessions/{session_id}/start_first_term', 'SessionController@startFirstTerm')->name('start_first_term');
        Route::put('admin/sessions/{session_id}/close_first_term', 'SessionController@closeFirstTerm')->name('close_first_term');

        Route::put('admin/sessions/{session_id}/start_second_term', 'SessionController@startSecondTerm')->name('start_second_term');
        Route::put('admin/sessions/{session_id}/close_second_term', 'SessionController@closeSecondTerm')->name('close_second_term');

        Route::put('admin/sessions/{session_id}/start_third_term', 'SessionController@startThirdTerm')->name('start_third_term');
        Route::put('admin/sessions/{session_id}/close_third_term', 'SessionController@closeThirdTerm')->name('close_third_term');


        Route::get('admin/houses', 'HouseController@index')->name('admin_houses');
        Route::post('admin/houses', 'HouseController@store')->name('admin_houses_store');

        Route::get('admin/students', 'StudentController@index')->name('admin_students');
        Route::post('admin/students', 'StudentController@store')->name('admin_create_students');
        Route::get('admin/students/create', 'StudentController@create')->name('admin_create_students_form');
        Route::get('admin/students/{student_id}', 'AdminController@showStudent')->name('admin_students_show');
        Route::get('admin/students/{student_id}/results/session/{session_id}/view', 'AdminController@showStudentResult')->name('admin_students_show_results');
        Route::post('admin/students/{student_id}/results/session/{session_id}/update', 'AdminController@updateStudentResult')->name('admin_students_update_results');
        Route::get('admin/students/{student_id}/results', 'StudentController@showResults')->name('admin_students_print_results');
        Route::get('admin/students/{student_id}/results/session/{session_id}/edit', 'AdminController@editStudentResult')->name('admin_students_show_edit_results');
        Route::get('admin/students/{student_id}/edit', 'StudentController@edit')->name('admin_students_edit');
        Route::put('admin/students/{student_id}', 'StudentController@update')->name('admin_students_update');
        Route::delete('admin/students/{student_id}', 'StudentController@destroy')->name('admin_students_destroy');


        Route::get('admin/guardians', 'GuardianController@index')->name('admin_guardians');
        Route::get('admin/guardians/create', 'GuardianController@create')->name('admin_create_guardians_form');
        Route::post('admin/guardians', 'GuardianController@store')->name('admin_create_guardians');
        Route::get('admin/guardians/{guardian_id}', 'GuardianController@show')->name('admin_guardians_show');
        Route::get('admin/guardians/{guardian_id}/edit', 'GuardianController@edit')->name('admin_guardians_edit');
        Route::put('admin/guardians/{guardian_id}', 'GuardianController@update')->name('admin_guardians_update');
        Route::delete('admin/guardians/{guardian_id}', 'GuardianController@destroy')->name('admin_guardians_destroy');



        Route::get('admin/teachers', 'TeacherController@index')->name('admin_teachers');
        Route::get('admin/teachers/create', 'TeacherController@create')->name('admin_create_teacher_form');
        Route::post('admin/teachers', 'TeacherController@store')->name('admin_create_teacher');
        Route::get('admin/teachers/{teacher_id}', 'TeacherController@show')->name('admin_teachers_show');
        Route::get('admin/teachers/{teacher_id}/edit', 'TeacherController@edit')->name('admin_teachers_edit');
        Route::put('admin/teachers/{teacher_id}', 'TeacherController@update')->name('admin_teachers_update');
        Route::delete('admin/teachers/{teacher_id}', 'TeacherController@destroy')->name('admin_teachers_destroy');


        Route::get('admin/levels', 'LevelController@index')->name('admin_levels');
        Route::post('admin/levels', 'LevelController@store')->name('admin_levels_create');
        Route::get('admin/levels/{level_id}', 'LevelController@show')->name('admin_levels_show');
        Route::get('admin/levels/{level_id}/edit', 'LevelController@edit')->name('admin_levels_edit');
        Route::put('admin/levels/{level_id}', 'LevelController@update')->name('admin_levels_update');
        Route::delete('admin/levels/{level_id}', 'LevelController@destroy')->name('admin_levels_destroy');


        Route::get('admin/classrooms', 'ClassroomController@index')->name('admin_classrooms');
        Route::post('admin/classrooms', 'ClassroomController@store')->name('admin_create_classrooms');
        Route::get('admin/classrooms/{classroom_id}', 'ClassroomController@show')->name('admin_view_classroom');
        Route::put('admin/classrooms/{classroom_id}', 'ClassroomController@update')->name('admin_update_classroom');
        Route::delete('admin/classrooms/{classroom_id}/destroy', 'ClassroomController@destroy')->name('admin_delete_classroom');

        Route::get('admin/subjects', 'SubjectController@index')->name('admin_subjects');
        Route::post('admin/subjects', 'SubjectController@store')->name('admin_create_subjects');

        Route::post('admin/classroom_subjects', 'ClassroomSubjectController@store')->name('admin_create_classroomsubject');
        Route::put('admin/classroom_subjects/{classroomsubject_id}', 'ClassroomSubjectController@update')->name('admin_update_classroomsubject');

        Route::get('admin/results', 'AdminController@showResults')->name('admin_show_results');

    });





    Route::get('teacher', 'TeacherController@dashboard')->name('teacher_dashboard');
    Route::get('teacher/classrooms/{classroom_id}', 'TeacherController@showClassroom')->name('teacher_classroom');
    Route::get('teacher/classrooms/{classroom_id}/students/{student_id}', 'TeacherController@showStudent')->name('teacher_classroom_student');
    Route::get('teacher/classrooms/{classroom_id}/subjects/{subject_id}', 'TeacherController@showSubject')->name('teacher_classroom_subject');


    Route::post('teacher/classrooms/{classroom_id}/subjects/{subject_id}/students/{student_id}/results/create', 'TeacherController@storeStudentSubjectScore')->name('teacher_store_student_subject_scores');
    Route::get('teacher/classrooms/{classroom_id}/students/{student_id}/results', 'StudentController@showResults')->name('teacher_show_student_results_scores');

    Route::get('guardian', 'GuardianController@dashboard');
    Route::get('guardian/wards/{student_id}', 'GuardianController@showWard');
    Route::get('guardian/wards/{student_id}/results', 'GuardianController@showResult');

});







