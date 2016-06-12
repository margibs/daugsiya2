<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Jenssegers\Agent\Agent as Agent;
$Agent = new Agent();

Route::get('agentagent','PageController@agentagent');

Route::get('welcome', function(){
	return view('welcome');
	//return "Hello World";
});

Route::post('email/send', 'UserController@emailSend');

Route::post('test/getChatRoomPaginate','UserController@getChatRoomPaginate');

Route::get('/all_games', 'PageController@allGames');
Route::get('/why', 'PageController@why');

Route::get('/clubhouse','ClubhouseController@redirectClubhouseHome');

Route::get('/terms_and_condition', 'PageController@termsAndCondition');
Route::get('/privacy_policy', 'PageController@privacyPolicy');

Route::get('miming323123','PageController@getBanners222');

Route::get('home/ajax_get_ads_posts_init', 'PageController@ajaxGetAdsPostsInit');
Route::post('home/ajax_get_reels_post', 'PageController@ajaxGetReelsPosts');
Route::post('home/ajax_get_reels_post2', 'PageController@ajaxGetReelsPosts2');
Route::post('home/ajax_get_reels_post_category', 'PageController@ajaxGetReelPostsCategory');
Route::post('home/ajax_get_filter_posts', 'PageController@ajaxGetFilterPosts');

// Route::get('location_sample', 'PageController@sample_location');

// Route::get('ladbrokesroulette','PageController@ladbrokesroulette');

Route::post('home/ajax_get_posts','PageController@ajaxGetPosts');
Route::post('home/ajax_get_posts_for_autopost','PageController@ajaxGetPostsforAutoPost');
Route::post('home/ajax_get_posts_for_big_wins','PageController@ajaxGetPostsforBiggestWins');

// FILTER FOR STATIC PAGES
Route::filter('cache.fetch','App\Filters@fetch');
Route::filter('cache.put','App\Filters@put');

//CRON AUTOPOSTER
Route::get('admin/autoposts/all', 'AdminController@runAutopost');
Route::get('admin/autoposts/facebook', 'AutoPostController@runFacebookPost');
Route::get('admin/autoposts/twitter', 'AutoPostController@runTwitterPost');
Route::get('admin/autoposts/pinterest', 'AutoPostController@runPinterestPost');
Route::get('admin/autoposts/instagram', 'AutoPostController@runInstagramPost');
Route::get('admin/autoposts/check_execute', 'AutoPostController@checkExecute');
Route::get('admin/autopost/make_autopost','AutoPostController@makeAutopost');


Route::post('room/getRoomMessages', 'ChatroomController@getRoomMessages');
Route::get('notification/postCustomNotification', 'NotificationController@postCustomNotification');
Route::post('clubhouse/session', 'UserController@session');


//Tagging

Route::get('searchHashGame', 'GameController@searchHashGame');
Route::get('searchHashFriend', 'FriendController@searchHashFriend');

Route::get('profile/viewUserProfile', 'GameController@viewUserProfile');

Route::group(['middleware' => 'ChatHostCheck'], function()
{
	Route::get('admin/chatroom/{name?}','CasinoController@chatroom');
});

