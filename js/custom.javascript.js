/*document.getElementsByName("myform")[0].addEventListener("submit",validateForm,false);*/
		function validateForm(e)
		{	alert("Called");
			var nameErr = document.getElementById("nameErr");
			var emailErr = document.getElementById("emailErr");
			var moblieErr = document.getElementById("moblieErr");

			var name = this.name.value;
			var email = this.email.value;
			var moblie = this.moblie.value;

			var namePattern = /^[a-zA-Z]+$/;
			var emailPattern = /^[a-zA-Z0-9\.\_\-]+@[a-zA-Z0-9\.\_\-]+\.[a-z\.]{2,5}$/;
			var mobliePattern = /^\d{10}$/

			if (name=="")
			{
				e.preventDefault();
				nameErr.innerHTML = "Please enter full name";
			}

			else if(namePattern.test(name)==false)
			{
				e.preventDefault();
				nameErr.innerHTML = "Please enter valid name";
			}

			if (email=="")
			{
				e.preventDefault();
				emailErr.innerHTML = "Please enter email";
			}

			else if(emailPattern.test(email)==false)
			{
				e.preventDefault();
				emailErr.innerHTML = "Please enter valid email";
			}
	
			if (moblie=="")
			{
				e.preventDefault();
				moblieErr.innerHTML = "Please enter modile number";
			}

			else if(mobliePattern.test(moblie)==false)
			{
				e.preventDefault();
				moblieErr.innerHTML = "Please enter valid modile number";
			}



			//data to be sent to server
              post_data = $("#contactUs").serialize();
              //Ajax post data to server
                  $.post('/QNP/contactUs.php', post_data, function(response){  
                      if(response == "1")
                          {
                               $("#response").text("Thank you for contacting us. We shall get in touch with you soon.");
                           $(".contact-msg").show();
                           setTimeout(reloadPage,3000);
                          }
                      else{
                              $("#response").text("Error Occured.Please try after some time.");
                              console.log(response);
                              $(".contact-msg").show();
                          setTimeout(reloadPage,3000);
                      } //alert("manik.biradar9@gmail.com");
                      });
		}