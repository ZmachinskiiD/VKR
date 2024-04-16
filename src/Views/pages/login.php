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
                        placeholder="joe.bloggs@example.com"
                    />
                </label>
                <label class="is-block mb-4">
                    <span class="is-block mb-2">Пароль</span>
                    <input
                            name="password"
                            type="password"
                            class="input"
                            minlength="6"
                            placeholder="(must be 6+ chars)"
                            required
                    />
                </label>

                <div class="mb-4">
                    <button type="submit" class="button is-link px-4">Зарегистрироваться</button>
                </div>

                <div>
                    <div class="is-size-7 has-text-right">
                        by
                        <a
                            href="https://herotofu.com/start"
                            class="has-text-dark"
                            target="_blank"
                        >HeroTofu</a
                        >
                    </div>
                </div>
            </form>