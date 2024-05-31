const button=document.getElementById("button")
let password=document.getElementById("password");
let passwordConfirm=document.getElementById("passwordConfirm");
let username=document.getElementById("username");
let form=document.getElementById("form");
button.onclick=function ()
{
    const Email=document.getElementById("email");
    if(Email.value==""||!(Email.value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)))
    {
        alert("Неверный формат почты")
    }
    else if(username.value=="")
    {
        alert("Введите имя")
    }
    else if(password.value<8)
    {
        alert("Слишком котороткий пароль")
    }
    else if(password.value!==passwordConfirm.value)
    {
        alert("Пароли не совпадют")
    }
    else
    {
        var email=document.getElementById("email").value
        var message=checkUserName(email)
    }

}
async function checkUserName(email)
{
    const response = await fetch('/checkemail/', {
            method: 'POST',
            headers: {'Content-Type': 'application/json;charset=utf-8',},
            body: email,
        }
    );
    const responseText = await response.json();
    if (responseText.result !== 'Y')
    {console.log('error while updating');}
    else
    {
        if(responseText.data==false)
        {
            let form=document.getElementById("form");
            form.submit();
        }
        else
        {
            alert("Такая почта уже используется")
        }

    }
}