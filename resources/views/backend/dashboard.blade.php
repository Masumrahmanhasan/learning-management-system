@extends('backend.layouts.app')
@section('content')
<section id="page-title" class="padding-top-15 padding-bottom-15">
    <div class="row">
        <div class="col-sm-7">
            <h1 class="mainTitle">Dashboard</h1>
            <span class="mainDescription">overview &amp; stats</span>
        </div>
        <div class="col-sm-5">
            <ul class="mini-stats pull-right">
                <li>
                    <div class="sparkline-1"><span></span></div>
                    <div class="values">
                        <strong class="text-dark">18304</strong>
                        <p class="text-small no-margin">Sales</p>
                    </div>
                </li>
                <li>
                    <div class="sparkline-2"><span></span></div>
                    <div class="values">
                        <strong class="text-dark">&#36;3,833</strong>
                        <p class="text-small no-margin">Earnings</p>
                    </div>
                </li>
                <li>
                    <div class="sparkline-3"><span></span></div>
                    <div class="values">
                        <strong class="text-dark">&#36;848</strong>
                        <p class="text-small no-margin">Referrals</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<div class="container-fluid container-fullw bg-white">
    <div class="row">

        <div class="col-sm-4">
            <div class="panel panel-white text-white text-center bg-dark">
                <div class="panel-body">
                    <span class="fa-stack fa-2x"><i class="fa fa-users fa-stack-1x fa-inverse"></i></span>
                    <h2 class="StepTitle text-white">Manage Users</h2>
                    <p class="text-small">To add users, you need to be signed in as the super user.</p>
                    
                </div>
            </div>
        </div>
        
        <div class="col-sm-4">
            <div class="panel panel-white text-center">
                <div class="panel-body">
                    <span class="fa-stack fa-2x"><i class="fa fa-users fa-stack-1x"></i></span>
                    <h2 class="StepTitle">Manage Users</h2>
                    <p class="text-small">To add users, you need to be signed in as the super user.</p>
                    
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="panel panel-white text-white text-center bg-primary">
                <div class="panel-body">
                    <span class="fa-stack fa-2x"><i class="fa fa-users fa-stack-1x fa-inverse"></i></span>
                    <h2 class="StepTitle text-white">Manage Users</h2>
                    <p class="text-small">To add users, you need to be signed in as the super user.</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection