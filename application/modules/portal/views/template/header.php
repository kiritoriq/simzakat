<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon Image -->
    <link rel="icon" href="<?php echo base_url() ?>assets/Images/favicon.svg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">
    <!-- JQuery Validation Engine CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/validationengine/css/validationEngine.jquery.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/piexif.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/sortable.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/purify.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootbox/bootbox.all.min.js"></script>
    <!-- JQuery Number -->
    <script src="<?php echo base_url() ?>assets/plugins/Number/jquery.number.min.js"></script>
    <!-- JQuery Validation Engine -->
    <script src="<?php echo base_url() ?>assets/plugins/validationengine/js/languages/jquery.validationEngine-id.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/validationengine/js/jquery.validationEngine.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/fileinput.min.js"></script>

    <title>Donasi Dompet Dhuafa</title>
  </head>
  <style>
      .pull-left {
        float: left !important;
      }

      .pull-right {
        float: right !important;
      }

      .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 85%;
        font-weight: bold;
        line-height: 1;
        color: #ffffff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
      }

      .label-default {
        background-color: #999999;
      }

      .label-success {
        background-color: #5cb85c;
      }

      .label-warning {
        background-color: #f0ad4e;
      }

      .label-primary {
        background-color: #428bca;
      }

      .label-danger {
        background-color: #d9534f;
      }

      .proses .label {
        opacity: 0.15;
      }

      .proses .label.jalan {
        opacity: 1;
      }

      .carousel-caption {
        position: absolute;
        /*width: 635px;*/
        right: 0;
        bottom: 20px;
        left: 0;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fdee09;
        text-align: center;
        background-color: rgba(0,0,0,0.5);
        position: absolute;
        bottom: 0;
        display: block;
        padding: 20px;
      }

      .carousel-inner img {
          width: 100%;
          height: 100%;
      }

      footer {
        /*background: #222;*/
        color: #fff;
        padding-top: 10px;
      }

      footer .copyright {
        padding: 15px 0;
        background: #1f7c4d !important;
        margin-top: 20px;
        font-size: 15px;
      }

      footer .copyright span {
        color: #0894d1;
      }

      body {
        /* background-color: #eeeeee; */
        /*padding-top: 60px;*/
      }

      .bg-yellow {
        background-color: #dbd46e !important;
      }

      .bg-red {
        background-color: #c30000 !important;
      }

      .bg-putih {
        background-color: #fff !important;
      }

      .navbar-dark .navbar-nav .nav-link {
        color: #00a651;
        font-weight: 500;
      }

      .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .show > .nav-link {
        /*background-color: rgba(255, 0, 0, 0.5);*/
        padding-top: none;
        /* color: #d3d2d2; */
        color: #03824b;
        font-weight: 500;
      }

      .navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover {
        text-decoration: none;
        /* color: #d3d2d2; */
        color: #00a651;
      }

      .carousel-inner img {
        /* height: 500px; */
        height: 800px;
      }

      .btn-yellow {
        color:rgba(255, 0, 0, 0.5);background-color:#dbd46e;border-color:#eee235;
      }

      .detil-baca {
        box-shadow: 0 5px 25px -10px rgba(0, 0, 0, 0.5);
        background-color: white;
        margin-bottom: 30px;
      }

      #donasi-home .container-fluid {
        padding: 0;
        position: relative;
      }

      #home-slider .container-fluid {
        padding: 0;
        position: relative;
      }

      #donasi-home .left-ct {
        background: url('<?php echo base_url() ?>assets/Images/dompet-nabung.jpg')right no-repeat;
        background-size: cover;
      }

      #donasi-home .left-ct, #donasi-home .right-ct {
        display: table-cell;
        float: none;
        position: relative;
        padding: 0;
      }

      #donasi-home .right-ct {
        background: linear-gradient(270deg,rgba(31,126,78,1) 2%,rgba(23,175,96,1) 100%);
      }

      #donasi-home .right-ct-inner {
        max-width: 450px;
        padding: 60px 0;
        margin-left: 97px;
      }

      #donasi-home .right-ct h1 {
        font-size: 48px;
        font-weight: 700;
        color: #fff;
      }

      #donasi-home .right-ct p {
        font-size: 21px;
        line-height: 30px;
        color: #fff;
        margin-bottom: 45px;
      }

      .top-header {
        background: #1c9055;
        background: linear-gradient(90deg,rgba(31,126,78,1) 15%,rgba(23,175,96,1) 100%);
      } 

      .top-header .top-nav {
        padding: 10px 15px;
      }
    </style>
  <body>
  <header>
      <div class="top-header">
        <div class="container-fluid">
          <div class="top-nav">
            <div class="pull-right"></div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
  </header>