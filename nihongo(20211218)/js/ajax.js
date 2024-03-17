
$(document).ready(function() {

    $("#submitExample").click(function() {
		$.ajax({
					url: "Ajax/jisiyo/ajax_all.php",
					dataType: "json",
					method:"POST",
					data:{word: $("#word").val()},
					success: function(data) {
                if (data.word) { //如果後端回傳 json 資料有 word
                    $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
					// <font color="#007500">て形變化為</font>
                    $("#result").html('<table><font color="yellow">' + data.word + '</font></table>');
                } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                    $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
                    $("#result").html('<font color="#yellow">' + data.errorMsg + '</font>');
                }
            },
            error: function(jqXHR) {
                $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
                $("#result").html('<font color="#yellow">發生錯誤：' + jqXHR.status + '</font>');
            }
		})
	})

	$("#submitExample1").click(function() {
		$.ajax({
					url: "Ajax/masu/ajax_all1.php",
					dataType: "json",
					method:"POST",
					data:{word: $("#word1").val()},
					success: function(data) {
                if (data.word) { //如果後端回傳 json 資料有 word
                    $("#demo1")[0].reset(); //重設 ID 為 demo 的 form (表單)
					// <font color="#007500">て形變化為</font>
                    $("#result1").html('<table><font color="yellow">' + data.word + '</font></table>');
                } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                    $("#demo1")[0].reset(); //重設 ID 為 demo 的 form (表單)
                    $("#result1").html('<font color="#yellow">' + data.errorMsg + '</font>');
                }
            },
            error: function(jqXHR) {
                $("#demo1")[0].reset(); //重設 ID 為 demo 的 form (表單)
                $("#result1").html('<font color="#yellow">發生錯誤：' + jqXHR.status + '</font>');
            }
		})
	})

   
});
