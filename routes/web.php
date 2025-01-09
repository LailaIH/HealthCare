<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorPatientController;
use App\Http\Controllers\Doctors\DoctorProfile;
use App\Http\Controllers\Doctors\PatientRequests;
use App\Http\Controllers\Doctors\PatientSendEmail;
use App\Http\Controllers\Doctors\SendEmail;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Patients\ExploreCategories;
use App\Http\Controllers\Patients\Invoices;
use App\Http\Controllers\Patients\Meeting;
use App\Http\Controllers\Patients\Profile;
use App\Http\Controllers\SpecialtyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// doctor routes 
Route::middleware(['auth', 'doctor'])->group(function () {

    Route::get('/doctor-panel', function(){

        return view('doctor-main');
    })->name('doctors.panel');

    Route::get('/doctor-cp/pendingRequests', [PatientRequests::class, 'pendingRequests'])->name('doctorsPanel.pendingRequests');
    Route::get('/doctor-cp/approvedRequests', [PatientRequests::class, 'approvedRequests'])->name('doctorsPanel.approvedRequests');
    Route::get('/doctor-cp/rejectedRequests', [PatientRequests::class, 'rejectedRequests'])->name('doctorsPanel.rejectedRequests');
    Route::get('/doctor-cp/finishedRequests', [PatientRequests::class, 'finishedRequests'])->name('doctorsPanel.finishedRequests');
    Route::put('/doctor-cp/approveRequest/{id}', [PatientRequests::class, 'approveRequest'])->name('doctorsPanel.accept');
    Route::put('/doctor-cp/rejectRequest/{id}', [PatientRequests::class, 'rejectRequest'])->name('doctorsPanel.reject');
    Route::get('/doctor-cp/show/add/treatments/{id}', [PatientRequests::class, 'showAddTreatments'])->name('doctorsPanel.showAddTreatments');
    Route::post('/doctor-cp/add/treatments/{id}', [PatientRequests::class, 'addTreatmentAndInvoice'])->name('doctorsPanel.addTreatmentAndInvoice');
    Route::get('/doctor-cp/show/full/treatment/{id}', [PatientRequests::class, 'fullTreatment'])->name('doctorsPanel.fullTreatment');
    Route::get('/doctor-cp/my-patients', [PatientRequests::class, 'myPatients'])->name('doctorsPanel.myPatients');
    Route::get('/doctor-cp/patient/docs/{id}', [PatientRequests::class, 'showDocuments'])->name('doctorsPanel.showDocuments');


    //update profile
    Route::get('/doctor-cp/profile', [DoctorProfile::class, 'editMyInformation'])->name('doctorsPanel.editMyInformation');
    Route::put('/doctor-cp/updateInfo', [DoctorProfile::class, 'updateMyInformation'])->name('doctorsPanel.updateMyInformation');

    //send email
    Route::get('/doctor-cp/sendEmail/{id}', [PatientSendEmail::class, 'sendEmailView'])->name('doctorsPanel.sendEmailView');
    Route::post('/doctor-cp/dTo/sending/{id}', [PatientSendEmail::class, 'doctorSendEmail'])->name('doctorsPanel.EmailSent');


});



// patient routes 
Route::middleware(['auth', 'patient'])->group(function () {

        Route::get('/patient-panel', function(){

            return view('patient-main');
        })->name('patients.panel');;

        // categories
        Route::get('/patient-cp/categories', [ExploreCategories::class, 'allCategories'])->name('patientsPanel.allCategories');
        Route::get('/patient-cp/category/specialty/{id}', [ExploreCategories::class, 'categorySpecialties'])->name('patientsPanel.categorySpecialties');
        Route::get('/patient-cp/specialty/doctors/{id}', [ExploreCategories::class, 'showDoctors'])->name('patientsPanel.showDoctors');

        //meetings
        Route::get('/patient-cp/my/schedules', [Meeting::class, 'mySchedules'])->name('patientsPanel.mySchedules');
        Route::get('/patient-cp/show/request-meeting/view/{id}', [Meeting::class, 'showRequestMeetingView'])->name('patientsPanel.showRequestMeetingView');
        Route::put('/patient-cp/request/meeting/{id}', [Meeting::class, 'requestMeeting'])->name('patientsPanel.requestMeeting');
        Route::delete('/patient-cp/delete/schedule/{id}', [Meeting::class, 'deleteMeeting'])->name('patientsPanel.deleteMeeting');
        Route::get('/patient-cp/full-treatment/{id}', [Meeting::class, 'showTreatment'])->name('meetings.showTreatment');

        //invoices
        Route::get('/patient-cp/invoices', [Invoices::class, 'myInvoices'])->name('patientsPanel.invoices');
      
        //update profile
        Route::get('/patient-cp/profile', [Profile::class, 'editMyInformation'])->name('patientsPanel.editMyInformation');
        Route::put('/patient-cp/updateInfo', [Profile::class, 'updateMyInformation'])->name('patientsPanel.updateMyInformation');

});



// admin routes 

