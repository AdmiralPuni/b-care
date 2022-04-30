//change the nav button to active according to url


$(document).ready(function() {
	var url = window.location.pathname;
	var filename = url.substring(url.lastIndexOf('/')+1);
	if(filename=="dashboard"){
        $("#nav-dashboard").addClass("active");
	}
    else if(filename=="profiles"){
        $("#nav-donor-list").addClass("active");
    }
    else if(filename=="blood"){
        $("#nav-blood").addClass("active");
    }
    else if(filename=="plasma"){
        $("#nav-plasma").addClass("active");
    }
    else if(filename=="stock"){
        $("#nav-stock").addClass("active");
    }
    else if(filename=="events"){
        $("#nav-events").addClass("active");
    }
    else if(filename=="reports"){
        $("#nav-report").addClass("active");
    }



    //add filename to window title
    var title = document.title;
    //capitalize filename
    filename = filename.charAt(0).toUpperCase() + filename.slice(1);


    title = filename + " | " + title;
    $("title").text(title);
});