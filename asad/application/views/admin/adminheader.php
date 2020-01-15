<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title_bar ?></title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/dash.css">
  
  <style>

.breadcrumbs {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  .breadcrumbs li {
    list-style: none;
    margin: 0;
    padding: 0;
    display: block;
    float: left;
    font-family: Helvetica Neue,sans-serif;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: .05em;
    line-height: 20px;
    color: hsl(0, 0%, 30%);
  }
  
  .breadcrumbs li a {
    display: block;
    padding: 0 40px 0 0px;
    color: hsl(0, 0%, 30%);
    text-decoration: none;
    height: 20px;
    position: relative;
    perspective: 700px;
  }
  
  .breadcrumbs li a:after {
    content: '';
    top : 6px;
    width: 8px;
    height: 8px;
    border-color: #333;
    border-style: solid;
    border-width: 1px 1px 0 0;
    outline: 1px solid transparent;
    position: absolute;
    right: 20px;
    -webkit-transition: all .15s ease;
       -moz-transition: all .15s ease;
        -ms-transition: all .15s ease;
            transition: all .15s ease;
    -webkit-transform: rotateZ(45deg) skew(10deg, 10deg);
       -moz-transform: rotateZ(45deg) skew(10deg, 10deg);
        -ms-transform: rotateZ(45deg) skew(10deg, 10deg);
            transform: rotateZ(45deg) skew(10deg, 10deg);
  }
  
  
  .breadcrumbs li a:hover:after {
    right: 15px;
    -webkit-transform: rotateZ(45deg) skew(-10deg, -10deg);
       -moz-transform: rotateZ(45deg) skew(-10deg, -10deg);
        -ms-transform: rotateZ(45deg) skew(-10deg, -10deg);
            transform: rotateZ(45deg) skew(-10deg, -10deg);
  }
  </style>

  <!-- Custom styles for this template -->
  <link rel="icon" type="image/png" href="http://localhost/edo/assets/img/favicons.png"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.20/af-2.3.4/b-1.6.1/b-colvis-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sl-1.3.1/datatables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>