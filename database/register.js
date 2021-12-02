$(document).ready(function () {
  $("#btn-register").click(function () {
    if ($("#name").val() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa tu nombre!",
      });
      return false;
    } else if ($("#last_name").val() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa tus apellido!",
      });
      return false;
    } else if ($("#username").val() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa un usuario!",
      });
      return false;
    } else if ($("#email").val() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa tu correo!",
      });
      return false;
    } else if ($("#password1").val() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa una contraseña!",
      });
      return false;
    } else if ($("#password2").val() == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "No haz confirmado la contraseña!",
      });
      return false;
    }

    var action = "data";
    var name = $("#name").val();
    var last_name = $("#last_name").val();
    var username = $("#username").val();
    var email = $("#email").val();
    var gender = parseInt($("#gender").val());
    var password = $("#password1").val();
    var pass2 = $("#password2").val();

    if (!validateEmail(email)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa un correo electrónico valido!",
      });
      return false;
    }
    if (!validatePass(password)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa una contraseña de al menos ocho caractéres!",
      });
      return false;
    } else if ($("#gender").val() == "0") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Ingresa tu sexo!",
      });
      return false;
    }
    if (!validateSamePass(password, pass2)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Las contraseñas no coinciden!",
      });
      $("#contraseña").val("");
      $("#contraseña2").val("");
      return false;
    }

    $.ajax({
      url: "database/Register.php",
      method: "POST",
      data: {
        action: action,
        name: name,
        last_name: last_name,
        username: username,
        email: email,
        password: password,
        gender: gender,
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

    function validatePass(pass) {
      if (pass.length > 7) {
        return true;
      }
    }

    function validateSamePass(pass, pass2) {
      if (pass === pass2) {
        return true;
      }
    }

    function checkResult(dato) {
      if (dato == 1) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Usuario existente. Ingresa otro nombre de usuario!",
        });
        return false;
      }
      if (dato == 2) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "El correo ya está en uso. Ingresa otro correo!",
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
