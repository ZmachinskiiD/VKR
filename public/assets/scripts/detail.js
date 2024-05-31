function deleteComment(Id,userId,commentUser,isAdmin)
{
    if(userId===commentUser || isAdmin===true)
    {
        const comment=document.getElementById(Id);
        comment.remove();
        deleteCommentFromDatabase(Id)
    }

}
let featured=document.getElementById("featured")
featured.onclick=function()
{
    let user="<?=$user?>";
    let id="<?=$id?>"
    if(user==='undefined')
    {
        console.log("HERE");
        alert("Зарегистрируйтесь или войдите")
    }
    else
    {
        if(featured.textContent==="Добавить в избранное")
        {
            featured.textContent="В избранном"
            addToFeatured()

        }
        else if(featured.textContent==="В избранном")
        {
            featured.textContent="Добавить в избранное"
            deleteFromFeatured()
        }
    }
    async function addToFeatured()
    {
        const response = await fetch('/addToFeatured/', {
                method: 'POST',
                headers: {'Content-Type': 'application/json;charset=utf-8',},
                body: id,
            }
        );
        const responseText = await response.json();
        if (responseText.result !== 'Y')
        {console.log('error while updating');}
        else
        {console.log(responseText.data);}
    }
    async function deleteFromFeatured()
    {
        const response = await fetch('/deleteFromFeatured/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                },
                body: id,
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

async function deleteCommentFromDatabase(id)
{
    const response = await fetch('/deleteComment/', {method: 'POST',
        headers: {'Content-Type': 'application/json;charset=utf-8',},
        body: id,}
    );
    const responseText = await response.json();
    console.log(responseText)
    if (responseText.result !== 'Y')
    {console.log('error while updating');}
    else
    {console.log(responseText.data);}
}
async function addComment(userName)
{
    const response = await fetch('/addComment/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
            },
            body: id,
        }
    );
}