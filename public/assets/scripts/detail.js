let featured=document.getElementById("featured")
featured.onclick=function()
{
    let user="<?=$user?>";
    if(user===undefined)
    {
        console.log("HERE");
        alert("Зарегистрируйтесь или войдите")
    }
    else
    {
        if(featured.textContent==="Добавить в избранное")
        {
            featured.textContent="В избранном"
        }
        else
        {
            featured.textContent="Добавить в избранное"
            addToFeatured()
        }
    }
    async function deleteFromFeatured()
    {

    }
    async function addToFeatured()
    {
        const response = await fetch('/technical/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                },
                body: '{"name":"John", "age":30, "car":null}',
            }
        );

        const responseText = await response.json();
        if (responseText.result !== 'Y')
        {
            console.log('error while updating');

        }

        else
        {
            console.log(responseText.data);
        }
    }
}