$(document).ready(function () {
  $("#register").on("click", (e) => {
    e.preventDefault();
    let name = $("#name").val();
    let email = $("#email").val();
    let psw = $("#psw").val();
    let pswrepeat = $("#psw-repeat").val();
    let mobile = $("#mobile").val();
    if (psw == pswrepeat && psw != "" && psw != null) {
      $.ajax({
        type: "POST",
        url: "helper/helper.php",
        data: {
          name: name,
          email: email,
          psw: psw,
          mobile: mobile,
          action: "signup",
        },
        success: function (res) {
          if (res == 1) {
            alert("Registered successfully!");
            window.location = "login.php";
          } else {
            alert("Please fill all the required details");
          }
        },
      });
    } else {
      alert("Password doesn't match");
    }
  });

  $("#login").on("click", function (e) {
    e.preventDefault();
    let email = $("#uname").val();
    let pass = $("#pass").val();

    $.ajax({
      type: "POST",
      url: "helper/helper.php",
      data: {
        email: email,
        pass: pass,
        action: "login",
      },
      success: function (res) {
        if (res == 1) {
          window.location.href = "admin/index.php";
        } else if (res == 0) {
          window.location.href = "user/index.php";
        } else {
          console.log(res);
          alert("Please enter correct email and password");
        }
      },
    });
  });

  $("#otp").on("click", () => {
    alert("Please Wait!!");
    let email = $("#email_id").val();
    // console.log(1);
    if (email != null && email != "") {
      $.ajax({
        type: "POST",
        url: "helper/helper.php",
        data: {
          action: "otp",
          email: email,
        },
        success: function (res) {
          console.log(res);
          if (res == 1) {
            alert("OTP has been sent");
            $("#otp").css("display", "none");
            $("#otpval").css("display", "block");
            $("#otpverify").css("display", "block");
          } else {
            alert("Enter correct email address");
          }
        },
      });
    }
  });

  $("#otpverify").on("click", function () {
    let otpval = $("#otpval").val();
    $.ajax({
      type: "POST",
      url: "helper/helper.php",
      data: {
        action: "otpverify",
        otpval: otpval,
      },
      success: function (res) {
        // console.log(res);
        alert("Otp matched");
        $("#otp").css("display", "none");
        $("#otpval").css("display", "none");
        $("#otpverify").css("display", "none");
        $("#newpass").css("display", "block");
        $("#newpass2").css("display", "block");
        $("#set").css("display", "block");
      },
    });
  });

  $("#set").on("click", function () {
    let newpass = $("#newpass").val();
    let newpass2 = $("#newpass2").val();
    let email = $("#email_id").val();
    console.log(email);
    if (newpass != null && newpass != "" && newpass == newpass2) {
      $.ajax({
        type: "POST",
        url: "helper/helper.php",
        data: {
          action: "setPass",
          newpass: newpass,
          email: email,
        },
        success: function (res) {
          console.log(res);
          if (res == 1) {
            alert("Password has been chnaged");
            window.location.href = "login.php";
          }
        },
      });
    } else {
      alert("Please enter correct password");
    }
  });

  $("#addsub").on("click", () => {
    window.location.href = "addSub.php";
  });

  $("#addSubButton").on("click", () => {
    var subName = $("#addSub").val();
    subName = subName.toLowerCase();
    // console.log(subName);
    $.ajax({
      type: "POST",
      url: "../helper/helper.php",
      data: {
        action: "AddSub",
        subName: subName,
      },
      success: function (res) {
        if (res == 1) {
          window.location.href = "addQues.php";
        } else {
          alert("Please Add Subject");
        }
      },
    });
  });

  $("#addQuesButton").on("click", () => {
    let sub = $("#nameOfsub").val();
    sub = sub.toLowerCase();
    let ques = $("#questionToBe").val();
    let opt1 = $("#opt1").val();
    let opt2 = $("#opt2").val();
    let opt3 = $("#opt3").val();
    let cor = $("#correct").val();
    $.ajax({
      type: "POST",
      url: "../helper/helper.php",
      data: {
        action: "addQues",
        subName: sub,
        ques: ques,
        opt1: opt1,
        opt2: opt2,
        opt3: opt3,
        cor: cor,
      },
      success: function (res) {
        console.log(res);
      },
    });
  });

  $.ajax({
    type: "POST",
    url: "../helper/helper.php",
    data: {
      action: "quizDetail",
    },
    success: function (res) {
      let res1 = JSON.parse(res);
      // console.log(res1);
      for (let i = 0; i < res1.length; i++) {
        console.log(res1[i]["name"]);
        let div = $("<div></div>");
        div.addClass("quiz1");
        let h3 = $("<h3></h3>");
        let h4 = res1[i]["name"].toUpperCase();
        h3.html(h4);
        div.append(h3);
        let inp = $(
          "<input onclick='masterQuiz(" + res1[i]["subject_id"] + ")'></input>"
        );
        inp.attr("type", "button");
        inp.attr("value", res1[i]["name"]);
        inp.addClass("takeQuiz");
        div.append(inp);
        $("#quizDiv").append(div);
      }
      // console.log(arr);
    },
  });
  $.ajax({
    type: "POST",
    url: "../helper/helper.php",
    data: {
      action: "quizMaster",
    },
    success: function (res) {
      let res1 = JSON.parse(res);
      console.log(res1);
      let ol = $("<ol></ol>");
      for (let i = 0; i < res1.length; i++) {
        let li = $("<li></li>").html("<h4>" + res1[i]["question"] + "</h4><br>");
        li.append(
          "<input type='radio' name='" +
            res1[i]["ques_id"] +
            "' value='" +
            res1[i]["op1"] +
            "' ><label>" +
            res1[i]["op1"] +
            "</label><br>"
        );
        li.append(
          "<input type='radio' name='" +
            res1[i]["ques_id"] +
            "' value='" +
            res1[i]["op2"] +
            "' ><label>" +
            res1[i]["op2"] +
            "</label><br>"
        );
        li.append(
          "<input type='radio' name='" +
            res1[i]["ques_id"] +
            "' value='" +
            res1[i]["op3"] +
            "' ><label>" +
            res1[i]["op3"] +
            "</label><br><br>"
        );
        ol.append(li);
      }
      $("#radioForm").prepend(ol);
    },
  });
  $("#res").on("click",function(e){
    e.preventDefault;
    $.ajax({
      type: "POST",
      url: "../helper/helper.php",
     data:$("#radioForm").serialize(),
      success: function (res) {
        console.log(res);
        $(".modal-body > p").html("You scored " + res + " marks");
        $("#modal2").modal('show');
      },
    });
  });
  $("#closeIt").on("click", function() {
    $("#modal2").css('display', 'none');
    window.location.reload();
  });
});

