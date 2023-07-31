<html>
    <head>
        <title>Pay Now</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
        <link rel="stylesheet" href="./css/payment.css">

        <script>
            $("input[name='expiry-data']").mask("00 / 00");
        </script>
    </head>
    <body>

    <div class="wrapper">
    <div class="payment">
        <div class="payment-logo">
        <p>p</p>
        </div>
        
        
        <h2>Payment Gateway</h2>
        <div class="form">
        <div class="card space icon-relative">
            <label class="label">Card holder:</label>
            <input type="text" class="input" placeholder="On Jobs">
            <i class="fas fa-user"></i>
        </div>
        <div class="card space icon-relative">
            <label class="label">Card number:</label>
            <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number">
            <i class="far fa-credit-card"></i>
        </div>
        <div class="card-grp space">
            <div class="card-item icon-relative">
            <label class="label">Expiry date:</label>
            <input type="text" name="expiry-data" class="input"  placeholder="00 / 00">
            <i class="far fa-calendar-alt"></i>
            </div>
            <div class="card-item icon-relative">
            <label class="label">CVC:</label>
            <input type="text" class="input" data-mask="000" placeholder="000">
            <i class="fas fa-lock"></i>
            </div>
        </div>
            
        <div class="btn">
            Pay
        </div> 
        
        </div>
    </div>
    </div>

    </body>
</html>