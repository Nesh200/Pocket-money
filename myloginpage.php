<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
         body{
             background-image:url(light.jfif);
             background-repeat:no-repeat;
             background-size: cover;
             height: 100px;
         }
         * {
             box-sizing: border-box;
         }

        .main {

            align: center ;
            width: 20%;
         }
         .menuitem {
             padding: 8px;
             margin-top: 7px;
             border-bottom: 1px solid #f1f1f1;
         }
         .main {

             float: left;
             width: 60%;
             padding: 0 20px;
             overflow: hidden;
         }
         .right {
             background-color: lightblue;
             float: left;
             width: 20%;
             padding: 10px 15px;
             margin-top: 7px;
         }
         .menu {
             float: left;

         }

         @media only screen and (max-width:800px) {
             /* For tablets: */
             .main {
                 width: 80%;
                 padding: 0;
             }
             .right {
                 width: 100%;
             }
         }
         @media only screen and (max-width:500px) {
             /* For mobile phones: */
             .menu, .main, .right {
                 width: 100%;
             }
         }
     </style>
 </head>
 <body style="font-family:Verdana;">

 <div style="overflow:auto">
     <div class="menu">
         <div class="menuitem"><a href= "myprof.html">My profile</a></div>
         <div class="menuitem"><a href= "myaccount.php">My account</a></div>
         <div class="menuitem"><a href= "mytransactions.php">History</a></div>
         <div class="menuitem"><a href= "myaccount.php">My gallery</a></div>
         <div class="menuitem"><a href= "Sendmoney.php">Send cash</a></div>
     </div>

     <div class="main">
         <h2>My website</h2>
         <p>Welcome to my website!</p>
     </div>

     <div class="right">
         <h2>What you might want to know</h2>
         <p>This website was developed as demo</p>
         <h2>By who</h2>
         <p>Dev Nesh</p>
         <h2>Acknowledgement</h2>
         <p>Thanks to God for this far</p>
     </div>
 </div>
 <H2 style="color:white;">
     Please click here to see what Nesh has develeped for you to learn more about CSS, HTML AND JAVASCRIPT
    <p> <a href= "difplex.html">Learn cording here </a> <div class="menuitem"><a href= "logout.php">logout</a></div></p>
 </H2>
 <div style="background-color:#f1f1f1;text-align:center;padding:10px;margin-top:7px;font-size:12px;"> For any issues please contact: 0705043880</div>
 </div>
 </body>
 </html>
