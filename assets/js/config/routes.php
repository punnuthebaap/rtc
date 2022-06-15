<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home/index';
$route['404_override'] = 'Home/error_404';
$route['505_override'] = 'Home/error_505';
$route['translate_uri_dashes'] = FALSE;

// custom routes
$route['dashboard'] = 'Home/dashboard';
$route['login'] = 'Home';
$route['Subject'] = 'Home/student';
$route['teacher'] = 'Home/teacher';
$route['user'] = 'Home/user';
$route['class'] = 'Home/class';
$route['fee-head'] = 'Home/feeHead';

// operations
$route['addStudent'] = 'Home/studentAdd';

// login
$route['login-check'] = 'Home/login';

// logout
$route['logout'] = 'Home/logout';

// user
$route['add-user'] = 'User/addUser';
$route['getUserFields'] = 'User/getUserFields';
$route['saveUserMaster'] = 'User/saveUserMaster';
$route['editUserMaster'] = 'User/editUser';
$route['viewUserMaster'] = 'User/viewUserMaster';
$route['getUserTable'] = 'User/getUserTable';

// class
$route['add-class'] = 'ClassM/addClass';
$route['getClassFields'] = 'ClassM/getClassFields';
$route['saveClassMaster'] = 'ClassM/saveClassMaster';
$route['viewClassMaster'] = 'ClassM/viewClassMaster';
$route['getClassTable'] = 'ClassM/getClassTable';
$route['editClassMaster'] = 'ClassM/editClass';

// student

$route['add-student'] = 'Student/addStudent';
$route['editStudent'] = 'Student/editStudent';
$route['getStudentFields'] = 'Student/getStudentFields';
$route['saveStudentMaster'] = 'Student/saveStudentMaster';
$route['viewStudentMaster'] = 'Student/viewStudentMaster';
$route['getStudentTable'] = 'Student/getStudentTable';

// fee

$route['add-feeHead'] = 'Fee/addFeeHead';
$route['saveFeeHead'] = 'Fee/saveFeeHead';
$route['viewFeeHead'] = 'Fee/viewFeeHead';
$route['addFeeStructure'] = 'Fee/addFeeStructure';
$route['viewFeeStructure'] = 'Fee/viewFeeStructure';
$route['editFeeStructure'] = 'Fee/editFeeStructure';
$route['getFeeHead'] = 'Fee/getFeeHead';
$route['getFeeStructure'] = 'Fee/getFeeStructure';
$route['editFeeHead'] = 'Fee/editFeeHead';
$route['payFees'] = 'Fee/payFees';
$route['feesReport'] = 'Fee/feesReport';
$route['feesReceipt'] = 'Fee/feeReceipt';

// exam

$route['add-examType'] = 'Exam/addExamType';
$route['add-examMaster'] = 'Exam/addExamMaster';
$route['saveExamType'] = 'Exam/saveExamType';
$route['saveExamMaster'] = 'Exam/saveExamMaster';
$route['viewExamType'] = 'Exam/viewExamType';
$route['viewExamMaster'] = 'Exam/viewExamMaster';
$route['getExamType'] = 'Exam/getExamType';
$route['getExamMaster'] = 'Exam/getExamMaster';
$route['editExamType'] = 'Exam/editExamType';
$route['editExamMaster'] = 'Exam/editExamMaster';

// subject

$route['add-subject'] = 'Subject/addSubject';
$route['editSubject'] = 'Subject/editSubject';
$route['getSubjectFields'] = 'Subject/getSubject';
$route['saveSubject'] = 'Subject/saveSubject';
$route['viewSubject'] = 'Subject/viewSubject';
$route['getSubjectTable'] = 'Subject/getSubjectTable';

// assignment
$route['addAssignment'] = 'Assignment/addAssignment';
$route['editAssignment'] = 'Assignment/editAssignment';
$route['getAssignmentFields'] = 'Assignment/getAssignment';
$route['saveAssignment'] = 'Assignment/saveAssignment';
$route['viewAssignment'] = 'Assignment/viewAssignment';
$route['getAssignmentTable'] = 'Assignment/getAssignment';