Route::group(['middleware' => 'UserCheck'], function()
{
	//QUESTION BACKEND
	Route::get('admin/question','QuestionController@question');
	Route::post('admin/question', 'QuestionController@addQuestion');
	Route::get('admin/question/edit/{id}', 'QuestionController@editQuestion');
	Route::post('admin/question/edit/{id}', 'QuestionController@postEditQuestion');
	Route::get('admin/question/delete/{id}', 'QuestionController@deleteQuestion');

	Route::get('admin/question/choices/{id}', 'QuestionController@choices');
	Route::post('admin/question/choices/{id}', 'QuestionController@addChoice');
	Route::get('admin/question/choices/edit/{id}', 'QuestionController@editChoice');
	Route::post('admin/question/choices/edit/{id}', 'QuestionController@postEditChoice');
	Route::get('admin/question/choices/delete/{id}', 'QuestionController@deleteChoice');

	//Prize and Notification
	Route::get('admin/prize','PrizeController@prizes');
	Route::post('admin/prize','PrizeController@addPrize');

	Route::get('admin/prize/code','PrizeController@prizeCode');
	Route::get('admin/prize/category','PrizeController@prizeCategory');
	Route::post('admin/prize/category','PrizeController@addPrizeCategory');
	Route::get('admin/prize/editCategory/{id}','PrizeController@editPrizeCategory');
	Route::post('admin/prize/editCategory/{id}','PrizeController@postEditPrizeCategory');
	Route::get('admin/prize/deleteCategory/{id}','PrizeController@deletePrizeCategory');

	Route::post('admin/prize/code','PrizeController@generateCode');

	Route::get('admin/notification','AdminController@notification');
	Route::get('admin/notification/{id}/edit','AdminController@editCustomNotification');
	Route::post('admin/notification/{id}/edit','NotificationController@postEditCustomNotification');
	Route::get('admin/notification/{id}/delete','NotificationController@deleteCustomNotification');

	Route::get('admin/biggest_wins', 'AdminController@biggestWins');
	Route::post('admin/biggest_wins', 'AdminController@post_biggestWins');
	Route::get('admin/biggest_wins/delete/{id}', 'AdminController@delete_biggestWins');
	Route::get('admin/biggest_wins/edit/{id}', 'AdminController@edit_biggestWins');
	Route::post('admin/biggest_wins/edit/{id}', 'AdminController@postEdit_biggestWins');
	
	//CasinoController

	Route::get('admin/casino/mask-link','CasinoController@maskLink');
	Route::get('admin/casino/new-mask-link','CasinoController@newMaskLink');
	Route::get('admin/casino/mask-link/edit/{id}','CasinoController@editMaskLink');
	Route::post('admin/casino/mask-link/{id?}','CasinoController@addMaskLink');

	Route::get('admin/casino','CasinoController@casino');
	Route::get('admin/new_casino','CasinoController@newCasino');
	Route::get('admin/casino/{id}','CasinoController@editCasino');
	Route::post('admin/casino/{id?}','CasinoController@addCasino');
	Route::post('admin/casino/{id}/addCasinoBanner','CasinoController@addCasinoBanner');

	Route::get('admin/casino_preference','CasinoController@casinoPreference');
	Route::get('admin/casino_preference/{id}','CasinoController@editCasinoPreference');
	Route::post('admin/casino_preference/{id?}','CasinoController@addCasinoPreference');

	Route::post('admin/casino/ajax/save_sort','CasinoController@saveSort');
	Route::post('admin/casino/ajax/save_priority','CasinoController@savePriority');
	Route::post('admin/casino/ajax/save_casino_preferences_list','CasinoController@saveCasinoPreferencesList');

	Route::get('admin/autoposts','AdminController@autoposts');
	Route::get('admin/autoposts/included','AdminController@autopostsListIncluded');
	Route::get('admin/autoposts/check-pool','AdminController@autopostCheckPool');
	Route::get('admin/autoposts/new_autopost','AdminController@new_autopost');
	Route::post('admin/autoposts/new_autopost','AdminController@post_autopost');
	Route::get('admin/autoposts/{id}/delete','AdminController@delete_autopost');
	Route::get('admin/autoposts/{id}/edit','AdminController@view_editAutopost');
	Route::post('admin/autoposts/{id}/edit','AdminController@edit_autopost');


	Route::post('admin/addNewCustomNotification', 'NotificationController@addNewCustomNotification');

	// Route::get('admin/chatroom/{name?}','CasinoController@chatroom');
	Route::get('admin/article_banner','CasinoController@articleBanner');
	Route::get('admin/new_article_banner','CasinoController@newArticleBanner');
	Route::get('admin/article_banner/{id}','CasinoController@editArticleBanner');
	Route::post('admin/article_banner/{id?}','CasinoController@addArticleBanner');
	Route::post('admin/article_banner_option','CasinoController@articleBannerOption');

	Route::get('admin/skyscraper_banner','CasinoController@skyScraperBanner');
	Route::get('admin/new_skyscraper_banner','CasinoController@newSkyScraperBanner');
	Route::get('admin/skyscraper_banner/{id}','CasinoController@editSkyScraperBanner');
	Route::post('admin/skyscraper_banner/{id?}','CasinoController@addSkyScraperBanner');
	Route::post('admin/skyscraper_banner_option','CasinoController@skyScraperBannerOption');



	//End Casino Controller

	//AdminController
	Route::get('admin','AdminController@posts');
	Route::get('admin/media_file','AdminController@mediaFiles');
	Route::post('admin/media_file_upload', 'AdminController@media_file_upload');
	Route::get('admin/users','AdminController@users');
	Route::get('admin/users/{id}','AdminController@editUser');
	Route::post('admin/users/{id}','AdminController@editUserPost');
	
	Route::get('admin/media_gallery','AdminController@mediaGallery');
	
	Route::get('admin/settings','AdminController@adminSettings');

	Route::get('admin/posts','AdminController@posts');
	Route::get('admin/drafts','AdminController@drafts');
	Route::get('admin/trash','AdminController@trash');
	Route::get('admin/posts/media_file','AdminController@mediaFiles');
	Route::get('admin/posts/{id}/delete','AdminController@deletePost');
	Route::get('admin/posts/{id}','AdminController@editPost');

	Route::get('admin/new_post','AdminController@newPost');
	Route::post('admin/new_post/{id?}','AdminController@addPost');

	Route::get('admin/categories','AdminController@categories');
	Route::post('admin/categories','AdminController@addCategory');

	Route::get('admin/links','AdminController@links');

	Route::post('admin/new_link/{id?}','AdminController@addLink');
	Route::get('admin/new_link','AdminController@newLink');
	
	Route::get('admin/edit_link/{id}','AdminController@editLink');

	Route::get('admin/comments','AdminController@comments');

	Route::get('admin/ajax_get_media_file','AdminController@ajaxGetMediaFile');
	Route::post('admin/ajax_delete_image','AdminController@ajaxDeleteImage');
	Route::post('admin/ajax_upload_image','AdminController@ajaxUploadImage');
	Route::post('admin/ajax_check_content','AdminController@ajaxCheckContent');

	// Add Chatroom

	Route::post('admin/addChatroom', 'AdminController@addChatroom');

	//HOME ADS
	Route::get('admin/home_ads','AdminController@homeAds');
	Route::post('admin/homeads/insert_image', 'AdminController@insertImage');
	Route::get('admin/homeads/{id}', 'AdminController@getAdds');
	Route::get('admin/homeads/edit/{id}', 'AdminController@editHomeAdds');
	Route::post('admin/homeads/edit/{id}', 'AdminController@editImageAdd');
	/*Route::post('admin/edit/imageEdit', 'AdminController@editImageAdd');*/
	Route::get('admin/homeads/delete/imageDelete/{id}', 'AdminController@deleteImageHome');
	Route::get('admin/homeads/list/imageAdds', 'AdminController@listImageHome');
	Route::get('admin/homeads/list/trashed', 'AdminController@listImageHomeTrashed');
	Route::get('admin/homeads/list/trashedData', 'HomeImagesController@trashedData');
	//FUNCTION FOR CHANGE IS MOBILE
	Route::post('admin/posts/ismobile', 'AdminController@ismobile');
	//DATA TABLE FOR USER CONTROLLER
	Route::controller('userdatatable', 'UserController', [
	    'anyData'  => 'userdatatable.data',
	    'getIndex' => 'userdatatable',
	]);


	//DATA TABLE FOR USER CONTROLLER
	Route::controller('homeimagedatatable', 'HomeImagesController', [
	    'anyData'  => 'homeimagedatatable.data',
	    'getIndex' => 'homeimagedatatable',
	]);

	//FUNCTION FOR DYNAMIC PAGE
	Route::get('admin/dynamic/link', 'AdminController@getLink');

	/*
	*  FUNCTION FOR DYNAMIC LINK
	*	AUTHO: IAN ROSLAES
	*	DATE: 5/2/2016
	*/
	
	//DATA TABLE FOR SKYSCRAPPER DYANAMI LINK
	Route::get('admin/article/get','HomeImagesController@articleGet');
	Route::get('admin/skypscrapper/get','HomeImagesController@skypscrapperGet');
	Route::get('admin/home-adds/get', 'HomeImagesController@anyDataCasino');
	/*
	*  FUNCTION FOR LINK IN MOBILE
	*/
	Route::get('admin/mobile_home_ads','AdminController@mobile_home_ads');
	Route::get('admin/get_mobile_adds', 'HomeImagesController@get_mobile_adds');

	Route::get('admin/getAutopostAll', 'HomeImagesController@getAutopostAll');
	Route::get('admin/autopostsListTable', 'HomeImagesController@autopostsListTable');

	//FIND MEDIAFILES
	Route::get('admin/findMediaFiles/{id}', 'AdminController@findMediaFiles');
	Route::get('admin/deleteMediaFiles/{id}', 'AdminController@deleteMediaFiles');
	

});


