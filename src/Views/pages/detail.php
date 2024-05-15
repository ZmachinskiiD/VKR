<?php
/**
 * @var \Up\Models\Building $building
 * @var $buildingPhotos
 * @var \Up\Models\Comment[] $comments
 * @var $id
 * @var $isFeatured
 * @var $userId
 * @var $isAdmin
 */
$sanitized = htmlspecialchars($building->getDescription(), ENT_QUOTES);
$amogus=str_replace(array("\r\n", "\n"), array("<br />", "<br />"), $sanitized);
if($user===null)
{
    $user="undefined";
}
?>
<div class="content has-background-light">
    <div class="block">
            <div class="block">
            <nav class="level">
            <div class="D_rus_name">
                <?=$building->getRusTitle()?>
            </div>
             <button class="button is-primary" id="featured"><?php if(!($isFeatured)):?>Добавить в избранное<?php else:?>В избранном<?php endif;?></button>
                </nav>
            </div>
            <div class="block">
            <div class="D_deu_name">
                <?=$building->getDeuTitle()?>
            </div>
            </div>
            <div class="block">
            <div class="D_building_info">
                <?=$amogus?>
            </div>
            </div>
    </div>
    <div class="block">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($buildingPhotos as $buildingPhoto):?>
                    <div class="swiper-slide">
                    <img src="<?="/assets/objects/BuildingImages/{$building->getId()}/".$buildingPhoto?> " class="slider-photo">
                    </div>
                <?php endforeach;?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
</div>
<article class="media">
    <form action="/detail/<?=$id?>/" method="post">
    <div class="media-content">
        <nav class="level">
        <div class="level-right">
            <p class="control">
                <textarea class="textarea" id="comment" name="comment" placeholder="Оставьте комментарий..."></textarea>
            </p>
        </div>
            <div class="level-left">
                <div class="level-item">
                    <button  class="button is-info">Submit</button>
                </div>
            </div>
        </nav>

    </div>
    </form>
</article>
<div class="container is-max-desktop">
    <?php foreach ($comments as $comment):?>
    <article class="media" id="<?=$comment->getId()?>">
        <div class="media-content">
            <div class="content">
                <p>
                    <strong><?=$comment->getUserName()?></strong>
                    <br />
                    <?=$comment->getText()?>
                    <br />
                </p>
                <?php if($comment->getUserId()==$userId||$isAdmin===true):?>
                <button id="commentButton"
                onclick="deleteComment(<?=$comment->getId()?>,<?=$comment->getUserId()?>,<?=$userId?>,false)">
                    Удалить комментарий
                </button>
                <?php endif;?>
            </div>
        </div>
    </article>
    <?php endforeach;?>
</div>

<script src="/assets/scripts/swiper-bundle.min.js"></script>
<script src="/assets/scripts/swiper.js"></script>
<script>
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
        const response = await fetch('/deleteComment/', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                },
                body: id,
            }
        );

        const responseText = await response.json();
        console.log(responseText)
        if (responseText.result !== 'Y')
        {
            console.log('error while updating');

        }
        else
        {
            console.log(responseText.data);
        }
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
</script>
