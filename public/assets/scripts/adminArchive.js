photo=document.getElementById("photo");
preview=document.getElementById("preview");
photo.onchange = evt =>
{
    const [file] = photo.files
    if (file) {
        preview.src = URL.createObjectURL(file)
    }
}
async function deletePhoto(id)
{
    const response = await fetch('/deletePhoto/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
            },
            body: id,
        }
    );
    const responseText = await response.json();
    console.log("HERE")
    if (responseText.result !== 'Y')
    {
        console.log('error while deleting');

    }
    else
    {
        console.log(responseText.data);
        comment=document.getElementById(id);
        comment.remove();
    }
}