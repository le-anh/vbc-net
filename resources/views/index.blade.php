@extends('layouts.master')

@section('contents')
<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <!-- <div class="sidebar-title">
                    <strong> AGCHAIN </strong>
                </div> -->
            <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">
                    <ul class="nav nav-main">

                        <li>
                            <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalTransfer">
                                <i class="fa fa-exchange" aria-hidden="true"></i>
                                <span>Transfer</span>
                            </a>
                        </li>

                        <li>
                            <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalBalance">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span>Balance</span>
                            </a>
                        </li>

                        <li>
                            <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalHistory">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                <span>History</span>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>

        </div>

    </aside>
    <!-- end: sidebar -->

    <section role="main" class="content-body">
        <!-- <header class="page-header">
            <div class="m-2">
                <ol class="breadcrumbs">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li><span>Dashboard</span></li>
                </ol>

                <a class="sidebar-right-toggle"></a>
            </div>
        </header> -->

        <div class="row">
            adssa
            {{Session::get('autUser')}}
            <section class="panel panel-transparent">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>
                </header>
                <div class="panel-body">
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-primary">
                            <div class="panel-body">
                                <div class="widget-summary widget-summary-md">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fa fa-life-ring"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Support Questions</h4>
                                            <div class="info">
                                                <strong class="amount">1281</strong>
                                                <span class="text-primary">(14 unread)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-secondary">
                            <div class="panel-body">
                                <div class="widget-summary widget-summary-md">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fa fa-usd"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Total Profit</h4>
                                            <div class="info">
                                                <strong class="amount">$ 14,890.30</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-tertiary">
                            <div class="panel-body">
                                <div class="widget-summary widget-summary-md">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-tertiary">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Today's Orders</h4>
                                            <div class="info">
                                                <strong class="amount">38</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <section class="panel panel-featured-left panel-featured-quartenary">
                            <div class="panel-body">
                                <div class="widget-summary widget-summary-md">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-quartenary">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Today's Visitors</h4>
                                            <div class="info">
                                                <strong class="amount">3765</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>
            </section>
        </div>

        <div class="col-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalTransfer">
                            <section class="panel">
                                <header class="panel-heading bg-secondary">
                                    <div class="panel-heading-icon">
                                        <i class="fa fa-exchange"></i>
                                    </div>
                                    <h3 class="text-semibold mt-sm text-center">Transfer</h3>
                                </header>

                            </section>
                        </a>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalBalance">
                            <section class="panel">
                                <header class="panel-heading bg-tertiary">
                                    <div class="panel-heading-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <h3 class="text-semibold mt-sm text-center">Balance</h3>
                                </header>
                            </section>
                        </a>
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <a class="mb-xs mt-xs mr-xs modal-basic" href="#modalHistory">
                            <section class="panel">
                                <header class="panel-heading bg-quartenary">
                                    <div class="panel-heading-icon">
                                        <i class="fa fa-history"></i>
                                    </div>
                                    <h3 class="text-semibold mt-sm text-center">History</h3>
                                </header>
                            </section>
                        </a>
                    </div>
                </div>
            </section>

        </div>

    </section>
</div>

<!-- Modal Transfer -->
<div id="modalTransfer" class="modal-block modal-header-color modal-block-danger mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">
                Transfer
                <div class="pull-right">
                    <small> <button class="modal-dismiss" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button> </small>
                </div>
            </h2>
        </header>
        <div class="panel-body">
            <section class="panel form-wizard" id="w1">
                <div class="panel-body panel-body-nopadding">
                    <div class="wizard-tabs">
                        <ul class="wizard-steps">
                            <li class="active">
                                <a href="#w1-account" data-toggle="tab" class="text-center">
                                    <span class="badge hidden-xs">1</span>
                                    Information
                                </a>
                            </li>
                            <li>
                                <a href="#w1-confirm" data-toggle="tab" class="text-center">
                                    <span class="badge hidden-xs">2</span>
                                    Confirm
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form class="form" novalidate="novalidate">
                        <div class="tab-content">
                            <div id="w1-account" class="tab-pane active">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> <i class="fa fa-user"></i> Beneficiary </label>
                                    <div class="col-sm-9">
                                        <input type="text" id="beneficiary-account" name="beneficiary-account" class="form-control" placeholder="Type beneficiary account..." required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> <i class="fa fa-money"></i> Amount </label>
                                    <div class="col-sm-9">
                                        <input type="number" id="amount" name="amount" class="form-control" placeholder="Type amount..." required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"> <i class="fa fa-edit"></i> Content</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" id="content" name="content" class="form-control" placeholder="Type your content..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="w1-confirm" class="tab-pane">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th>Beneficiary account</th>
                                                <td>#</td>
                                            </tr>
                                            <tr>
                                                <th>Beneficiary name</th>
                                                <td>#</td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td>#</td>
                                            </tr>
                                            <tr>
                                                <th>Content</th>
                                                <td>#</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <ul class="pager">
                        <li class="previous disabled">
                            <a><i class="fa fa-angle-left"></i> Previous</a>
                        </li>
                        <li class="finish hidden pull-right">
                            <a> <i class="fa fa-check"></i> Finish</a>
                        </li>
                        <li class="next">
                            <a>Next <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </section>
