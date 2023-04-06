$(document).ready(function () {
	change();
});
function change() {
	$("table tbody tr").get().reduce(function(prevVal, tr, i) {
	    var $tds = $(tr).find('td'),
	        val = Number($tds.eq(6).text().replace(/,/g, ""))
			if (val < prevVal) {
				$tds.eq(8).html("<i style='color: #00e187' class='fas fa-caret-up'></i>");
			} 
			if (val > prevVal) {
				$tds.eq(8).html("<i style='color: #ff2882 !important' class='fas fa-caret-down'></i>");
			}
			if (i === 0) {
				$tds.eq(8).html("<i class='fas fa-minus'></i>");
			}
		return val;
	}, 0);
}
