<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

// ------------------- AUTHENTICATION ROUTES -------------------
Auth::routes(['register' => false]);

Route::middleware('auth')->namespace('Logged')->prefix('logged')->name('logged.')->group(function(){
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/final', 'HomeController@final')->name('final');

  // Groups
  Route::get('/groups', 'GroupController@index')->name('groups.index');

  // Votes
  Route::get('/votes', 'VoteController@index')->name('votes.index');
  Route::get('/votes/user/{id} ', 'VoteController@formUser')->name('votes.formUser');
  Route::get('/votes/team/{id} ', 'VoteController@formTeam')->name('votes.formTeam');
  Route::post('/voteduser', 'VoteController@userStore')->name('user.voted');
  Route::post('/votedteam', 'VoteController@teamStore')->name('team.voted');

  //Rankings
  Route::get('/rankings', 'HomeController@rankings')->name('rankings');

  //Round
  Route::post('/round','Admin\RoundController@update')->name('round.update');

  //Button
  Route::post('/startvote','Admin\ButtonController@updateStartVote')->name('button.updateStartVote');
  Route::post('/stopvote','Admin\ButtonController@updateStopVote')->name('button.updateStopVote');


  //Csvfile
  Route::get('/csvfile','Admin\CsvfileController@index')->name('csvfile');
  Route::get('/csvfile/export', 'Admin\CsvfileController@exportCsv')->name('export2');
});
