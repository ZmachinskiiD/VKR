<div class="container">
    <div class="columns is-justify-content-center">
        <div class="column is-6-tablet is-5-desktop is-4-widescreen is-3-fullh">
            <form method="POST" action="/register/" class="box p-5" id="form">
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Ваш адрес почты</span>
                    <input
                        id="email"
                        required
                        name="email"
                        type="email"
                        class="input"
                        placeholder="email@example.com"
                    />
                </label>
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Ваше имя</span>
                    <input
                            id="username"
                            name="username"
                            type="text"
                            class="input"
                            minlength="8"
                            placeholder="Введите ваше имя"
                            required
                    />
                </label>
                <label class="is-block mb-4">
                    <span class="is-block mb-2">8+символов. Хотя бы 1 буква и цифра</span>
                    <input
                            name="password"
                            type="password"
                            class="input"
                            minlength="8"
                            placeholder="Введите пароль"
                            required
                            id="password"
                    />
                </label>
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Подтвердите пароль</span>
                    <input
                            name="passwordConfirmation"
                            type="password"
                            class="input"
                            minlength="6"
                            placeholder="Подтвердите пароль"
                            id="passwordConfirm"
                            required
                    />
                </label>
                <div>
                    Уже есть аккаунт? <a href="/login/">Войти</a>
                </div>
                <div class="mb-4">
                    <button type="button" id="button" class="button is-link px-4">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/assets/scripts/registration.js"></script>