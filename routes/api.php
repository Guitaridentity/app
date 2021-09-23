<?php

Route::post('login', 'Api\\AuthController@login');
Route::post('register', 'Api\\AuthController@register');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('register_complete', 'Api\\UserController@register_complete');
    Route::post('stage', 'Api\\StageController@stage');
    Route::post('profile', 'Api\\ProfileController@profile');
    Route::post('profile_edit', 'Api\\ProfileController@profile_edit');
    Route::post('profile_editimage', 'Api\\ProfileController@profile_editimage');
});





Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController'); 

    // User Profession
    Route::apiResource('user-professions', 'UserProfessionApiController');

    // User Address
    Route::apiResource('user-addresses', 'UserAddressApiController');

    // User Pictures
    Route::apiResource('user-pictures', 'UserPicturesApiController');

    // User Video
    Route::apiResource('user-videos', 'UserVideoApiController');

    // Plan
    Route::apiResource('plans', 'PlanApiController');

    // User Details
    Route::apiResource('user-details', 'UserDetailsApiController');

    // Guitar Type
    Route::apiResource('guitar-types', 'GuitarTypeApiController');

    // Guitar Brand
    Route::apiResource('guitar-brands', 'GuitarBrandApiController');

    // Guitar Brand Model
    Route::apiResource('guitar-brand-models', 'GuitarBrandModelApiController');

    // Taxonomie Name
    Route::apiResource('taxonomie-names', 'TaxonomieNameApiController');

    // Guitarowner
    Route::apiResource('guitarowners', 'GuitarownerApiController');

    // Guitar
    Route::apiResource('guitars', 'GuitarApiController');

    // Country
    Route::apiResource('countries', 'CountryApiController');

    // Guitar Hardware
    Route::apiResource('guitar-hardware', 'GuitarHardwareApiController');

    // Guitar Comments
    Route::apiResource('guitar-comments', 'GuitarCommentsApiController');

    // Guitar Picture
    Route::apiResource('guitar-pictures', 'GuitarPictureApiController');

    // Guitarvideo
    Route::apiResource('guitarvideos', 'GuitarvideoApiController');

    // Guitar Likes
    Route::apiResource('guitar-likes', 'GuitarLikesApiController');

    // Guitarchanges
    Route::apiResource('guitarchanges', 'GuitarchangesApiController');

    // Guitar Purchased
    Route::apiResource('guitar-purchaseds', 'GuitarPurchasedApiController');

    // Guitar Purchase Where
    Route::apiResource('guitar-purchase-wheres', 'GuitarPurchaseWhereApiController');

    // Mother
    Route::apiResource('mothers', 'MotherApiController');

    // Mother Hardware
    Route::apiResource('mother-hardware', 'MotherHardwareApiController');

    // Mother Comments
    Route::apiResource('mother-comments', 'MotherCommentsApiController');

    // Mother Likes
    Route::apiResource('mother-likes', 'MotherLikesApiController');

    // Mother Picture
    Route::apiResource('mother-pictures', 'MotherPictureApiController');

    // Mother Video
    Route::apiResource('mother-videos', 'MotherVideoApiController');

    // Mother Description
    Route::apiResource('mother-descriptions', 'MotherDescriptionApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::apiResource('lessons', 'LessonsApiController');

    // Tests
    Route::apiResource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionsApiController');

    // Question Options
    Route::apiResource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::apiResource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::apiResource('test-answers', 'TestAnswersApiController');

    // Events
    Route::apiResource('events', 'EventsApiController');

    // Event User
    Route::apiResource('event-users', 'EventUserApiController');

    // Testfunctions
    Route::apiResource('testfunctions', 'TestfunctionsApiController');
});