Route::middleware(['auth', 'admin'])->group(function () {


        Route::get('/admin', function(){

            return view('admin');
        });

        //patients
        Route::get('/admin-cp/patients', [PatientController::class, 'index'])->name('patients.index');
        Route::get('/admin-cp/patients/create', [PatientController::class, 'create'])->name('patients.create');
        Route::post('/admin-cp/patients/store', [PatientController::class, 'store'])->name('patients.store');
        Route::get('/admin-cp/patients/edit/{id}', [PatientController::class, 'edit'])->name('patients.edit');
        Route::put('/admin-cp/patients/update/{id}', [PatientController::class, 'update'])->name('patients.update');
        Route::delete('/admin-cp/patients/delete/{id}', [PatientController::class, 'removeAccount'])->name('patients.delete');



        //admins
        Route::get('/admin-cp/admins', [AdminController::class, 'index'])->name('admins.index');
        Route::get('/admin-cp/admins/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('/admin-cp/admins/store', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/admin-cp/admins/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::put('/admin-cp/admins/update/{id}', [AdminController::class, 'update'])->name('admins.update');
        Route::get('/admin-cp/pending/requests', [AdminController::class, 'showPendingRegistrationRequests'])->name('admins.showPendingRegistrationRequests');
        Route::get('/admin-cp/set/password/{id}', [AdminController::class, 'showSetPatientPasswordView'])->name('admins.showSetPatientPasswordView');
        Route::post('/admin-cp/accept/and/set/{id}', [AdminController::class, 'acceptPatientAndSetPassword'])->name('admins.acceptPatientAndSetPassword');

        Route::get('/admin-cp/pending/requests/doctors', [AdminController::class, 'showPendingRegistrationRequestsDoctors'])->name('admins.showPendingRegistrationRequestsDoctors');
        Route::get('/admin-cp/setDoctor/password/{id}', [AdminController::class, 'showSetDoctorPasswordView'])->name('admins.showSetDoctorPasswordView');
        Route::post('/admin-cp/acceptDoctor/and/set/{id}', [AdminController::class, 'acceptDoctorAndSetPassword'])->name('admins.acceptDoctorAndSetPassword');

        // categories
        Route::get('/admin-cp/categories', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/admin-cp/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/admin-cp/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/admin-cp/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/admin-cp/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/admin-cp/categories/show/specialty/{id}', [CategoryController::class, 'showSpecialties'])->name('categories.showSpecialties');

        // specialties
        Route::get('/admin-cp/specialties/create', [SpecialtyController::class, 'create'])->name('specialties.create');
        Route::post('/admin-cp/specialties/store', [SpecialtyController::class, 'store'])->name('specialties.store');
        Route::get('/admin-cp/specialties/edit/{id}', [SpecialtyController::class, 'edit'])->name('specialties.edit');
        Route::put('/admin-cp/specialties/update/{id}', [SpecialtyController::class, 'update'])->name('specialties.update');
        Route::get('/admin-cp/specialties/show/doctors/{id}', [SpecialtyController::class, 'showDoctors'])->name('specialties.showDoctors');

        //doctors
        Route::get('/admin-cp/doctors', [DoctorController::class, 'index'])->name('doctors.index');
        Route::get('/admin-cp/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
        Route::post('/admin-cp/doctors/store', [DoctorController::class, 'store'])->name('doctors.store');
        Route::get('/admin-cp/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('doctors.edit');
        Route::put('/admin-cp/doctors/update/{id}', [DoctorController::class, 'update'])->name('doctors.update');
        Route::delete('/admin-cp/doctors/delete/{id}', [DoctorController::class, 'removeAccount'])->name('doctors.delete');



        //doctors-patient meetings
        Route::get('/admin-cp/pending/meetings', [DoctorPatientController::class, 'pendingMeetings'])->name('meetings.pending');
        Route::get('/admin-cp/approved/meetings', [DoctorPatientController::class, 'approvedMeetings'])->name('meetings.approved');
        Route::get('/admin-cp/rejected/meetings', [DoctorPatientController::class, 'rejectedMeetings'])->name('meetings.rejected');
        Route::get('/admin-cp/finished/meetings', [DoctorPatientController::class, 'finishedMeetings'])->name('meetings.finished');
        Route::get('/admin-cp/full-treatment/{id}', [DoctorPatientController::class, 'fullTreatment'])->name('meetings.fullTreatment');


        //invoices
        Route::get('/admin-cp/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
        Route::get('/admin-cp/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
        Route::post('/admin-cp/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/admin-cp/invoices/edit/{id}', [InvoiceController::class, 'edit'])->name('invoices.edit');
        Route::put('/admin-cp/invoices/update/{id}', [InvoiceController::class, 'update'])->name('invoices.update');
        Route::delete('/admin-cp/invoices/delete/{id}', [InvoiceController::class, 'delete'])->name('invoices.delete');


});


Route::get('/admin-cp/patients/request/to/register', [PatientController::class, 'registerRequestView'])->name('patients.registerRequestView');
Route::post('/admin-cp/patients/send/request/to/register', [PatientController::class, 'registerRequest'])->name('patients.registerRequest');

Route::get('/admin-cp/doctors/request/to/register', [DoctorController::class, 'registerRequestView'])->name('doctors.registerRequestView');
Route::post('/admin-cp/doctors/send/request/to/register', [DoctorController::class, 'registerRequest'])->name('doctors.registerRequest');