function masterQuiz(sub_id) {
  $.ajax({
    type: "POST",
    url: "../helper/helper.php",
    data: {
      action: "masterQuiz",
      sub_id: sub_id,
    },
    success: function (res) {
      let res1 = JSON.parse(res);
      console.log(res1);
      if (res1 != 0) {
        window.location.href = "master.php";
      } else {
        alert("Please chose other subject");
      }
    },
  });
}

// function quiz(sub_id){
//   console.log(sub_id);// let div=$("<div></div>");
// div.addClass("quiz1");
//   let h3=$("<h3></h3>");
// h3.html(res[i]['name']);
//   $(".quiz1").append(h3)
//     type: "POST",
//     url: "../helper/helper.php",
//     data: {
//       action: "phpQuiz",$("#otpverify").on("click", function () {
//   let otpval = $("#otpval").val();
//   $.ajax({
//     type: "POST",
//     url: "helper/helper.php",
//     data: {
//       action: "otpverify",
//       otpval: otpval,
//     },
//     success: function (res) {
//       // console.log(res);
//       alert("Otp matched");
//       $("#otp").css("display", "none");masterQuiz
//         $("#formdata").append("<li><strong>" + response[i]["question"] + "</strong><ol>");
//         $("#formdata").append(
//           `<input type='radio' name=${response[i]["ques_id"]} value=${response[i]["op1"]}> <label>${response[i]["op1"]}</label><br>`
//         );
//         $("#formdata").append(
//           `<input type='radio' name=${response[i]["ques_id"]} value=${response[i]["op2"]}> <label>${response[i]["op2"]}</label><br>`
//         );
//         $("#formdata").append(
//           `<input type='radio' name=${response[i]["ques_id"]} value=${response[i]["op3"]}> <label>${response[i]["op3"]}</label><br>`
//         );
//         $("#formdata").append("</ol></li>");
//       }
//       $("#formdata").append("</ol>");
//       $("#formdata").append("<input type='button' onclick='checkResult()' value='Check'>");
//     },
//   });
// }