//Ajax Call
Route::post('casino/ajax/get_casino','PageController@ajaxGetCasino');
Route::get('casino/ajax/get_article_banner','PageController@ajaxGetArticleBanner');


Route::group(['middleware' => 'ClubMiddleware'], function()
{

	// Comment
	Route::post('add_comment', 'CommentController@addComment');
	Route::post('add_reply', 'CommentController@addReply');

	Route::get('clubhouse/home', 'ClubhouseController@home');
	Route::get('clubhouse/profile', 'UserController@profile');
	Route::get('clubhouse/magazine', 'UserController@mobileMagazine');

	Route::post('clubhouse/profile/changePassword', 'UserController@changePassword');
	Route::post('clubhouse/profile/userDetails', 'UserController@userDetails');
	Route::get('clubhouse/findPeople', 'UserController@findPeople');

	Route::get('clubhouse/slotsroom', 'ClubhouseController@slot');

	Route::get('clubhouse/prizeroom','ClubhouseController@redirectPrizeRoom');

	Route::get('prizes', 'ClubhouseController@prize');

	Route::get('clubhouse/chatroom/{name?}', 'UserController@chatroom');
	

	//Game Exp

	//Game Exp

	Route::post('gameExp/addFavorite', 'GameController@addFavorite');
	Route::post('gameExp/removeFavorite', 'GameController@removeFavorite');
	Route::post('gameExp/playedGame', 'GameController@playedGame');
	Route::post('gameExp/rateGame', 'GameController@rateGame');
	Route::post('gameExp/uploadProfilePic', 'GameController@uploadProfilePic');
	Route::post('gameExp/playNow', 'GameController@playNow');

	//Profile AJAX

	Route::post('profile/viewFriendProfile', 'GameController@viewFriendProfile');
	Route::post('profile/getFriendRequests', 'GameController@getFriendRequests');
	Route::post('profile/readFriendRequests', 'GameController@readFriendRequests');
	Route::post('profile/getMyFriends', 'GameController@getMyFriends');

	//Message AJAX

	Route::post('message/getPrivateMessages', 'MessageController@getPrivateMessages');
	Route::post('message/getPrivateMessageReadCount', 'MessageController@getPrivateMessageReadCount');
	Route::post('message/sendPrivateMessage', 'MessageController@sendPrivateMessage');
	Route::post('message/getInbox', 'MessageController@getInbox');

	//Chatroom AJAX
	Route::post('chatroom/postMessage', 'ChatroomController@postMessage');
	Route::post('chatroom/getChatroom', 'ChatroomController@getChatroom');
	Route::post('chatroom/getUnreadCount', 'ChatroomController@getUnreadCount');
	Route::post('chatroom/userChatRead', 'ChatroomController@userChatRead');


	// Friend AJAX
	Route::post('friends/addFriend', 'FriendController@addFriend');
	Route::post('friends/cancelFriendRequest', 'FriendController@cancelFriendRequest');
	Route::post('friends/acceptFriendRequest', 'FriendController@acceptFriendRequest');
	Route::post('friends/unFriend', 'FriendController@unFriend');


	Route::post('notification/addNewGameNotification', 'NotificationController@addNewGameNotification');
	Route::post('notification/addNewRoomNotification', 'NotificationController@addNewRoomNotification');
	Route::post('notification/moderatorJoinedChatroom', 'NotificationController@moderatorJoinedChatroom');
	Route::post('notification/getGlobalNotifications', 'NotificationController@getGlobalNotifications');
	Route::post('notification/readGlobalNotifications', 'NotificationController@readGlobalNotifications');
	Route::post('notification/recommendGame', 'NotificationController@recommendGame');


	Route::post('prize/checkPrizeCode', 'PrizeController@checkPrizeCode');
	Route::post('prize/claimPrize', 'PrizeController@claimPrize');


	//Interview AJAX

	Route::post('question/answer', 'QuestionController@answer');

	//Tour AJAX
	Route::post('endTour', 'UserController@endTour');

	//ROUTE FOR GET CHATROOM
	Route::get('mobile/getChatroom/{id}', 'UserController@getChatroomMobile');


	Route::post('mobile/paginate/getchatroom', 'UserController@paginateChatroom');

	Route::post('message/getPaginatePrivateMessage', 'MessageController@getPaginatePrivateMessage');
	Route::post('message/postPaginatePrivateMessage', 'MessageController@postPaginatePrivateMessage');

	//SEND AWEBER EMAIL
	Route::post('admin/sendEmailAweber', 'UserController@sendEmailAweber');

	Route::post('admin/enterAddress', 'UserController@enterAddress');

	Route::post('admin/ignore', 'UserController@ignore');

});


