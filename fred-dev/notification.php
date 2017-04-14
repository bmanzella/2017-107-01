<link rel="stylesheet" href="styles.css">

<div id="notification">
  <h4 id="notification-title">New Post!</h4>
  <p>Read all about: Some Post Title</p>
  <a href="#">Read more</a>
</div>

<!-- use jquery: as JS library to make life easy. -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
  // Flow: every 3 seconds, look for a new post. If there is one,
  // Show the notification for 5 seconds with updated content
  var latestPostId = 0;
  setInterval(function() {
    $.get('latest-post.php')
      .done(function(post) {
        post = JSON.parse(post);
        // If new, update the card and show
        if(post.id !== latestPostId) {
          $('#notification p').html('Read all about: ' + post.title);
          $('#notification a').attr('href', 'individual-post.php?id=' + post.id);
          $('#notification').fadeIn();
          setTimeout(function() {
            $('#notification').fadeOut();
          }, 5000);
        }
        latestPostId = post.id;
      })
      .fail(function(err) {
        console.error(err);
      })
  }, 3000); // 3000 milliseconds  =  3 seconds
</script>
