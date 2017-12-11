// JavaScript Document

//function validate
function is_username(obj)
{
	var Re_username = new RegExp(/^([a-z|A-Z|_|\.|0-9][a-z|A-Z|_|\.|0-9]+)$/);
	return Re_username.test(obj);
	//user ki tự đầu phải là kí tự chữ. k thể là số. các kí tự sau lặp có thẻ là chứ _ .  or sô
}

function is_password(obj)
{
	Re_password = new RegExp(/^([a-z|A-Z|0-9])([a-z|A-Z|0-9][a-z|A-Z|0-9][a-z|A-Z|0-9][a-z|A-Z|0-9])([a-z|A-Z|0-9]+)$/);
	return Re_password.test(obj);
	//pass : 6 kí tự
}

function is_phone(obj)
{
	var Re_phone = new RegExp(/^(\d{6,11})$/);
	return Re_phone.test(obj);
	//dienthoai : 6-11 số
}

function is_Email(obj)
{
	var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(obj);	
}

function is_Date(obj)
{
	var Re_date = new RegExp(/^([0-9]{4})\-(\d{1,2})\-(\d{1,2})$/);
	return Re_date.test(obj);
	//bắt định dạng : yyyy-mm-dd 
}

function is_number(obj)
{
	var Re_phone = new RegExp(/^\d+$/);
	return Re_phone.test(obj);
	//chi co the la so
}


/*-------------------validate page register-----------------------*/
//validate mod=register
function mod_register() {
	//alert("111");
	//var flag test
	flag1 = 0;
	flag2 = 0;
	flag3 = 0;
	flag4 = 0;
	flag5 = 1;
	flag6 = 0;
	flag7 = 0;
	
	//validate user
	if($('#user').val() == "")
	{
		$('#error_user').html('Tên không được để trống !');	
		flag1 = 0;
	}
	else if(is_username($('#user').val())== false)
	{
		$('#error_user').html('Tên đăng nhập nhập sai quy tắc!');	
		flag1 = 0;
	}
	else
	{
		$('#error_user').html('');	
		flag1 = 1;
	}
	
	//validate pass
	if($('#pass').val() == "")
	{
		$('#error_pass').html('Mật khẩu không được để trống !');	
		flag2 = 0;
	}
	else if(is_password($('#pass').val())== false)
	{
		$('#error_pass').html('Mật khẩu nhập sai quy tắc(tối thiểu 6 kí tự)!');	
		flag2 = 0;
	}
	else
	{
		$('#error_pass').html('');	
		flag2 = 1;
	}
	
	//validate re-pass
	if($('#pass').val() != $('#re_pass').val())
	{
		$('#error_re_pass').html('Mật khẩu nhập lại không giống nhau!');	
		flag3 = 0;
	}
	else
	{
		$('#error_re_pass').html('');	
		flag3 = 1;
	}
	
	//validate email
	if($('#email').val() == "")
	{
		$('#error_email').html('Email không được để trống !');	
		flag4 = 0;
	}
	else if(is_Email($('#email').val())== false)
	{
		$('#error_email').html('Email nhập sai quy tắc (XXXXXX@XXX.XXX)!');	
		flag4 = 0;
	}
	else
	{
		$('#error_email').html('');	
		flag4 = 1;
	}
	

	//validate dienthoai
	flag6 =1;
	if($('#dienthoai').val() != "") {
		if(is_phone($('#dienthoai').val()) == false)
		{
			$('#error_dienthoai').html('Số điện thoại chỉ là số(6-11 số)!');	
			flag6 = 0;
		}
		else
		{
			$('#error_dienthoai').html('');	
			flag6 = 1;
		}
	
	}
	//validate ngaysinh
	flag7 = 1;
	if($('#ngaysinh').val() != "") {	
		
	
		if(is_Date($('#ngaysinh').val()) == false)
		{	
		
				$('#error_ngaysinh').html('Ngày sinh phải đúng định dạng yyyy-mm-dd hoặc yyyy-mm-dd)!');	
				flag7 = 0;
		}
		else
		{
			$('#error_ngaysinh').html('');	
			flag7 = 1;
		}
	}
	//alert(flag1+""+flag2+""+flag3+""+flag4+""+flag5+""+flag6+""+flag7	)
	if(flag1 == 0 || flag2 == 0 || flag3 == 0 || flag4 == 0 || flag5 == 0 || flag6 == 0 ||flag7 == 0)
		return false;
	else
		return true;

}
