<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
		<script src="https://code.jquery.com:443/jquery-3.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com:443/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com:443/charts/loader.js"></script>
		<script src="https://cdn.zingchart.com:443/zingchart.min.js"></script>
		<script src="https://ajax.googleapis.com:443/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
		<script type="text/javascript" src="https://code.jquery.com:443/jquery-2.1.4.js"></script> 
		<script src="/SRC2/multiselect/jquery.multiselect.js"></script> 
		<link rel="stylesheet" href="../css/style.css" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com:443/bootstrap/3.3.2/css/bootstrap.min.css">
		<script src="https://code.jquery.com:443/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com:443/ui/1.12.1/jquery-ui.js"></script>
		<style>
			@import url('http://fonts.googleapis.com/earlyaccess/nanumgothic.css');
			@import url(https://cdn.jsdelivr.net/gh/moonspam/NanumSquare@1.0/nanumsquare.css);
			@import url('http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css');
			body {
				color: #5D5F63;
				font-family: 'Nanum Gothic', sans-serif;
				padding: 0;
				margin: 0;
				text-rendering: optimizeLegibility;
				-webkit-font-smoothing: antialiased;
			}
			
		</style>
		<script>
			function opSearch(opChk) {
				var opArr = opChk.split(',');
				var len = opArr.length;
				var chk1 = chk2 = chk3 = chk4 = chk5 = chk6 = 0;
				
				if (len == 1) {
					alert(opArr[0]);
				}
				
				for(var i=0; i<len; i++) {
					if (opArr[i] === '1') {
						$('#oYear').show();
						chk1 = 1;
					} else if (opArr[i] === '2') {
						$('#oTitle').show();
						chk2 = 1;
					} else if (opArr[i] === '3') {
						$('#oGrade').show();
						chk3 = 1;
					} else if (opArr[i] === '4') {
						$('#oDepart').show();
						chk4 = 1;
					} else if (opArr[i] === '5') {
						$('#oLevel').show();
						chk5 = 1;
					} else if (opArr[i] === '6') {
						$('#oTeam').show();
						chk6 = 1;
					} else {	
						break;
					}
				}
				
				if (chk1 != 1) {	$('#oYear').hide();		}
				if (chk2 != 1) {	$('#oTitle').hide();	}
				if (chk3 != 1) {	$('#oGrade').hide();	}
				if (chk4 != 1) {	$('#oDepart').hide();	}
				if (chk5 != 1) {	$('#oLevel').hide();	}
				if (chk6 != 1) {	$('#oTeam').hide();		}
			}
		
			function finalpercent() {
				var name = document.getElementById('realName').value;		// �Էµ� �̸�
				var year = document.getElementById('year').value;			// �򰡳⵵
				var title = document.getElementById('title').value;			// ��å��
				var grade = document.getElementById('grade').value;			// ���޺�
				var depart = document.getElementById('depart').value;		// �ι���
				var level = document.getElementById('level').value;			// ������
				var team = document.getElementById('team').value;			// �μ���

	   			$.ajax({
	   				type : "GET",
					url : "../agregado/distPercent.php?name="+name+"&year="+year+"&title="+title+"&grade="+grade+"&depart="+depart+"&level="+level+"&team="+team,
	   				//url : "../view/test.php?name="+name+"&year="+year+"&title="+title+"&grade="+grade+"&depart="+depart+"&level="+level+"&team="+team,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('distReselt').innerHTML = idata;
	   				}
	   			});
	   			
			} 
			
			function percentDown() {
				var table = "percentTable";
	   			var name = "percentDown";
	   			var uri = 'data:application/vnd.ms-excel;base64,',
	   			template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   			base64 = function(s) {
	   				return window.btoa(unescape(encodeURIComponent(s)))
	   			}, format = function(s, c) {
	   				return s.replace(/{(\w+)}/g, function(m, p) {
	   					return c[p];
	   				})
	   			}
	   			percentDownExcel(table, name, uri, template, base64, format);
			}
			
			function percentDownExcel(table, name, uri, template, base64, format) {
				if (!table.nodeType)
					table = document.getElementById(table)
				var ctx = {
					worksheet : name || 'Worksheet',
					table : table.innerHTML
				}
				var a = document.createElement('a');
				a.href = uri + base64(format(template, ctx))
				a.download = name + '.xls';
				a.click();
				setTimeout('window.close()', 500);
			}
			
			function finalgrade() {
				var name = document.getElementById('realName').value;		// �Էµ� �̸�
				var year = document.getElementById('year').value;			// �򰡳⵵
				var title = document.getElementById('title').value;			// ��å��
				var grade = document.getElementById('grade').value;			// ���޺�
				var depart = document.getElementById('depart').value;		// �ι���
				var level = document.getElementById('level').value;			// ������
				var team = document.getElementById('team').value;			// �μ���

	   			$.ajax({
	   				type : "GET",
					//url : "../view/text.php?name="+name+"&year="+year+"&title="+title+"&grade="+grade+"&depart="+depart+"&level="+level+"&team="+team,
	   				url : "../view/test.php?name="+name+"&year="+year+"&title="+title+"&grade="+grade+"&depart="+depart+"&level="+level+"&team="+team,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('distReselt').innerHTML = idata;
	   				}
	   			});
			}
			
			function gradeDown() {
				var table = "gradeTable";
	   			var name = "gradeDown";
	   			var uri = 'data:application/vnd.ms-excel;base64,',
	   			template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   			base64 = function(s) {
	   				return window.btoa(unescape(encodeURIComponent(s)))
	   			}, format = function(s, c) {
	   				return s.replace(/{(\w+)}/g, function(m, p) {
	   					return c[p];
	   				})
	   			}
	   			gradeDownExcel(table, name, uri, template, base64, format);
			}
			
			function gradeDownExcel(table, name, uri, template, base64, format) {
				if (!table.nodeType)
					table = document.getElementById(table)
				var ctx = {
					worksheet : name || 'Worksheet',
					table : table.innerHTML
				}
				var a = document.createElement('a');
				a.href = uri + base64(format(template, ctx))
				a.download = name + '.xls';
				a.click();
				setTimeout('window.close()', 500);
			}
			
			function memberTable() {
	   			$.ajax({
	   				type : "GET",
	   				url : "../main/memberTable.php",
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('tablemodi').innerHTML = idata;
	   				}
	   			});
			}	

	   		function leaderTable() {
		   		$.ajax({
		   			type : "GET",
		   			url : "../main/leaderTable.php",
		   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
		   			success : function(idata) {
		   				document.getElementById('tablemodi').innerHTML = idata;
					}
				});
			}

	   		function achselfmodi() {
		   		$('#achSelfView').hide();
		   		$('#achSelfModi').show();
			}

	   		function achfeedmodi() {
		   		$('#achFeedView').hide();
	   			$('#achFeedModi').show();
	   		}

	   		function capaselfmodi() {
		   		$('#capaSelfView').hide();
	   			$('#capaSelfModi').show();
	   		}

	   		function capafeedmodi() {
		   		$('#capaFeedView').hide();
	   			$('#capaFeedModi').show();
	   		}

		   	// �ι����� �� ���� select �����ֱ�, �ش� �ι� ������ �ҷ�����
		   	function viewTeam(obj) {
	   			$.ajax({
	   				type : "GET",
	   				url : "../select/select_team.php?obj=" + obj,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
						document.getElementById('viewTeam2').innerHTML = idata;
	   				}
	   			});

	   			$('#viewTeam1').hide();
		   		$('#viewTeam2').show();

		   		$.ajax({
		   			type : "GET",
		   			url : "../achivement/depart_totalData.php?idx=" + obj,
		   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
		   			success : function(idata) {
		   				document.getElementById('total_Table').innerHTML = idata;
	   				}
	   			});
	   		}

		   	// �� ���ý� ���� select �����ֱ�, �ش� �� ��� �ο� ������ �ҷ�����
		   	function viewPerson(obj) {
		   		$.ajax({
	   				type : "GET",
	   				url : "../select/select_people.php?obj=" + obj,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('viewPerson2').innerHTML = idata;
	   				}
	   			});

	   			$('#viewPerson1').hide();
	   			$('#viewPerson2').show();

		   		$.ajax({
		   			type : "GET",
	   				url : "../achivement/team_totalData.php?idx=" + obj,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
	   					document.getElementById('total_Table').innerHTML = idata;
	   				}
	   			});
	   		}

		   	function viewPersonData(idx) {
		   		$.ajax({
		   			type : "GET",
	   				url : "../achivement/user_totaldata.php?idx=" + idx,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('total_Table').innerHTML = idata;
	   				}
	   			});
	   		}

	   		function reviewAllCheck() {
		   		var table = "tb_reviewAllDown";
	   			var name = "totalDown";
	   			var uri = 'data:application/vnd.ms-excel;base64,',
	   			template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   			base64 = function(s) {
	   				return window.btoa(unescape(encodeURIComponent(s)))
	   			}, format = function(s, c) {
	   				return s.replace(/{(\w+)}/g, function(m, p) {
	   					return c[p];
	   				})
	   			}
	   			reviewAllDown(table, name, uri, template, base64, format);
	   		}

	   		function reviewAllDown(table, name, uri, template, base64, format) {
	   			if (!table.nodeType)
	   				table = document.getElementById(table)
	   			var ctx = {
	   				worksheet : name || 'Worksheet',
	   				table : table.innerHTML
	   			}
	   			var a = document.createElement('a');
	   			a.href = uri + base64(format(template, ctx))
	   			a.download = name + '.xls';
	   			a.click();
	   			setTimeout('window.close()', 500);
	   		}

		   	// ����� ���� ���� �ٿ�ε�
		   	function reviewAllCheck() {
	   			var table = "perTable";
	   			var name = "permission";
	   			var uri = 'data:application/vnd.ms-excel;base64,',
	   			template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   			base64 = function(s) {
	   				return window.btoa(unescape(encodeURIComponent(s)))
	   			}, format = function(s, c) {
	   				return s.replace(/{(\w+)}/g, function(m, p) {
	   					return c[p];
	   				})
	   			}
	   			permissionDown(table, name, uri, template, base64, format);
	   		}

	   		function permissionDown(table, name, uri, template, base64, format) {
		   		if (!table.nodeType)
	   				table = document.getElementById(table)
		   		var ctx = {
					worksheet : name || 'Worksheet',
	   				table : table.innerHTML
	   			}
	   			var a = document.createElement('a');
	   			a.href = uri + base64(format(template, ctx))
	   			a.download = name + '.xls';
	   			a.click();
	   			setTimeout('window.close()', 500);
	   		}

	   		function addShow() {
		   		$('#mbo_add').show();
	   			$('#mbo_add_button').hide();
		   	}
	
	   		function stateList() {
	   			$.ajax({
	   				type:"GET",
	   				url:"../achivement/state.php",
	   				contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   				success : function(idata) {
		   				document.getElementById('admintable').innerHTML=idata;
		   			}
	   			});
		   	}	

	   		function userQdata(quar) {
	   			$.ajax({
		   			type : "GET",
	   				url : "../achivement/user_stateModi.php?quar=" + quar,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('achiveState').innerHTML = idata;
	   				}
	   			});
	   		}

	   		function capaUserFinal() {
		   		$.ajax({
	   				type : "GET",
	   				url : "../capacity/user_finalSend.php",
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
		   			success : function(idata) {
	   					document.getElementById('admintable').innerHTML = idata;
	   				}
	   			});
	   		}

	   		function finalButton() {
	   			var input = document.getElementById("input").value;

	   			$.ajax({
		   			type : "GET",
	   				url : "../capacity/user_final_list.php?idx=" + idx,
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('finalDiv').innerHTML = idata;
	   				}
	   			});
	   		}

		   	function permission() {
		   		$.ajax({
	   				type : "GET",
	   				url : "../view/eval_permission.php",
	   				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
	   					document.getElementById('admintable').innerHTML = idata;
	   				}
	   			});
	   		}

			function perSearch() {
		   		var year = document.getElementById('year').value;
		   		var quar = document.getElementById('quar').value;
	   			var team = document.getElementById('team').value;
	   			var tname = document.getElementById('tName').value;
	   			var group = document.getElementById('group').value;
	   			var achive = document.getElementById('achive').value;
	   			var capacity = document.getElementById('capacity').value;
		   		
		   		$.ajax({
	   				type : "GET",
	   				url : "../ajax/eval_permission.php?year="+year+"&quar="+quar+"&team="+team+"&tname="+tname+"&group="+group+"&achive="+achive+"&capacity="+capacity,
		   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   				success : function(idata) {
		   				document.getElementById('searchPer').innerHTML = idata;
	   				}
	   			});
	   		}

	   		function fclick1() {
	   			if (input1.style.display == "none") {
		   			$("#input1").show();
	   				font1.innerHTML= '�󼼳�¥ ���� ��';
	   			} else {
		   			$("#input1").hide();
	   				font1.innerHTML= '�󼼳�¥ �Է� ��';
	   			}
	   		}

	   		function fclick2() {
		   		if (input2.style.display == "none") {
	   				$("#input2").show();
	   				font2.innerHTML= '�󼼳�¥ ���� ��';
	   			} else {
		   			$("#input2").hide();
	   				font2.innerHTML= '�󼼳�¥ �Է� ��';
	   			}
	   		}

	   		function fclick3() {
		   		if (input3.style.display == "none") {
	   				$("#input3").show();
	   				font3.innerHTML= '�󼼳�¥ ���� ��';
		   		} else {
	   				$("#input3").hide();
	   				font3.innerHTML= '�󼼳�¥ �Է� ��';
		   		}
	   		}


	   	function fclick4() {
	   		if (input4.style.display == "none") {
	   			$("#input4").show();
	   			font4.innerHTML= '�󼼳�¥ ���� ��';
	   		} else {
	   			$("#input4").hide();
	   			font4.innerHTML= '�󼼳�¥ �Է� ��';
	   		}
	   	}

	   	function fclick5() {
	   		if (input5.style.display == "none") {
	   			$("#input5").show();
	   			font5.innerHTML= '�󼼳�¥ ���� ��';
	   		} else {
	   			$("#input5").hide();
	   			font5.innerHTML= '�󼼳�¥ �Է� ��';
	   		}
	   	}

	   	function fclick6() {
	   		if (input6.style.display == "none") {
	   			$("#input6").show();
	   			font6.innerHTML= '�󼼳�¥ ���� ��';
	   		} else {
	   			$("#input6").hide();
	   			font6.innerHTML= '�󼼳�¥ �Է� ��';
	   		}
	   	}

	   	function fclick7() {
	   		if (input7.style.display == "none") {
	   			$("#input7").show();
	   			font7.innerHTML= '�󼼳�¥ ���� ��';
	   		} else {
	   			$("#input7").hide();
	   			font7.innerHTML= '�󼼳�¥ �Է� ��';
	   		}
	   	}

	   	function fclick8() {
	   		if (input8.style.display == "none") {
	   			$("#input8").show();
	   			font8.innerHTML= '�󼼳�¥ ���� ��';
	   		} else {
	   			$("#input8").hide();
	   			font8.innerHTML= '�󼼳�¥ �Է� ��';
	   		}
	   	}

	   	//�ι����� �� ���� select �����ֱ�, �ش� �ι� ������ �ҷ�����
	   	function selectTeam(obj) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../select/finalSelectTeam.php?obj=" + obj,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('selectTeam').innerHTML = idata;
	   			}
	   		});
	   	}

	   	// �� ���ý� �ش� ���� ������ ������� ȣ��
	   	function selectPerson(obj) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../select/finalSelectPerson.php?obj=" + obj,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('selectPerson').innerHTML = idata;
	   			}
	   		});
	   	}

	   	function selectPersonData(idx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../capacity/user_final_list.php?idx=" + idx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('finalDiv').innerHTML = idata;
	   			}
	   		});
	   	}


	   	//����� ���� ���� �ٿ�ε�
	   	function finalDown() {
	   		var table = "user_final";
	   		var name = "userfinal";
	   		var uri = 'data:application/vnd.ms-excel;base64,',
	   		template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   		base64 = function(s) {
	   			return window.btoa(unescape(encodeURIComponent(s)))
	   		}, format = function(s, c) {
	   			return s.replace(/{(\w+)}/g, function(m, p) {
	   				return c[p];
	   			})
	   		}
	   		finalDataDown(table, name, uri, template, base64, format);
	   	}

	   	function finalDataDown(table, name, uri, template, base64, format) {
	   		if (!table.nodeType)
	   			table = document.getElementById(table)
	   		var ctx = {
	   			worksheet : name || 'Worksheet',
	   			table : table.innerHTML
	   		}
	   		var a = document.createElement('a');
	   		a.href = uri + base64(format(template, ctx))
	   		a.download = name + '.xls';
	   		a.click();
	   		setTimeout('window.close()', 500);
	   	}

	   	function departClick() {
	   		var popUrl = "../help/department.php";													//�˾�â�� ��µ� ������ URL
	   		var popOption = "width=390, height=360, resizable=no, scrollbars=no, status=no;";    	//�˾�â �ɼ�(optoin)
	   		window.open(popUrl,"codehelp",popOption);
	   	}


	   	function teamClick() {
	   		var depart = document.getElementById('depart').value;
	   		var departIdx = 0;

	   		switch(depart) {
	   			case '�ڽ���ƽ':
	   				departIdx = 2;
	   				break;
	   			case '��������':
	   				departIdx = 3;
	   				break;
	   			case '�濵������':
	   				departIdx = 4;
	   				break;
	   			default:
	   				departIdx = 0;
	   				break;
	   		}
	   		
	   		var popUrl = "../help/team.php?idx="+departIdx;													//�˾�â�� ��µ� ������ URL
	   		var popOption = "width=620, height=360, resizable=no, scrollbars=no, status=no;";    	//�˾�â �ɼ�(optoin)
	   		window.open(popUrl,"codehelp",popOption);
	   	}

	   	function getAchiveTeam(teamidx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../select/achiveTeam.php?idx="+teamidx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('teamCall').innerHTML = idata;
	   			}
	   		});
	   	}

	   	function evalDate() {
	   		alert("�������Դϴ�");
	   		//edatafrm.submit();
	   	}

	   	function disButton() {
	   		var year = document.getElementById('year').value;
	   		var title = document.getElementById('title').value;
	   		var grade = document.getElementById('grade').value;
	   		var level = document.getElementById('level').value;
	   		var depart = document.getElementById('depart').value;
	   		
	   		var cnt = document.getElementById("teamCnt").value;
	   		var cname = "";
	   		var cval = "";
	   		var carr = "";
	   		for (var i=0; i < cnt; i++) {
	   			cname = "#team"+i;
	   			cval = "team"+i;
	   			if($(cname).prop("checked") == true) {
	   				ctext = document.getElementById(cval).value;
	   			} else {
	   				ctext = 0;
	   			}
	   								
	   			carr = carr + ctext + ",";
	   			
	   		}

	   		$.ajax({
	   			type : "GET",
	   			url : "../ajax/distributionAjax.php?year="+year+"&title="+title+"&grade="+grade+"&level="+level+"&depart="+depart+"&team="+carr,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('dist_ajax').innerHTML = idata;
	   			}
	   		});
	   	}


