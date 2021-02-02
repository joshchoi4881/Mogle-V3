<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Income Stability for Freelancers">
        <meta name="keywords" content="Mogle">
        <meta name="author" content="Josh Choi">
        <title>Mogle</title>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Webflow" name="generator">
        <link href="css/mogle.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
        <link href="css/normalize.css" rel="stylesheet" type="text/css">
        <link href="css/webflow.css" rel="stylesheet" type="text/css">
        <link href="css/mogle.webflow.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
        <script type="text/javascript">WebFont.load({  google: {    families: ["Ovo:regular"]  }});</script>
        <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
        <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
        <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
        <link href="images/webclip.png" rel="apple-touch-icon">
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Global site tag (gtag.js) - Google Analytics 1 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138974831-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-138974831-2');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics 2 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-4B3QS6PGZN"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-4B3QS6PGZN');
        </script>
        <!-- Start of HubSpot Embed Code -->
        <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/9028548.js"></script>
        <!-- End of HubSpot Embed Code -->
    </head>
    <body>
        <header id="nav" class="sticky-nav">
            <div>
                <ul role="list" class="nav-grid w-list-unstyled">
                    <li id="w-node-f042de250a67-0b8a3ee6" class="list-item">
                        <a href="index.html" class="nav-logo-link w-inline-block"><img src="images/Mogle-Logo-White.png" sizes="(max-width: 479px) 153.796875px, 156.40625px" srcset="images/Mogle-Logo-White-p-500.png 500w, images/Mogle-Logo-White-p-800.png 800w, images/Mogle-Logo-White-p-1080.png 1080w, images/Mogle-Logo-White-p-1600.png 1600w, images/Mogle-Logo-White-p-2000.png 2000w, images/Mogle-Logo-White-p-2600.png 2600w, images/Mogle-Logo-White.png 3582w" alt="" class="nav-logo"></a>
                    </li>
                    <li class="list-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="list-item">
                        <a href="analytics.php" class="nav-link">Analytics</a>
                    </li>
                    <li>
                        <a href="scheduler.php" class="nav-link">Scheduler</a>
                    </li>
                    <li>
                        <a href="waitlist.php" class="nav-link">Join Waitlist</a>
                    </li>
                </ul>
            </div>
        </header>
        <section class="center">
            <div class="card">
                <h1 class="ovo">Waitlist*</h1>
                <p class="gilroy">*For a limited time only, we are offering a free week of earnings insurance (no premium payment required) for new <b style="color:red;">DoorDash</b> users who sign up on the waitlist.</p>
                <p class="gilroy">Enter your email to join our waitlist.</p>
                <input id="email" class="gilroy" type="email"/>
                <br/>
                <p class="gilroy">First Name:</p>
                <input id="firstName" class="gilroy" type="text"/>
                <br/>
                <p class="gilroy">Last Name:</p>
                <input id="lastName" class="gilroy" type="text"/>
                <br/>
                <p class="gilroy">Which features would you like to be on the waitlist for?</p>
                <br/>
                <div class="left">
                    <input type="checkbox" id="newsletter" name="newsletter" value="Newsletter">
                    <label class="label gilroy" for="newsletter"> Newsletter: we'll email you three new freelance opportunities every week, as well as freelance-related news.</label>
                    <br/>
                    <input type="checkbox" id="analytics" name="analytics" value="Analytics">
                    <label class="label gilroy" for="analytics"> <a href="analytics.php">Analytics</a>: we'll analyze your earnings data and help you find patterns in your income to optimize it.</label>
                    <br>
                    <input type="checkbox" id="scheduler" name="scheduler" value="Scheduler">
                    <label class="label gilroy" for="scheduler"> <a href="scheduler.php">Scheduler</a>: we'll start conducting wage insurance in your city.</label>
                </div>
                <br>
                <p class="gilroy">Which platforms do you currently use?</p>
                <br/>
                <div class="left">
                    <input type="checkbox" id="Uber" name="Uber" value="Uber">
                    <label class="label gilroy" for="Uber"> Uber</label>
                    <br/>
                    <input type="checkbox" id="Lyft" name="Lyft" value="Lyft">
                    <label class="label gilroy" for="Lyft"> Lyft</label>
                    <br>
                    <input type="checkbox" id="Uber_Eats" name="Uber_Eats" value="Uber_Eats">
                    <label class="label gilroy" for="Uber_Eats"> Uber Eats</label>
                    <br>
                    <input type="checkbox" id="Postmates" name="Postmates" value="Postmates">
                    <label class="label gilroy" for="Postmates"> Postmates</label>
                    <br>
                    <input type="checkbox" id="DoorDash" name="DoorDash" value="DoorDash">
                    <label class="label gilroy" for="DoorDash"> DoorDash</label>
                    <br>
                    <input type="checkbox" id="Grubhub" name="Grubhub" value="Grubhub">
                    <label class="label gilroy" for="Grubhub"> Grubhub</label>
                    <br>
                    <input type="checkbox" id="Instacart" name="Instacart" value="Instacart">
                    <label class="label gilroy" for="Instacart"> Instacart</label>
                    <br>
                    <input type="checkbox" id="Shipt" name="Shipt" value="Shipt">
                    <label class="label gilroy" for="Shipt"> Shipt</label>
                    <br>
                    <input type="checkbox" id="other" name="other" value="other">
                    <label class="label gilroy" for="other"> Other</label>
                    <br/>
                    <div id="otherDiv" style="display:none;">
                        <p class="gilroy">Other: </p>
                        <input id="otherPlatform" class="gilroy" type="text"/>
                    </div>
                </div>
                <br/>
                <p class="gilroy">City: </p>
                <input id="city" class="gilroy" type="text"/>
                <br/>
                <p class="gilroy">State: </p>
                <select id="state" class="gilroy">
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <br/>
                <div class="buttons">
                    <button onclick="saveEmail()" class="btn btn-success gilroy">Join</button>
                </div>
                <br/>
                <p id="response" class="gilroy"></p>
            </div>
		</section>
        <script>
            $(function() {
                $("#other").change(function() {
                    if($(this).is(":checked")) {
                        $("#otherDiv").show();
                    } else {
                        $("#otherPlatform").val("");
                        $("#otherDiv").hide();
                    }
                });
            });
        </script>
        <script src="js/mogle.js"></script>
        <script src="js/waitlist.js"></script>
    </body>
</html>