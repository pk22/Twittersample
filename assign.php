<?php
require('Comments.php');
$comment_post_ID = 10;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="twitterstyle.css">	
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	
	
	$(document).ready(function(){
		$("#retweet").click(function(){
			
			$('.feeds-container:last').clone().insertAfter('.feeds-container:last');
			
			 
				
		});
		/*$("#displayfeed").click(function() {
			$('.feeds-container').show();
		});
		
		$("#entercomment").click(function() {
			$('.feeds-container').show();
		});*/
		
		
	});
	
	$(document).ready(function(){
		$("#comment").click(function(){
			$("#commenttext").show();
			$("#entercomment").show();
			$("#comments-list").show();
		});
	});	
	$(document).ready(function(){
		$("#share").click(function(){
			$(".sharetable").show();
		
		});
	});	
	</script>
	<script>
	function displayFeed()
	{ var a=document.getElementById("topost").value;
	document.getElementById("display-tweet").innerHTML= a;
	}
	function retweetfn()
	{ 
	document.getElementById("retweeted").innerHTML= "Retweeted";
	}
	</script>
	</head>
	<body>
	<title> Twitter </title>
	<!--Adding the header-->
	<div class="header">
		<div class="container">
		<nav>
			<a class="nav1" href="#">Home</a>
			<a class="nav1" href="#">Moments</a>
			<a class="nav1" href="#">
		<img src="twitpic.jpg" style="border-radius: 50%; margin= 75px 500px 100px 0px;" width="30" height="30"></a>
			<input class="nav1" id="searchtext" type="text" name="search" placeholder="Search..">
		</nav>
		</div>
	</div>
	
	<!--Creating the basic profile with image and initial post input-->
	<div class = "profile">
	<div class="profile-basic"></div>
		<div class="item1"> 
			<img src="female-user-icon.jpg" style="border-radius: 50%; border: 5px solid #fff; " width="100" height="120" >
		</div>
		
	
	
	<div class="post-something">
		<div class="item2">
		
			<input id="topost" type="text" placeholder="What&#39;s happening?">	
			<button class="tweet-button" id="displayfeed" type="button" onclick="displayFeed()">Tweet</button>
		
		</div>
	</div>
	
	<div class="basic-info">
		<h3 id="username">User1</h3>
		<a id="userhandle" href="#">@User1</a><br><br>
		<table id ="tweet-numbers">
		<tr>
			<td><a class="number-of" href="#">Tweets</a></td>
			<td><a class="number-of" href="#">Followers</a></td>
			<td><a class="number-of" href="#">Following</a></td>
		</tr>
		<tr>
			<td><a class="number-of" href="#">30</a></td>
			<td><a class="number-of" href="#">40</a></td>
			<td><a class="number-of" href="#">50</a></td>
		</tr>
		</table>
			
	</div>
	
	<!-- Adding the details for the feed inc like, comment, retweet, share-->
		
		<div class = "startfeed">  
			<div class= "feeds-container" >
				<div class = "main-tweet"><span id="display-tweet">Welcome to Twitter!</span></div>
				<button class="tweet-button" type="button" id="like" >Like</button>
				<button class="tweet-button" type="button" id="comment" >comment</button>
				<button class="tweet-button" type="button" id="retweet" onclick="retweetfn()">retweet</button>
				<button class="tweet-button" type="button" id="share">share</button>
	<!--To add new comments-->				
					<div class="commentdiv">
					<form action="post_comment.php" method="post" id="commentform">
					<textarea name="commenttext" id="commenttext" rows="3" cols="100" style="display:none;" required="required"></textarea>
						<input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
						<button class="tweet-button" type="submit" id="entercomment" style="display:none;">Enter</button>
						
					</form>	
	<!--To display the share icons of facebook, whatsapp-->
					<div class = "sharetable" style="display:none;">
						<nav>
							<a class= "nav2" href="#"><img src="fbpic.jpg" width="50" height="50" align="left"></a>
							<a class="nav2" href="#"><img src="whatsapp_icon.jpg" width="50" height="50" align="middle"></a>
						</nav>
					</div>
	<!--Displaying comments-->
						<ol id="comments-list"  class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
						  <!--<li class="no-comments">Be the first to add a comment.</li>-->
						  <?php
							foreach ($comments as &$comment) {
							  ?>
							  <li><div id="comment_<?php echo($comment['id']); ?>" class="hentry">	
										

										<div class="entry-content">
											<p><?php echo($comment['commenttext']); ?></p>
										</div>
									</div></li>
							  <?php
							}
						  ?>
							</ol>
					</div>
					
									
			</div>
	<!--Adding retweet-->
			<div class="retweetdiv">
					<h2 id = "retweeted" ></h2>
					</div>
		</div>
				
			
		</div>
	
	
	
	</div>
	<!--End of code-->
	</body> 
	</html>