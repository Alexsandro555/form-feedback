<?php

Route::group(['middleware' => ['web']], function () {
  ////////////////////////////////Form-feedback///////////////////////////////////////////////////////
  Route::get('/getUID', ['uses' => 'FormFeedbackController@getUID', 'as' => 'getUID']);
  Route::post('/form-feedback/save', [
    'before' => 'csrf',
    'uses' => 'FormFeedbackController@save',
    'as' => 'form-feedback-save'
  ]);
});