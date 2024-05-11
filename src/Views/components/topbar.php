<?php
$user=\Up\Services\UserService::getUserName();
?>
<div class="tabs is-centered is-fullwidth">
    <section class="hero">
        <div class="hero-body">
            <p class="title">Здания</p>
            <p class="subtitle">Кенигсбергского университета</p>
        </div>
    </section>

    <ul>
        <li>
            <a>
        <span class="icon is-small"
        ><i class="fas fa-image" aria-hidden="true"></i
            ></span>
                <span><a href="/">На главную</a></span>
            </a>
        </li>
        <li>
            <a>
        <span class="icon is-small"
        ><i class="fas fa-music" aria-hidden="true"></i
            ></span>
                <span><a href="/archive/">Архив</a></span>
            </a>
        </li>
        <li>
            <a>
        <span class="icon is-small"><i class="fas fa-film" aria-hidden="true"></i></span>
                <span><a href="/route/">Карта </a></span>
            </a>
        </li>
        <li>
    </ul>
    <button class="js-modal-trigger" data-target="modal-js-example">
        <?php if($user!==null):?>
        <span id="userName"><?=$user?></span>
        <?php else:?>
        <span id="userName"><?="Войти"?></span>
        <?php endif;?>
    </button>
</div>
<div id="modal-js-example" class="modal">
    <div class="modal-background"></div>

    <div class="modal-content">
        <div class="box">
            <button id="LogOut">ТЕСТ</button>
        </div>
    </div>

    <button class="modal-close is-large" aria-label="close"></button>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Functions to open and close a modal
        function openModal($el) {
            $el.classList.add('is-active');
        }

        function closeModal($el) {
            $el.classList.remove('is-active');
        }

        function closeAllModals() {
            (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                closeModal($modal);
            });
        }

        // Add a click event on buttons to open a specific modal
        (document.querySelectorAll('.js-modal-trigger') || []).
        forEach
        (
            ($trigger) =>
            {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () =>
                {
                    const userName=document.getElementById("userName");
                    if(userName.textContent!=='Войти')
                    {
                        openModal($target);
                    }
                    else
                    {
                        location.href = '/login/';
                    }
                }
                );
        ``  }
        );

        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
            const $target = $close.closest('.modal');

            $close.addEventListener('click', () => {
                closeModal($target);
            });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
            if(event.key === "Escape") {
                closeAllModals();
            }
        });
    });
</script>
<script>

    const userName=document.getElementById("userName");
    const LogOut=document.getElementById("LogOut");
    LogOut.addEventListener("click",async ()=>
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
                userName.textContent="Войти"
            }
    }
    )

</script>

