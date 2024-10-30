function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

$(document).ready(function() {
	$(".send_btn").click(function() {
		var ip;
		var data = "";
		var name = $("#name").val();
		var number = $("#number").val();
		var region = $("#select-menu").val();
		const today = new Date();
		const day = String(today.getDate()).padStart(2, '0');
		const month = String(today.getMonth() + 1).padStart(2, '0');
		const year = today.getFullYear();
		var data = "";
		const formattedDate = `${day}.${month}.${year}`;
		var platform = navigator.platform
		if(name != "" && number != "" && region != "") {
			// (platform ? "Linux x86_64": platform = "Linux" : platform = "Windows")
			var data = `
		<b>Ism: ${name}</b>\n
<b>Raqam: ${number}</b>\n
<b>Region: ${region}</b>\n
<b>Sana: ${formattedDate}</b>\n
<b>Platform: ${platform}</b>
<b>Foydalanuvchi ${getCookie("count_view")} marta saytga tashrif buyurdi.</b>`;

		$.ajax({
			type: "GET",
			url: "https://api.telegram.org/bot7565234202:AAEoSJTfjAQqtrekKnwSnaWCaeq7Qx0mc0k/sendMessage",
			success: function(data) {
				console.log(data)
			},
			data: {
				text: data,
				chat_id: "6801113553",
				parse_mode: "HTML",
			},
			error: function(error) {
				console.log(error);
			}
		})
		}
	})
})