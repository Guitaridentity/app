<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Profession
    Route::delete('user-professions/destroy', 'UserProfessionController@massDestroy')->name('user-professions.massDestroy');
    Route::resource('user-professions', 'UserProfessionController');

    // User Address
    Route::delete('user-addresses/destroy', 'UserAddressController@massDestroy')->name('user-addresses.massDestroy');
    Route::resource('user-addresses', 'UserAddressController');

    // User Pictures
    Route::delete('user-pictures/destroy', 'UserPicturesController@massDestroy')->name('user-pictures.massDestroy');
    Route::resource('user-pictures', 'UserPicturesController');

    // User Video
    Route::delete('user-videos/destroy', 'UserVideoController@massDestroy')->name('user-videos.massDestroy');
    Route::resource('user-videos', 'UserVideoController');

    // Plan
    Route::delete('plans/destroy', 'PlanController@massDestroy')->name('plans.massDestroy');
    Route::resource('plans', 'PlanController');

    // User Details
    Route::delete('user-details/destroy', 'UserDetailsController@massDestroy')->name('user-details.massDestroy');
    Route::resource('user-details', 'UserDetailsController');

    // Guitar Type
    Route::delete('guitar-types/destroy', 'GuitarTypeController@massDestroy')->name('guitar-types.massDestroy');
    Route::resource('guitar-types', 'GuitarTypeController');

    // Guitar Brand
    Route::delete('guitar-brands/destroy', 'GuitarBrandController@massDestroy')->name('guitar-brands.massDestroy');
    Route::post('guitar-brands/parse-csv-import', 'GuitarBrandController@parseCsvImport')->name('guitar-brands.parseCsvImport');
    Route::post('guitar-brands/process-csv-import', 'GuitarBrandController@processCsvImport')->name('guitar-brands.processCsvImport');
    Route::resource('guitar-brands', 'GuitarBrandController');

    // Guitar Brand Model
    Route::delete('guitar-brand-models/destroy', 'GuitarBrandModelController@massDestroy')->name('guitar-brand-models.massDestroy');
    Route::post('guitar-brand-models/parse-csv-import', 'GuitarBrandModelController@parseCsvImport')->name('guitar-brand-models.parseCsvImport');
    Route::post('guitar-brand-models/process-csv-import', 'GuitarBrandModelController@processCsvImport')->name('guitar-brand-models.processCsvImport');
    Route::resource('guitar-brand-models', 'GuitarBrandModelController');

    // Taxonomie Name
    Route::delete('taxonomie-names/destroy', 'TaxonomieNameController@massDestroy')->name('taxonomie-names.massDestroy');
    Route::resource('taxonomie-names', 'TaxonomieNameController');

    // Guitar Taxonomies
    Route::delete('guitar-taxonomies/destroy', 'GuitarTaxonomiesController@massDestroy')->name('guitar-taxonomies.massDestroy');
    Route::resource('guitar-taxonomies', 'GuitarTaxonomiesController');

    // Guitarowner
    Route::delete('guitarowners/destroy', 'GuitarownerController@massDestroy')->name('guitarowners.massDestroy');
    Route::resource('guitarowners', 'GuitarownerController');

    // Guitar
    Route::delete('guitars/destroy', 'GuitarController@massDestroy')->name('guitars.massDestroy');
    Route::resource('guitars', 'GuitarController');

    // Country
    Route::delete('countries/destroy', 'CountryController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/parse-csv-import', 'CountryController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountryController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountryController');

    // Guitar Hardware
    Route::delete('guitar-hardware/destroy', 'GuitarHardwareController@massDestroy')->name('guitar-hardware.massDestroy');
    Route::resource('guitar-hardware', 'GuitarHardwareController');

    // Guitar Comments
    Route::delete('guitar-comments/destroy', 'GuitarCommentsController@massDestroy')->name('guitar-comments.massDestroy');
    Route::resource('guitar-comments', 'GuitarCommentsController');

    // Guitar Picture
    Route::delete('guitar-pictures/destroy', 'GuitarPictureController@massDestroy')->name('guitar-pictures.massDestroy');
    Route::resource('guitar-pictures', 'GuitarPictureController');

    // Guitarvideo
    Route::delete('guitarvideos/destroy', 'GuitarvideoController@massDestroy')->name('guitarvideos.massDestroy');
    Route::resource('guitarvideos', 'GuitarvideoController');

    // Guitar Likes
    Route::delete('guitar-likes/destroy', 'GuitarLikesController@massDestroy')->name('guitar-likes.massDestroy');
    Route::resource('guitar-likes', 'GuitarLikesController');

    // Guitarchanges
    Route::delete('guitarchanges/destroy', 'GuitarchangesController@massDestroy')->name('guitarchanges.massDestroy');
    Route::resource('guitarchanges', 'GuitarchangesController');

    // Guitar Purchased
    Route::delete('guitar-purchaseds/destroy', 'GuitarPurchasedController@massDestroy')->name('guitar-purchaseds.massDestroy');
    Route::resource('guitar-purchaseds', 'GuitarPurchasedController');

    // Guitar Purchase Where
    Route::delete('guitar-purchase-wheres/destroy', 'GuitarPurchaseWhereController@massDestroy')->name('guitar-purchase-wheres.massDestroy');
    Route::resource('guitar-purchase-wheres', 'GuitarPurchaseWhereController');

    // Mother
    Route::delete('mothers/destroy', 'MotherController@massDestroy')->name('mothers.massDestroy');
    Route::resource('mothers', 'MotherController');

    // Mother Hardware
    Route::delete('mother-hardware/destroy', 'MotherHardwareController@massDestroy')->name('mother-hardware.massDestroy');
    Route::resource('mother-hardware', 'MotherHardwareController');

    // Mother Comments
    Route::delete('mother-comments/destroy', 'MotherCommentsController@massDestroy')->name('mother-comments.massDestroy');
    Route::resource('mother-comments', 'MotherCommentsController');

    // Mother Likes
    Route::delete('mother-likes/destroy', 'MotherLikesController@massDestroy')->name('mother-likes.massDestroy');
    Route::resource('mother-likes', 'MotherLikesController');

    // Mother Picture
    Route::delete('mother-pictures/destroy', 'MotherPictureController@massDestroy')->name('mother-pictures.massDestroy');
    Route::resource('mother-pictures', 'MotherPictureController');

    // Mother Video
    Route::delete('mother-videos/destroy', 'MotherVideoController@massDestroy')->name('mother-videos.massDestroy');
    Route::resource('mother-videos', 'MotherVideoController');

    // Mother Description
    Route::delete('mother-descriptions/destroy', 'MotherDescriptionController@massDestroy')->name('mother-descriptions.massDestroy');
    Route::resource('mother-descriptions', 'MotherDescriptionController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::resource('events', 'EventsController');

    // Event User
    Route::delete('event-users/destroy', 'EventUserController@massDestroy')->name('event-users.massDestroy');
    Route::resource('event-users', 'EventUserController');

    // Testfunctions
    Route::delete('testfunctions/destroy', 'TestfunctionsController@massDestroy')->name('testfunctions.massDestroy');
    Route::post('testfunctions/parse-csv-import', 'TestfunctionsController@parseCsvImport')->name('testfunctions.parseCsvImport');
    Route::post('testfunctions/process-csv-import', 'TestfunctionsController@processCsvImport')->name('testfunctions.processCsvImport');
    Route::resource('testfunctions', 'TestfunctionsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
