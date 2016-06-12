var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server);

var bodyParser = require('body-parser');

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.use(function(req, res, next) {
 res.header('Access-Control-Allow-Origin', "*");
 res.header('Access-Control-Allow-Methods','GET,PUT,POST,DELETE');
 res.header('Access-Control-Allow-Headers', 'Content-Type');
 next();
});

server.listen(8891);

app.post("/push_global_notification", function(req, res, next) {
    io.sockets.emit("post_global_notification", req.body);
    res.send({});
});
app.post("/push_custom_notification", function(req, res, next) {
    io.sockets.emit("post_custom_notification", req.body);
    res.send(true);
});

app.post("/push_userActivity", function(req, res, next) {
    activity_data = {};
    activity_data.user = req.body.user;
    activity_data.content = req.body.content;
    activity_data.type = req.body.type;
    io.to('friend_'+activity_data.user.id).emit("post_userActivity", activity_data);
    res.send(true);
});

app.post("/friend_tag_notification", function(req, res, next) {
    /*io.sockets.emit("post_custom_notification", req.body);*/
    friends = req.body.friendTags;

    notification_data = {};
    notification_data.content = req.body.content;
    notification_data.user = req.body.user;
    notification_data.type = req.body.type;

    getSockets = io.sockets;

    for(i=0;i<friends.length;i++){
        getSockets.in('user_'+friends[i]);
    }

    getSockets.emit('post_friendTag_notification', notification_data );

    res.send(true);
});

app.post("/push_recommendGame_notification", function(req, res, next) {
    request = req.body;

    for(i=0;i<request.length;i++){
        un = request[i];
      io.to('user_'+un.friend_id).emit("post_recommendGame_notification", un);
    }
    res.send(true);
});
app.post("/user_login", function(req, res, next) {
      
    request = req.body;
    io.to(request.session_id).emit('user_logged_in');
    io.to('friend_'+request.user_id).emit('friend_login', request.user_id);
    io.to('friend_'+request.user_id).emit('friendOnline', request.user_id);
    res.send(true);
});
app.post("/user_logout", function(req, res, next) {
      
    request = req.body;
    io.to('user_'+request.user_id).emit('user_logged_out');
    /*if(request.remaining_sessions == 0){
        io.to('friend_'+request.user_id).emit('friend_logout', request.user_id);
    }*/
    
    res.send(true);
});

chatrooms = {};
users = [];

chatroom2 = [];
user_bans = {};

function Room(id, name, description){
  this.id = id,
  this.name = name,
  this.description = description,
  this.people = [],
  this.user_banlist = [];
}

Room.prototype.index = function(){
  for(i=0;i<chatroom2.length;i++){

    if(chatroom2[i].id == this.id)
      return i;
  }
  return false;
}

Room.prototype.addPerson = function(userdata){

  chatroom = chatroom2[this.index()];
  userExists = false;
  for(i=0;i<chatroom.people.length;i++){
    if(chatroom.people[i].user_id == userdata.user_id){
      userExists = true;
      break;
    }
  }

  if(!userExists){
    chatroom2[this.index()].people.push(userdata);
  }

}

Room.prototype.leaveUser = function(user_id){

  chatroom = chatroom2[this.index()];
  userIndex = false;
  for(i=0;i<chatroom.people.length;i++){
    if(chatroom.people[i].user_id == user_id){
      userIndex = i;
      break;
    }
  }
  if(userIndex>=0){
    chatroom2[this.index()].people.splice(userIndex, 1);
  }
}

Room.prototype.exists = function(){

  for(i=0;i<chatroom2.length;i++){

    if(chatroom2[i].id == this.id)
      return true;
  }
  return false;
}

Room.prototype.add = function(){

  if(!this.exists()){
    chatroom2.push(this);
  }

}

Room.prototype.getPeople = function(){

  return chatroom2[this.index()].people;
}

Room.prototype.getRegularPeople = function(){

  people = [];

  dataPeople = chatroom2[this.index()].people;

  for(i=0;i<dataPeople.length;i++){

      if(!dataPeople[i].isAdmin){

         dataPeople[i].banned = false;

        if(typeof user_bans[dataPeople[i].user_id] != 'undefined'){


            if(typeof user_bans[dataPeople[i].user_id][this.id] != 'undefined'){
              dataPeople[i].banned = user_bans[dataPeople[i].user_id][this.id].remaining;
            }

        }

        people.push(dataPeople[i]);

      }    

  }

  return people;

}


