<script setup>
import { useForm } from "@inertiajs/vue3";
import { Head, Link } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    avatar: null,
});

const change = (e) => {
    form.avatar = e.target.files[0];
};

const submit = () => {
    form.post(route("register"), {
        onError: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />

    <div class="container mt-5" style="max-width: 500px;">
        <h2 class="mb-4 text-center">Регистрация</h2>

        <form @submit.prevent="submit" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label for="avatar" class="form-label">Аватар</label>
                <input
                    type="file"
                    id="avatar"
                    class="form-control"
                    @input="change"
                />
                <div v-if="form.errors.avatar" class="text-danger small">
                    {{ form.errors.avatar }}
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input
                    type="text"
                    id="name"
                    v-model="form.name"
                    class="form-control"
                    placeholder="Введите имя"
                />
                <div v-if="form.errors.name" class="text-danger small">
                    {{ form.errors.name }}
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    v-model="form.email"
                    class="form-control"
                    placeholder="Введите email"
                />
                <div v-if="form.errors.email" class="text-danger small">
                    {{ form.errors.email }}
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input
                    type="password"
                    id="password"
                    v-model="form.password"
                    class="form-control"
                    placeholder="Введите пароль"
                />
                <div v-if="form.errors.password" class="text-danger small">
                    {{ form.errors.password }}
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                <input
                    type="password"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    class="form-control"
                    placeholder="Повторите пароль"
                />
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    Уже есть аккаунт?
                    <Link :href="route('login')" class="text-decoration-none">
                        Войти
                    </Link>
                </div>

                <button
                    type="submit"
                    class="btn btn-primary"
                    :disabled="form.processing"
                >
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</template>
