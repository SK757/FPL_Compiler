// ===== Team Strength ====  
var strengthRows = document.getElementById("player_info").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
// loops through each row
for (i = 0; i < strengthRows.length; i++){cells = strengthRows[i].getElementsByTagName('td');
    if (cells[5].innerHTML >= '5300') {
        strengthRows[i].className = "t1";
    }
    if (cells[5].innerHTML >= '5200' && cells[5].innerHTML < '5300') {
        strengthRows[i].className = "t2";
    }
    if (cells[5].innerHTML >= '5000' && cells[5].innerHTML < '5200') {
        strengthRows[i].className = "t3";
    }
    if (cells[5].innerHTML >= '4700' && cells[5].innerHTML < '5000') {
        strengthRows[i].className = "t4";
    }
    if (cells[5].innerHTML >= '4550' && cells[5].innerHTML < '4700') {
        strengthRows[i].className = "t5";
    }
    if (cells[5].innerHTML >= '4400' && cells[5].innerHTML < '4550') {
        strengthRows[i].className = "t6";
    }
    if (cells[5].innerHTML >= '4250' && cells[5].innerHTML < '4400') {
        strengthRows[i].className = "t7";
    }
    if (cells[5].innerHTML >= '4000' && cells[5].innerHTML < '4250') {
        strengthRows[i].className = "t8";
    }
}