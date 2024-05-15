<div class="container">
    <div class="columns is-justify-content-center">
        <div class="column is-6-tablet is-5-desktop is-4-widescreen is-3-fullh">
            <form method="POST" action="/register/" class="box p-5">
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Ваш адрес почты</span>
                    <input
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
                            name="username"
                            type="text"
                            class="input"
                            minlength="6"
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
                            minlength="6"
                            placeholder="Введите пароль"
                            required
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
                            required
                    />
                </label>
                <div class="mb-4">
                    <button type="submit" class="button is-link px-4">Зарегистрироваться</button>
                </div>
            </form>