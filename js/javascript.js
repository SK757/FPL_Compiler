$(document).ready(function () {
	$(".loadWrapper").hide();
	$("main").show();
	availability();
	notAvailable();
});

$("#advanced-btn").click(function() {
	$(".advanced").toggle();
  	$("#basic-btn").toggle();
  	$("#advanced-btn").toggle();
  	$(".clean_sheets").addClass("end-border");
  	$(".clean_sheets_stat").addClass("end-border");
});

$("#basic-btn").click(function() {
  	$(".advanced").toggle();
  	$("#basic-btn").toggle();
  	$("#advanced-btn").toggle();
  	$(".clean_sheets").removeClass("end-border");
  	$(".clean_sheets_stat").removeClass("end-border");
});


// ===== Scroll to Top Desktop/Mobile ====  
$('#return-to-top').click(function() {      // When arrow is clicked
    var rowpos = $('#player_info td:first-child').position();
	$('#table_cont').scrollTop(rowpos.top);
    $('body,html').animate({
        scrollTop : 0// Scroll to top of body
    }, 350);
});


// ===== Player Availability ==== 
function availability() {
	var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	// loops through each row 
	for (i = 0; i < rows.length; i++){cells = rows[i].getElementsByTagName('td');
	    if (cells[0].innerHTML === '0') {
	        rows[i].classList.add('zero');
	    }
	    if (cells[0].innerHTML === '25') {
	        rows[i].classList.add('twentyfive'); 
	    }
	    if (cells[0].innerHTML === '50') {
	        rows[i].classList.add('fifty'); 
	    }
	    if (cells[0].innerHTML === '75') {
	        rows[i].classList.add('seventyfive');         
	    }
	}
}

// ===== Player Not Available ==== 
function notAvailable() {
	$("tr:contains('Loan'), tr:contains('loan'), tr:contains('Joined'), tr:contains('Contract'), tr:contains('Transferred'), tr:contains('Not included in'), tr:contains('Left'), tr:contains('Retired'), tr:contains('Recalled'), tr:contains('Permanent'), tr:contains('permanent')").addClass("filterPosition");
}


// ===== Filter Goalkeeper ==== 
function keeper() {
	availability();
	var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	for (i = 0; i < rows.length; i++){cells = rows[i].getElementsByTagName('td');
	    if (cells[1].innerHTML.indexOf('GK') != -1) {
	        rows[i].classList.remove("filterPosition");
	    } else {
	    	rows[i].className = "filterPosition";
	    }
	}
	notAvailable();
}
// ===== Filter Defender ==== 
function defender() {
	availability();
	var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	for (i = 0; i < rows.length; i++){cells = rows[i].getElementsByTagName('td');
	    if (cells[1].innerHTML.indexOf('DEF') != -1) {
	        rows[i].classList.remove("filterPosition");
	    } else {
	    	rows[i].className = "filterPosition";
	    }
	}
	notAvailable();
}
// ===== Filter Midfielder ==== 
function midfielder() {
	availability();
	var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	for (i = 0; i < rows.length; i++){cells = rows[i].getElementsByTagName('td');
	    if (cells[1].innerHTML.indexOf('MID') != -1) {
	        rows[i].classList.remove("filterPosition");
	    } else {
	    	rows[i].className = "filterPosition";
	    }
	}
	notAvailable();
}
// ===== Filter Forward ==== 
function forward() {
	availability();
	var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	for (i = 0; i < rows.length; i++){cells = rows[i].getElementsByTagName('td');
	    if (cells[1].innerHTML.indexOf('FWD') != -1) {
	        rows[i].classList.remove("filterPosition");
	    } else {
	    	rows[i].className = "filterPosition";
	    }
	}
	notAvailable();
}
// ===== Reset Table to Default ==== 
function reload() {
	var rows = document.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
	for (i = 0; i < rows.length; i++){cells = rows[i].getElementsByTagName('td');
	        rows[i].classList.remove("filterPosition");
	}
	availability();
	notAvailable();
}

// ===== Player Search ====
function search() {
	// Declare variables 
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	table = document.getElementById("player_info");
	tr = table.getElementsByTagName("tr");

	// Loop through all table rows, and hide those who don't match the search query
	for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[1];
		if (td) {
			txtValue = td.textContent.normalize('NFD').replace(/[\u0300-\u036f]/g, '') || td.innerText.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			} else {
				tr[i].style.display = "none";
			}
		} 
	}
}

