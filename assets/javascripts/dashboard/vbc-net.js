var host = "http://40.65.145.154:3000/";
var user_token = null;
var user_name = null;
var user_org = "org1";

// Tranfer informattion
var sender;
var receiver;
var receiverToken;
var utxoInputKeys;
var amount;
var sum;
var amountTransfer;

var boolCheckSignIn = true;

CheckSignInModal();

$('#btn-sign-in').click(function (e) {
    SignIn();
});

$('#modalSignIn').on('hidden.bs.modal', function (e) {
    if (boolCheckSignIn)
        CheckSignInModal();
});

$('#modalBalance_User').click(function (e) {
    console.log("$('#amodalBalance').click");
    TotalAmount();
});

$('#modalAlert').on('hidden.bs.modal', function (e) {
    $('#msg-alert').html();
});

$('.finish').click(function (e) {
    Transfer();
});

$('#btn-transfer').click(function(e){
    userExist = false;

    // Check user exist
    var dataJson = {
        "user": $('#beneficiary-account').val(),
        "org": user_org
    };

    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '*'
        },
        url: host +  "api/ClientID",
        crossDomain: true,
        dataType: "json",
        data: dataJson
    })
    .done(function(msg) {
        console.log("Done: " + msg);
        userExist = true;
        receiver = $('#beneficiary-account').val();
        receiverToken = msg.result;
        console.log("receiverToken:" + receiverToken);

        // Check amount available
        var dataJson = {
            "user": user_name,
            "org": user_org
        };

        $.ajax({
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Access-Control-Allow-Origin': '*'
            },
            url: host +  "api/ClientUTXOs",
            crossDomain: true,
            dataType: "json",
            data: dataJson
        })
        .done(function(msg) {
            console.log("Done: " + msg);

            // Check amount available?
            let amountAvailable = 0;
            utxoInputKeys = "";

            amountTransfer = parseInt($('#amount_transfer').val());

            $.each(msg.result, function(index, value){
                amountAvailable += parseInt(value.amount);
                console.log(index + " - " + msg.result.length-1);
                if(index == msg.result.length-1)
                    utxoInputKeys += "\"" + value.utxo_key + "\"";
                else
                    utxoInputKeys += "\"" + value.utxo_key + "\", ";
            });


            console.log("amountAvailable: " + parseInt(amountAvailable));
            console.log("amount_transfer: " + parseInt($('#amount_transfer').val()));

            if (parseInt(amountAvailable) < parseInt(amountTransfer)) {
                $('#group-amount').addClass('has-error');
                $('#amount-mesage').html('Amount not enough!');
                $('#amount-mesage').css('display', 'block');
                console.log("Amount not enough!");
            }
            else
            {
                $.magnificPopup.close();
                $('#modalTransferConfirm').modal(); 
                $('#wallet-address').val(msg.result[0].owner);
                $('#td-beneficiary-account').html($('#beneficiary-account').val());
                $('#td-beneficiary-token').html(receiverToken);
                $('#td-amount').html(amountTransfer);
            }
        })
        .fail(function(msg){
            console.log("Fail: " + msg);
            $('.modal').modal('hide');
            Alert("Do not get user information.");
        });
    })
    .fail(function(msg){
        console.log("Fail: " + msg);
        $('#group-beneficiary-account').addClass('has-error');
        $('#beneficiary-account-message').html('Not found beneficiary account!');
        $('#beneficiary-account-message').css('display', 'block');
    });

    
});

$('#btn-transfer-confirm').click(function(){
    let dataJson = {
        org: user_org,
        user: user_name,
        receiver: receiverToken,
        utxoInputKeys: ["[" + utxoInputKeys + "]"],
        amount: amountTransfer
    };
    console.log(dataJson);

    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '*'
        },
        url: host + "api/Transfer",
        crossDomain: true,
        // dataType: 'x-www-form-urlencoded',
        contentType: "plain/text",
        data: dataJson
    })
    .done(function(msg){
        $('.modal').modal('hide');
        Alert("Transfer is successfully.");
    })
    .fail(function(msg){
        console.log("Error: ");
        console.log(msg);
        Alert("Transfer is failed.<br>Please try again.");
    });
});

$('#btn-create-token-confirm').click(function(){
    Loading();
    // Check user exist
    var dataJson = {
        "user": $('#beneficiary-account_create_token').val(),
        "org": user_org
    };

    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '*'
        },
        url: host +  "api/ClientID",
        crossDomain: true,
        dataType: "json",
        data: dataJson
    })
    .done(function(msg) {
        StopLoading();
        console.log("Done: " + msg);

        let dataJson = {
            'user': $('#beneficiary-account_create_token').val(),
            'amount': $('#amount_create_token').val()
        };
        console.log(dataJson);

        $.ajax({
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Access-Control-Allow-Origin': '*'
            },
            url: host +  "api/Mint",
            crossDomain: true,
            dataType: "json",
            data: dataJson
        })
        .done(function(msg) {
            StopLoading();
            console.log("Done: " + msg);
            $.magnificPopup.close();
            $('.modal').modal('hide');
            Alert("Create token successfully!");
               
        })
        .fail(function(msg){
            StopLoading();
            console.log("Fail: " + msg);
            $.magnificPopup.close();
            $('.modal').modal('hide');
            Alert("Error, please try again!");
        })
    })
    .fail(function(msg){
        StopLoading();
        console.log("Fail: " + msg);
        $('#group-beneficiary-account_create_token').addClass('has-error');
        $('#beneficiary-account-mesage_create_token').html('User is not exist!');
        $('#beneficiary-account-mesage_create_token').css('display', 'block');
        $('#beneficiary-account_create_token').focus();
    });

});

