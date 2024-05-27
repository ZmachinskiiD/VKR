
async function setCover(image,id)
{
    const response = await fetch('/changePhoto/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
            },
            body: JSON.stringify({"image":image,"id":id})
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
async function deleteImage(image,id)
{
    const response = await fetch('/admin/deletePhoto/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
            },
            body: JSON.stringify({"image":image,"id":id})
        }
    );
    const responseText = await response.json();
    if (responseText.result !== 'Y')
    {
        console.log('error while updating');
    }
    else
    {
        window.location.href =`/admin/updateBuilding/${id}/`
        console.log(responseText.data);
    }
}
function changeLogo(swiper,imageArray,id)
{
    imageId=swiper.activeIndex
    image=imageArray[imageId]
    setCover(image,id)
}
function delimage(swiper,imageArray,id)
{
    imageId=swiper.activeIndex
    image=imageArray[imageId]
    deleteImage(image,id)

}