// function checkResult(){
//   $.ajax({
//     type:'POST',
//     url:'../helper/helper.php',
//     data:{
//       'formdata':$("#formdata").serialize(),
//       'action':'result'
//     },
//     success:function(res){
//       console.log(res);
//     }
// });
// }

//otp verification

// $("#otp").on("click", function () {
//   alert("Please wait !!!");
//   function quiz(sub_id){
//     console.log(sub_id);
//     $.ajax({
//       type: "POST",
//       url: "../helper/helper.php",
//       data: {
//         action: "phpQuiz",
//         sub_id:sub_id
//       },
//       success: function (res) {
//         let response = JSON.parse(res);
//         $("#divuser").css('display','none');
//         $("#formdata").append("<ol class='d'>");
//         for (let i = 0; i < response.length; i++) {
//           console.log(response[i]["question"]);
//           $("#formdata").append("<li><strong>" + response[i]["question"] + "</strong><ol>");
//           $("#formdata").append(
//             `<input type='radio' name=${response[i]["ques_id"]} value=${response[i]["op1"]}> <label>${response[i]["op1"]}</label><br>`
//           );
//           $("#formdata").append(
//             `<input type='radio' name=${response[i]["ques_id"]} value=${response[i]["op2"]}> <label>${response[i]["op2"]}</label><br>`
//           );
//           $("#formdata").append(
//             `<input type='radio' name=${response[i]["ques_id"]} value=${response[i]["op3"]}> <label>${response[i]["op3"]}</label><br>`
//           );
//           $("#formdata").append("</ol></li>");
//         }
//         $("#formdata").append("</ol>");
//         $("#formdata").append("<input type='button' onclick='checkResult()' value='Check'>");
//       },
//     });
//   }
// let email = $("#email_id").val();
// console.log(1);
// if (email != null && email != "") {
//   $.ajax({
//     type: "POST",
//     url: "helper/helper.php",
//     data: {
//       action: "otp",
//       email: email,
//     },
//     success: function (res) {
//       // console.log(res);
//       if (res == 1) {
//         alert("OTP has been sent");
//         $("#otp").css("display", "none");
//         $("#otpval").css("display", "block");
//         $("#otpverify").css("display", "block");
//       } else {
//         alert("Enter correct email address");
//       }
//     },
//   });
// }
// });

// $("#otpverify").on("click", function () {
//   let otpval = $("#otpval").val();
//   $.ajax({
//     type: "POST",
//     url: "helper/helper.php",
//     data: {
//       action: "otpverify",
//       otpval: otpval,
//     },
//     success: function (res) {
//       // console.log(res);
//       alert("Otp matched");
//       $("#otp").css("display", "none");
//       $("#otpval").css("display", "none");
//       $("#otpverify").css("display", "none");
//       $("#newpass").css("display", "block");
//       $("#newpass2").css("display", "block");
//       $("#set").css("display", "block");
//     },
//   });
// });

// $("#set").on("click", function () {
//   let newpass = $("#newpass").val();
//   let newpass2 = $("#newpass2").val();
//   let email = $("#email_id").val();
//   console.log(email);
//   if (newpass != null && newpass != "" && newpass == newpass2) {
//     $.ajax({
//       type: "POST",
//       url: "helper/helper.php",
//       data: {
//         action: "setPass",
//         newpass: newpass,
//         email: email,
//       },
//       success: function (res) {
//         console.log(res);
//         if (res == 1) {
//           alert("Password has been chnaged");
//         }
//       },
//     });
//   } else {
//     alert("Please enter correct password");
//   }
// });

//   $.ajax({
//     type:'POST',
//     url:"../helper/helper.php",
//     data:{
//       action:'subject'
//     },
//     success:function(res){
//       let response=JSON.parse(res);

//       for(let i=0;i<response.length;i++){
//         console.log(response[i]['name']);
//         $('#divuser').append('<div id="user1"><input type="button" class="subbt" value="'+response[i]['name']+' Quiz" onclick="quiz('+response[i]['subject_id']+')"></div>');
//       }
//     }
//   });