Route::get('login', 'PageController@login');
Route::post('login/post', 'ClubhouseController@postLogin');
Route::get('signup', 'PageController@signup');
Route::post('signup/post', 'Auth\AuthController@signup');
Route::get('logout', 'ClubhouseController@getLogout');
// Authentication routes...
/*Route::get('login', 'Auth\AuthController@getLogin');*/
/*Route::post('login', 'Auth\AuthController@postLogin');*/
/*Route::get('logout', 'Auth\AuthController@getLogout');*/

// Registration routes...
// Route::get('register', 'Auth\AuthController@getRegister');
// Route::post('register', 'Auth\AuthController@postRegister');

//Single BLog
/*Route::get('{category}','PageController@category');
Route::get('{category}/{slug?}','PageController@single');*/
Route::get('clubhouse/confirm', 'ClubhouseController@confirmEmail');

Route::get('public/mobile/getChatroom/{id}', 'UserController@getChatroomMobile');
Route::post('public/mobile/paginate/getchatroom', 'UserController@paginateChatroom');


if ($Agent->isTablet()) 
{
   	// Route::get('/', 'PageController@home')->before('cache.fetch')->after('cache.put');
	Route::get('/', 'PageController@home');
	Route::get('{slug}','PageController@category');
}
elseif($Agent->isMobile())
{
	// you're a mobile device
	Route::get('/', 'MobileController@home');
	Route::get('{slug}','MobileController@category');
	// Route::get('{category}/{slug?}','MobileController@single');
}
else
{
	// Route::get('/', 'PageController@home')->before('cache.fetch')->after('cache.put');
	Route::get('/', 'PageController@home');
	Route::get('{slug}','PageController@category');
}


