<?php
include ('config/timezone.php');
?>

<!DOCTYPE html>
<html class="html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex"/>
    <title>Example PHP checkout</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/securedFields.style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/3.0.0/adyen.css" />
    <script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/3.0.0/adyen.js"></script>
</head>
<body class="body">
<div class="content">
    <div class="explanation">
        <h3>To run this securedFields example: </h3>
        <p>
            <b>1)</b> Edit the following PHP variables in the <b>config/authentication.ini</b> file:</br></br>
            <b>$merchantAccount</b>: 'YOUR MERCHANT ACCOUNT', more information in our <a href="https://docs.adyen.com/developers/payments-basics/get-started-with-adyen">Getting started guide</a>.<br/>
            <b>$checkoutAPIkey</b>: 'YOUR CHECKOUT API KEY'.
        </p>
        <p>
            <b>2)</b> Also make sure that the <i>url</i> function in <b>config/server.php</b> is setting the protocol to the correct value (it might need to be <i>http</i> if you are running these files locally)
        </p>
    </div>

    <h1>Checkout SecuredFields Component</h1>
    <div class="merchant-checkout__form">
        <div class="merchant-checkout__payment-method__header">
            <h2 class="sf-text">SecuredFields</h2>
        </div>
        <div class="merchant-checkout__payment-method">
            <div class="merchant-checkout__payment-method__details secured-fields" style="display:none;">
                <span class="pm-image">
                    <img id="pmImage" width="40" src="https://checkoutshopper-test.adyen.com/checkoutshopper/images/logos/nocard.svg" alt="">
                </span>
                <label class="pm-form-label">
                    <span class="pm-form-label__text">Card number:</span>
                    <span class="pm-input-field" data-cse="encryptedCardNumber"></span>
                    <span class="pm-form-label__error-text">Please enter a valid credit card number</span>
                </label>
                <label class="pm-form-label pm-form-label--exp-date">
                    <span class="pm-form-label__text">Expiry date:</span>
                    <span class="pm-input-field" data-cse="encryptedExpiryDate"></span>
                    <span class="pm-form-label__error-text">Date error text</span>
                </label>
                <label class="pm-form-label pm-form-label--cvc">
                    <span class="pm-form-label__text">CVV/CVC:</span>
                    <span class="pm-input-field" data-cse="encryptedSecurityCode"></span>
                    <span class="pm-form-label__error-text">CVC Error text</span>
                </label>
            </div>
            <div class="card-input__spinner__holder">
                <div class="card-input__spinner card-input__spinner--active">
                    <div class="adyen-checkout__spinner__wrapper ">
                        <div class="adyen-checkout__spinner adyen-checkout__spinner--large"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="dkm">{"groups":[{"name":"Credit Card","types":["amex","bcmc","cartebancaire","mc","visa","visadankort"]}],"paymentMethods":[{"details":[{"key":"encryptedCardNumber","type":"cardToken"},{"key":"encryptedSecurityCode","type":"cardToken"},{"key":"encryptedExpiryMonth","type":"cardToken"},{"key":"encryptedExpiryYear","type":"cardToken"},{"key":"holderName","optional":true,"type":"text"}],"name":"Credit Card","type":"scheme"},{"details":[{"key":"encryptedCardNumber","type":"cardToken"},{"key":"encryptedExpiryMonth","type":"cardToken"},{"key":"encryptedExpiryYear","type":"cardToken"},{"key":"holderName","optional":true,"type":"text"}],"name":"Bancontact card","supportsRecurring":false,"type":"bcmc"},{"name":"Online bank transfer.","supportsRecurring":true,"type":"directEbanking"},{"details":[{"items":[{"id":"231","name":"POP Pankki"},{"id":"551","name":"Komer??n?? banka"},{"id":"232","name":"Aktia"},{"id":"552","name":"Raiffeisen"},{"id":"233","name":"S????st??pankki"},{"id":"750","name":"Swedbank"},{"id":"211","name":"Nordea"},{"id":"553","name":"??SOB"},{"id":"234","name":"S-Pankki"},{"id":"751","name":"SEB"},{"id":"554","name":"Moneta"},{"id":"235","name":"OmaSP"},{"id":"752","name":"Nordea"},{"id":"213","name":"Op-Pohjola"},{"id":"555","name":"UniCredit"},{"id":"753","name":"LHV"},{"id":"556","name":"Fio"},{"id":"557","name":"mBank"},{"id":"216","name":"Handelsbanken"},{"id":"558","name":"Air Bank"},{"id":"260","name":"L??nsf??rs??kringar"},{"id":"240","name":"BankDeposit"},{"id":"265","name":"Sparbanken"},{"id":"640","name":"BankDeposit"},{"id":"200","name":"??landsbanken"},{"id":"940","name":"Swedbank"},{"id":"500","name":"??esk?? spo??itelna"},{"id":"720","name":"Swedbank"},{"id":"941","name":"SEB"},{"id":"204","name":"Danske Bank"},{"id":"721","name":"SEB"},{"id":"942","name":"Citadele"},{"id":"205","name":"Handelsbanken"},{"id":"722","name":"DNB"},{"id":"943","name":"DNB"},{"id":"206","name":"Nordea"},{"id":"723","name":"??iauli?? bankas"},{"id":"207","name":"SEB"},{"id":"724","name":"Nordea"},{"id":"505","name":"Komer??n?? banka"},{"id":"208","name":"Skandiabanken"},{"id":"209","name":"Swedbank"}],"key":"issuer","type":"select"}],"name":"Bank Payment","supportsRecurring":true,"type":"entercash"},{"details":[{"items":[{"id":"d5d5b133-1c0d-4c08-b2be-3c9b116dc326","name":"Dolomitenbank"},{"id":"ee9fc487-ebe0-486c-8101-17dce5141a67","name":"Raiffeissen Bankengruppe"},{"id":"6765e225-a0dc-4481-9666-e26303d4f221","name":"Hypo Tirol Bank AG"},{"id":"8b0bfeea-fbb0-4337-b3a1-0e25c0f060fc","name":"Sparda Bank Wien"},{"id":"1190c4d1-b37a-487e-9355-e0a067f54a9f","name":"Schoellerbank AG"},{"id":"e2e97aaa-de4c-4e18-9431-d99790773433","name":"Volksbank Gruppe"},{"id":"bb7d223a-17d5-48af-a6ef-8a2bf5a4e5d9","name":"Immo-Bank"},{"id":"e6819e7a-f663-414b-92ec-cf7c82d2f4e5","name":"Bank Austria"},{"id":"eff103e6-843d-48b7-a6e6-fbd88f511b11","name":"Easybank AG"},{"id":"25942cc9-617d-42a1-89ba-d1ab5a05770a","name":"VR-BankBraunau"},{"id":"4a0a975b-0594-4b40-9068-39f77b3a91f9","name":"Volkskreditbank"},{"id":"3fdc41fc-3d3d-4ee3-a1fe-cd79cfd58ea3","name":"Erste Bank und Sparkassen"},{"id":"ba7199cc-f057-42f2-9856-2378abf21638","name":"BAWAG P.S.K. Gruppe"}],"key":"issuer","type":"select"}],"name":"EPS","supportsRecurring":true,"type":"eps"},{"details":[{"key":"bic","type":"text"}],"name":"GiroPay","supportsRecurring":true,"type":"giropay"},{"details":[{"items":[{"id":"1121","name":"Test Issuer"},{"id":"1154","name":"Test Issuer 5"},{"id":"1153","name":"Test Issuer 4"},{"id":"1152","name":"Test Issuer 3"},{"id":"1151","name":"Test Issuer 2"},{"id":"1162","name":"Test Issuer Cancelled"},{"id":"1161","name":"Test Issuer Pending"},{"id":"1160","name":"Test Issuer Refused"},{"id":"1159","name":"Test Issuer 10"},{"id":"1158","name":"Test Issuer 9"},{"id":"1157","name":"Test Issuer 8"},{"id":"1156","name":"Test Issuer 7"},{"id":"1155","name":"Test Issuer 6"}],"key":"issuer","type":"select"}],"name":"iDEAL","supportsRecurring":true,"type":"ideal"},{"name":"Pay later with Klarna.","supportsRecurring":true,"type":"klarna"},{"name":"Slice it with Klarna.","supportsRecurring":true,"type":"klarna_account"},{"name":"Multibanco","supportsRecurring":true,"type":"multibanco"},{"name":"Paysafecard","supportsRecurring":true,"type":"paysafecard"},{"name":"Swish","supportsRecurring":true,"type":"swish"}]}</div>
    <!-- REGULAR FLOW -->
    <script src = "assets/js/main.js" ></script >
</body>
</html>