<?php

use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\LiveStatController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\TournamentController;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Contracts\Role;

Route::get('/test', function () {
    return view('test');
});
Route::get('/imageGrid', [App\Http\Controllers\ImageGridController::class, 'demoGrid']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $title = 'PUBG Tournaments';
        return view('welcome', ['title' => $title]);
    })->name('homepage');

    Route::get('gamerosters/{gameroster}', [App\Http\Controllers\GamerosterController::class, 'show'])->name('gameroster.show');
    Route::get('/tournaments/match-summary', function () {
        return view('tournaments.summary');
    })->name('tournament.match-summary');

    // done by rajan
    Route::get('/tournaments/{tournment}', [App\Http\Controllers\TournamentController::class, 'round'])->name('tournament.enter');
    Route::get('/rounds/{round}', [App\Http\Controllers\RoundController::class, 'matchz'])->name('round.matchz');
    Route::get('/groups/{group}', [App\Http\Controllers\GroupController::class, 'index'])->name('round.index');
    Route::get('/game-stats/{game}', [App\Http\Controllers\GroupController::class, 'gameStat'])->name('gameStat');
    Route::get('/round/edit/{id}', [App\Http\Controllers\RoundController::class, 'edit'])->name('round.edit');
    Route::post('/round-store', [App\Http\Controllers\RoundController::class, 'store'])->name('round.store');
    Route::PUT('/round-update/{id}', [App\Http\Controllers\RoundController::class, 'update'])->name('round.update');

    // done by Sanish Dai
    Route::get('/tournament/{id}', [App\Http\Controllers\TournamentController::class, 'show'])->name('tournament');
    Route::post('/tournament-store', [App\Http\Controllers\TournamentController::class, 'store'])->name('tournament.store');
    Route::get('/tournament-edit/{id}', [App\Http\Controllers\TournamentController::class, 'edit'])->name('tournament.edit');
    Route::PUT('/tournment-update/{id}', [App\Http\Controllers\TournamentController::class, 'Update'])->name('tournament.update');

    //Round
    Route::get('/round/edit/{id}', [App\Http\Controllers\RoundController::class, 'edit'])->name('round.edit');
    Route::PUT('/round-update/{id}', [App\Http\Controllers\RoundController::class, 'update'])->name('round.update');

    //Player
    Route::get('/player/edit/', [App\Http\Controllers\TeamController::class, 'playerEdit'])->name('player.edit');
    Route::get('/player/add/', [App\Http\Controllers\TeamController::class, 'playerAdd'])->name('player.add');
    Route::get('/result/player/add', [App\Http\Controllers\TeamController::class, 'resultPlayerAdd'])->name('player.resultPlayerAdd');
    Route::post('/player-store-result', [App\Http\Controllers\TeamController::class, 'playerStoreResult'])->name('player.playerStoreResult');
    Route::post('/player/update/', [App\Http\Controllers\TeamController::class, 'playerUpdate'])->name('player.update');
    Route::post('/player-store', [App\Http\Controllers\TeamController::class, 'playerStore'])->name('player.store');
    Route::delete('/player/delete/{id}', [App\Http\Controllers\TeamController::class, 'playerDelete'])->name('player.delete');
    // /player/addInStat/
    Route::put('/player/addInStat/{id}', [App\Http\Controllers\TeamController::class, 'playerAddInStat'])->name('player.addInStat');
    //game status
    Route::get('/game_status/{match_id}/', [App\Http\Controllers\GroupController::class, 'game_status'])->name('game_status');

    //Team
    Route::post('/team-details', [App\Http\Controllers\TeamController::class, 'team'])->name('teamId');
    Route::get('/team/edit/', [App\Http\Controllers\TeamController::class, 'edit'])->name('team.edit');
    Route::post('/team-update', [App\Http\Controllers\TeamController::class, 'teamUpdate'])->name('update');
    Route::post('/fetchTeam', [App\Http\Controllers\TeamController::class, 'fetchTeam'])->name('fetchTeam');
    Route::post('/team-store', [App\Http\Controllers\TeamController::class, 'addTeam'])->name('team.store');
    Route::post('/group-store', [App\Http\Controllers\TeamController::class, 'addGroup'])->name('group.store');
    Route::get('/match/edit/', [App\Http\Controllers\TeamController::class, 'matchEdit'])->name('match.edit');
    Route::put('/match/update/{id}', [App\Http\Controllers\TeamController::class, 'matchUpdate'])->name('match.update');
    Route::Post('/match-store', [App\Http\Controllers\TeamController::class, 'addMatch'])->name('match.store');
    Route::delete('/match/delete/{id}', [App\Http\Controllers\TeamController::class, 'matchDelete'])->name('match.delete');
    Route::delete('/team/delete/{id}', [App\Http\Controllers\TeamController::class, 'teamDelete'])->name('team.delete');

    //team Roster Search
    Route::post('/search-team-roster', [App\Http\Controllers\TeamController::class, 'teamRoster'])->name('teamRoster');
    Route::post('/add-existing-team', [App\Http\Controllers\TeamController::class, 'addExistingTeam'])->name('addExistingTeam');

    //Live Stat

    Route::get('/liveStat/{id}', [App\Http\Controllers\LiveStatController::class, 'liveStat'])->name('live-stat');
    Route::get('overLiveStat/{round_id}', [App\Http\Controllers\LiveStatController::class, 'overLiveStat'])->name('overLiveStat');
    Route::get('/result_entry/{id}', [App\Http\Controllers\RoundController::class, 'result_entry'])->name('result_entry'); //match_id has been sent in parameter
    Route::get('/group/{group_id}', [App\Http\Controllers\GroupController::class, 'rosterUpdate'])->name('rosterUpdate'); //group_id has been sent in parameter

    //Team Creative Details
    Route::get('teamDetail/{team_id}', [App\Http\Controllers\GroupController::class, 'teamDetails'])->name('teamDetails');
    //update kill data 
    Route::post('/game-stat', [App\Http\Controllers\RoundController::class, 'updateData'])->name('game-stat');
    //update postion data 
    Route::post('/game-stat-position', [App\Http\Controllers\RoundController::class, 'updatePositionData'])->name('game-stat-position');
    //update team data dead
    Route::post('/game-stat-dead-team', [App\Http\Controllers\RoundController::class, 'updateTeamDeadData'])->name('game-stat-dead-team');
    //update player data dead
    Route::post('/game-stat-dead-player', [App\Http\Controllers\RoundController::class, 'updatePlayerDeadData'])->name('game-stat-dead-player');
    //update Total Kills in team
    Route::post('/update-total-Kills-team', [App\Http\Controllers\RoundController::class, 'teamkill'])->name('teamkill');

    //Result show
    Route::get('/game-result/{game-id}', [App\Http\Controllers\LiveStatController::class, 'index'])->name('game-result');

    //Pusher
    Route::post('/result-pusher', [App\Http\Controllers\PusherController::class, 'resultPusher'])->name('result-pusher');
    Route::post('/roaster-pusher', [App\Http\Controllers\PusherController::class, 'roasterPusher'])->name('roaster-pusher');
    Route::post('/live-stat', [App\Http\Controllers\PusherController::class, 'liveStat'])->name('live-stat');
    Route::post('live-stat-result', [App\Http\Controllers\PusherController::class, 'liveStatFromResult'])->name('live-Stat-From-Result');
    Route::post('/show-case', [App\Http\Controllers\PusherController::class, 'showCase'])->name('live-stat-over');
    Route::post('/map-pusher', [App\Http\Controllers\PusherController::class, 'mapPusher'])->name('map-pusher');

    //schedule
    Route::get('/schedule/{roundid}', [App\Http\Controllers\ScheduleController::class, 'schedule'])->name('schedule');
    Route::put('schedule/{round_id}', [App\Http\Controllers\ScheduleController::class, 'match'])->name('schedule.match');

    //chart

    Route::get('live-map-chance/{roundid}', [App\Http\Controllers\LiveStatController::class, 'liveMapChance'])->name('live-map-chance');


    //alerts
    Route::post('/alerts/{round_id}', [App\Http\Controllers\AlertController::class, 'alerts'])->name('alerts');
    Route::post('rest-alerts', [App\Http\Controllers\AlertController::class, 'restAlerts'])->name('rest-alerts');

    //update

    Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournament.index');

    Route::get('/tournament/{id}', [TournamentController::class, 'show'])->name('tournament');

    Route::get('/round/{id}', [RoundController::class, 'show'])->name('round');

    //search player
    Route::post('/searchPlayer', [App\Http\Controllers\ScheduleController::class, 'searchPlayer'])->name('searchPlayer');

    //Insta Result
    Route::get('/instaResult', [App\Http\Controllers\InstaResultContraoller::class, 'index'])->name('instaResult');
    Route::post('/searchRound', [App\Http\Controllers\InstaResultContraoller::class, 'searchRound'])->name('searchRound');
    Route::post('/searchMatch', [App\Http\Controllers\InstaResultContraoller::class, 'searchMatch'])->name('searchMatch');

    //end report
    Route::get('finalReport/{round_id}', [App\Http\Controllers\InstaResultContraoller::class, 'endReport'])->name('endReport');
});
//stat
Route::get('/stats/{id}', [App\Http\Controllers\StatController::class, 'index'])->name('stat.index');
//Display
Route::get('newResult/{id}', [LiveStatController::class, 'index']);
//Routes for result show
Route::get('/result/{roundid}', [App\Http\Controllers\LiveStatController::class, 'result'])->name('result');
Route::get('/game-result/{roundid}', [App\Http\Controllers\LiveStatController::class, 'index'])->name('game-result');
Route::get('/game-result-ranking/{roundid}', [App\Http\Controllers\LiveStatController::class, 'gameResult'])->name('game-result');
Route::get('/overall-game-result-ranking/{roundid}', [App\Http\Controllers\LiveStatController::class, 'overallGameResult'])->name('overall-game-result-ranking');
Route::get('/overall-mvp/{roundid}', [App\Http\Controllers\LiveStatController::class, 'overallMVP'])->name('overallMVP');
Route::get('match-mvp/{roundid}', [App\Http\Controllers\LiveStatController::class, 'matchMvp'])->name('MatchMvp');
Route::get('solo-mvp/{roundid}', [App\Http\Controllers\LiveStatController::class, 'soloMvp'])->name('SoloMvp');
Route::get('/wwc/{roundid}', [App\Http\Controllers\LiveStatController::class, 'wwc'])->name('wwc');
Route::get('/showcase/{roundid}', [App\Http\Controllers\LiveStatController::class, 'showcase'])->name('showcase');
Route::get('player-show-case/{player_id}/round/{round_id}', [App\Http\Controllers\ShowCaseController::class, 'playerShowCase'])->name('player-show-case');
Route::get('/team-show-case/{team_id}/round/{round_id}', [App\Http\Controllers\ShowCaseController::class, 'teamShowCase'])->name('team-show-case');
Route::get('schedule-detail/{roundid}', [App\Http\Controllers\ScheduleController::class, 'liveSchedule'])->name('schedule.liveSchedule');
Route::get('winner/{round_id}', [App\Http\Controllers\LiveStatController::class, 'winner'])->name('winner');
Route::get('runner-up-team/{round_id}', [App\Http\Controllers\LiveStatController::class, 'runnerUp'])->name('runnerUp');
Route::get('2nd-runner-up/{round_id}', [App\Http\Controllers\LiveStatController::class, 'secondRunnerUp'])->name('secondRunnerUp');
Route::get('ovarall-solo-mvp/{round_id}', [App\Http\Controllers\LiveStatController::class, 'overallSoloMVP'])->name('overallSoloMVP ');