$('#btn-create-user').click(function(){
    // Check user exist
    var dataJson = {
        "user": $('#username-create').val(),
        "org": user_org
    };

    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '*'
        },
        url: host +  "api/ClientID",
        crossDomain: true,
        dataType: "json",
        data: dataJson
    })
    .done(function(msg){
        $('#group-username-create').addClass('has-error');
        $('#username-create-mesage').html('User is already exists!');
        $('#username-create-mesage').css('display', 'block');
        $('#username-create').focus();
    })
    .fail(function(msg) {
        let dataJson = {
            'org': user_org,
            'user': $('#username-create').val(),
            'pass': $('#password-create').val()
        };
        console.log(dataJson);

        $.ajax({
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Access-Control-Allow-Origin': '*'
            },
            url: host +  "api/registerUser",
            crossDomain: true,
            dataType: "json",
            data: dataJson
        })
        .done(function(msg) {
            console.log("Done: " + msg);
            $.magnificPopup.close();
            $('.modal').modal('hide');
            Alert("Create user successfully!");
               
        })
        .fail(function(msg){
            console.log("Fail: " + msg);
            $.magnificPopup.close();
            $('.modal').modal('hide');
            Alert("Error, please try again!");
        })
    });
    
});

$('#btn-logout').click(function(){
    user_token = null;
    user_name = null;
    user_org = "org1";
    sender = null;
    receiver = null;
    utxoInputKeys = null;
    amount = null;
    sum = null;
    amountTransfer = null;
    boolCheckSignIn = true;

    $('#btn-login').removeClass('hide');
    $('#btn-logout').addClass('hide');
    $('.admin-view').addClass('hide');
    $('.user-view').addClass('hide');
    $("#head-user-name").html('');
    $("#head-user-role").html('');

    CheckSignInModal();
});

function CheckSignInModal() {
    if (!user_token || user_token == undefined) {
        $("#modalSignIn").removeClass('mfp-hide');
        $("#modalSignIn").modal('show');
    }
    else
    {
        $("#modalSignIn").addClass('mfp-hide');
        $("#modalSignIn").modal('hide');
        setHeaderUser();
    }
}

function SignIn() {
    Loading();
    var dataJson = {
        "user": $('#username').val(),
        // "org": $('#organization').val()
        "org": user_org
    };

    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Origin': '*'
        },
        url: host + "api/ClientID",
        crossDomain: true,
        dataType: "json",
        data: dataJson
    })
    .done(function (msg) {
        console.log("Login successfully.");
        user_token = msg.result;
        user_name = dataJson.user;
        user_org = dataJson.org;
        boolCheckSignIn = true;
        $("#modalSignIn").addClass('mfp-hide');
        $("#modalSignIn").modal('hide');

        $('#btn-login').addClass('hide');
        $('#btn-logout').removeClass('hide');
        setHeaderUser();
        StopLoading();
    })
    .fail(function (msg) {
        console.log(msg);
        StopLoading();
        Alert('Not found user!');
    }),
    CheckSignInModal();
}

function Alert(msg) {
    $('#msg-alert').html(msg);
    $("#modalAlert").modal();
}

function setHeaderUser() {
    $("#head-user-name").html(user_name);
    if (user_name == "admin")
    {
        $("#head-user-role").html("admin");
        ShowViewAdmin();
    }
    else
    {
        $("#head-user-role").html("user");
        ShowViewUser();
    }
}

function TotalAmount() {
    $('#balance').html(' <i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ');

    var dataJson = {
        "user": user_name,
        "org": user_org
    };
    console.log(dataJson);
    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        url: host + "api/ClientUTXOs",
        crossDomain : true,
        dataType: "json",
        contentType: 'application/json',
        data: dataJson
    })
    .done(function (msg) {
        total = 0;
        $.each(msg.result, function(index, value){
            total += value.amount;
        });
        $('#balance').html(total + " VBC COIN ");
    })
    .fail(function (msg) {
        $('#balance').html(" ... VBC COIN ");
    });
}

function Transfer() {

    var dataJson = {
        "user": $('#username').val(),
        "org": $('#organization').val(),
        "sender": sender,
        "receiver": receiver,
        "utxoInputKeys": utxoInputKeys,
        "amount": amount,
        "sum": sum
    };

    console.log(dataJson);

    $.ajax({
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        url: host + "api/Transfer",
        // dataType: "json",
        contentType: 'application/x-www-form-urlencoded',
        data: dataJson
    })
    .done(function (msg) {
        $('.modal').modal('hide');
        Alert('Transfer is successfully!');
    })
    .fail(function (msg) {
        console.log("Error:" + msg);
        $('.modal').modal('hide');
        Alert('Transfer failed.<br>Please, try again!');
    });
}


function ShowViewUser()
{
    $('.user-view').removeClass('hide');
    $('.admin-view').addClass('hide');
}


function ShowViewAdmin()
{
    $('.admin-view').removeClass('hide');
    $('.user-view').addClass('hide');
}

function Loading() {
    // $.magnificPopup.close();
    // $('.modal').modal('hide');
    // $('#site-loader').removeClass('hide');
    // $('#site-loader').addClass('show');
}

function StopLoading() {
    // $('#site-loader').removeClass('show');
    // $('#site-loader').addClass('hide');
}