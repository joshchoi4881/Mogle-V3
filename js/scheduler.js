function mobile(x) {
    if(x.matches) { // If media query matches
        $("#sunday").html("S");
        $("#monday").html("M");
        $("#tuesday").html("T");
        $("#wednesday").html("W");
        $("#thursday").html("Th");
        $("#friday").html("F");
        $("#saturday").html("S");
    } else {
        $("#sunday").html("Sunday");
        $("#monday").html("Monday");
        $("#tuesday").html("Tuesday");
        $("#wednesday").html("Wednesday");
        $("#thursday").html("Thursday");
        $("#friday").html("Friday");
        $("#saturday").html("Sunday");
    }
}
var x = window.matchMedia("(max-width: 700px)")
mobile(x) // Call listener function at run time
x.addListener(mobile) 
let hours = 0;
let earnings = 0;
let variance = 0;
let premium = 0;
let color = "table-danger";
let button = "#DoorDash";
function clear() {
    hours = 0;
    earnings = 0;
    variance = 0;
    premium = 0;
    const clicked = $(".clicked");
    clicked.removeClass();
    clicked.addClass("block cell");
    clicked.html("");
    $("#hours").html(hours + " hours");
    $("#earnings").html("$" + earnings);
    $("#premium").html("$" + premium);
}
function getEstimate(platform, start_date, end_date, action) {
    $.ajax({
        method: "POST",
        url: "AJAX/HTTP/get_estimate.php",
        /*
        baseURL: "http://localhost:5000",
        url: "/get_estimate",
        */
        data: {
            location: $("#location").val(),
            platform: platform,
            start_date: start_date,
            end_date: end_date
        },
    }).then((response) => {
        response = JSON.parse(response);
        if(action == "a") {
            let wage = $("#earnings").html();
            wage = parseFloat(wage.substring(1));
            let estimate = response.estimate;
            let total = (wage + estimate).toFixed(2);
            $("#earnings").html("$" + total);
            variance += response.test_variance;
            getPremium(total, variance);
        }
        else if(action == "r") {
            let wage = $("#earnings").html();
            wage = parseFloat(wage.substring(1));
            let estimate = response.estimate;
            let total = (wage - estimate).toFixed(2);
            $("#earnings").html("$" + total);
            variance -= response.test_variance;
            getPremium(total, variance);
        }
    });
}
function getPremium(total, variance) {
    $.ajax({
        method: "POST",
        url: "AJAX/HTTP/get_premium.php",
        /*
        baseURL: "http://localhost:5000",
        url: "/get_premium",
        */
        data: {
            total: total,
            variance: variance
        },
    }).then((response) => {
        response = JSON.parse(response);
        let premium = response.premium;
        if(premium == undefined) {
            $("#premium").html("$" + 0);
        } else {
            $("#premium").html("$" + premium);
        }
    });
}
$(function() {
    $("#schedule").css({"background-color": "#800000", "color": "#fff"});
    $("#UberX").hide();
    $("#Uber_Eats").hide()
    $("#location").change(function() {
        clear();
        if($("#location").val() == "Kenosha;WI") {
            $(".gigs").hide();
            $("#DoorDash").show();
            $("#clear").show();  
            color = "table-danger";
            button = "#DoorDash";      
        }
        else if($("#location").val() == "Hackensack;NJ") {
            $(".gigs").hide();
            $("#DoorDash").show();   
            $("#clear").show();
            color = "table-danger";
            button = "#DoorDash";
        }
        else if($("#location").val() == "St. Louis;MO") {
            $(".gigs").hide();
            $("#DoorDash").show();    
            $("#clear").show();
            color = "table-danger";
            button = "#DoorDash";
        }
        else if($("#location").val() == "Ellicott City;MD") {
            $(".gigs").hide();
            $("#DoorDash").show();    
            $("#clear").show();
            color = "table-danger";
            button = "#DoorDash";
        }
        else if($("#location").val() == "North Bethesda;MD") {
            $(".gigs").hide();
            $("#DoorDash").show();    
            $("#clear").show();
            color = "table-danger";
            button = "#DoorDash";
        }
        else if($("#location").val() == "Baltimore;MD") {
            $(".gigs").hide();
            $("#DoorDash").show();    
            $("#clear").show();
            color = "table-danger";
            button = "#DoorDash";
        }
        else if($("#location").val() == "Catonsville;MD") {
            $(".gigs").hide();
            $("#DoorDash").show();    
            $("#clear").show();
            color = "table-danger";
            button = "#DoorDash";
        }
        else if($("#location").val() == "Los Angeles;CA") {
            $(".gigs").hide();
            $("#UberX").show();    
            $("#clear").show();
            color = "table-primary";
            button = "#UberX";
        }
        else if($("#location").val() == "Columbia;MD") {
            $(".gigs").hide();
            $("#Uber_Eats").show();    
            $("#clear").show();
            color = "table-success";
            button = "#Uber_Eats";
        }
    });
    $("#clear").click(function() {
        clear();
    });
    $("#hours").html(hours + " hours");
    $("#earnings").html("$" + earnings);
    $("#premium").html("$" + premium);
    $("#UberX").click(function() {
        color = "table-primary";
        button = "#UberX";
    });
    $("#Lyft").click(function() {
        color = "table-secondary";
        button = "#Lyft";
    });
    $("#Uber_Eats").click(function() {
        color = "table-success";
        button = "#Uber_Eats";
    });
    $("#Postmates").click(function() {
        color = "table-warning";
        button = "#Postmates";
    });
    $("#DoorDash").click(function() {
        color = "table-danger";
        button = "#DoorDash";
    });
    $("#Grubhub").click(function() {
        color = "table-info";
        button = "#Grubhub";
    });
    $(".cell").click(function() {
        let cellDate = $(this).attr("id");
        let cellArr = cellDate.split("+");
        let cellDay = cellArr[0];
        let cellHour = cellArr[1];
        let cellStart = "";
        let cellEnd = "";
        if(cellDay == "sunday") {
            cellStart += sunday;
            cellEnd += sunday;
        }
        else if(cellDay == "monday") {
            cellStart += monday;
            cellEnd += monday;
        }
        else if(cellDay == "tuesday") {
            cellStart += tuesday;
            cellEnd += tuesday;
        }
        else if(cellDay == "wednesday") {
            cellStart += wednesday;
            cellEnd += wednesday;
        }
        else if(cellDay == "thursday") {
            cellStart += thursday;
            cellEnd += thursday;
        }
        else if(cellDay == "friday") {
            cellStart += friday;
            cellEnd += friday;
        }
        else if(cellDay == "saturday") {
            cellStart += saturday;
            cellEnd += saturday;
        }
        cellStart += cellHour + ":00Z";
        if(cellHour == 23) {
            cellEnd = "";
            if(cellDay == "sunday") {
                cellEnd += monday + "00:00Z";
            }
            else if(cellDay == "monday") {
                cellEnd += tuesday + "00:00Z";
            }
            else if(cellDay == "tuesday") {
                cellEnd += wednesday + "00:00Z";
            }
            else if(cellDay == "wednesday") {
                cellEnd += thursday + "00:00Z";
            }
            else if(cellDay == "thursday") {
                cellEnd += friday + "00:00Z";
            }
            else if(cellDay == "friday") {
                cellEnd += saturday + "00:00Z";
            }
            else if(cellDay == "saturday") {
                cellEnd += nextSunday + "00:00Z";
            }
        } else {
            let num = (parseInt(cellHour) + 1);
            if(num < 10) {
                num = "0" + num;
            } else {
                num += "";
            }
            cellEnd += num + ":00Z";
        }
        $(this).toggleClass("clicked");
        if($(this).hasClass("clicked")) {
            if($(button).text() == "UberX") {
                getEstimate("UberX", cellStart, cellEnd, "a");
            }
            else if($(button).text() == "Lyft") {
                getEstimate("Lyft", cellStart, cellEnd, "a");
            }
            else if($(button).text() == "Uber Eats") {
                getEstimate("Uber_Eats", cellStart, cellEnd, "a");
            }
            else if($(button).text() == "DoorDash") {
                getEstimate("DoorDash", cellStart, cellEnd, "a");
            }
            else if($(button).text() == "Postmates") {
                getEstimate("Postmates", cellStart, cellEnd, "a");
            }
            else if($(button).text() == "Grubhub") {
                getEstimate("Grubhub", cellStart, cellEnd, "a");
            }
            $(this).addClass(color);
            $(this).html($(button).text());
            $("#hours").html(++hours + " hours");
        } else {
            if($(this).text() == "UberX") {
                getEstimate("UberX", cellStart, cellEnd, "r");
            }
            else if($(this).text() == "Lyft") {
                getEstimate("Lyft", cellStart, cellEnd, "r");
            }
            else if($(this).text() == "Uber Eats") {
                getEstimate("Uber_Eats", cellStart, cellEnd, "r");
            }
            else if($(this).text() == "DoorDash") {
                getEstimate("DoorDash", cellStart, cellEnd, "r");
            }
            else if($(this).text() == "Postmates") {
                getEstimate("Postmates", cellStart, cellEnd, "r");
            }
            else if($(this).text() == "Grubhub") {
                getEstimate("Grubhub", cellStart, cellEnd, "r");
            }
            $(this).removeClass();
            $(this).addClass("block cell");
            $(this).html("");
            $("#hours").html(--hours + " hours");
        }
    });
});