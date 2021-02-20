<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function (){
    Route::match(['post', 'get'],'/login',  'AdminController@login');
    Route::group(['middleware' => ['admin']],function (){
        Route::get('/dashboard',  'AdminController@dashboard');
        Route::get('/settings',  'AdminController@settings');
        Route::get('/logout',  'AdminController@logout');
        Route::post('/check-current-pwd', 'AdminController@checkCurrentPassword');
        Route::post('/update-pwd', 'AdminController@updateCurrentPassword');
        Route::match(['get', 'post'], '/update-admin-details', 'AdminController@updateAdminDetails');

        // Department Route
        Route::get('/department', 'DepartmentController@department');
        Route::match(['get', 'post'],'/add-department', 'DepartmentController@addDepartment');
        Route::match(['get', 'post'],'/edit-department/{id}', 'DepartmentController@editDepartment');
        Route::get('delete-department/{id}', 'DepartmentController@deleteDepartment');

        // Batch Route
        Route::get('/batch', 'BatchController@batch');
        Route::match(['get', 'post'],'/add-batch', 'BatchController@addBatch');
        Route::match(['get', 'post'],'/edit-batch/{id}', 'BatchController@editBatch');
        Route::get('delete-batch/{id}', 'BatchController@deleteBatch');

        // Subject Route
        Route::get('/subject', 'SubjectController@subject');
        Route::match(['get', 'post'],'/add-subject', 'SubjectController@addSubject');
        Route::match(['get', 'post'],'/edit-subject/{id}', 'SubjectController@editSubject');
        Route::get('delete-subject/{id}', 'SubjectController@deleteSubject');


        // Teacher Route
        Route::get('/teacher', 'TeacherController@teacher');
        Route::match(['get', 'post'],'/add-teacher', 'TeacherController@addTeacher');
        Route::match(['get', 'post'],'/edit-teacher/{id}', 'TeacherController@editTeacher');
        Route::get('delete-teacher/{id}', 'TeacherController@deleteTeacher');


        // Student Route
        Route::get('/student', 'StudentController@student');
        Route::match(['get', 'post'],'/add-student', 'StudentController@addStudent');
        Route::match(['get', 'post'],'/edit-student/{id}', 'StudentController@editStudent');
        Route::get('delete-student/{id}', 'StudentController@deleteStudent');

        // Final Result
        Route::get('/result', 'FinalResultController@result');
        Route::get('/add-final_result', 'FinalResultController@addResult');
        Route::get('/result/department_id/{id}/batch_id/{batch}/student_id/{student}', 'FinalResultController@addStudentResult');
        Route::post('/result-submit', 'FinalResultController@resultSubmit');
        Route::match(['get', 'post'],'/edit-result/{id}', 'FinalResultController@editResult');

        Route::get('/view-result/department_id/{id}/batch_id/{batch}/student_id/{student}', 'FinalResultController@viewStudentResult');


        //Event Routed
        Route::match(['get','post'],'/add_event', 'EventController@addEvent');
        Route::get('/event', 'EventController@event');
        Route::get('/update-event-status', 'EventController@updateEventStatus');
        Route::get('delete-event/{id}', 'EventController@deleteEvent');


        //Post Route
        Route::match(['get', 'post'], '/add-post', 'PostController@addPost');
        Route::get('/posts', 'PostController@viewPost');
        Route::get('/update-post-status', 'PostController@updatePostStatus');
        Route::get('delete-post/{id}', 'PostController@deletePost');
        Route::match(['get', 'post'],'/edit-post/{id}', 'PostController@editPost');

        // Library Route

        Route::match(['get', 'post'], '/add-book', 'LibraryController@addBook');
        Route::get('/book', 'LibraryController@viewBook');
        Route::get('/update-book-status', 'LibraryController@updateBookStatus');
        Route::get('delete-book/{id}', 'LibraryController@deleteBook');
        Route::match(['get', 'post'],'/edit-book/{id}', 'LibraryController@editBook');

        // Review Route
        Route::get('/review', 'ReviewController@viewReview');
        Route::get('delete-review/{id}', 'ReviewController@deleteReview');

        // Review Route
        Route::get('/comment', 'CommentController@viewComment');
        Route::get('delete-comment/{id}', 'CommentController@deleteComment');


    });

});


