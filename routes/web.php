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
  Route::get('/show/vote-team/{id} ', 'VoteController@showVoteTeam')->name('votes.showVoteTeam');
  Route::get('/create/vote-team/{id} ', 'VoteController@createVoteTeam')->name('votes.formTeam');
  Route::post('/store/vote-team', 'VoteController@teamStore')->name('team.voted');
  Route::get('/votes-sede/{id}','VoteController@sedeShowGroup')->name('votes.sedeShowGroup');
  // Route::get('/votes/user/{id} ', 'VoteController@formUser')->name('votes.formUser');
  // Route::post('/voteduser', 'VoteController@userStore')->name('user.voted');

  // ------------------ ADMIN ------------------

  // Round
  Route::post('/admin/round','Admin\RoundController@update')->name('round.update');

  // Buttons
  Route::post('/admin/start-worshop','Admin\ButtonController@startWorkshop')->name('button.startWorkshop');
  Route::post('/admin/startvote','Admin\ButtonController@updateStartVote')->name('button.updateStartVote');
  Route::post('/admin/stopvote','Admin\ButtonController@updateStopVote')->name('button.updateStopVote');

  //Rankings
  Route::get('/admin/rankings', 'Admin\RankingController@index')->name('rankings.index');
  Route::get('/admin/rankingsAvg', 'Admin\RankingController@indexAvg')->name('rankings.indexAvg');

  //Sede options
  Route::get('/admin/sedeoptions','Admin\ButtonController@sedeOptions')->name('sede.options');
  Route::post('/admin/sedeOptionsReq','Admin\ButtonController@sedeOptionsReq')->name('sede.options.req');

  //Admin votes
  Route::get('/admin/votes','Admin\ButtonController@showVotes')->name('admin.votes');
  Route::post('/admin/getList','Admin\ButtonController@getListVotes')->name('admin.getList');
  //Admin getVoting
  Route::get('/admin/voting','Admin\ButtonController@getVoting')->name('admin.voting');
  Route::post('/admin/votingLive','Admin\ButtonController@getVotingLive')->name('admin.voting.live');

  // Csvfile
  Route::get('/admin/csvfile','Admin\CsvfileController@index')->name('csvfile');
  Route::get('/admin/csvfile/export', 'Admin\CsvfileController@exportCsv')->name('export2');

});
