function timer()
	{
		var today = new Date();
		var day	= today.getDate();
		var month = today.getMonth() + 1;
		var year = today.getFullYear();
		var hour = today.getHours();
		if (hour < 10) hour = "0" + hour;
		var minute = today.getMinutes();
		if (minute < 10) minute = "0" + minute;
		var sec = today.getSeconds();
		if (sec < 10) sec = "0" + sec;
		
		document.getElementById("timer").innerHTML = day + "/" + month + "/" + year + "   " + hour + ":" + minute + ":" + sec;
		
		setTimeout("timer()", 1000);
	}