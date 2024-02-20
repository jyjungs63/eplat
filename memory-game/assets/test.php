<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Font Weight Example</title>
    <style>
    body {
        font-family: Arial, sans-serif, Fredoka;
        /*font-family: Fredoka;*/
        src: url(./FredokaOne-Regular.ttf);
    }

    .normal-text {
        font-weight: normal;
        font-size: 1.5rem;
        /* or 400 */
    }

    .bold-text {
        font-weight: bold;
        font-size: 1.5rem;
        /* or 700 */
    }

    .lighter-text {
        font-weight: lighter;
        font-size: 1.5rem;
    }

    .bolder-text {
        font-weight: bolder;
        font-size: 1.5rem;
    }

    .numeric-text {
        font-weight: 600;
        font-size: 1.5rem;
        /* Numeric values between 100 and 900 */
    }
    </style>
</head>

<body>

    <p class="normal-text">This is normal text.</p>
    <p class="bold-text">This is bold text.</p>
    <p class="lighter-text">This is lighter text.</p>
    <p class="bolder-text" style="font-family: Fredoka;">This is bolder text.</p>
    <p class="numeric-text" style="font-family: sans-serif;">This is text with numeric weight.</p>

</body>

</html>