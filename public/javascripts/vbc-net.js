let host = "http://40.65.145.154:3000/";
let user_org = 'org1';
let user_name;
let receiver;
let receiverToken;
let utxoInputKeys;
let amount;
let sum;
let amountTransfer;

$('#btn-log-in').click(function(e){
    if($('#login-username').val())
    {
        $('#modal-login').modal('hide');
        ShowLoader();
        SignIn();
    }
    else
    {
        $('#div-login-message').addClass('d-none');
        $('#login-username').addClass('is-invalid');
        $('#login-username-message').html('Please type username');
        $('#login-username').focus();
    }
});

$('#btn-sign-out').click(function(){
    user_name = null;
    receiver = null;
    receiverToken = null;
    utxoInputKeys = null;
    amount = null;
    sum = null;
    amountTransfer = null;
    $('#nav-username').html();
    $('#btn-sign-in').removeClass('d-none');
    HideAllView();
});

/* ======================= User =======================   */
$('#modal-balance').on('show.bs.modal', function (e) {
    $('#available-balance').html(' <i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ');

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
        $('#available-balance').html(total);
    })
    .fail(function (msg) {
        $('#available-balance').html(" ... ");
    });
});

$('#btn-transfer-transfer').click(function(e){
    $('#modal-transfer').modal('hide');
    ShowLoader();

    $('#div-transfer-message').removeClass('is-invalid');
    $('#transfer-beneficiary-account').removeClass('is-invalid');
    $('#transfer-amount').removeClass('is-invalid');

    userExist = false;

    // Check user exist
    var dataJson = {
        "user": $('#transfer-beneficiary-account').val(),
        "org": user_org
    };

    try {
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
            receiver = $('#transfer-beneficiary-account').val();
            receiverToken = msg.result;
            console.log("receiverToken:" + receiverToken);
    
            // Check amount available
            var dataJson = {
                "user": user_name,
                "org": user_org
            };

            try {

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
        
                    amountTransfer = parseInt($('#transfer-amount').val());
        
                    $.each(msg.result, function(index, value){
                        amountAvailable += parseInt(value.amount);
                        console.log(index + " - " + msg.result.length-1);
                        if(index == msg.result.length-1)
                            utxoInputKeys += "\"" + value.utxo_key + "\"";
                        else
                            utxoInputKeys += "\"" + value.utxo_key + "\", ";
                    });
        
                    console.log("amountAvailable: " + parseInt(amountAvailable));
                    console.log("amount_transfer: " + parseInt($('#transfer-amount').val()));
        
                    if (parseInt(amountAvailable) < parseInt(amountTransfer)) {
                        $('#transfer-amount').addClass('is-invalid');
                        $('#transfer-amount-message').html('Amount not enough!');
                        HideLoader();
                        $('#modal-transfer').modal('show');
                        console.log("Amount not enough!");
                    }
                    else
                    {
                        HideLoader();
                        $('#modal-confirm-transfer').modal('show'); 
                        $('#td-beneficiary-account').html($('#transfer-beneficiary-account').val());
                        $('#td-beneficiary-token').html(receiverToken);
                        $('#td-amount').html(amountTransfer);
                    }
                })
                .fail(function(msg){
                    console.log("Fail: " + msg);
                    $('#div-transfer-message').addClass('is-invalid');
                    $('#div-transfer-message').removeClass('d-none');
                    $('#transfer-message').html('Do not get user information!');
                    HideLoader()
                    $('#modal-transfer').modal('show');
                });
                
            } catch (error) {
                console.log("Fail: " + msg);
                $('#div-transfer-message').addClass('is-invalid');
                $('#div-transfer-message').removeClass('d-none');
                $('#transfer-message').html('Do not get user information!');
                HideLoader()
                $('#modal-transfer').modal('show');
            }
            
        })
        .fail(function(msg){
            console.log("Fail: " + msg);
            $('#transfer-beneficiary-account').addClass('is-invalid');
            $('#transfer-beneficiary-account-message').html('Not found beneficiary account!');
            HideLoader();
            $('#modal-transfer').modal('show');
        });
        
    } catch (error) {
        console.log("Fail: " + msg);
        $('#transfer-beneficiary-account').addClass('is-invalid');
        $('#transfer-beneficiary-account-message').html('Not found beneficiary account!');
        HideLoader();
        $('#modal-transfer').modal('show');
    }
});

$('#btn-confirm-transfer').click(function(e){
    $('.modal').modal('hide');
    ShowLoader();

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
        contentType: "plain/text",
        data: dataJson
    })
    .done(function(msg){
        console.log("Done: ");
        console.log(msg);
        HideLoader();
        Alert("Transfer is successfully.");
    })
    .fail(function(msg){
        console.log("Error: ");
        console.log(msg);
        HideLoader();
        Alert("Transfer is failed.<br>Please try again.");
    });
});
/* ======================= End User =======================   */