Room.prototype.userExists = function(user_id){

  for(i=0;i<this.people.length;i++){
    if(this.people[i].id == user_id){
      return true;
    }
  }

  return false;

}

function User(id, name, profile_picture, adminmode){
  this.id = id,
  this.profile_picture = profile_picture,
  this.name = name,
  this.isAdmin = adminmode || false,
  this.sockets = [],
  this.rooms = [];  
}

User.prototype.exists = function(){
  for(i=0;i<users.length;i++){
    if(users[i].id == this.id){
      return true;
    }
  }
  return false;
}
function UserOnline(user_id){
  for(i=0;i<users.length;i++){
    if(users[i].id == user_id){
      return true;
    }
  }
  return false;
}


User.prototype.add = function(){

  if(!this.exists()){
    users.push(this);
  }
}

User.prototype.index = function(){

  for(i=0;i<users.length;i++){
    if(users[i].id == this.id){
      return i;
    }
  }

  return false;
}

User.prototype.hasJoinedRoom = function(room_id){

  index = this.index();
  if(index>=0 && users[index]){

    for(i=0;i<users[index].rooms.length;i++){
      if(users[index].rooms[i].room_id == room_id){
        return true;
      }
    }

  }

  return false;

}

User.prototype.joinRoom = function(room){

  index = this.index();

  if(index >=0 && users[index]){
    if(!this.hasJoinedRoom(room.room_id)){
      users[index].rooms.push(room);
    }
  }
}
User.prototype.getRooms = function(){

  index = this.index();
  if(index >=0 && users[index]){

    rooms = [];

    for(i=0;i<users[index].rooms.length;i++){
      room = users[index].rooms[i];
      room.people = room.getPeople();
      rooms.push(room);
    }

    return rooms;
  }

}

User.prototype.leaveRoom = function(room_id){

  index = this.index();
  if(index >=0 && users[index]){

    roomIndex  = false;

    for(i=0;i<users[index].rooms.length;i++){
      if(users[index].rooms[i].id == room_id){
        roomIndex = i;
        break;
      }
    }

    users[index].rooms.splice(roomIndex, 1);
  }
}

User.prototype.addSocket = function(socket_id){

  index = this.index();
  if(index >=0 && users[index]){
    users[index].sockets.push(socket_id);
  }
}

User.prototype.removeSocket = function(socket_id){

  index = this.index();

  if(index >=0 && users[index]){
    users[index].sockets.splice(socket_id, 1);
  } 
}

User.prototype.haveSockets = function(socketId){

  index = this.index();

  if(index >=0 && users[index]){
  return users[index].sockets.length > 0;
  } 
  
  return false;
}

User.prototype.getData = function(){

  return { 'user_id' : this.id, 'profile_picture' : this.profile_picture, 'name' : this.name, isAdmin : this.isAdmin };

}

User.prototype.removeUser = function(){
  if(index >=0 && users[index]){
    users.splice(index, 1);
  } 
}


function Private_Message(from, to, message){
  this.from = from,
  this.to = to,
  this.message = message;
}

  function timePassed(user_id, room_id){


    if( user_bans[user_id][room_id]){

        var remaining = user_bans[user_id][room_id].remaining;


      if(remaining == 0){

        clearInterval(user_bans[user_id][room_id].timerId);
        delete user_bans[user_id][room_id];

      }else{
        remaining = remaining - 1000;
        user_bans[user_id][room_id].remaining = remaining;

      }

    }

}

function getUserBan(user_id, room_id){

    banned = false;

        if(typeof user_bans[user_id] != 'undefined'){

            if(typeof user_bans[user_id][room_id] != 'undefined'){

              banned = user_bans[user_id][room_id].remaining;
            }
        }


        return banned;
}

