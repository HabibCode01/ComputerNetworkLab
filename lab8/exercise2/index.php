<?php require_once("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ShoutBox</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; }
        .shout-form { margin-bottom: 20px; }
        textarea { width: 100%; padding: 10px; margin-bottom: 10px; }
        .shout { border-bottom: 1px solid #eee; padding: 10px 0; }
        .shout-date { color: #666; font-size: 0.8em; }
    </style>
</head>
<body>
    <h1>ShoutBox</h1>
    
    <div class="shout-form">
        <form action="send.php" method="post">
            <textarea name="shout" placeholder="Type your message here..." required maxlength="300"></textarea>
            <input type="submit" value="Shout!">
        </form>
    </div>

    <?php
    $result = mysqli_query($link, "SELECT * FROM shouts ORDER BY shout_date DESC");
    
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            echo '<div class="shout">';
            echo '<div class="shout-text">' . htmlspecialchars($data['shout_text']) . '</div>';
            echo '<div class="shout-date">' . date('M j, Y g:i a', strtotime($data['shout_date'])) . '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No shouts yet. Be the first to shout!</p>';
    }
    ?>
</body>
</html>