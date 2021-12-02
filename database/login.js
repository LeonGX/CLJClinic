$(document).ready(function () {
    $("#btn-login").click(function () {
      if ($("#user").val() == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Ingresa tu correo o tu nombre de usuario!",
        });
        return false;
      } else if ($("#password").val() == "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Ingresa tu contraeña!",
        });
        return false;
      } 
  
      var action = "data";
      var user = $("#user").val();
      var password = $("#password").val();
     
  
     
  
      $.ajax({
        url: "database/Login.php",
        method: "POST",
        data: {
          action: action,
          user : user,
          password : password
          
        },
        success: function (response) {
          checkResult(response);
        },
      });
  
      function validateEmail(email) {
        const re =
          /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
      }
  
  
      function checkResult(dato) {
        if (dato == 1) {
          document.location.href = "dashboard.php"
        }
        if (dato == 2) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Usuario o contraseña incorrectos!",
          });
          return false;
        }
        if (dato == 3) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Registro exitoso!",
            showConfirmButton: false,
            timer: 5500,
          });
          setTimeout(() => {
            document.location.href = "login.html";
          }, 1500);
        }
        if (dato == 4) {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Lo sentimos, algo salió mal!",
          });
          return false;
        }
      }
    });
  });
  