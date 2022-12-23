let cover = document.querySelector(".cover");
let popup = document.getElementById('popup');
let popup2 = document.getElementById('popup2');

//Function to structure and restrict phone number entries.
function formatter(value)
{
  if (!value)
    return value;
  const phoneNumber = value.replace(/[^\d]/g, '');
  const phoneNumLength = phoneNumber.length;
  if (phoneNumLength <4)
    return phoneNumber;
  if (phoneNumLength <7)
  {
    return `${phoneNumber.slice(0, 1)}(${phoneNumber.slice(1, 4)}) ${phoneNumber.slice(4)}`;
  }
  return `${phoneNumber.slice(0, 1)}(${phoneNumber.slice(1, 4)}) ${phoneNumber.slice(4, 7)}-${phoneNumber.slice(7, 10)}`;
}

//Formatting phone entries
function updateNum()
{
  const phoneNum = document.getElementById('phone');
  const formattedNumber = formatter(phoneNum.value);
  phoneNum.value = formattedNumber;
}

//Formatting phone updates.
function updateNum2()
{
  const phoneNum2 = document.getElementById('phoneB');
  const formattedNumber2 = formatter(phoneNum2.value);
  phoneNum2.value = formattedNumber2;
}


//Hide popups and covers if cover is clicked.
function hidden()
{


}

cover.addEventListener('click', e => {
  cover.classList.remove("show");
  if(popup != null)
    popup.classList.remove("show");
  if(popup2 != null)
    popup2.classList.remove("show");
})

//Reveal update popup.
if (document.getElementById('check')) {
  popup.classList.add("show");
  cover.classList.add("show");
}

//Reveal delete popup.
if (document.getElementById('check2')) {
  popup2.classList.add("show");
  cover.classList.add("show");
}

//Requiring Email or Phone number for new entries.
function updateRequirements() {
  var email = document.getElementById('email');
  var phone = document.getElementById('phone');
  if (email.value != null)
  {
    phone.required = false;
  }
  else
  {
    phone.required = true;
  }

  if (phone.value != null)
  {
    email.required = false;
  }
  else
  {
    email.required = true;
  }
}

//Requiring Email or Phone number for update popup.
function updateRequirements2() {
  var email = document.getElementById('emailB');
  var phone = document.getElementById('phoneB');
  if (email.value != null)
  {
    phone.required = false;
  }
  else
  {
    phone.required = true;
  }

  if (phone.value != null)
  {
    email.required = false;
  }
  else
  {
    email.required = true;
  }
}

let img = document.querySelector(".img1");
function maximize(x) {
  x[0].style.height = "64px";
}

function normalize() {
  x[0].style.height = "64px";
}

$("#phone").keyup(function(event){
    if(event.keyCode == 8){
        $("#phone").val("");
        return false;
    }
});

$("#phoneB").keyup(function(event){
    if(event.keyCode == 8){
        $("#phoneB").val("");
        return false;
    }
});