//Stats
Route::get('teamStatAlive/{roundid}', [App\Http\Controllers\StatController::class, 'teamStatAlive'])->name('stat.teamStatAlive');
Route::get('liveRanking/{roundid}', [App\Http\Controllers\StatController::class, 'liveRanking'])->name('stat.liveRanking');
Route::get('aliveKills/{roundid}', [App\Http\Controllers\StatController::class, 'aliveKills'])->name('stat.aliveKills');
Route::get('matchKills/{roundid}', [App\Http\Controllers\StatController::class, 'matchKills'])->name('stat.matchKills');
Route::get('wwcdForecast/{roundid}', [App\Http\Controllers\StatController::class, 'wwcdForecast'])->name('stat.wwcdForecast');
Route::get('liveMatchKill/{roundid}', [App\Http\Controllers\StatController::class, 'liveMatchKill'])->name('stat.liveMatchKill');
Route::get('overallKill/{roundid}', [App\Http\Controllers\StatController::class, 'overallKill'])->name('stat.overallKill');

//Head To Head
Route::get('current-match-head-to-head/{roundid}', [App\Http\Controllers\LiveStatController::class, 'currentMatchPlayerHeadToHead'])->name('current-match--player-head-to-head');
Route::get('current-match-head-to-head-team/{roundid}', [App\Http\Controllers\LiveStatController::class, 'currentMatchTeamHeadToHead'])->name('current-match--team-head-to-head');
Route::get('/player-head-to-head/{roundid}', [App\Http\Controllers\LiveStatController::class, 'playerHeadToHead'])->name('head-to-head');
Route::get('/team-head-to-head/{roundid}', [App\Http\Controllers\LiveStatController::class, 'teamHeadToHead'])->name('team-head-to-head');