// ===== Shorten Headers if Small Viewport ==== 
function headers(x) {
	if (x.matches) { // If media query matches
		$(".points").html("<span>TP </span>");
		$(".ppg").html("<span>PPG </span>");
		$(".gwp").html("<span>GWP </span>");
		$(".xpt").html("<span>XPT </span>");
		$(".xpn").html("<span>XPN </span>");
		$(".goals").html("<span>GS </span>");
		$(".assists").html("<span>A </span>");
		$(".clean_sheets").html("<span>CS </span>");
		$(".price_c").html("<span>PC </span>");
		$(".selec").html("<span>TSB </span>");
		$(".min").html("<span>Min </span>");
		$(".in").html("<span>In </span>");
		$(".out").html("<span>Out </span>");
		$(".gc").html("<span>GC </span>");
		$(".og").html("<span>OG </span>");
		$(".pens_s").html("<span>PS </span>");
		$(".pens_m").html("<span>PM </span>");
		$(".yc").html("<span>YC </span>");
		$(".rc").html("<span>RC </span>");
		$(".bonus").html("<span>BP </span>");
		$(".bps").html("<span>BPS </span>");
		$(".inf").html("<span>I </span>");
		$(".cre").html("<span>C </span>");
		$(".thr").html("<span>T </span>");
		$(".ict").html("<span>ICT<br></span>");
		$(".basic").html("<span><b>Basic</b>");
		$(".adv").html("<span><b>Advanced</b>");
		$(".goals2").html("<span>G/A/CS");
		$(".gwga").html("<span>GW G/A");
	} else {
	// ===== Extend Headers if Large Viewport ====
		$(".points").html("<span>Total Points </span>");
		$(".ppg").html("<span>Points Per Game </span>");
		$(".gwp").html("<span>Gameweek Points </span>");
		$(".xpt").html("<span>EXPoints This GW </span>");
		$(".xpn").html("<span>EXPoints Next GW </span>");
		$(".goals").html("<span>Goals </span>");
		$(".assists").html("<span>Assists </span>");
		$(".clean_sheets").html("<span>Clean Sheets </span>");
		$(".price_c").html("<span>Price Change </span>");
		$(".selec").html("<span>Selected </span>");
		$(".min").html("<span>Minutes </span>");
		$(".in").html("<span>Transfers In </span>");
		$(".out").html("<span>Transfers Out </span>");
		$(".gc").html("<span>Goals Conceded </span>");
		$(".og").html("<span>Own Goal </span>");
		$(".pens_s").html("<span>Pens Saved </span>");
		$(".pens_m").html("<span>Pens Missed </span>");
		$(".yc").html("<span>Yellow Cards </span>");
		$(".rc").html("<span>Red Cards </span>");
		$(".bonus").html("<span>Bonus Points </span>");
		$(".bps").html("<span>BPS Score </span>");
		$(".inf").html("<span>Influence </span>");
		$(".cre").html("<span>Creativity </span>");
		$(".thr").html("<span>Threat </span>");
		$(".ict").html("<span>ICT Index </span>");
		$(".basic").html("<span><b>Basic View</b>");
		$(".adv").html("<span><b>Advanced View</b>");
		$(".goals2").html("<span>Goals/Assists/Clean Sheets");
		$(".gwga").html("<span>Gameweek Goals/Assists");
	}
}
// function totalPoints() {
// 	var a = document.getElementById("player_0").innerText;
//     var b = document.getElementById("player_1").innerText;
//     var c = document.getElementById("player_2").innerText;
//     var d = document.getElementById("player_3").innerText;
//     var e = document.getElementById("player_4").innerText;
//     var f = document.getElementById("player_5").innerText;
//     var g = document.getElementById("player_6").innerText;
//     var h = document.getElementById("player_7").innerText;
//     var i = document.getElementById("player_8").innerText;
//     var j = document.getElementById("player_9").innerText;
//     var k = document.getElementById("player_10").innerText;
//     // BENCH
//     var l = document.getElementById("player_11").innerText;
//     var m = document.getElementById("player_12").innerText;
//     var n = document.getElementById("player_13").innerText;
//     var o = document.getElementById("player_14").innerText;

//     if (document.getElementById("chip").innerText === '(bboost)') {
//     	var z = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j) + parseInt(k) + parseInt(l) + parseInt(m) + parseInt(n) + parseInt(o);
// 	    document.getElementById("score").insertAdjacentHTML('beforeend', z);
// 		document.getElementById("player_11").insertAdjacentHTML('beforeend', ' (bb)');
// 	    document.getElementById("player_12").insertAdjacentHTML('beforeend', ' (bb)');
// 	    document.getElementById("player_13").insertAdjacentHTML('beforeend', ' (bb)');
// 	    document.getElementById("player_14").insertAdjacentHTML('beforeend', ' (bb)');
// 	} else {
//     	var x = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f) + parseInt(g) + parseInt(h) + parseInt(i) + parseInt(j) + parseInt(k);
// 	    document.getElementById("score").insertAdjacentHTML('beforeend', x);
// 		document.getElementById("player_11").insertAdjacentHTML('beforeend', ' (b)');
// 	    document.getElementById("player_12").insertAdjacentHTML('beforeend', ' (b)');
// 	    document.getElementById("player_13").insertAdjacentHTML('beforeend', ' (b)');
// 	    document.getElementById("player_14").insertAdjacentHTML('beforeend', ' (b)');
// 	}
// }
var x = window.matchMedia("(max-width: 899px)");
headers(x); // Call listener function at run time
x.addListener(headers); // Attach listener function on state changes
