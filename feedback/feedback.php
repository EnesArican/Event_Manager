<?php
require('Support.php');
$comment_post_ID = 1;
$db = new Support();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>

<!DOCTYPE html>
<html lang="en-US">
<head>

	<title>Feedback</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />

</head>

<body id="index" class="home">

	<header id="title" class="body">
		<h1>Feedback <strong>
	</header>

	<section id="content" class="body">
		<header>
			<h2 class="secondtitle">PLEASE GIVE US YOUR VALUABLE FEEDBACK!!</a></h2>
		</header>
	</section>

	<section id="comments" class="body">
    <h2>Comments</h2>
    <ol id="lists" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">

			<li><article class="review">

					<abbr class="published"><p>12&nbsp;January&nbsp;2017</p></abbr>

					<address class="author">By&nbsp;Martin21</a></address>

					<div class="entry-content"><p>Event Name:&nbsp;John from the park and friends </p></div>

					<div class="rating"><p>Rating:5</p></div>

					<div class="entry-content"><p>This was an excellent show!</p></div>
			</li>

			<li><article class="review">

					<abbr class="published"><p>13&nbsp;January&nbsp;2017</p></abbr>

					<address class="author">By&nbsp;EArican</a></address>

					<div class="entry-content"><p>Event Name:&nbsp;Cognition - Night of Jazz</p></div>

					<div class="rating"><p>Rating:4</p></div>

					<div class="entry-content"><p>It was really good!</p></div>
			</li>

			<li><article class="review">

					<abbr class="published"><p>13&nbsp;January&nbsp;2017</p></abbr>

					<address class="author">By&nbsp;jhonny</a></address>

					<div class="entry-content"><p>Event Name:&nbsp;Snowman</p></div>

					<div class="rating"><p>Rating:5</p></div>

					<div class="entry-content"><p>I came with my friends. It was fantastic rock show!!!</p></div>
			</li>

      <?php
        foreach ($comments as &$comment) {
          ?>
          <li><article id="comment_<?php echo($comment['id']); ?>" class="review">

    					<abbr class="published" title="<?php echo($comment['date']); ?>">
    						      <?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
    					</abbr>

    					<address class="author">
    						      By&nbsp;<?php echo($comment['comment_author']); ?></a>
    					</address>

              <div class="entry-content">
  						        <p>Event Name:&nbsp;<?php echo($comment['event']); ?></p>
  						</div>

    				  <div class="rating">
							        <p>Rating: <?php echo($comment['testone']); ?></p>
							</div>

						  <div class="entry-content">
    				          <p><?php echo($comment['comment']); ?></p>
    				</div>
    			</article>
        </li>
          <?php
        }
      ?>
		</ol>

		<div id="writing">
      <h3>Leave a Comment</h3>
      <form action="post_comment.php" method="post" id="commentform">

        <label for="comment_author" class="required">Your name</label>
        <input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">

        <label for="event" class="required">Your event name</label>
        <textarea name="event" id="event" rows="1" tabindex="4"  required="required"></textarea>

							<div> How do you think this event?*&nbsp;&nbsp;<select name="testone" id="testone" required="required">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select> 1:bad &nbsp; 2:okay&nbsp; 3:good&nbsp; 4:very good&nbsp; 5:excellent
						</div>

        <label for="comment" class="required">Your message</label>
        <textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

        <input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
        <input name="submit" type="submit" value="Submit" style="position:relative; top:10px; left: 40%;">

      </form>
    </div>
	</section>
</body>
</html>
