<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Patients\ExploreCategories;
use App\Http\Controllers\Patients\Meeting;
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
Route::get('/doctor-panel', function(){

    return view('doctor-main');
});



// patient routes 
    Route::middleware(['auth'])->group(function () {

        Route::get('/patient-panel', function(){

            return view('patient-main');
        });

        // categories
        Route::get('/patient-cp/categories', [ExploreCategories::class, 'allCategories'])->name('patientsPanel.allCategories');
        Route::get('/patient-cp/category/specialty/{id}', [ExploreCategories::class, 'categorySpecialties'])->name('patientsPanel.categorySpecialties');
        Route::get('/patient-cp/specialty/doctors/{id}', [ExploreCategories::class, 'showDoctors'])->name('patientsPanel.showDoctors');

        //meetings
        Route::get('/patient-cp/my/schedules', [Meeting::class, 'mySchedules'])->name('patientsPanel.mySchedules');
        Route::get('/patient-cp/show/request-meeting/view/{id}', [Meeting::class, 'showRequestMeetingView'])->name('patientsPanel.showRequestMeetingView');
        Route::put('/patient-cp/request/meeting/{id}', [Meeting::class, 'requestMeeting'])->name('patientsPanel.requestMeeting');
        Route::delete('/patient-cp/delete/schedule', [Meeting::class, 'deleteMeeting'])->name('patientsPanel.deleteMeeting');

});



// admin routes 

    Route::middleware(['auth'])->group(function () {


        Route::get('/admin', function(){

            return view('admin');
        });

        
        //patients
        Route::get('/admin-cp/patients', [PatientController::class, 'index'])->name('patients.index');
        Route::get('/admin-cp/patients/create', [PatientController::class, 'create'])->name('patients.create');
        Route::post('/admin-cp/patients/store', [PatientController::class, 'store'])->name('patients.store');
        Route::get('/admin-cp/patients/edit/{id}', [PatientController::class, 'edit'])->name('patients.edit');
        Route::put('/admin-cp/patients/update/{id}', [PatientController::class, 'update'])->name('patients.update');

        Route::get('/admin-cp/patients/request/to/register', [PatientController::class, 'registerRequestView'])->name('patients.registerRequestView');
        Route::post('/admin-cp/patients/send/request/to/register', [PatientController::class, 'registerRequest'])->name('patients.registerRequest');


        //admins
        Route::get('/admin-cp/admins', [AdminController::class, 'index'])->name('admins.index');
        Route::get('/admin-cp/admins/create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('/admin-cp/admins/store', [AdminController::class, 'store'])->name('admins.store');
        Route::get('/admin-cp/admins/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::put('/admin-cp/admins/update/{id}', [AdminController::class, 'update'])->name('admins.update');
        Route::get('/admin-cp/pending/requests', [AdminController::class, 'showPendingRegistrationRequests'])->name('admins.showPendingRegistrationRequests');
        Route::get('/admin-cp/set/password/{id}', [AdminController::class, 'showSetPatientPasswordView'])->name('admins.showSetPatientPasswordView');
        Route::post('/admin-cp/accept/and/set/{id}', [AdminController::class, 'acceptPatientAndSetPassword'])->name('admins.acceptPatientAndSetPassword');


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


        //
        // Route::get('/admin-cp/patients/request/to/register', [PatientController::class, 'registerRequestView'])->name('patients.registerRequestView');
        // Route::post('/admin-cp/patients/send/request/to/register', [PatientController::class, 'registerRequest'])->name('patients.registerRequest');





});