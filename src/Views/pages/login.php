<div class="container">
    <div class="columns is-justify-content-center">
        <div class="column is-6-tablet is-5-desktop is-4-widescreen is-3-fullh">
            <form method="POST" action="/login/" class="box p-5">
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Ваш адрес почты</span>
                    <input
                        required
                        type="email"
                        name="email"
                        class="input"
                        placeholder="email@example.com"
                    />
                </label>
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Пароль</span>
                    <input
                            name="password"
                            type="password"
                            class="input"
                            minlength="8"
                            placeholder=""
                            required
                    />
                </label>
                <div>
                    Нет аккаунта? <a href="/register/">Зарегистрируйтесь</a>
                </div>
                <div class="mb-4">
                    <button type="submit" class="button is-link px-4">Войти</button>
                </div>

            </form>