//roaster

Route::get('/roaster/{roundid}', [App\Http\Controllers\LiveStatController::class, 'roaster'])->name('roaster');
Route::get('page-roaster/{roundid}', [App\Http\Controllers\LiveStatController::class, 'pageRoaster'])->name('pageRoaster');

Route::get('comming-next/{roundid}', [App\Http\Controllers\LiveStatController::class, 'commingNext'])->name('comming-next');

//game intro
Route::get('/game-intro/{roundid}', [App\Http\Controllers\TournamentController::class, 'gameIntro'])->name('game-intro');

Route::get('map/{roundid}', [App\Http\Controllers\MapController::class, 'map'])->name('map');
Route::get('map-roaster/{roundid}', [App\Http\Controllers\MapController::class, 'teamOverView'])->name('teamOverView');
Route::get('/map-overallKill/{roundid}', [App\Http\Controllers\MapController::class, 'survivalStatus'])->name('survivalStatus');

//alerts
Route::get('/alerts/{roundid}', [App\Http\Controllers\AlertController::class, 'index'])->name('alerts');
Route::get('/player-alerts', [App\Http\Controllers\AlertController::class, 'playerAlerts'])->name('player-alerts');
Route::get('/team-alerts', [App\Http\Controllers\AlertController::class, 'teamAlerts'])->name('team-alerts');