/*
	   	function finalGrade() {
	   		var year = document.getElementById('year').value;
	   		var title = document.getElementById('title').value;
	   		var grade = document.getElementById('grade').value;
	   		var level = document.getElementById('level').value;
	   		var depart = document.getElementById('depart').value;
	   		
	   		var cnt = document.getElementById("teamCnt").value;
	   		var cname = "";
	   		var cval = "";
	   		var carr = "";
	   		for (var i=0; i < cnt; i++) {
	   			cname = "#team"+i;
	   			cval = "team"+i;
	   			if($(cname).prop("checked") == true) {
	   				ctext = document.getElementById(cval).value;
	   			} else {
	   				ctext = 0;
	   			}
	   								
	   			carr = carr + ctext + ",";
	   			
	   		}
	   		
	   		$.ajax({
	   			type : "GET",
	   			url : "../ajax/final_grade.php?year="+year+"&title="+title+"&grade="+grade+"&level="+level+"&depart="+depart+"&team="+carr,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('dist_ajax').innerHTML = idata;
	   			}
	   		});
	   	}*/
	   	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	   	function choiseTeam() {
	   			if (selecTeam.style.display == "none") {
	   				$("#selecTeam").show();
	   				text.innerHTML= '�� ���� ��';
	   			} else {
	   				$("#selecTeam").hide();
	   				text.innerHTML= '�� ���� ��';
	   			}
	   		}
	   		
	   		function maintable(idx) {
	   		$.ajax({
	   			type:"GET",
	   			url:"../main/maintable.php?midx="+idx,
	   			contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   			}
	   		});
	   	}

	   		function evaluation() {
	   		$.ajax({
	   			type:"GET",
	   			url:"../main/evaluation.php",
	   			contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   			}
	   		});

	   		}

	   	function capalist() {
	   		$.ajax({
	   			type:"GET",
	   				url:"../capacity/capa_list.php",
	   				contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   				success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   				}
	   		});
	   	}

	   	function capaUserList() {
	   		$.ajax({
	   			type:"GET",
	   				url:"../capacity/capa_user_list.php",
	   				contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   				success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   				}
	   		});
	   	}

	   	function subcancel(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  //Post ���
	   		form.setAttribute("action", "../controller/capalist_usecheck.php"); //��û ���� �ּ�

	   	    var hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "chk");
	   		hiddenField.setAttribute("value", '1');
	   	    form.appendChild(hiddenField);

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "idx");
	   		hiddenField.setAttribute("value", idx);

	   		form.appendChild(hiddenField);
	   		document.body.appendChild(form);

	   	    form.submit();

	   	}

	   	function subuse(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  //Post ���
	   		form.setAttribute("action", "../controller/capalist_usecheck.php"); //��û ���� �ּ�

	   	    var hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "chk");
	   		hiddenField.setAttribute("value", '2');
	   	    form.appendChild(hiddenField);

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "idx");
	   		hiddenField.setAttribute("value", idx);

	   		form.appendChild(hiddenField);
	   		document.body.appendChild(form);

	   	    form.submit();
	   	}

	   	function subTextCancel(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  //Post ���
	   		form.setAttribute("action", "../controller/capalist_usecheck.php"); //��û ���� �ּ�

	   	    var hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "chk");
	   		hiddenField.setAttribute("value", '3');
	   	    form.appendChild(hiddenField);

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "idx");
	   		hiddenField.setAttribute("value", idx);

	   		form.appendChild(hiddenField);
	   		document.body.appendChild(form);

	   	    form.submit();
	   	}

	   	function subTextUse(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  //Post ���
	   		form.setAttribute("action", "../controller/capalist_usecheck.php"); //��û ���� �ּ�

	   	    var hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "chk");
	   		hiddenField.setAttribute("value", '4');
	   	    form.appendChild(hiddenField);

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "idx");
	   		hiddenField.setAttribute("value", idx);

	   		form.appendChild(hiddenField);
	   		document.body.appendChild(form);

	   	    form.submit();
	   	}

	   	function show_modi(idx) {
	   		var textshow = '#textshow'+idx;
	   		var texthide = '#texthide'+idx;
	   		
	   		$(textshow).hide();
	   		$(texthide).show();
	   	}

	   	function listAdd() {
	   		window.open("../capacity/capa_list_add.php","","width=1200, height=360, resizable=no, scrollbars=no, status=no;");
	   	}

	   	function permodi(id) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  //Post ���
	   		form.setAttribute("action", "../controller/user_sendmodi.php"); //��û ���� �ּ�

	   	    var hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "chk");
	   		hiddenField.setAttribute("value", '1'); // �ݱ⸮�� 1
	   	    form.appendChild(hiddenField);

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "id");
	   		hiddenField.setAttribute("value", id);

	   		form.appendChild(hiddenField);
	   		document.body.appendChild(form);

	   	    form.submit();
	   	}

	   	function leadmodi(id) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  //Post ���
	   		form.setAttribute("action", "../controller/user_sendmodi.php"); //��û ���� �ּ�

	   	    var hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "chk");
	   		hiddenField.setAttribute("value", '2'); // ���ǵ�� 2
	   	    form.appendChild(hiddenField);

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "id");
	   		hiddenField.setAttribute("value", id);

	   		form.appendChild(hiddenField);
	   		document.body.appendChild(form);

	   	    form.submit();
	   	}

	   	function membercancel(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  								//Post ���
	   		form.setAttribute("action", "../controller/member_mainModi.php"); 	//��û ���� �ּ�

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "cidx");
	   		hiddenField.setAttribute("value", idx);
	   		form.appendChild(hiddenField);

	   		document.body.appendChild(form);
	   	    form.submit();
	   	}


	   	function memberusing(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  								//Post ���
	   		form.setAttribute("action", "../controller/member_mainModi.php"); 	//��û ���� �ּ�

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "uidx");
	   		hiddenField.setAttribute("value", idx);
	   		form.appendChild(hiddenField);

	   		document.body.appendChild(form);
	   	    form.submit();
	   	}

	   	function leadercancel(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  								//Post ���
	   		form.setAttribute("action", "../controller/leader_mainModi.php"); 	//��û ���� �ּ�

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "cidx");
	   		hiddenField.setAttribute("value", idx);
	   		form.appendChild(hiddenField);

	   		document.body.appendChild(form);
	   	    form.submit();
	   	}


	   	function leaderusing(idx) {
	   		var form = document.createElement("form");
	   		form.setAttribute("method", "POST");  								//Post ���
	   		form.setAttribute("action", "../controller/leader_mainModi.php"); 	//��û ���� �ּ�

	   		hiddenField = document.createElement("input");
	   	    hiddenField.setAttribute("type", "hidden");
	   	    hiddenField.setAttribute("name", "uidx");
	   		hiddenField.setAttribute("value", idx);
	   		form.appendChild(hiddenField);

	   		document.body.appendChild(form);
	   	    form.submit();
	   	}

	   	function achveList() {
	   		$.ajax({
	   			type:"GET",
	   			url:"../achivement/totaldata.php",
	   			contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   			}
	   		});
	   	}	

	   	function teamAgregado() {
	   		$.ajax({
	   			type:"GET",
	   			url:"../agregado/teamAgregado.php",
	   			contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   			}
	   		});
	   	}

	   	function distribution() {
	   		$.ajax({
	   			type:"GET",
	   			url:"../agregado/distribution.php",
	   			contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   			}
	   		});
	   	}

	   	function nineMatrix(idx) {
	   		$.ajax({
	   			type:"GET",
	   			url:"../agregado/nineMatrix.php?idx="+idx,
	   			contentType: "application/x-www-form-urlencoded; charset=euc-kr", 
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML=idata;
	   			}
	   		});
	   	}

	   	function mboMain(idx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../mbo/mbo_modification.php?idx="+idx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML = idata;
	   			}
	   		});
	   	}

	   	function weightAlert(val) {
	   		 if (val > 100) {
	   				var value1 = val - 100;
	   				var value2 = "����ġ �հ谡 " + value1 + "�� �ʰ��Ͽ����ϴ�"; 
	   				alert(value2);
	   			} else {
	   				var value3 = 100 - val;
	   				var value4 = "����ġ �հ� " + value3 + "�� �����մϴ�"; 
	   				alert(value4);
	   			}
	   	}

	   	function viewTeamData() {
	   		$.ajax({
	   			type : "GET",
	   			url : "../achivement/sendMail.php",
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML = idata;
	   			}
	   		});
	   	}

	   	function showquarter(idx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../achivement/sendMailAjax.php?idx="+idx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('quarterMail').innerHTML = idata;
	   			}
	   		});
	   	}
	   	// ������ ��� ���� ���� ����
	   	// Ŭ���� ���� ������ input text�� ǥ��

	   	function tname(idx) {
	   		var tname = '#tname'+idx;
	   		var tnChange = '#tnChange'+idx;
	   		
	   		$(tname).hide();
	   		$(tnChange).show();
	   	}

	   	function fname(idx) {
	   		var fname = '#fname'+idx;
	   		var fnChange = '#fnChange'+idx;
	   		
	   		$(fname).hide();
	   		$(fnChange).show();
	   	}

	   	function sname(idx) {
	   		var sname = '#sname'+idx;
	   		var snChange = '#snChange'+idx;
	   		
	   		$(sname).hide();
	   		$(snChange).show();
	   	}

	   	function tname_ajax(idx) {
	   		var tname_ajax = '#tname_ajax'+idx;
	   		var tnChange_ajax = '#tnChange_ajax'+idx;
	   		
	   		$(tname_ajax).hide();
	   		$(tnChange_ajax).show();
	   	}

	   	function fname_ajax(idx) {
	   		var fname_ajax = '#fname_ajax'+idx;
	   		var fnChange_ajax = '#fnChange_ajax'+idx;
	   		
	   		$(fname_ajax).hide();
	   		$(fnChange_ajax).show();
	   	}

	   	function sname_ajax(idx) {
	   		var sname_ajax = '#sname_ajax'+idx;
	   		var snChange_ajax = '#snChange_ajax'+idx;
	   		
	   		$(sname_ajax).hide();
	   		$(snChange_ajax).show();
	   	}

	   		

	   	function achCancel(idx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../ajax/achive_cancel.php?idx="+idx+"&chk="+1,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				alert("���������� �����߽��ϴ�");
	   				alert(idata);
	   			}
	   		});
	   	}

	   	function achCancel2(idx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../ajax/achive_cancel.php?idx="+idx+"&chk="+2,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				alert("���������� �����߽��ϴ�");
	   				alert(idata);
	   			}
	   		});
	   	}

	   	function viewTeamData() {
	   		var team = document.getElementById("tn").value;
	   		var idx = document.getElementById("index").value;
	   		var answer = document.getElementById("answer").value;
	   		
	   		$.ajax({
	   			type : "GET",
	   			url : "../achivement/sendMailAjax.php?idx="+idx+"&team="+team+"&answer="+answer,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('quarterMail').innerHTML = idata;
	   			}
	   		});
	   	}

	   	// ����� ���� ���� �ٿ�ε�
	   	function mailExcel() {
	   		var table = "user_mail";
	   		var name = "team_Mail";
	   		var uri = 'data:application/vnd.ms-excel;base64,',
	   		template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   		base64 = function(s) {
	   			return window.btoa(unescape(encodeURIComponent(s)))
	   		}, format = function(s, c) {
	   			return s.replace(/{(\w+)}/g, function(m, p) {
	   				return c[p];
	   			})
	   		}
	   		mailDataDown(table, name, uri, template, base64, format);
	   	}


	   	function mailDataDown(table, name, uri, template, base64, format) {
	   		if (!table.nodeType)
	   			table = document.getElementById(table)
	   		var ctx = {
	   			worksheet : name || 'Worksheet',
	   			table : table.innerHTML
	   		}
	   		var a = document.createElement('a');
	   		a.href = uri + base64(format(template, ctx))
	   		a.download = name + '.xls';
	   		a.click();
	   		setTimeout('window.close()', 500);
	   	}

	   	function sendTeamMail(idx) {
	   		var cnt = document.getElementById("cnt").value;
	   		var ctext = "";
	   		var cname = "";
	   		var cid = "";
	   		var carr = "";
	   		for (var i=0; i < cnt; i++) {
	   			cname = "#check"+i;
	   			cid = "check"+i;
	   			if($(cname).prop("checked") == true) {
	   				ctext = document.getElementById(cid).value;
	   			} else {
	   				ctext = 0;
	   			}
	   								
	   			carr = carr + ctext + ",";
	   			
	   		}
	   		
	   		$.ajax({
	   			type:"GET",
	   				url:"../controller/sendTeamMail.php?idx="+idx+"&cd="+carr,
	   				contentType: "application/x-www-form-urlencoded; charset=euc-kr",
	   				error : function(){
	   	            alert("��Ž���!!!!");
	   	        }, 
	   				success : function(idata) {
	   				alert("������ ���� �Ǿ����ϴ�.");
	   				}
	   			});
	   		return false;
	   	}

	   	function teamAchivement() {
	   		$.ajax({
	   			type : "GET",
	   			url : "../agregado/team_achivement.php",
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML = idata;
	   			}
	   		});
	   	}

	   	// ���������迡�� �� ��ư �ҷ�����
	   	function getAchiveTeam(teamidx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../select/achiveTeam.php?idx="+teamidx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('teamCall').innerHTML = idata;
	   			}
	   		});
	   	}

	   	// �μ������迡�� �� ��ư �ҷ�����
	   	function getCapaTeam(tIdx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../select/capaTeam.php?idx="+tIdx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('capaTeamCall').innerHTML = idata;
	   			}
	   		});

	   		callDepartCapa(tIdx);
	   	}

	   	// ������ ���� ���� ������ ���̺� �ҷ����� ��ũ��Ʈ
	   	function callTeamAchive(index) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../agregado/team_achivement_ajax.php?idx="+index,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('tachagre').innerHTML = idata;
	   			}
	   		});
	   	}

	   	// ���������� ���� ������ ���̺� �ҷ����� ��ũ��Ʈ
	   	function callTeamCapa(index) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../agregado/team_capacity_ajax.php?tidx="+index,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('capaTotalAjax').innerHTML = idata;
	   			}
	   		});
	   	}

	   	function callDepartCapa(tIdx) {
	   		$.ajax({
	   			type : "GET",
	   			url : "../agregado/team_capacity_ajax.php?didx="+tIdx,
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('capaTotalAjax').innerHTML = idata;
	   			}
	   		});
	   	}
	   		

	   	// �ӽ� ��Ʈ�ѷ�
	   	function controller1() {
	   		$.ajax({
	   			type : "GET",
	   			url : "../imsi/controller1.php",
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML = idata;
	   			}
	   		});

	   	}

	   	function mailController1() {
	   		$.ajax({
	   			type : "GET",
	   			url : "../mail/leaderSend.php",
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				alert("������ ���� �Ǿ����ϴ�.");
	   				}
	   		});

	   		return false;
	   	}

		// �λ������� �򰡸� Ȯ�� �� �� �ֵ��� ���Ѻο��ϴ� ������
		function searchData() {
			$.ajax({
	   			type : "GET",
	   			url : "../agregado/eachDataControl.php",
	   			contentType : "application/x-www-form-urlencoded; charset=euc-kr",
	   			success : function(idata) {
	   				document.getElementById('admintable').innerHTML = idata;
	   			}
	   		});
		}
		
	   	// ������ ���� ���� �ٿ�ε�
	   	function achivExcel() {
	   		var table = "totalAchive";
	   		var teamName = document.getElementById('teamName').value;
	   		var uri = 'data:application/vnd.ms-excel;base64,',
	   		template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   		base64 = function(s) {
	   			return window.btoa(unescape(encodeURIComponent(s)))
	   		}, format = function(s, c) {
	   			return s.replace(/{(\w+)}/g, function(m, p) {
	   				return c[p];
	   			})
	   		}
	   		achiveDown(table, teamName, uri, template, base64, format);
	   	}

	   	function achiveDown(table, name, uri, template, base64, format) {
	   		if (!table.nodeType)
	   			table = document.getElementById(table)
	   		var ctx = {
	   			worksheet : name || 'Worksheet',
	   			table : table.innerHTML
	   		}
	   		var a = document.createElement('a');
	   		a.href = uri + base64(format(template, ctx))
	   		a.download = name + '.xls';
	   		a.click();
	   		setTimeout('window.close()', 500);
	   	}
		
	   	//�����򰡵�� ���� �ٿ�ε�
	   	function finalGradeExcel() {
	   		var table = "finalGradeExcel";
	   		var filename = "final_grade";
	   		var uri = 'data:application/vnd.ms-excel;base64,',
	   		template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
	   		base64 = function(s) {
	   			return window.btoa(unescape(encodeURIComponent(s)))
	   		}, format = function(s, c) {
	   			return s.replace(/{(\w+)}/g, function(m, p) {
	   				return c[p];
	   			})
	   		}
	   		finalGradeExcelDown(table, filename, uri, template, base64, format);
	   	}


	   	function finalGradeExcelDown(table, name, uri, template, base64, format) {
	   		if (!table.nodeType)
	   			table = document.getElementById(table)
	   		var ctx = {
	   			worksheet : name || 'Worksheet',
	   			table : table.innerHTML
	   		}
	   		var a = document.createElement('a');
	   		a.href = uri + base64(format(template, ctx))
	   		a.download = name + '.xls';
	   		a.click();
	   		setTimeout('window.close()', 500);
	   	}

	   	function achsendMail(){
			$.ajax({
				type : "GET",
				url : "../achivement/sendMail.php",
				contentType : "application/x-www-form-urlencoded; charset=euc-kr",
				success : function(idata) {
					document.getElementById('admintable').innerHTML = idata;
				}
			});
	   	}

			function noFeedback(idx) {
				
				if($("#nochk").is(":checked")){ 
					$.ajax({
						type : "GET",
						url : "../achivement/sendMailAjax.php?idx="+idx+"&answer="+1,
						contentType : "application/x-www-form-urlencoded; charset=euc-kr",
						success : function(idata) {
							document.getElementById('quarterMail').innerHTML = idata;
						}
					});
					
				} else {
					$.ajax({
						type : "GET",
						url : "../achivement/sendMailAjax.php?idx="+idx,
						contentType : "application/x-www-form-urlencoded; charset=euc-kr",
						success : function(idata) {
							document.getElementById('quarterMail').innerHTML = idata;
						}
					});
				}
			}

			function okFeedback(idx) {

				if($("#okchk").is(":checked")){ 
					$.ajax({
						type : "GET",
						url : "../achivement/sendMailAjax.php?idx="+idx+"&answer="+2,
						contentType : "application/x-www-form-urlencoded; charset=euc-kr",
						success : function(idata) {
							document.getElementById('quarterMail').innerHTML = idata;
						}
					});
					
				} else {
					$.ajax({
						type : "GET",
						url : "../achivement/sendMailAjax.php?idx="+idx,
						contentType : "application/x-www-form-urlencoded; charset=euc-kr",
						success : function(idata) {
							document.getElementById('quarterMail').innerHTML = idata;
						}
					});
				}
			}

			function distPerson() {
				$.ajax({
					type : "GET",
					url : "../agregado/distPerson.php",
					contentType : "application/x-www-form-urlencoded; charset=euc-kr",
					success : function(idata) {
						document.getElementById('admintable').innerHTML = idata;
					}
				});
			}

			function distName() {
				window.open("../ajax/dist_name.php", "�̸�����", "width=500, height=400, left=100, top=50");
			}

			function distOption() {
				var chk1 = $("#oYear").is(":visible");
				var chk2 = $("#oTitle").is(":visible");
				var chk3 = $("#oGrade").is(":visible");
				var chk4 = $("#oDepart").is(":visible");
				var chk5 = $("#oLevel").is(":visible");
				var chk6 = $("#oTeam").is(":visible");
				
				var check = "";
				
				if (chk1 == true) {
					check += 1+",";
				}
				if (chk2 == true) {
					check += 2+",";
				}
				if (chk3 == true) {
					check += 3+",";
				}
				if (chk4 == true) {
					check += 4+",";
				}
				if (chk5 == true) {
					check += 5+",";
				}
				if (chk6 == true) {
					check += 6+",";
				}
				
				window.open("../ajax/dist_option.php?che="+check, "�����߰�", "width=300, height=400, left=100, top=50");
			}

			//test
			function drawChartTest() {
				var name = document.getElementById('realName').value;		// �Էµ� �̸�
				var year = document.getElementById('year').value;			// �򰡳⵵
				var title = document.getElementById('title').value;			// ��å��
				var grade = document.getElementById('grade').value;			// ���޺�
				var depart = document.getElementById('depart').value;		// �ι���
				var level = document.getElementById('level').value;			// ������
				var team = document.getElementById('team').value;			// �μ���
				
				$.ajax({
					type : "GET",
					url : "../agregado/nineMatrixTest.php?name="+name+"&year="+year+"&title="+title+"&grade="+grade+"&depart="+depart+"&level="+level+"&team="+team,
					contentType : "application/x-www-form-urlencoded; charset=euc-kr",
					success : function(idata) {
						document.getElementById('distReselt').innerHTML = idata;
					}
				});
			}
			
			


			// ����� ���� ���� �ٿ�ε�
			function mboDown() {
				var table = "mbodownTable";
				var name = document.getElementById('excelName').value;
				//var name = "team_Mail";
				var uri = 'data:application/vnd.ms-excel;base64,',
				template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>',
				base64 = function(s) {
					return window.btoa(unescape(encodeURIComponent(s)))
				}, format = function(s, c) {
					return s.replace(/{(\w+)}/g, function(m, p) {
						return c[p];
					})
				}
				mboExcelDown(table, name, uri, template, base64, format);
			}


			function mboExcelDown(table, name, uri, template, base64, format) {
				if (!table.nodeType)
					table = document.getElementById(table)
				var ctx = {
					worksheet : name || 'Worksheet',
					table : table.innerHTML
				}
				var a = document.createElement('a');
				a.href = uri + base64(format(template, ctx))
				a.download = name + '.xls';
				a.click();
				setTimeout('window.close()', 500);
			}
				
			function drawTest() {
				var con = document.getElementById('myCanvas').getContext('2d');
				var achiveLen = document.getElementById('achiveLen').value;	 // achive Length
			
				var acArr = new Array();
				var caArr = new Array();
				var grArr = new Array();
				var nameArr = new Array();
				
				for (var i=0; i < achiveLen; i++) {
					var achiveId = "achiveArr"+i;
					var capaId = "capaArr"+i;
					var gradeId = "gradeArr"+i;
					var nameId = "name"+i;
					
					acArr[i] = document.getElementById(achiveId).value;	 	// achive Data
					caArr[i] = document.getElementById(capaId).value;	 	// capacity Data
					grArr[i] = document.getElementById(gradeId).value;	 	// capacity Data
					nameArr[i] = document.getElementById(nameId).value;	// capacity name
					
				}

				var img = new Image();
				
				img.onload = function() {
					con.drawImage(img, 0, 0);
				}
				img.src = "http://www.gwssmall.co.kr/insa_admin/images/graphleft.png";
				
				con.beginPath();
				// S���� ��׶��� Į�� ����
				con.fillStyle = '#3E83A8';
				con.fillRect(1000, 0, 400, 200);
				
				// S���� ��׶��� Į�� ����				
				con.fillStyle = '#84A9CD';
				con.fillRect(600, 0, 400, 200);
				con.fillRect(1000, 200, 400, 200);
				
				// S���� ��׶��� Į�� ����				
				con.fillStyle = '#B8DAE3';
				con.fillRect(200, 0, 400, 200);
				con.fillRect(600, 200, 400, 200);
				con.fillRect(1000, 400, 400, 200);
				
				// S���� ��׶��� Į�� ����				
				con.fillStyle = '#CACACA';
				con.fillRect(200, 200, 400, 200);
				con.fillRect(600, 400, 400, 200);
				
				// S���� ��׶��� Į�� ����
				con.fillStyle = '#5C5C60';
				con.fillRect(200, 400, 400, 200);
				con.closePath();
				
				
				

				var xlen = 1400;
				var ylen = 700;

				con.beginPath();
				con.strokeStyle = '#FFFFFF';
				
				// (����������) ���� 1��
				con.moveTo(200,0);
				con.lineTo(1400,0);
				con.stroke();

				// (����������) ���� 2��				
				con.moveTo(200, 200);
				con.lineTo(1400, 200);
				con.stroke();
				
				// (����������) ���� 3��				
				con.moveTo(200, 400);
				con.lineTo(1400, 400);
				con.stroke();
				
				// (����������) ���� 4��				
				con.moveTo(200, 600);
				con.lineTo(1400, 600);
				con.stroke();
				
				// (���ʿ�������) ���� 1��
				con.moveTo(200, 0);
				con.lineTo(200, 600);
				con.stroke();

				// (���ʿ�������) ���� 2��				
				con.moveTo(600, 0);
				con.lineTo(600, 600);
				con.stroke();
				
				// (���ʿ�������) ���� 3��
				con.moveTo(1000, 0);
				con.lineTo(1000, 600);
				con.stroke();
				
				// (���ʿ�������) ���� 4��
				con.moveTo(1400, 0);
				con.lineTo(1400, 600);
				con.stroke();
				
				// ��� class 
				con.font = "50px NanumSquare";		
				con.fillStyle = '#FFFFFF';				
				con.fillText("S", 1010, 50);		// S
				con.fillText("A", 610, 50);			// A
				con.fillText("A", 1010, 250);		// A
				con.fillText("B", 210, 50);			// B
				con.fillText("B", 610, 250);		// B
				con.fillText("B", 1010, 450);		// B
				con.fillText("C", 210, 250);		// C
				con.fillText("C", 210, 450);		// C
				con.fillText("C", 610, 450);		// C
				con.closePath();
			
				//���� Performance text
				con.font = "15px Nanum Square";		
				con.fillStyle = '#000000';
				con.fillText("Exceeds", 130, 100);		// ����20%
				con.fillText("(����20%)", 120, 120);		// ����20%
				con.fillText("Meets", 135, 300);		// ����70%
				con.fillText("(����70%)", 120, 320);		// ����70%
				con.fillText("Does Not", 120, 500);		// ����10%
				con.fillText("Meet", 135, 520);			// ����10%
				con.fillText("(����10%)", 120, 540);		// ����10%
				con.closePath();
	
				//�Ʒ� Competency text
				con.font = "15px Nanum Square";		
				con.fillStyle = '#000000';
				con.fillText("Development Required", 330, 620);		// ����20%
				con.fillText("Competent", 750, 620);				// ����70%
				con.fillText("Outstanding", 1150, 620);				// ����10%
				con.closePath();
				
				con.font = "bold 20px Nanum Square";
				con.fillText("Competency", 750, 690);
				con.closePath();
				
				con.font = "15px Nanum Square";		
				con.fillStyle = '#4169E1';
				con.fillText("(Development Needed, Urgent Development Needed)", 220, 650);		// ����20%
				con.fillText("(Masterful, Highly Competent) ", 1080, 650);						// ����10%
				con.closePath();
				
				for (var i=0; i < achiveLen; i++) {
					if (grArr[i] == 1) {						// S
						con.beginPath();
						con.fillStyle = '#FFFFFF';		
						con.strokeStyle = '#FFFFFF';	
						con.font = "20px Arial";
						con.fillText(nameArr[i], (acArr[i]*13)-15, (caArr[i]*1)+25);
						con.arc(acArr[i]*13, (caArr[i]*1), 2, 0,(Math.PI/180) *360,false);
						con.fill(); 										//ä���
						con.stroke(); 										//�׵θ�
						con.closePath();
						
					} else if (grArr[i] == 2) {					// A
						if (acArr[i] > caArr[i]) {
							con.beginPath();
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';	
							con.font = "20px Arial";
							
							var ya1 = caArr[i]*6*0.5;
							if (ya1 < 100) {
								ya1 = ya1 + 300;
							} else if (ya1 < 200) {
								ya1 = ya1 + 100;
							} else {
								ya1 = ya1;
							}
							
							con.fillText(nameArr[i], (acArr[i]*13)-15, (ya1*1)+25);
							con.arc(acArr[i]*13, ya1, 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						} else if (acArr[i] < caArr[i]) {
							con.beginPath();
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							con.font = "20px Arial";
							
							var ya2 = acArr[i]*13;
							if (ya2 < 600) {
								ya2 = ya2 * 2.5;
								if (ya2 < 600) {
									ya2 = ya2 + 150;
								}
							} else if (ya2 > 1000) {
								ya2 = (ya2*1) - 15;
							} else {
								ya2 = ya2;
							}
							//con.fillText(acArr[i]*13, ya2, (caArr[i]*1)+15);
							con.fillText(nameArr[i], ya2-15, (caArr[i]*1)+25);
							con.arc(ya2, (caArr[i]*1), 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
						}
					} else if (grArr[i] == 3) {
						if ((acArr[i]*1) > (caArr[i]*1)+10) {
							con.beginPath();
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							
							var xa1 = acArr[i]*13;
							if (xa1 < 1000) {
								xa1 = xa1 + 300;
							} else if (xa1 < 1100) {
								xa1 = xa1 + 200;
							} else {
								xa1 = xa1;
							}
							
							
							con.font = "20px Arial";
							con.fillText(nameArr[i], xa1, 550-(caArr[i]*1)+25);
							con.arc(xa1, 550-(caArr[i]*1), 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						} else if ((acArr[i]*1)+10 < (caArr[i]*1)) {
							con.beginPath();
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							
														
							var xa2 = acArr[i]*9;
							if (xa2 < 200) {
								xa2 = xa2 + 100;
							} else {
								xa2 = xa2;
							}
							
							con.font = "20px Arial";
							con.fillText(nameArr[i], xa2, 130-(caArr[i]*1)+25);
							con.arc(xa2, 130-caArr[i], 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						} else {
							con.beginPath();
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							
							var ya3 = caArr[i]*5;
							if (ya3 < 200) {
								ya3 = ya3 + 100;
							} else {
								ya3 = ya3;
							}
							
							con.font = "20px Arial";
							con.fillText(nameArr[i], acArr[i]*13, (ya3*1)+25);
							con.arc(acArr[i]*13, ya3, 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						}
					} else if (grArr[i] == 4) {
						if ((acArr[i]*1) > (caArr[i]*1)+10) {
							var c1 = caArr[i]*5;
							if (c1 <= 330){
								var cc1 = c1*6;
							} else {
								var cc1 = c1;
							}
							
							con.beginPath();
							con.font = "20px Arial";
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							con.fillText(nameArr[i], (acArr[i]*1)+700, 600-(caArr[i]*1)+25);
							con.arc((acArr[i]*1)+700, 600-(caArr[i]*1), 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						} else if ((acArr[i]*1)+10 < (caArr[i]*1)) {		
							con.beginPath();
							con.font = "20px Arial";
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							con.fillText(nameArr[i], (acArr[i]*1)+300, 400-(caArr[i]*1)+25);
							con.arc((acArr[i]*1)+300, 400-(caArr[i]*1), 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						} else {

							con.beginPath();
							con.font = "20px Arial";
							con.fillStyle = '#FFFFFF';		
							con.strokeStyle = '#FFFFFF';
							con.fillText(nameArr[i], (acArr[i]*1)+300, 580-(caArr[i]*1)+20);
							con.arc((acArr[i]*1)+300, 580-(caArr[i]*1), 2, 0,(Math.PI/180) *360,false);
							con.fill(); 										//ä���
							con.stroke(); 										//�׵θ�
							con.closePath();
							
						}
					}
				}
	
							
				// ���� Ÿ��Ʋ
				con.beginPath();
				con.font = "bold 20px Nanum Square";
				con.fillStyle = '#000000';
				con.setTransform(-1, 0, 0, 1, 100, 100);
				con.fillText("Performance", 300, 300);
				con.closePath();
				
				$('#left_side').show();
				$('#bottom_side').show();
				$('#downbutton').show();
	
			}

			function downloadMatrix() {
				var dataURL = myCanvas.toDataURL('image/jpg');
				dataURL = dataURL.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');
				dataURL = dataURL.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.jpg');

				var aTag = document.createElement('a');
				aTag.download = 'nineMatrix.jpg';
				aTag.href = dataURL;
				aTag.click();
			}
			
			function allCheck(leng) {
				if( $("#allChk").is(':checked') ){
					for (var i = 0; i < leng; i++) {
						var chkname = 'chkname' + i;
						$("input[name="+chkname+"]").prop("checked", true);
					}
				}else{
					for (var i = 0; i < leng; i++) {
						var chkname = 'chkname' + i;
						$("input[name="+chkname+"]").prop("checked", false);
					}
				}
			}
			
			function readPer() {
				frm.submit();
			}
			
			function teamPermission(idx) {
				$.ajax({
					type : "GET",
					url : "../agregado/eachDataControlAjax.php?idx=" + idx,
					contentType : "application/x-www-form-urlencoded; charset=euc-kr",
					success : function(idata) {
						document.getElementById('perDiv').innerHTML = idata;
					}
				});
			}
		</script>

</head>
<body>
	<?php
include_once '../model/function.php';

$move = $_GET['move'];
$check = $_POST['inputChk'];
$searchName = $_POST['searchName'];


if ($move == 1) {
    echo ("<script language=javascript> capalist();</script>");
} else if ($move == 2) {
    echo ("<script language=javascript> capaUserList();</script>");
} else if ($move == 11) {
    echo ("<script language=javascript> maintable(1);</script>");
} else if ($move == 22) {
    echo ("<script language=javascript> maintable(2);</script>");
} else if ($move == 41) {
    echo ("<script language=javascript> achsendMail();</script>");
} else if ($move == 64) {
	echo ("<script language=javascript> searchData();</script>");
}

if ($check == 123) {
    $userIdx = getUserIdx($searchName);
    echo ("<script language=javascript> mboMain($userIdx);</script>");
}

$admin_table .= "<nav class='navbar navbar-default navbar-static-top'>";
$admin_table .= "<div class='navbar-header'><a class='navbar-brand' href='#'>�����ڸ��</a></div>";
$admin_table .= "<div class='container'>";
$admin_table .= "<ul class='nav navbar-nav'>";

$admin_table .= "<li role='presentation' class='dropdown'>";
$admin_table .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-expanded='false'>����<span class='caret'></span></a>";
$admin_table .= "<ul class='dropdown-menu' role='menu'>";
$admin_table .= "<li onclick='maintable(0);'><a href='#'>�����׸����</a></li>";
$admin_table .= "<li onclick='evaluation();'><a href='#'>����Ʈ�ѷ�</a></li>";
$admin_table .= "<li onclick='permission();'><a href='#'>����ڰ���</a></li>";
$admin_table .= "</ul>";
$admin_table .= "</li>";

$admin_table .= "<li role='presentation' class='dropdown'>";
$admin_table .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-expanded='false'>MBO<span class='caret'></span></a>";
$admin_table .= "<ul class='dropdown-menu' role='menu'>";
$admin_table .= "<li onclick='mboMain();'><a href='#'>MBO����</a></li>";
$admin_table .= "</ul>";
$admin_table .= "</li>";

$admin_table .= "<li role='presentation' class='dropdown'>";
$admin_table .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-expanded='false'>������<span class='caret'></span></a>";
$admin_table .= "<ul class='dropdown-menu' role='menu'>";
$admin_table .= "<li onclick='capalist();'><a href='#'>�׸����</a></li>";
$admin_table .= "<li onclick='capaUserList();'><a href='#'>������Ȳ</a></li>";
$admin_table .= "<li onclick='capaUserFinal();'><a href='#'>�����ȸ</a></li>";
$admin_table .= "</ul>";
$admin_table .= "</li>";

$admin_table .= "<li role='presentation' class='dropdown'>";
$admin_table .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-expanded='false'>������<span class='caret'></span></a>";
$admin_table .= "<ul class='dropdown-menu' role='menu'>";
$admin_table .= "<li onclick='achsendMail();'><a href='#'>������Ȳ</a></li>";
$admin_table .= "</ul>";
$admin_table .= "</li>";

$admin_table .= "<li role='presentation' class='dropdown'>";
$admin_table .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-expanded='false'>������<span class='caret'></span></a>";
$admin_table .= "<ul class='dropdown-menu' role='menu'>";
$admin_table .= "<li onclick='teamAgregado();'><a href='#'>����������(�μ���)</a></li>";
$admin_table .= "<li onclick='teamAchivement();'><a href='#'>����������(�μ���)</a></li>";
//$admin_table .= "<li onclick='distribution();'><a href='#'>��ȸ���Ǻ� ������</a></li>";	// ��ȸ���Ǻ� ������ ��������
$admin_table .= "<li onclick='distPerson();'><a href='#'>��ȸ���Ǻ� ������</a></li>";
$admin_table .= "<li onclick='searchData();'><a href='#'>�λ�����ȸ����</a></li>";
$admin_table .= "</ul>";
$admin_table .= "</li>";

$admin_table .= "<li role='presentation' class='dropdown'>";
$admin_table .= "<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-expanded='false'>��Ʈ�ѷ�<span class='caret'></span></a>";
$admin_table .= "<ul class='dropdown-menu' role='menu'>";
$admin_table .= "<li onclick='controller1();'><a href='#'>������Ʈ�ѷ�</a></li>";
$admin_table .= "</ul>";
$admin_table .= "</li>";

$admin_table .= "</ul>";
$admin_table .= "</div>";
$admin_table .= "</nav>";

$admin_table .= "<div id='admintable'>";
$admin_table .= "<ul>����";
$admin_table .= "<li>�����׸� ���� : Ȩ ȭ�鿡 ������ �� ��ũ ���̺� ������ �����ϴ� �� �Դϴ�.</li>";
$admin_table .= "<li>����Ʈ�ѷ� : �� �Ⱓ �ϰ� ���� �� �� ����, ���� ���� ������ �� �ִ� ������ �Դϴ�.</li>";
$admin_table .= "<li>����ڰ��� : �򰡴���ڸ� ����, ���� �� �� �ִ� �������Դϴ�.</li>";
$admin_table .= "</ul>";

$admin_table .= "<ul>MBO";
$admin_table .= "<li>MBO ���� : Ư������ MBO�� ���� �� �� �ִ� �������Դϴ�.</li>";
$admin_table .= "</ul>";

$admin_table .= "<ul>������";
$admin_table .= "<li>�׸���� : �������׸� �����, ���� ���� �� �����ϴ� �� �Դϴ�.</li>";
$admin_table .= "<li>���¼��� : ������ ���������� ������ �� �ִ� ���Դϴ�.</li>";
$admin_table .= "<li>�����ȸ : ����ں��� ������ �������� ������ ��ȸ�� �� �ֽ��ϴ�.</li>";
$admin_table .= "</ul>";

$admin_table .= "<ul>������";
$admin_table .= "<li>��ȸ : ������ KPI, COMMENT, ��ǥ ���� ��ȸ�� �� �ֽ��ϴ�.</li>";
$admin_table .= "<li>���¼��� : �б⸮��, ���ǵ���� ������� �� ���������� �� �� �ֽ��ϴ�.</li>";
$admin_table .= "</ul>";

$admin_table .= "<ul>������ (������)";
$admin_table .= "<li>����������(�μ���) : �μ���, ���޺� ������ ��� ǥ ��ȸ</li>";
$admin_table .= "<li>����������(�μ���) : �μ���, ������ ��� ǥ ��ȸ</li>";
$admin_table .= "<li>��ȸ���Ǻ� ������ : �μ�, �ι�, ��å, ���޺��� �� ���谡��(9 Matrix, �����򰡵�� ��ȸ) </li>";
$admin_table .= "</ul>";
$admin_table .= "</div>";

echo $admin_table;
?>
	</body>
</html>