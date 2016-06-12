@extends('mobile.layout')


@section('page-title', 'Home')



@section('background-content')

<style type="text/css">
  body{
    background: transparent url(http://susanwins.com/images/clubhouse/profileroom3.png) 45% 9% !important;
  }
</style>

<div id='slider'>1</div>
<div id='slider2'>2</div>
<div id='slider3'>
  <section class="ac-container">
    <div>
      <input id="ac-1" name="accordion-1" type="radio" checked="">
      <label for="ac-1"> My Favortie Games </label>
      <article class="ac-small">
        <p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows.</p>
      </article>
    </div>
    <div>
      <input id="ac-2" name="accordion-1" type="radio">
      <label for="ac-2"> Games I've Played </label>
      <article class="ac-medium">
        <p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded.
          That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
      </article>
    </div>
    <div>
      <input id="ac-3" name="accordion-1" type="radio">
      <label for="ac-3"> Games I Haven't Played </label>
      <article class="ac-large">
        <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each
          other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle
          to man. </p>
      </article>
    </div>
   
  </section>
</div>
<div id='slider4'>Hello World!!</div>
<div id='slider5'>Hello World!!</div>
<div id='slider6'>
  <div class="friendslist">
    <ul>
      <li><a id="trigger7"> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Mugys Anderson </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Maryann </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Amanda </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Quinn </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Brittani </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Phoebe </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Florence </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Inez </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Rosalind </p> </a> </li>
      <li><a> <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg"> <p> Shelley </p> </a> </li>

    </ul>
  </div>
</div>
<div id='friendProfile'>
  <div class="friendsProfile">
    <div class="grey">
      <img src="https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg">
      <h3> Mugsy Anderson </h3>
      <div class="options">
        <ul>
          <li> <a href="#" class="add"> <i class="fa fa-plus"></i> </a> </li>
          <li> <a href="#" class="block"> <i class="fa fa-ban"></i> </a> </li>
          <li> <a href="#" class="message"> <i class="fa fa-comment"></i> </a </li>
        </ul>
       
      </div>
    </div>
    <span> Favourite Games </span>
    <ul class="favegameslist">
      <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
    </ul>
    <span> Unrated Games </span>
    <ul class="favegameslist">
      <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/44897_alchemist-lab.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/68900_hot-gems.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/21872_innocence-temptation.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/82396_iron-man.gif"> </a>  </li>
      <li> <a href="#"> <img src="http://susanwins.com/uploads/35843_8balls.gif"> </a> </li>
    </ul>
    <span> Interview </span>
    <ul class="interviewList">
      <li>
        <b> <i> 1 </i> We've heard you're great company to be around – but when you're socialising what's your drink of choice?  </b>
        <p> Soft Drink </p>
      </li>
      <li>
        <b> <i> 2 </i> It's been rumoured you're a bit of a jet setter! Where's your ideal holiday destination?   </b>
        <p> Caribbean  </p>
      </li>
      <li>
        <b> <i> 3 </i> Where do you go shopping?   </b>
        <p> Aldi </p>
      </li>
      <li>
        <b> <i> 4 </i> So when you're not out and about – what are your favourite shows to relax with in the evening?  </b>
        <p> Documentaries </p>
      </li>


    </ul>
  </div>
</div>


    <section class="objects">
      <button id='trigger'>  <i class="fa fa-key"></i> </button>
      <button id='trigger2'> <i class="fa fa-book"></i> </button>
      <button id='trigger3'> <i class="fa fa-user"></i> </button>
      <button id='trigger4'> <i class="fa fa-lock"></i> </button>
      <button id='trigger5'> <i class="fa fa-star"></i> </button>
      <button id='trigger6'> <i class="fa fa-users"></i> </button>        
    </section>




@endsection

@section('custom_scripts')

<script>

  $('#slider').slideReveal({
    trigger: $("#trigger"),
    push:false,
    position: "right"   
    // overlay: true

  });
  $('#slider2').slideReveal({
    trigger: $("#trigger2"),
    push:false,
    position: "right",   
    // overlay: true
  
  });
  $('#slider3').slideReveal({
    trigger: $("#trigger3"),
    push:false,
    position: "right"   
    // overlay: true
  });
  $('#slider4').slideReveal({
    trigger: $("#trigger4"),
    push:false,
    position: "right"   
    // overlay: true
  });
  $('#slider5').slideReveal({
    trigger: $("#trigger5"),
    push:false,
    position: "right"   
    // overlay: true
  });
  $('#slider6').slideReveal({
    trigger: $("#trigger6"),
    push:false,
    position: "right"   
    // overlay: true
  });
  $('#friendProfile').slideReveal({
    trigger: $("#trigger7"),
    push:false,
    position: "right"   
    // overlay: true
  });
</script>

@endsection

