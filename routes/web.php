<?php

use Illuminate\Support\Facades\Route;

// ------------------- PUBLIC ROUTES -------------------
// Public Home
Route::get('/', 'HomeController@index')->name('home');


// ------------------- AUTHENTICATION ROUTES -------------------

Auth::routes(['register' => false]);

Route::middleware('auth')->namespace('Logged')->prefix('logged')->name('logged.')->group(function(){
  // Logged Home
  Route::get('/', 'HomeController@index')->name('home');

  // Groups
  Route::get('/groups', 'GroupController@index')->name('groups.index');

  // Votes
  Route::get('/votes', 'VoteController@index')->name('votes.index');
  Route::get('/votes/team/{id} ', 'VoteController@formTeam')->name('votes.formTeam');
  Route::post('/votedteam', 'VoteController@teamStore')->name('team.voted');
  // Route::get('/votes/user/{id} ', 'VoteController@formUser')->name('votes.formUser');
  // Route::post('/voteduser', 'VoteController@userStore')->name('user.voted');

  // ------------------ ADMIN ------------------

  // Round
  Route::post('/round','Admin\RoundController@update')->name('round.update');

  // Button
  Route::post('/startvote','Admin\ButtonController@updateStartVote')->name('button.updateStartVote');
  Route::post('/stopvote','Admin\ButtonController@updateStopVote')->name('button.updateStopVote');

  //Rankings
  Route::get('/rankings', 'Admin\RankingController@index')->name('rankings.index');

  // Csvfile
  Route::get('/csvfile','Admin\CsvfileController@index')->name('csvfile');
  Route::get('/csvfile/export', 'Admin\CsvfileController@exportCsv')->name('export2');

});
