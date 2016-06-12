<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
  //       'session/getUserSession',
  //       //game exp
  //       'gameExp/addFavorite',
		// 'gameExp/removeFavorite',
		// 'gameExp/playedGame',
		// 'gameExp/rateGame', 
		// 'gameExp/uploadProfilePic',
		// //profile ajax
		// 'profile/viewFriendProfile',
		// 'profile/getFriendRequests',
		// 'profile/readFriendRequests',
		// //message ajax
		// 'message/getPrivateMessages',
		// 'message/sendPrivateMessage',
		// 'message/getInbox',
		// //Chatroom AJAX
		// 'chatroom/postMessage',
		// 'chatroom/getChatroom',
		// 'chatroom/getUnreadCount',
		// // Friend AJAX
		// 'friends/addFriend',
		// 'friends/cancelFriendRequest',
		// 'friends/acceptFriendRequest',
		// 'friends/unFriend',
		// //notification ajax
		// 'notification/addNewGameNotification',
		// 'notification/addNewRoomNotification',
		// 'notification/moderatorJoinedChatroom',
		// 'notification/addNewCustomNotification',
		// 'notification/getGlobalNotifications',
		// 'notification/readGlobalNotifications',
		// 'notification/recommendGame',
		// //priz room
		// 'prize/checkPrizeCode', 
		// 'prize/claimPrize',
		// //Interview AJAX
		// 'question/answer',
		// //sidebar ajax
		// 'home/ajax_get_ads_posts_init',
		// 'home/ajax_get_ads_posts',
		// 'home/ajax_get_reels_post',
		// 'home/ajax_get_reels_post2',
		// 'home/ajax_get_reels_post_category',
		// 'home/ajax_get_filter_posts',
		// //
		// 'home/ajax_get_page',
		// 'home/ajax_get_posts',
		// 'home/ajax_get_posts_for_autopost',

		// 'add_comment',
		// 'add_reply',
		// 'room/getRoomMessages',
		// 'session/getUserSession'

    	'clubhouse/session'
    ];
}
