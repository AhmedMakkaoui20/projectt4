<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="addcard.css">
</head>

<body>
    <section class="container forms show-signup">
        <div class="form signup">
            <div class="form-content">
                <header>Credit Card Information</header>
                <form action="cardprocess.php" method="post" onsubmit="return submitForm()">
                    <div class="field input-field">
                        <input type="text" name="card_name" placeholder="Name on the Card" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="card_number" id="card_number" placeholder="Card Number" class="input" required>
                    </div>
                    <div id="card_type_display" class="card-type-display"></div>
                    <div class="field input-field">
                        <input type="text" name="cvv" placeholder="CVV" class="input" required>
                    </div>
                    <div class="field input-field">
                        <label for="expiration_date">Expiration</label>
                        <input type="date" id="expiration_date" name="expiration_date" class="input" required>
                    </div>
                    <br>

                    <div class="field input-field">
                        <input type="text" name="address" placeholder="Address" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="billing_address" placeholder="Billing Address" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="text" name="phone_number" placeholder="Phone Number" class="input" required>
                    </div>

                    <div class="field button-field">
                        <button type="submit" name="submit_card">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="creditcard.js"></script>

</body>

</html>
