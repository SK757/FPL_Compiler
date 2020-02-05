function change() {
	$("#change_1").html('<i class="fas fa-minus"></i>');
	
	var one = document.getElementById("week_1").innerText;
	var two = document.getElementById("week_2").innerText;
	one = one.replace(/,/g, "");
	two = two.replace(/,/g, "");
	if (parseInt(one) > parseInt(two)) {
	    document.getElementById("change_2").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_2").innerHTML = "<i style='color: #ff2882 !important' class='fas fa-caret-down'></i>";
	}
	var three = document.getElementById("week_3").innerText;
	three = three.replace(/,/g, "");
	if (parseInt(two) > parseInt(three)) {
	    document.getElementById("change_3").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_3").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var four = document.getElementById("week_4").innerText;
	four = four.replace(/,/g, "");
	if (parseInt(three) > parseInt(four)) {
	    document.getElementById("change_4").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_4").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var five = document.getElementById("week_5").innerText;
	five = five.replace(/,/g, "");
	if (parseInt(four) > parseInt(five)) {
	    document.getElementById("change_5").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_5").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var six = document.getElementById("week_6").innerText;
	six = six.replace(/,/g, "");
	if (parseInt(five) > parseInt(six)) {
	    document.getElementById("change_6").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_6").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var seven = document.getElementById("week_7").innerText;
	seven = seven.replace(/,/g, "");
	if (parseInt(six) > parseInt(seven)) {
	    document.getElementById("change_7").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_7").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var eight = document.getElementById("week_8").innerText;
	eight = eight.replace(/,/g, "");
	if (parseInt(seven) > parseInt(eight)) {
	    document.getElementById("change_8").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_8").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var nine = document.getElementById("week_9").innerText;
	nine = nine.replace(/,/g, "");
	if (parseInt(eight) > parseInt(nine)) {
	    document.getElementById("change_9").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_9").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var ten = document.getElementById("week_10").innerText;
	ten = ten.replace(/,/g, "");
	if (parseInt(nine) > parseInt(ten)) {
	    document.getElementById("change_10").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_10").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var eleven = document.getElementById("week_11").innerText;
	eleven = eleven.replace(/,/g, "");
	if (parseInt(ten) > parseInt(eleven)) {
	    document.getElementById("change_11").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_11").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twelve = document.getElementById("week_12").innerText;
	twelve = twelve.replace(/,/g, "");
	if (parseInt(eleven) > parseInt(twelve)) {
	    document.getElementById("change_12").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_12").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirteen = document.getElementById("week_13").innerText;
	thirteen = thirteen.replace(/,/g, "");
	if (parseInt(twelve) > parseInt(thirteen)) {
	    document.getElementById("change_13").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_13").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var fourteen = document.getElementById("week_14").innerText;
	fourteen = fourteen.replace(/,/g, "");
	if (parseInt(thirteen) > parseInt(fourteen)) {
	    document.getElementById("change_14").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_14").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var fifteen = document.getElementById("week_15").innerText;
	fifteen = fifteen.replace(/,/g, "");
	if (parseInt(fourteen) > parseInt(fifteen)) {
	    document.getElementById("change_15").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_15").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var sixteen = document.getElementById("week_16").innerText;
	sixteen = sixteen.replace(/,/g, "");
	if (parseInt(fifteen) > parseInt(sixteen)) {
	    document.getElementById("change_16").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_16").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var seventeen = document.getElementById("week_17").innerText;
	seventeen = seventeen.replace(/,/g, "");
	if (parseInt(sixteen) > parseInt(seventeen)) {
	    document.getElementById("change_17").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_17").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var eighteen = document.getElementById("week_18").innerText;
	eighteen = eighteen.replace(/,/g, "");
	if (parseInt(seventeen) > parseInt(eighteen)) {
	    document.getElementById("change_18").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_18").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var nineteen = document.getElementById("week_19").innerText;
	nineteen = nineteen.replace(/,/g, "");
	if (parseInt(eighteen) > parseInt(nineteen)) {
	    document.getElementById("change_19").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_19").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twenty = document.getElementById("week_20").innerText;
	twenty = twenty.replace(/,/g, "");
	if (parseInt(nineteen) > parseInt(twenty)) {
	    document.getElementById("change_20").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_20").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentyone = document.getElementById("week_21").innerText;
	twentyone = twentyone.replace(/,/g, "");
	if (parseInt(twenty) > parseInt(twentyone)) {
	    document.getElementById("change_").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_21").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentytwo = document.getElementById("week_22").innerText;
	twentytwo = twentytwo.replace(/,/g, "");
	if (parseInt(twentyone) > parseInt(twentytwo)) {
	    document.getElementById("change_22").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_22").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentythree = document.getElementById("week_23").innerText;
	twentythree = twentythree.replace(/,/g, "");
	if (parseInt(twentytwo) > parseInt(twentythree)) {
	    document.getElementById("change_23").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_23").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentyfour = document.getElementById("week_24").innerText;
	twentyfour = twentyfour.replace(/,/g, "");
	if (parseInt(twentythree) > parseInt(twentyfour)) {
	    document.getElementById("change_24").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_24").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentyfive = document.getElementById("week_25").innerText;
	twentyfive = twentyfive.replace(/,/g, "");
	if (parseInt(twentyfour) > parseInt(twentyfive)) {
	    document.getElementById("change_25").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_25").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentysix = document.getElementById("week_26").innerText;
	twentysix = twentysix.replace(/,/g, "");
	if (parseInt(twentyfive) > parseInt(twentysix)) {
	    document.getElementById("change_26").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_26").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentyseven = document.getElementById("week_27").innerText;
	twentyseven = twentyseven.replace(/,/g, "");
	if (parseInt(twentysix) > parseInt(twentyseven)) {
	    document.getElementById("change_27").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_27").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentyeight = document.getElementById("week_28").innerText;
	twentyeight = twentyeight.replace(/,/g, "");
	if (parseInt(twentyseven) > parseInt(twentyeight)) {
	    document.getElementById("change_28").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_28").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var twentynine = document.getElementById("week_29").innerText;
	twentynine = twentynine.replace(/,/g, "");
	if (parseInt(twentyeight) > parseInt(twentynine)) {
	    document.getElementById("change_29").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_29").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirty = document.getElementById("week_30").innerText;
	thirty = thirty.replace(/,/g, "");
	if (parseInt(twentynine) > parseInt(thirty)) {
	    document.getElementById("change_30").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_30").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtyone = document.getElementById("week_31").innerText;
	thirtyone = thirtyone.replace(/,/g, "");
	if (parseInt(thirty) > parseInt(thirtyone)) {
	    document.getElementById("change_31").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_31").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtytwo = document.getElementById("week_32").innerText;
	thirtytwo = thirtytwo.replace(/,/g, "");
	if (parseInt(thirtyone) > parseInt(thirtytwo)) {
	    document.getElementById("change_32").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_32").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtythree = document.getElementById("week_33").innerText;
	thirtythree = thirtythree.replace(/,/g, "");
	if (parseInt(thirtytwo) > parseInt(thirtythree)) {
	    document.getElementById("change_33").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_33").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtyfour = document.getElementById("week_34").innerText;
	thirtyfour = thirtyfour.replace(/,/g, "");
	if (parseInt(thirtythree) > parseInt(thirtyfour)) {
	    document.getElementById("change_34").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_34").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtyfive = document.getElementById("week_35").innerText;
	thirtyfive = thirtyfive.replace(/,/g, "");
	if (parseInt(thirtyfour) > parseInt(thirtyfive)) {
	    document.getElementById("change_35").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_35").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtysix = document.getElementById("week_36").innerText;
	thirtysix = thirtysix.replace(/,/g, "");
	if (parseInt(thirtyfive) > parseInt(thirtysix)) {
	    document.getElementById("change_36").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_36").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtyseven = document.getElementById("week_37").innerText;
	thirtyseven = thirtyseven.replace(/,/g, "");
	if (parseInt(thirtysix) > parseInt(thirtyseven)) {
	    document.getElementById("change_37").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_37").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}
	var thirtyeight = document.getElementById("week_38").innerText;
	thirtyeight = thirtyeight.replace(/,/g, "");
	if (parseInt(thirtyseven) > parseInt(thirtyeight)) {
	    document.getElementById("change_38").innerHTML = "<i style='color: #00e187' class='fas fa-caret-up'></i>";
	} else {
	    document.getElementById("change_38").innerHTML = "<i style='color: #ff2882' class='fas fa-caret-down'></i>";
	}	
}