Route::prefix('/teacher')->namespace('App\Http\Controllers\Teacher')->group(function () {
    Route::match(['post', 'get'],'/login',  'TeacherController@login');
    Route::group(['middleware' => ['teacher']],function (){
        Route::get('/dashboard',  'TeacherController@dashboard');
        Route::get('/logout',  'TeacherController@logout');
        Route::get('/settings',  'TeacherController@settings');
        Route::post('/check-current-pwd', 'TeacherController@checkCurrentPassword');
        Route::post('/update-pwd', 'TeacherController@updateCurrentPassword');
        Route::match(['get', 'post'], '/update-teacher-details', 'TeacherController@updateTeacherDetails');

        // Student Route
        Route::get('/students',  'TeacherController@student');

        //Exam Route
        Route::get('/exam', 'ExamController@exam');
        Route::match(['get', 'post'],'/add_exam', 'ExamController@addExam');
        Route::match(['get', 'post'],'/edit-exam/{id}', 'ExamController@editExam');
        Route::get('/update-exam-status', 'ExamController@updateExamStatus');
        Route::get('delete-exam/{id}', 'ExamController@deleteExam');

        // Question Route
        Route::match(['get', 'post'],'/add-question/{id}', 'QuestionController@addQuestion');
        Route::match(['get', 'post'],'/view-question/{id}', 'QuestionController@viewQuestion');
        Route::get('/delete-question/{id}', 'QuestionController@deleteQuestion');

        Route::post('/questionmcq', 'QuestionController@questionMcq');
        Route::post('/boolean', 'QuestionController@questionBoolean');
        Route::post('/broadquestion', 'QuestionController@questionBroadquestion');


        //marking route
        Route::get('/add-marking', 'MarkingController@addMarking');
        Route::get('/add-mark/{id}', 'MarkingController@addMark');
        Route::get('/add-result/{id}/exam/{exam}', [
            'as' => 'remindHelper', 'uses' => 'MarkingController@addResult']);
        Route::post('/mark-submit', 'MarkingController@markSubmit');
        Route::get('/marking', 'MarkingController@marking');
        Route::get('/view-mark/{id}', 'MarkingController@viewMark');
        Route::get('/delete-mark/{id}', 'MarkingController@deleteMark');
        Route::match(['get', 'post'],'/edit-result/{id}/exam/{exam}', 'MarkingController@editResult');
        Route::post('/mark-update/{id}', 'MarkingController@markUpdate');

        Route::get('/add-attendance', 'AttendanceController@addAttendance');
        Route::post('/attendance-submit', 'AttendanceController@attendanceSubmit');
        Route::get('/view-attendance', 'AttendanceController@viewAttendance');
        Route::get('/attendance-view/{id}/subject/{subject}', 'AttendanceController@attendanceView');

        //Post Route
        Route::match(['get', 'post'], '/add-post', 'PostController@addPost');
        Route::get('/posts', 'PostController@viewPost');
        Route::get('/update-post-status', 'PostController@updatePostStatus');
        Route::get('delete-post/{id}', 'PostController@deletePost');
        Route::match(['get', 'post'],'/edit-post/{id}', 'PostController@editPost');

        // review route
        Route::get('/review', 'ReviewController@viewReview');
        Route::get('/delete-teacher_review/{id}', 'ReviewController@deleteReview');

        // Review Route
        Route::get('/comment', 'CommentController@viewComment');
        Route::get('delete-comment/{id}', 'CommentController@deleteComment');

    });

});


//Route::get('/json-student', 'App\Http\Controllers\Teacher\AttendanceController@depStudent');
Route::get('/json-batch', 'App\Http\Controllers\Teacher\AttendanceController@batch');
Route::get('/batch-student', 'App\Http\Controllers\Teacher\AttendanceController@batchStudent');
Route::get('/json-subject', 'App\Http\Controllers\Teacher\AttendanceController@subject');
Route::get('/subject-student', 'App\Http\Controllers\Teacher\AttendanceController@subjectStudent');





Route::prefix('/student')->namespace('App\Http\Controllers\Student')->group(function () {
    Route::match(['post', 'get'], '/login', 'StudentController@login');
    Route::group(['middleware' => ['student']], function () {
        Route::get('/dashboard',  'StudentController@dashboard');
        Route::get('/logout',  'StudentController@logout');
        Route::get('/settings',  'StudentController@settings');
        Route::get('/check-current-pwd', 'StudentController@checkCurrentPassword');
        Route::post('/update-pwd', 'StudentController@updateCurrentPassword');
        Route::match(['get', 'post'], '/update-student-details', 'StudentController@updateStudentDetails');


        // Exam Route
        Route::get('/exam', 'ExamController@exam');
        Route::get('/join-exam/{id}', 'ExamController@joinExam');
        Route::post('/exam-submit', 'ExamController@submitExam');

        // Mark Route
        Route::get('/result', 'MarkController@result');
        Route::get('/result', 'MarkController@result');
//        Route::get('/view-mark/{id}', 'MarkController@showResult');

        // Attendance Route
        Route::get('/view-attendance', 'AttendanceController@viewAttendance');
        Route::get('/attendance/{id}/student/{student}', 'AttendanceController@attendance');

        // Final Result
        Route::get('/view-result', 'FinalResultController@viewResult');

        //Post Route
        Route::match(['get', 'post'], '/add-post', 'PostController@addPost');
        Route::get('/posts', 'PostController@viewPost');
        Route::get('/update-post-status', 'PostController@updatePostStatus');
        Route::get('delete-post/{id}', 'PostController@deletePost');
        Route::match(['get', 'post'],'/edit-post/{id}', 'PostController@editPost');

        // review route
        Route::get('/review', 'ReviewController@viewReview');
        Route::get('/delete-student_review/{id}', 'ReviewController@deleteReview');


        // Review Route
        Route::get('/comment', 'CommentController@viewComment');
        Route::get('delete-comment/{id}', 'CommentController@deleteComment');

    });
});




Route::namespace('App\Http\Controllers\Frontend')->group(function () {
    // Home page
    Route::get('/', 'IndexController@index');
    // About Us Page
    Route::get('/about', 'AboutController@aboutUs');


    // Teacher Route
    Route::get('/teacher', 'TeacherController@index');
    Route::get('/teacher-search', 'TeacherController@search');

    Route::get('/teacher/{id}', 'TeacherController@teacherSingle');

    // Blog Page Route
    Route::get('/blog', 'PostController@index');
    Route::get('/blog-search', 'PostController@blogSearch');

    Route::get('/blog/{id}', 'PostController@blogSingle');

    // Event Route
    Route::get('/event', 'EventController@index');
    Route::get('/event/{id}', 'EventController@eventSingle');

    //count Route
    Route::match(['get', 'post'],'/contact', 'ContactController@index');

    //Library Route
    Route::get('/library', 'LibraryController@index');
    Route::get('/library-search', 'LibraryController@librarySearch');
    Route::get('/library/{id}', 'LibraryController@singleLibrary');

    //rating submit
    Route::post('/submit-rating', 'LibraryController@rating');

    //Comment Route
    Route::post('/comment-submit', 'PostController@comment');



});






