<!-- resources/views/iframe-content.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iframe Content</title>
</head>
<body>
<form id="payment-form">
        <input type="text" name="cardnumber">
        <input type="text" name="exp-date">
        <input type="text" name="cvc">
        <button id="pay-button">Pay</button>
    </form>

    <iframe id="credit-card-details"></iframe>

</body>
</html>