</div>

<!-- Modal Balance -->
<div id="modalBalance" class="modal-block modal-header-color modal-block-info mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">
                Available balance
                <div class="pull-right">
                    <small> <button class="modal-dismiss" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button> </small>
                </div>
            </h2>
        </header>
        <div class="panel-body">
            <div class="text-center">
                <h3> <i class="fa fa-money"></i> Balance: <strong> ### </strong> </h3>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss">Close</button>
                </div>
            </div>
        </footer>
    </section>
</div>

<!-- Modal History -->
<div id="modalHistory" class="modal-block modal-block-lg mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">
                History
                <div class="pull-right">
                    <small> <button class="modal-dismiss" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button> </small>
                </div>
            </h2>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered">

                <div class="form-group">
                    <label class="col-md-3 control-label">Date range</label>
                    <div class="col-md-8">
                        <div class="input-daterange input-group" data-plugin-datepicker="">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="form-control" name="start">
                            <span class="input-group-addon">to</span>
                            <input type="text" class="form-control" name="end">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Submit </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="panel-body" style="background-color: #ECEDF0;">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="form-group">
                    <div class="timeline">
                        <div class="tm-body">
                            <div class="tm-title">
                                <h3 class="h5 text-uppercase"> 2021-02-22</h3>
                            </div>

                            <ol class="tm-items">
                                <li>
                                    <div class="tm-info">
                                        <div class="tm-icon"><i class="fa fa-sign-in"></i></div>
                                        <time class="tm-datetime" datetime="2021-02-22 19:13">
                                            <div class="tm-datetime-date">4 days ago.</div>
                                            <div class="tm-datetime-time">07:13 PM</div>
                                        </time>
                                    </div>
                                    <div class="tm-box appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight" data-appear-animation-delay="100" style="animation-delay: 100ms;">
                                        <p>
                                            VBC chuyển ### cho AGChain
                                        </p>
                                    </div>
                                </li>

                            </ol>

                            <div class="tm-title">
                                <h3 class="h5 text-uppercase"> 2021-02-21</h3>
                            </div>

                            <ol class="tm-items">
                                <li>
                                    <div class="tm-danger">
                                        <div class="tm-icon"><i class="fa fa-sign-out"></i></div>
                                        <time class="tm-datetime" datetime="2021-02-22 19:13">
                                            <div class="tm-datetime-date">3 days ago.</div>
                                            <div class="tm-datetime-time">07:13 AM</div>
                                        </time>
                                    </div>
                                    <div class="tm-box appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight" data-appear-animation-delay="100" style="animation-delay: 100ms;">
                                        <p>
                                            AGChain chuyển ### cho AGU
                                        </p>
                                    </div>
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss">Close</button>
                </div>
            </div>
        </footer>
    </section>
</div>
@endsection

@section('javascripts')
<script>
    document.cookie='myCookie= Hoang Anh';

    if (!getcookie('myCookie')) {
        console.log('myCookie does not exist.');
    } else {
        console.log('myCookie value is ' + getcookie('myCookie'));
    }

    function getcookie(name = '') {
        let cookies = document.cookie;
        let cookiestore = {};

        cookies = cookies.split(";");

        if (cookies[0] == "" && cookies[0][0] == undefined) {
            return undefined;
        }

        cookies.forEach(function(cookie) {
            cookie = cookie.split(/=(.+)/);
            if (cookie[0].substr(0, 1) == ' ') {
                cookie[0] = cookie[0].substr(1);
            }
            cookiestore[cookie[0]] = cookie[1];
        });

        return (name !== '' ? cookiestore[name] : cookiestore);
    }
    // if (hasCookie('username'))
    //     alert("Đã có cookie");
    // else
    //     alert("Chưa có cookie");

    // function hasCookie(cookieName) {
    //     return document.cookie.split(';')
    //         .map(entry => entry.split('='))
    //         .some(([name, value]) => (name.trim() === cookieName) && !!value);
    // }
</script>
@endsection