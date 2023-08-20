<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userIdentifierController;
use App\Http\Controllers\signup_signinController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\doctorController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\appointmentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/forgotPassword', function () {
    return view('forgotPass');
});

Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');




Route::get('/admindashboard', [userIdentifierController::class, 'userLoader'])->middleware('GlobalAuth')->name('adminindex');
Route::get('/adminCreateUsers', [adminController::class, 'createUserUI'])->middleware('GlobalAuth')->name('createUserUI');
Route::get('/adminProfile', [userIdentifierController::class, 'adminLoader'])->middleware('GlobalAuth')->name('adminProfile');
Route::get('/adminPatients', [adminController::class, 'patientList'])->middleware('GlobalAuth')->name('adminPatList');
Route::get('/adminDoctors', [adminController::class, 'doctorList'])->middleware('GlobalAuth')->name('adminDocList');
// Route::get('/patientslist', [userIdentifierController::class, 'patLoader'])->name('adminPatList');
Route::get('/doctorslist', [userIdentifierController::class, 'docLoader'])->middleware('GlobalAuth')->name('adminDocList');
Route::get('/doctordashboard', [userIdentifierController::class, 'docIndex'])->middleware('GlobalAuth')->name('doctorindex');
Route::get('/patientdashboard', [userIdentifierController::class, 'patIndex'])->middleware('GlobalAuth')->name('patientindex');
Route::get('/DocPatientslist', [doctorController::class, 'appointList'])->middleware('GlobalAuth')->name('doctorPatList');
Route::get('/patProfile', [userIdentifierController::class, 'patProfile'])->middleware('GlobalAuth')->name('profile');
Route::get('/patReport', [userIdentifierController::class, 'patReport'])->middleware('GlobalAuth')->name('report');
Route::get('/presHistory', [userIdentifierController::class, 'prescriptionHistory'])->middleware('GlobalAuth')->name('presHistory');
Route::get('/presHistory', [patientController::class, 'prescriptionHistory'])->middleware('GlobalAuth')->name('presHistory');
Route::get('/appointHistory', [patientController::class, 'appointHistory'])->middleware('GlobalAuth')->name('appointHistory');
Route::get('/docProfile', [userIdentifierController::class, 'docProfile'])->middleware('GlobalAuth')->name('docProfile');
Route::get('/DocDoctorslist', [doctorController::class, 'doctorList'])->middleware('GlobalAuth')->name('doctorDocList');
Route::get('/PatDoctorslist', [patientController::class, 'doctorList'])->middleware('GlobalAuth')->name('patientDocList');
Route::get('/adminDoctorslist', [adminController::class, 'doctorList'])->middleware('GlobalAuth')->name('adminDocList');
Route::get('/', [userIdentifierController::class, 'signout'])->name('signout');

Route::post('/signupPD', [signup_signinController::class, 'store'])->name('signupPatDoc');
Route::post('/dashboard', [signup_signinController::class, 'signin'])->name('dashboard');
Route::post('/LoadDoctorListqwe', [appointmentController::class, 'load_doctorList'])->middleware('GlobalAuth')->name('loadDoctor');
Route::post('/appointHistory', [appointmentController::class, 'storeAppointment'])->middleware('GlobalAuth')->name('appointStored');
Route::post('/patDetails', [doctorController::class, 'loadPatientDetails'])->middleware('GlobalAuth')->name('loadPatDetails');
Route::post('/prescriptions', [doctorController::class, 'loadPrescription'])->middleware('GlobalAuth')->name('prescription');
Route::post('/statusUpdate', [doctorController::class, 'acceptReject'])->middleware('GlobalAuth')->name('status');
Route::post('/addPrescription', [userIdentifierController::class, 'newPrescription'])->middleware('GlobalAuth')->name('addPrescription');
Route::post('/viewPrescription', [userIdentifierController::class, 'viewPrescription'])->middleware('GlobalAuth')->name('vPrescription');