Route::get('graph/{roundid}', [App\Http\Controllers\LiveStatController::class, 'graph'])->name('graph');

Route::get('prize-pool/{round_id}', [App\Http\Controllers\AlertController::class, 'prizePool'])->name('prizePool');
Route::post('prize-pool-save', [App\Http\Controllers\AlertController::class, 'prizePoolSave'])->name('prizePool');
Route::put('prize-update/{prize_id}', [App\Http\Controllers\AlertController::class, 'prizePoolUpdate'])->name('prizePoolUpdate');

Route::get('/tournaments/match-summary', function () {
    return view('tournaments.summary');
})->name('tournament.match-summary');

/* enter tournament */
Route::get('/tournament/enter-tournament', function () {
    return view('tournaments.proInvitationalShowdown.enterTournament');
})->name('tournament.enter-tournament');
/* for add round */
Route::get('/tournament/add-round', function () {
    return view('tournaments.proInvitationalShowdown.addRound');
});


/* for games list */
Route::get('/tournament/add/new-games', function () {
    return view('tournaments.games');
});
Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
    //Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    //Profile
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
    Route::put('/profiles/{user}', [ProfileController::class, 'update'])->name('profiles.update');
    Route::post('/profiles/change/password', [ProfileController::class, 'changePassword'])->name('profiles.change.password');

    //Users
    Route::resource('/users', AdminCustomerController::class)->names('users')->except('show');
    Route::get('/users/customer/info/{user}', [AdminCustomerController::class, 'info'])->name('users.info');
    Route::get('/users/activity/logs/{id}', [AdminCustomerController::class, 'userActivityLogsDatatable'])->name('users.activity.logs');

    //Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('setting.store');

    Route::get('/settings/social/media', [SettingController::class, 'socialMediaIndex'])->name('setting.social.media.index');
    Route::post('/settings/social/media', [SettingController::class, 'socialMediaUpdate'])->name('setting.social.media.update');

    Route::get('/settings/roles-permission', [SettingController::class, 'rolesPermissionIndex'])->name('setting.roles.permission.index');
    Route::post('/settings/roles-permission', [SettingController::class, 'rolesPermissionStore'])->name('setting.roles.permission.store');
    Route::post('/settings/assign-all-roles-permission', [SettingController::class, 'rolesPermissionAssignAllPermission'])->name('setting.roles.permission.assign.all.permission');
    Route::post('/settings/create-roles', [SettingController::class, 'createRoles'])->name('setting.create.roles');
    Route::delete('/settings/delete-roles/{role}', [SettingController::class, 'deleteRoles'])->name('setting.roles.destroy');
    Route::get('/settings/manage-roles-permission', [SettingController::class, 'manageRolesPermissionIndex'])->name('setting.manage.roles.permission.index');

    //Categories
    Route::get('/categories/status/toggle', [CategoryController::class, 'toggleIsStatus'])->name('categories.toggle.status');
    Route::resource('/categories', CategoryController::class)->names('categories')->except('show');


    //post match
    Route::get('/post-match', function () {
        return view('tournaments.post-match');
    });
    Route::get('/match-ranking', function () {
        return view('tournaments.match-ranking');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

// routes for new layout 

Route::get('/newHome', function () {
    return view('new_layout.pages.home');
});


// prod designs

//showcase team
Route::get('/showcase', function () {
    return view('new_layout.components.showcaseTeam');
});

//showcase player
Route::get('/showcase-player', function () {
    return view('new_layout.components.showcasePlayer');
});

//solo mvp 
Route::get('/solo-mvp', function () {
    return view('new_layout.components.soloMvp');
});
