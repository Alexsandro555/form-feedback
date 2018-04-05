<?php

Route::group(['middleware' => ['web']], function () {
  ////////////////////////////////Form-feedback///////////////////////////////////////////////////////
  Route::get('/getUID', ['uses' => 'Leader\FormFeedback\FormFeedbackController@getUID', 'as' => 'getUID']);
  Route::post('/form-feedback/save', [
    'before' => 'csrf',
    'uses' => 'Leader\FormFeedback\FormFeedbackController@save',
    'as' => 'form-feedback-save'
  ]);
});