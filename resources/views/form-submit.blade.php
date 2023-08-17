<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Dusk Form Submit Test</title>
</head>
<body>
    <form id="test-form" class="test-form">
        <button id="submit-button" class="submit-button">Save</button>
    </form>
    <div id="message" ></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  
  $(document).ready(function () {
    $('.submit-button').click(function () {
       console.log('clicked');
       var button = $(this);
        setTimeout(function() {
            button.removeAttr('disabled');
            $('#message').text('Submission Successful');
        }, 2000);

    });
});

</script>

  
</body>
</html>
