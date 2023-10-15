function giaiphuongtrinh(){
		var a , b , c , delta , x1 , x2 ;
							a = document.getElementById("number_a").value;
							b = document.getElementById("number_b").value;
							c = document.getElementById("number_c").value;
							var linebreak = "<br/>";
							

							if(a == 0)
							{
								if(b == 0)
								{
									if(c == 0)
									{
										document.getElementById('showkq').innerHTML="Phương trình vô số nghiệm!";
									}
									else
									{
										document.getElementById('showkq').innerHTML="Phương tình vô nghiệm";
									}
								}
								else
								{
									result1 = -c/b;
									document.getElementById('showkq').innerHTML="Phương trình có nghiệm duy nhất : "+ result1;
								}
							}
							else
							{
								delta = b*b-4*a*c;
								if(delta > 0)
								{
									x1 = (-b+Math.sqrt(delta))/(2*a);
									x2 = (-b-Math.sqrt(delta))/(2*a);
									document.getElementById('showkq').innerHTML="Phương trình có 2 nghiệm phân biệt: <br>" + 'x1=' +  x1  + '<br> x2='  + x2;
									
								}
								else if (delta == 0)
								{
									result2= -b/2*a;
									document.getElementById('showkq').innerHTML="Phương trình  có nghiệm kép : x1 = x2 = " + result2;
								}
								else
								{
									document.getElementById('showkq').innerHTML="Phương trình vô nghiệm"	;
								}
							}							
	
}

function tinhtoan()
{
						 var a , b , c;
						a = document.getElementById("number_a").value;
						b = document.getElementById("number_b").value;
						c = document.getElementById("number_c").value;
						var linebreak = "<br/>";
				
						document.write("Toán tử số học: ");document.write(linebreak);
						document.write("a = "+ a + ","+ "b = " + b);document.write(linebreak);
						document.write("a+b = ");
						result = eval(a)+eval(b);
						document.write(result);
						document.write(linebreak);
	
						
						document.write("a-b = ");
						result = a-b;
						document.write(result);
						document.write(linebreak);
		
						
						document.write("a*b = ");
						result = a*b;
						document.write(result);
						document.write(linebreak);

						
						document.write("a/b = ");
						result = a/b;
						document.write(result);
						document.write(linebreak);

						
						document.write("a%b = ");
						result = a%b;
						document.write(result);
						document.write(linebreak);

						
						
						if(typeof(a) == "number",typeof(b) == "number",typeof(c) == "number")
							{	
								document.write("a+b+c = ");
								result = eval(a)+eval(b)+eval(c);
								document.write(result);
								document.write(linebreak);
							}
						else
							{
								document.write("a+b+c = ");
								result = a+b+c;
								document.write(result);
								document.write(linebreak);
							}

						document.write("toán tử so sánh : ");document.write(linebreak);
						
						document.write("a = "+ a + ","+ "b = " + b);
						document.write(linebreak);

						document.write("(a == b) => " );
						result = ( a == b );
						document.write(result);
						document.write(linebreak);

						document.write("(a > b) => " );
						result = ( a > b );
						document.write(result);
						document.write(linebreak);

						document.write("(a < b) => " );
						result = ( a < b );
						document.write(result);
						document.write(linebreak);
	
						document.write("(a >= b) => " );
						result = ( a >= b );
						document.write(result);
						document.write(linebreak);

						document.write("(a <= b) => " );
						result = ( a <= b );
						document.write(result);
						document.write(linebreak);
}
function tinhcv(){
	var 
	a = parseFloat(number_a.value),
	b = parseFloat(number_b.value),
	cv;
	a = document.getElementById("number_a").value;
	b = document.getElementById("number_b").value;
	

	cv=(eval(a)+eval(b))*2;
	document.getElementById('showkq').innerHTML="Chu vi= " + cv;
}
function tinhdt(){
	var 
	a = parseFloat(number_a.value),
	b = parseFloat(number_b.value),
	dt;
	a = document.getElementById("number_a").value;
	b = document.getElementById("number_b").value;

	dt=a*b;
	document.getElementById('showkq').innerHTML="Diện tích= " + dt;
	
}
function lamlai(){
	number_a.value=' ';
	number_b.value=' ';
	number_c.value=' ';
	
	//document.getElementById('showkq').innerHTML=' ';
	document.getElementById('showkq1').innerHTML=' ';
	document.getElementById('showkq2').innerHTML=' ';
	
	
	
}
function doimau(){
	var mau = document.getElementById('mau');
	document.getElementsByClassName('content')[0].style.background = mau.value;
	document.getElementById('title').style.color = 'white';
}
function checkInput ( )

               {

//Kiểm tra user name:

                        If ( document.flogin.USERNAME.value= =””)

               {

                        Alert( “invalidEmail, Vui lòng nhập địa chỉ Email của bạn:”);

                        document.flogin.USERNAME.focus( );

                        return false;

               }

//Kiểm tra password

                        If ( document.flogin.PASSWORD.value= =””)

               {

                        Alert( “ Vui lòng nhập password của bạn vào:”);

                        document.flogin.PASSWORD.focus( );

                        return false;

               }

               Return true;

               }