/* ======================= Admin =======================   */
$('#btn-create-token').click(function(e){
    if( parseInt($('#create-token-amount').val()) >= 1 )
    {
        $('#modal-create-token').modal('hide');
        $('#create-token-amount').removeClass('is-invalid');
        ShowLoader();
        var dataJson = {
            "user": $('#create-token-username').val(),
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

            let dataJson = {
                'user': $('#create-token-username').val(),
                'amount': $('#create-token-amount').val()
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
                console.log("Done: " + msg);
                $('#create-token-username').removeClass('is-invalid');
                $('#create-token-amount').removeClass('is-invalid');
                HideLoader();
                Alert("Create token successfully!");
                
            })
            .fail(function(msg){
                console.log("Fail: " + msg);
                HideLoader();
                Alert("Error, please try again!");
            })
        })
        .fail(function(msg){
            console.log("Fail: " + msg);
            $('#create-token-username').addClass('is-invalid');
            $('#create-token-username-message').html('User is not exist!');
            $('#create-token-username').focus();
            HideLoader();
            $('#modal-create-token').modal('show');
        });
    }
    else
    {
        $('#create-token-amount').addClass('is-invalid');
        $('#create-token-amount-message').html('Amount must be greater than 0');
        $('#create-token-amount').focus();
    }
});

$('#btn-create-user').click(function(e){
    $('#create-user-username').removeClass('is-invalid');
    $('#create-user-password').removeClass('is-invalid');
    $('#create-user-confirm-password').removeClass('is-invalid');


    if($('#create-user-password').val())
    {
        // Check password
        if($('#create-user-password').val() == $('#create-user-confirm-password').val())
        {
            $('#modal-create-user').modal('hide');
            ShowLoader();
            // Check user exist
            var dataJson = {
                "user": $('#create-user-username').val(),
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
                $('#create-user-username').addClass('is-invalid');
                $('#create-user-username-message').html('User is already exists!');
                $('#create-user-username').focus();
                HideLoader();
                $('#modal-create-user').modal('show');
            })
            .fail(function(msg) {
                let dataJson = {
                    'org': user_org,
                    'user': $('#create-user-username').val(),
                    'pass': $('#create-user-password').val()
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
                    $('#create-user-username').removeClass('is-invalid');
                    $('#create-user-password').removeClass('is-invalid');
                    HideLoader();
                    Alert("Create user successfully!");
                    
                })
                .fail(function(msg){
                    console.log("Fail: " + msg);
                    HideLoader();
                    Alert("Error, please try again!");
                })
            });
        }
        else
        {
            $('#create-user-password').addClass('is-invalid');
            $('#create-user-confirm-password').addClass('is-invalid');
            $('#create-user-confirm-password-message').html('Password and confirm password do not math');
            $('#create-user-password').focus();
        }
    }
    else
    {
        $('#create-user-username').addClass('is-invalid');
        $('#create-user-username-message').html('User can not be empty');
        $('#create-user-username').focus();
    }
});
/* ======================= End Admin =======================   */


function SignIn() {
    // console.log("Login successfully.");
    // $('#div-login-message').addClass('d-none');
    // $('#login-message').html();
    // user_name = $('#login-username').val();
    // boolCheckSignIn = true;
    // SetView();
    // HideLoader();
    
    
    var dataJson = {
        "user": $('#login-username').val(),
        "pass": $('#login-password').val(),
        "org": user_org
    };

    try {
        $.ajax({
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Access-Control-Allow-Origin': '*'
            },
            url: host + "api/SignIn",
            crossDomain: true,
            dataType: "json",
            data: dataJson
        })
        .done(function (msg) {
            console.log("Login successfully.");
            $('#div-login-message').addClass('d-none');
            $('#login-message').html();
            user_name = $('#login-username').val();
            boolCheckSignIn = true;
            SetView();
            HideLoader();
        })
        .fail(function (msg) {
            console.log(msg);
            $('#login-username').removeClass('is-invalid');
            $('#div-login-message').removeClass('d-none');
            $('#login-message').html("Username or password is incorrect!");
            HideLoader();
            login();
        });
    } catch (error) {
        console.log(error);
        $('#login-username').removeClass('is-invalid');
        $('#div-login-message').removeClass('d-none');
        $('#login-message').html("Username or password is incorrect!");
        HideLoader();
        login();
    }
}

function ShowLoader() {
    $('#site-loader').removeClass('hide');
    $('#site-loader').addClass('show');
}

function HideLoader() {
    $('#site-loader').removeClass('show');
    $('#site-loader').addClass('hide');
}

var loader = function() {
    setTimeout(function() { 
    if($('#site-loader').length > 0) {
        $('#site-loader').removeClass('show');
        $('#site-loader').addClass('hide');
        login();
    }
    }, 500);
};
loader();

var login = function(){
    $('#modal-login').modal('show');
};

function SetView() {
    $('#nav-username').html(user_name);
    $('.log-out-view').removeClass('d-none');
    $('#btn-sign-in').addClass('d-none');

    if (user_name == "admin")
        ShowViewAdmin();
    else
        ShowViewUser();
}

function ShowViewUser()
{
    $('.user-view').removeClass('d-none');
    $('.admin-view').addClass('d-none');
}


function ShowViewAdmin()
{
    $('.admin-view').removeClass('d-none');
    $('.user-view').addClass('d-none');
}

function HideAllView()
{
    $('.admin-view').addClass('d-none');
    $('.user-view').addClass('d-none');
    $('.log-out-view').addClass('d-none');
}

function Alert(msg) {
    $('#msg-alert').html(msg);
    $("#modal-alert").modal('show');
}