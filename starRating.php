/***********************
JS Part
************************/
$('.stars a').on('click', function(){
  $('.stars span, .stars a').removeClass('active');

  $(this).addClass('active');
  $('.stars span').addClass('active');
});

//To calculate how many stars are active
jQuery('.stars a.active').prevUntil('span.active').length + 1;

/***********************
CSS Part
************************/
.stars input {
    position: absolute;
    left: -999999px;
}

.stars a {
    display: inline-block;
    padding-right:4px;
    text-decoration: none;
    margin:0;
}

.stars a:after {
    position: relative;
    font-size: 18px;
    font-family: 'FontAwesome', serif;
    display: block;
    content: "\f005";
    color: #9e9e9e;
}


span {
  font-size: 0; /* trick to remove inline-element's margin */
}

.stars a:hover ~ a:after{
  color: #9e9e9e !important;
}
span.active a.active ~ a:after{
  color: #9e9e9e;
}

span:hover a:after{
  color:blue !important;
}

span.active a:after,
.stars a.active:after{
  color:blue;
}

/***********************
HTML Part
************************/
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<p class="stars">
  <span>
    <a class="star-1" href="#">1</a>
    <a class="star-2" href="#">2</a>
    <a class="star-3" href="#">3</a>
    <a class="star-4" href="#">4</a>
    <a class="star-5" href="#">5</a>
  </span>
</p>
