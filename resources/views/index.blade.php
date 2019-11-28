<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
  <!-- begin::Head -->
  <head>
    <meta charset="utf-8" />
    <title>
      Doorprize
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
    </script>
    <script src="js/vendor/custom.modernizr.js"></script>
    <!--end::Web font -->
        <!--begin::Base Styles -->
    <link href="css/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="../../../assets/demo/default/media/img/logo/favicon.ico" />
    <style type="text/css">
        .m-btn--white {
          background: #fff;
        }
        #values { position:relative;font-size:400%;text-align:center;margin: 0 auto;z-index:0; }
        .name { overflow:hidden;display:block; color: #fff; font-size: 30px; }
        #names { display:none;padding:5px; }
        #namesbox { min-height:400px;font-size:32px;color:#333;resize:none;border:1px solid #F39C12; }
        .extra { font-size:16px;margin-top:20px; }
        #result1 { background:#741e1e;color:#fbe34b;padding:20px;z-index:10;margin-top:-150px; border-radius: 100px; }
        body { background:#fff url(img/background.jpg);background-size: cover }
        #varnote { font-size:40px;text-align:center;padding:30px; }
        .copyright { font-size:11px;font-family:Tahoma;color:#9B59B6; }
    </style>
  </head>
  <!-- end::Head -->
    <!-- end::Body -->
  <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  onload="reset();">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 text-center mt-5 pt-5" style="z-index: 100">
              <div class="m-demo__preview m-demo__preview--btn">
                  <button type="button" class="btn m-btn--pill  m-btn--white  btn-outline-info" id="reset" onclick="reset();">
                    Reset
                  </button>
                  <button type="button" class="btn m-btn--pill  m-btn--white  btn-outline-info" id="list" onclick="namelist();">
                    Name List
                  </button>
                  <!-- <button type="button" class="btn m-btn--pill  m-btn--white  btn-outline-info" id="save" onclick="save();">
                    Update
                  </button> -->
                  <button type="button" class="btn m-btn--pill  m-btn--white btn-outline-info" id="go" onclick="go();">
                    Shuffle!
                  </button>
                </div>
            </div>
            <div class="col-lg-12 text-center">
              <div style="padding: 100px">
                <h1 class="" id="headline" style="color: #ffff1f">
                  Let's see who is The Lucky One?
                </h1>
                
                <div id="popdown">
                  <div id="names" class="inbox" style="padding-left: 180px; padding-right: 180px;">
                    <textarea class="form-control" name="namesbox" id="namesbox" rows="20"></textarea>
                  </div>
                </div>
                
                <div id="values"></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <audio id="thick" src="img/thick.mp3" ></audio>
    <audio id="applause" src="img/applause.mp3" ></audio>
    <!-- end:: Page -->
      <!--begin::Base Scripts -->
    <script src="js/vendors.bundle.js" type="text/javascript"></script>
    <script src="js/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
    <!--end::Page Snippets -->
       <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <script>$(document).foundation();</script>
  
<script>
var text;

 function thickPlay(){
   var thick = document.getElementById("thick");
   thick.volume = 0.5;
   thick.loop = true;
   thick.play();
  }

   function thickStop(){
       var thick = document.getElementById("thick");
       thick.pause();
       thick.currentTime = 0;
                 }

  function applausePlay(){
   var applause = document.getElementById("applause");
   applause.play();
  }

   function applauseStop(){
   var applause = document.getElementById("applause");
   applause.pause();
       applause.currentTime = 0;

  }



function reset(){
  // re-enable go button
  setTimeout("$('#go').removeAttr('disabled')",11005);
  var namesbreak = "";
  if(gup('names') != ""){
    var names = gup('names');
    namesbreak = names.replace(/101/g,'\n');
    namesbreak = namesbreak.replace(/%20/g,' ');          
    }
    else   {
      $.ajax({
        url : "{{ url('data') }}",
        type: 'GET',
        success: function(res){
          var names = res;
          console.log(res);
          for(var i in names){
            name = names[i];
            if (name == "" || typeof(name) == undefined){}else{
               namesbreak = namesbreak + name + "\n";
            }
            $("#namesbox").val(namesbreak);
          }
        }
      })
    }
}

function gup(para)
{
  para = para.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+para+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}

function randOrd(){
  return (Math.round(Math.random())-0.1); 
}

function save(){
        $("#varnote").hide();
        $("#popdown").show();
        $("#values").hide();
        $("div").remove("#result1");
        savenames = $("#namesbox").val();
        savenames = savenames.replace(/\n\r?/g, '101');
        $('#headline').fadeOut();
        $('#headline').text('The name list is saved and updated.').fadeIn();
        $("#names").show();
        $('#namesbox').attr('disabled','disabled');
}

function namelist(){
        $("#varnote").hide();
        $('#namesbox').removeAttr('disabled','disabled');
        $('#headline').text('List of employee names (407)');
        $("#popdown").show();
        $("#values").hide();
        $("#names").show();
        $('body').css({"overflow-y": "visible"});
}

// does the actual animation
function go(){

  $("#varnote").hide();
  $('body').css({"overflow-y": "hidden"});
  $('#go').attr('disabled','disabled').hide();
  $('#list').attr('disabled','disabled').hide();
  $('#save').attr('disabled','disabled').hide();
  $('#reset').attr('disabled','disabled').hide();
  $('#headline').slideUp();
  $('#namesbox').slideDown();

  var count = 1;
  $("div").remove("#result1");
  names = $("#namesbox").val();
  if(document.all) { // IE
    names=names.split("\n");
  }
  else { //Mozilla
    names=names.split("\n");
  }
  $("#values").show();
  $(".name").show();
  $("#popdown").hide();
  $("div").remove(".name");
  $("div").remove(".extra");
  $("#playback").html("");

  newtop = names.length * 120 * -1;
  //$('#values').css({top: -300});
  $('#values').css({top: + newtop});  
  names.sort( randOrd );
  var fruits = new Array ( "apple", "pear", "orange", "banana" );
  //console.log(fruits);
  //console.log(names);
  //alert(newtop);
    thickPlay();
  for(var i in names){
    if (names[i] == "" || typeof(names[i]) == undefined){
      count = count-1;
    } else {
      name = names[i];
      //console.log(name);
      $('#values').append('<div id=result'+count+' class=name>'+name+'</div>');
    }
    count = count+1;
  }
  for(var i in names){
    if (names[i] == "" || typeof(names[i]) == undefined){}else{
      name = names[i];
      $('#values').append('<div class=name>'+name+'</div>');
    }
    count = count+1;
  }
  for(var i in names){
    if (names[i] == "" || typeof(names[i]) == undefined){}else{
      name = names[i];
      $('#values').append('<div class=name>'+name+'</div>');
    }
    count = count+1;
  }
  text = $('#result1').text()
  $('#values').animate({top: '+176'},5000);

  // make it stand out
  setTimeout("standout(text)",5000);
  //setTimeout("$('#playback').hide('slow')",11005);
  
}

function standout(text){

        $('#result1').removeClass('name');
        $('.name').animate({opacity: .25});
        $('#result1').animate({height: '+=60px'});
        $('#result1').append('<div class="extra"><a class="btn m-btn--pill btn-danger" href="#" onClick="removevictim();">Remove name from list</a></div>');
        $('#headline').text('Congratulation! The Winner is ...');
        $('#headline').slideDown();
        thickStop();
         applausePlay();
}

function removevictim(){
  applauseStop();
  $('#go').removeAttr('disabled','disabled').show();
  $('#list').removeAttr('disabled','disabled').show();
  $('#save').removeAttr('disabled','disabled').show();
  $('#reset').removeAttr('disabled','disabled').show();
  // Removing victim from array and UI
  // names = names.filter(function(){ return true});
  // Rewriting namesbox contents
  var nameupdated = "";
  for(var i in names){
    name = names[i];
                if (name == "" || name == text || typeof(name) == undefined){}else{
      nameupdated = nameupdated + "\n" + name;
    }
  }
  $('#namesbox').val("");
  $('#namesbox').val(nameupdated);
  $('#result1').html("Removed");
  $('#result1').fadeOut(1000, function(){
    $("div").remove("#result1");
  });
  $("div").remove(".name");
  $("div").remove(".extra");
  $('#headline').html('OK, done! Let\'s see who is next?');
}

</script>
  </body>
  <!-- end::Body -->
</html>
