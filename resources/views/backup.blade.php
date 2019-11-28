<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Random Name Picker</title>

  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <!-- <link rel="stylesheet" href="css/style.bundle.css" /> -->
  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/jquery-latest.min.js"></script>

<style>
#values { position:relative;font-size:400%;text-align:center;margin: 0 auto;z-index:0; }
.name { overflow:hidden;display:block; }
#names { display:none;padding:5px; }
#namesbox { min-height:400px;font-size:32px;color:#333;resize:none;border:1px solid #F39C12; }
.extra { font-size:16px;margin-top:20px; }
#result1 { background:#000;color:#fbe34b;padding:20px;z-index:10;margin-top:-150px; }
body { background:#fff url(img/background.jpg); background-size: cover}
#varnote { font-size:40px;text-align:center;padding:30px; }
.copyright { font-size:11px;font-family:Tahoma;color:#9B59B6; }
</style>

</head>
<body onload="reset();">

  <div class="full-head" >
	<div class="row">
		<div class="large-12 columns">
		<ul class="button-group even-4">
      <li><a href="index.html" class="alert button" id="reset">Reset</a></li>
			<li><button class="button" id="list" onclick="namelist();">Name List</button></li>
			<li><button class="button" id="save" onclick="save();">Save &amp; Update</button></li>
			<li><button class="success button" id="go" onclick="go();">GO!</button></li>
    </ul>
		</div>
	</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
			<h3 style="text-align:center;margin-top:30px;" id="headline">Let's see who is The Lucky One?</h3>
			
			<div id="varnote"><div class="copyright">&copy; Coded by <strong>Heiswayi Nrird</strong>, June 2013</div></div>
			
      <div id="popdown">
      <div id="names" class="inbox"><textarea name="namesbox" id="namesbox"></textarea></div>
      </div>
      
      <div id="values"></div>


		</div>
	</div>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <script>$(document).foundation();</script>
  
<script>
var text;


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
	return (Math.round(Math.random())-0.5); 
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
        $('#headline').text('Configure name list');
        $("#popdown").show();
        $("#values").hide();
        $("#names").show();
        $('body').css({"overflow-y": "visible"});
}

// does the actual animation
function go(){
  $("#varnote").hide();
  $('body').css({"overflow-y": "hidden"});
  $('#go').attr('disabled','disabled');
  $('#list').attr('disabled','disabled');
  $('#save').attr('disabled','disabled');
  $('#headline').slideUp();
  $('#namesbox').slideDown();

  var count = 1;
  count = 1;
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
  newtop = names.length * 200 * -1;
  //$('#values').css({top: -300});
  $('#values').css({top: + newtop});	
  names.sort( randOrd );
  var fruits = new Array ( "apple", "pear", "orange", "banana" );
  //console.log(fruits);
  //console.log(names);
  //alert(newtop);
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

  // text = $('#result1').text();
  // text = $('#result2').text();
  // text = $('#result3').text();

  $('#values').animate({top: '+176'},5000);

  // make it stand out
  setTimeout("standout()",5000);
  // setTimeout("$('#playback').hide('slow')",11005);
}

function standout(){

        $('#result1').removeClass('name');
        $('.name').animate({opacity: .25});
        $('#result1').animate({height: '+=60px'});
        $('#result1').append('<div class="extra"><a class="small alert button" href="#" onClick="removevictim();">Remove name from list</a></div>');
        $('#go').removeAttr('disabled','disabled');
        $('#list').removeAttr('disabled','disabled');
        $('#save').removeAttr('disabled','disabled');
        $('#headline').text('Found the Winner!');
        $('#headline').slideDown();
}

function removevictim(){
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
  $('#headline').text('OK, done! Let\'s see who is next? Just click "GO!" button for next roll.');
}

</script>

</body>
</html>