io.on('connection', function (socket) {



  console.log('connected to server 8891');

  socket.on('look_at_room', function(sessionId, chatterBox){

      if(sessionId){
        console.log(sessionId);
          socket.join(sessionId);
      }

          if(chatterBox && chatterBox.length > 0){

        var getRoomPeople = [];

        for(i=0;i<chatterBox.length;i++){
          
          _room = chatterBox[i];
          
           socket.join('room_'+_room.id);
           newRoom = new Room(_room.id, _room.name, _room.description);
           newRoom.add();
           getRoomPeople[i] = { 'room_id' : _room.id, people : newRoom.getPeople() }; 
        }

        socket.emit('chatterBoxes_connected', getRoomPeople);

    }

/*    if(chatroom2[0]){
      console.log( 'chatroom2[0]' );
      socket.join('room_'+chatroom2[0].id);
      
      socket.emit('open_current_room', chatroom2[0]);
    }*/

  });

  socket.on('observe_friend_session', function(friends){
    if(friends && friends.length > 0){

      for(i=0;i<friends.length;i++){
        socket.join('friend_'+friends[i]);
      }

    }

  });

  socket.on('connect_to_comment', function(data){

    socket.room_name = 'comment_'+data.type+'_'+data.content_id;
    console.log(data.user+' has connected to '+socket.room_name);
    socket.join(socket.room_name);

    socket.emit('comment_connected');

  });


    socket.on('comment', function(data){
        socket.to(socket.room_name).emit('push_comment', data);
    });

    socket.on('reply', function(data){
      console.log('reply');
      console.log(data);
        socket.to(socket.room_name).emit('push_reply', data);
    });



  /*socket.on('multiple_room', function(rooms){
    if(rooms && rooms.length > 0){

      var getRoomPeople = [];

      if(socket.multiple_rooms == undefined){
        socket.multiple_rooms = [];
      }

        for(i=0;i<rooms.length;i++){

          _room = rooms[i];
          
           socket.join('room_'+_room.room_id);
           newRoom = new Room(_room.room_id, _room.name, _room.description);
           newRoom.add();
           getRoomPeople[i] = { 'room_id' : _room.room_id, people : newRoom.getPeople() }; 
           socket.multiple_rooms.push(newRoom);
        }

        socket.emit('multiple_room_connected', getRoomPeople);
    }
  });

  socket.on('adminJoin_chat', function(userdata, room_id){
      if(room_id && userdata && socket.multiple_rooms != undefined){

      theRoomIndex = false;
      for(i=0;i<socket.multiple_rooms.length;i++){
            room = socket.multiple_rooms[i];

            if(room.id == room_id){
              theRoomIndex = i;
              break;
            }
        }
 
          if(theRoomIndex >= 0){

              var theUser = new User(userdata.user_id, userdata.name, userdata.profile_picture);
              theUser.add();
              theUser.addSocket(socket.id);
              theUser.data = theUser.getData();

              theRoom = socket.multiple_rooms[theRoomIndex];
              theUser.joinRoom( theRoom );
              theRoom.addPerson(theUser.data);
              io.sockets.in('room_'+room_id).emit('display_people', theRoom.getPeople(), theRoom.id );
          }


           }
  });*/

 /* socket.on('chatterBox_join', function(chatter){
      
      if(chatter){

        var newRoom = new Room(chatter.id, chatter.name, chatter.description);

        newRoom.add();

        socket.user.joinRoom(newRoom);
        socket.join('room_'+newRoom.id);
        newRoom.addPerson(socket.user.data);

        if(socket.myRooms == undefined){
          socket.myRooms = [];
        }

        var alreadyJoined = false;

        for(i=0;i<socket.myRooms.length;i++){
            if(socket.myRooms[i].id == chatter.id){
              alreadyJoined = true;
              break;
            }
        }

        if(!alreadyJoined){
          socket.myRooms.push(newRoom);
        }

            if(socket.user.isAdmin){

            socket.join('admin_'+newRoom.id );

            socket.emit('display_users', newRoom.getRegularPeople() );

          }else{

              banned = getUserBan(socket.user.data.user_id, newRoom.id);
              
              socket.to('admin_'+newRoom.id).emit('display_users', newRoom.getRegularPeople() );
          }

              io.sockets.in('room_'+newRoom.id).emit('display_people', newRoom.getPeople(), newRoom.id );
            }

  });*/

  socket.on('login', function (userdata, chatroom, adminmode, myFriends, chatterBox){

    if(userdata.session_id){
      socket.join(userdata.session_id);
    }

    if(userdata.user_id){

      socket.join('user_'+userdata.user_id);
      socket.isLogged = true;
      socket.user = new User(userdata.user_id, userdata.name, userdata.profile_picture, adminmode);
      socket.user.add();
      socket.user.addSocket(socket.id);
      socket.user.data = socket.user.getData();

          if(chatterBox && chatterBox.length > 0){

        var getRoomPeople = [];

        for(i=0;i<chatterBox.length;i++){
          
          _room = chatterBox[i];
          
           socket.join('room_'+_room.id);
           newRoom = new Room(_room.id, _room.name, _room.description);
           newRoom.add();
           getRoomPeople[i] = { 'room_id' : _room.id, people : newRoom.getPeople() }; 

           banned = getUserBan(socket.user.data.user_id, newRoom.id);
          if(banned){
            getRoomPeople[i].banned = banned;
          }
           socket.user.joinRoom(newRoom);
           newRoom.addPerson(socket.user.data);

            if(socket.myRooms == undefined){
              socket.myRooms = [];
            }

            var alreadyJoined = false;

            for(i=0;i<socket.myRooms.length;i++){
                if(socket.myRooms[i].id == _room.id){
                  alreadyJoined = true;
                  break;
                }
            }

            if(!alreadyJoined){
              socket.myRooms.push(newRoom);
            }

                if(socket.user.isAdmin){

                socket.join('admin_'+newRoom.id );

                socket.emit('display_users', newRoom.getRegularPeople() );

              }else{
                  
                  socket.to('admin_'+newRoom.id).emit('display_users', newRoom.getRegularPeople() );
              }

                  io.sockets.in('room_'+newRoom.id).emit('display_people', newRoom.getPeople(), newRoom.id );
        }

        socket.emit('chatterBoxes_connected', getRoomPeople);

    }

/*      if(!chatroom){

        myRooms = socket.user.getRooms();

        if(myRooms.length > 0){

          for(i=0;i<myRooms.length;i++){
            socket.join('room_'+myRooms[i].id);
            banned = getUserBan(socket.user.data.user_id, myRooms[i].id);
            myRooms[i].banned = banned;
          }
          socket.emit('rooms_opened', myRooms);


        }
      }*/
      if(myFriends !=undefined && (typeof myFriends == 'string' && myFriends.trim() !='')){

          myFriendsParse = JSON.parse(myFriends);
          onlineFriends = [];
          if(myFriendsParse && myFriendsParse.length > 0){
            for(j=0;j<myFriendsParse.length;j++){
              friend_id = myFriendsParse[j];
              socket.join('friend_'+friend_id);
              if(UserOnline(friend_id)){
                onlineFriends.push(friend_id);
              }
            }
          }

          socket.emit('myOnlineFriends', onlineFriends);
      }
    
      socket.emit('login_success');
    } 

  });


  socket.on('friend_request_accepted', function(data){

    if(socket.isLogged && data.other_person){
      socket.to('user_'+data.other_person).emit('post_accepted_friend_notification', socket.user.data);
    }

  });


  socket.on('remove_user_ban', function(data){

    if(data){
       if(typeof user_bans[data.user_id] != 'undefined'){


            if(typeof user_bans[data.user_id][socket.currentRoom.id] != 'undefined'){
                  delete user_bans[data.user_id][socket.currentRoom.id];
            }

        }

      socket.broadcast.to('user_'+data.user_id).emit('lift_ban', data.user_id, socket.currentRoom.id);
    }

  });

  socket.on('add_user_ban', function(data){

    if(data){

      if(typeof user_bans[data.user_id] == 'undefined'){

        user_bans[data.user_id] = {};
      }

      user_bans[data.user_id][socket.currentRoom.id] = {

        remaining : data.time,
        timerId : setInterval(function(){ timePassed(data.user_id, socket.currentRoom.id); }, 1000 )

      }


      socket.broadcast.to('user_'+data.user_id).emit('user_banned', data, socket.currentRoom.id);

    }

  });

  socket.on('isTyping', function(broadcastId, endBroadcastId){

    if(broadcastId && endBroadcastId && socket.user.data){
      socket.broadcast.to(broadcastId).emit('someoneTyping', endBroadcastId, socket.user.data);
    }
  });

   socket.on('stopTyping', function(broadcastId, endBroadcastId){

    if(broadcastId && endBroadcastId && socket.user.data){
      socket.broadcast.to(broadcastId).emit('someoneStopTyping', endBroadcastId, socket.user.data);
    }
  });

  socket.on('send_private_message', function(data){

    message = new Private_Message(socket.user.data, data.to, data.message);
     socket.broadcast.to('user_'+data.to).to('user_'+socket.user.id).emit('post_private_message', message);

  });

    socket.on('send_addFriend_request', function(request){

    socket.broadcast.to('user_'+request.to).emit('post_addFriend_request',  request.id , socket.user.data);

  });

  socket.on('connect_room', function(data){

    room_id = data.room_id;

    socket.currentRoom = new Room(data.room_id, data.name, data.description);

    socket.currentRoom.add();

    socket.user.joinRoom(socket.currentRoom);
    socket.join('room_'+socket.currentRoom.id);
    socket.currentRoom.addPerson(socket.user.data);

    if(socket.user.isAdmin){

      socket.join('admin_'+socket.currentRoom.id );

      socket.emit('display_users', socket.currentRoom.getRegularPeople() );

    }else{

        banned = getUserBan(socket.user.data.user_id, socket.currentRoom.id);

        if(banned){
          socket.emit('room_connected', { user_id : socket.user.data.user_id, room_id : socket.currentRoom.id ,time : banned } );
        }else{
           socket.emit('room_connected');
        }
        
        socket.to('admin_'+socket.currentRoom.id).emit('display_users', socket.currentRoom.getRegularPeople() );
        socket.to('user_'+socket.user.id).emit('room_opened', { room : socket.currentRoom, people : socket.currentRoom.getPeople() }, banned);
    }

     io.sockets.in('room_'+room_id).emit('display_people', socket.currentRoom.getPeople(), room_id );

  });

  socket.on('observer_room', function(room_id){
    socket.join('room_'+room_id);
  });

  socket.on('stop_observing', function(room_id){
    socket.leave('room_'+room_id);
    socket.to('user_'+socket.user.id).emit('force_closeChat', room_id);
  });

  socket.on('leaveChat', function(room_id){
    socket.leave('room_'+room_id);
  });

  socket.on('chat_minimized', function(room_id){


    if(typeof socket.user != 'undefined'){
       socket.to('user_'+socket.user.id).emit('force_minimizeChat', room_id);
      }else{
        socket.emit('force_minimizeChat', room_id);
      }

    
  });

  socket.on('chat_maximized', function(room_id){
     if(typeof socket.user != 'undefined'){
        socket.to('user_'+socket.user.id).emit('force_maximizeChat', room_id);
      }else{
        socket.emit('force_maximizeChat', room_id);
      }
  });

  socket.on('change_room', function(data){
    if(data.room_id){

    lastRoom = socket.currentRoom;


    roomStillConnected = false;
         if(socket.currentRoom){
            roomSockets = io.sockets.adapter.rooms['room_'+lastRoom.id];
            
            if(roomSockets && roomSockets.length > 0){

             mySockets = io.sockets.adapter.rooms['user_'+socket.user.id];
              if(mySockets && mySockets.length > 0){

                  for (var sock in mySockets.sockets) {
                      if(roomSockets.sockets[sock] != undefined && sock != socket.id){
                        roomStillConnected = true;
                        break;
                      }
                  }
              }
            }
          }

    if(!roomStillConnected){
          lastRoom.leaveUser(socket.user.id);
          socket.user.leaveRoom(lastRoom.id);
    }

  

    socket.leave('room_'+lastRoom.id);

    socket.broadcast.to('room_'+lastRoom.id).emit('display_people', lastRoom.getPeople(), lastRoom.id );
    socket.join('room_'+data.room_id);



    socket.currentRoom = new Room(data.room_id, data.name, data.description);

    socket.currentRoom.add();
    socket.user.joinRoom(socket.currentRoom);
    socket.join('room_'+socket.currentRoom.id);
    socket.currentRoom.addPerson(socket.user.data);

     if(socket.user.isAdmin){

      socket.join('admin_'+socket.currentRoom.id );

    }

               banned = false;

        if(typeof user_bans[socket.user.data.user_id] != 'undefined'){

            if(typeof user_bans[socket.user.data.user_id][socket.currentRoom.id] != 'undefined'){

              banned = user_bans[socket.user.data.user_id][socket.currentRoom.id].remaining;
            }
        }

       io.sockets.in('room_'+data.room_id).emit('display_people', socket.currentRoom.getPeople(), data.room_id );


        if(banned){
          socket.emit('room_connected', { user_id : socket.user.data.user_id, room_id : socket.currentRoom.id ,time : banned } );
        }else{
           socket.emit('room_connected');
        }
        
        io.sockets.in('admin_'+socket.currentRoom.id).emit('display_users', socket.currentRoom.getRegularPeople() );
        socket.broadcast.to('admin_'+lastRoom.id).emit('display_users', lastRoom.getRegularPeople() );
        socket.broadcast.to('room_'+lastRoom.id).emit('display_people', lastRoom.getPeople(), lastRoom.id );
        socket.broadcast.to('user_'+socket.user.id).emit('room_opened', { room : socket.currentRoom, people : socket.currentRoom.getPeople() }); 


    }



  });

  socket.on('send_chatroom_message', function(room_id, message){


    socket.to('room_'+room_id).emit('post_chatroom_message', { room_id : room_id, message : message, user : socket.user.data });
  });


  socket.on('disconnect', function(){

  if(socket.isLogged){

    socket.user.removeSocket(socket.id);
    var mySockets = io.sockets.adapter.rooms['user_'+socket.user.id];
          roomStillConnected = false;
         if(socket.currentRoom){
            roomSockets = io.sockets.adapter.rooms['room_'+socket.currentRoom.id];
            
            if(roomSockets && roomSockets.length > 0){

             
              if(mySockets && mySockets.length > 0){

                  for (var sock in mySockets.sockets) {
                      if(roomSockets.sockets[sock] != undefined && sock != socket.id){
                        roomStillConnected = true;
                        break;
                      }
                  }
              }
            }
          }else{
            roomStillConnected = true;
          }

/*          console.log(mySockets);*/
          if(socket.myRooms && socket.myRooms.length > 0){

              mySocketRooms = [];

              if(mySockets && mySockets.length > 0){

                

                for (var sock in mySockets.sockets) {
                    console.log(sock);
                     getSocket = io.sockets.connected[sock];
                     

                     if(getSocket.myRooms && getSocket.myRooms.length > 0){
                        mySocketRooms.push(getSocket.myRooms);
                     }

                }

              }

                var roomIds = [];
                if(mySocketRooms && mySocketRooms.length > 0){

                   mySocketRooms.forEach(function(theRoom, j){
                        roomIds = theRoom.map(function(_r){
                            return _r.id;
                        });

                      });
                }

                        socket.myRooms.forEach(function(myRoom){
                            if(roomIds.indexOf(myRoom.id) == -1){
                                 // leave user out in this room
                                 //console.log('user is leaving');
                                 // console.log(myRoom);
                                  myRoom.leaveUser(socket.user.id);
                                  socket.user.leaveRoom(myRoom.id);
                                  socket.broadcast.to('room_'+myRoom.id).emit('display_people', myRoom.getPeople(), myRoom.id );
                            }
                        });

          }

           if(!roomStillConnected){

              myRooms = socket.user.getRooms();

                  if(socket.currentRoom){

                socket.currentRoom.leaveUser(socket.user.id);
                socket.user.leaveRoom(socket.currentRoom.id);

                if(socket.user.isAdmin){

                  socket.leave('admin_'+socket.currentRoom.id);

                }


                  socket.broadcast.to('admin_'+socket.currentRoom.id).emit('display_users', socket.currentRoom.getRegularPeople() );
                

                socket.leave('room_'+socket.currentRoom.id);

                socket.broadcast.to('room_'+socket.currentRoom.id).emit('display_people', socket.currentRoom.getPeople(), socket.currentRoom.id );


                    }else if(myRooms && myRooms.length){

                      for(i=0;i<myRooms.length;i++){

                          lRoom = myRooms[i];

                            lRoom.leaveUser(socket.user.id);
                            socket.user.leaveRoom(lRoom.id);

                            if(socket.user.isAdmin){

                              socket.leave('admin_'+lRoom.id);

                            }


                              socket.broadcast.to('admin_'+lRoom.id).emit('display_users', lRoom.getRegularPeople() );
                            

                            socket.leave('room_'+lRoom.id);

                            socket.broadcast.to('room_'+lRoom.id).emit('display_people', lRoom.getPeople(), lRoom.id );

                      }

                  }

           }

       setTimeout(function(){


           
            if(socket.user.haveSockets()){
              console.log('did u just refresh?');

            }else{
          

          user_id = socket.user.id;
            console.log('user disconnected '+user_id);
            socket.user.removeUser();

              socket.broadcast.to('friend_'+user_id).emit('friendOffline', user_id);
              console.log('friendOffline');

            
            }

          }, 5000); 
  }
  
  });


});