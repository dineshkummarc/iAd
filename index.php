<?php

/* detect Mobile Safari */

$browserAsString = $_SERVER['HTTP_USER_AGENT'];

if (strstr($browserAsString, " AppleWebKit/") && strstr($browserAsString, " Mobile/"))
{
    $browserIsMobileSafari = true;
    header("Location: iad.php");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=7" />

    <meta name="viewport" content="user-scalable=no, width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <title>What could an iAd look like?</title>

    <script src="javascripts/jquery.min.1.4.js" type="text/javascript" charset="utf-8"></script>
    <script src="javascripts/functions.js" type="text/javascript" charset="utf-8"></script>
    <script src="javascripts/application.js" type="text/javascript" charset="utf-8"></script>

    <style type="text/css" media="screen">
        @font-face {
        	font-family: 'Museo700';
        	src: url('fonts/museo700-regular-webfont.eot');
        	src: local('☺'), url('fonts/museo700-regular-webfont.woff') format('woff'), url('fonts/museo700-regular-webfont.ttf') format('truetype'), url('fonts/museo700-regular-webfont.svg#webfont') format('svg');
        	font-weight: normal;
        	font-style: normal;
        }
        
        body {
            background: #000 url('images/bg.jpg') no-repeat scroll top left;
            color: #fff;
            font-family: "Neue Helvetica", sans-serif;
        	margin:0;
        	padding:0;
        	font-size:18px;
        	line-height:1.5;
        }
        
        a,
        a:focus
        a:hover {
            color:#f00;
        }
        
        .columns {
            width: 820px;
            margin: 10px auto 10px auto;
        }
        
        header {
            display:block;
        }
        
        h1 {
            font-family: 'Museo700';
            font-size:67px;
            color:#fff;
        	line-height:1.0;
        	text-align:center;
        	text-shadow: 2px 2px 2px #000;
        }

        .clearfix {
            overflow:hidden;
            _zoom:1;
        }
        
        .col-1 {
            float:left;
            width:470px;
        }
        
        .col-1 #iphone {
            background: url('images/iphone-vertical.png') no-repeat scroll top left;
            width: 463px;
            height: 807px;
        }
        
        .col-1 #iphone #iframe {
            margin: 120px 0 0 70px;
            border:2px solid #000;
        }
        
        .col-2 {
            float:left;
            width:350px;            
        }
        
        .col-2 p {
        }
        
        .col-2 ul {
            list-style-type:square;
        }
        
        ul#socialmedia {
            list-style-type:none;
            padding:0;
        }
        
        ul#socialmedia li {
            float:left;
            margin-left:0px;
            padding:0;
        }  

        footer {
            display:block;
            margin-top:70px;
            font-size:12px;
            color:#313131;
        }

        footer a,
        footer a:focus,
        footer a:hover {
            color:#313131;
        }
        
        img {
            border:none;
        }
    </style>
</head>
<body>
    <header>
        <h1>What could an iAd look like?</h1>
    </header>
    <div class="columns">
        <div class="clearfix">
            <div class="col-1">
                <div id="iphone">
                    <iframe id="iframe" src="iad.php" width="320px" height="480px" border="0px"></iframe>
                </div>
            </div>
            <div class="col-2">
                <p>
                    iAds will be served in apps on iPhones, iPods and iPads. Thus publishers of apps open an advertisment channel
                    to one of the most attractive peer group in the advertising market. 
                </p>
                <p>
                    These ads leverage the possibilites of HTML5 to create a lasting impression. As we have shown <a href="http://9elements.com/io/?p=153">once</a>, HTML5 is an amazing technology.
                    So what's the buzz with HTML5? As you might have heard apples mobile operating system does not support flash. So these
                    ads are created using pure HTML5/CSS3 and javascript.
                </p>
                <p>
                    So if you need someone to create some cutting edge HTML5 stuff - <a href="mailto:contact@9elements.com">just drop us a line</a>.
                </p>
                <p>
                    If your technically interested in how this as was done - we're sharing the source at github.
                </p>

                <ul id="socialmedia" class="clearfix">
                    <li id="rss"><a href="http://9elements.com/io" title="subscribe to our RSS feed"><img src="images/icons/rss.png" alt="subscribe to our RSS feed"/></a></li>
                    <li id="facebook"><a href="http://facebook.com/9elements" title="become a fan on facebook"><img src="images/icons/facebook.png" alt="become a fan on facebook" /></a></li>
                    <li id="twitter"><a href="http://twitter.com/9elements" title="follow us on twitter"><img src="images/icons/twitter.png" alt="follow us on twitter" /></a></li>
                </ul>
            </div>
        </div>
        <footer>
            "What could an iAd look like?" is a 9elements production &copy; 2010. Header font by <a href="http://www.exljbris.nl">Jos Buivenga</a>.
        </footer>
    </div>
</body>
</html>
