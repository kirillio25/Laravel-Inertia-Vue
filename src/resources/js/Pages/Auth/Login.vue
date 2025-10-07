<script setup>

import { useForm } from "@inertiajs/vue3";
import TextInput from "../Components/TextInput.vue";

const form = useForm({
    email: null,
    password: null,
    remember: null,
});

const sudmit = () => {
    console.log(form);
    form.post(route("login"), {
        onError: () => form.reset("password"), // сбросить форму если есть ошибка
    });
};

</script>
<template>
    <Head title="Login"/>

    <h1>login</h1>

    <form @submit.prevent="sudmit">
        <TextInput
            name="email"
            type="email"
            v-model="form.email"
            :message="form.errors.email"
        />

        <TextInput
            name="password"
            type="password"
            v-model="form.password"
            :message="form.errors.password"
        />

        <div>
            <label>Запомнить меня</label>
            <input type="checkbox" v-model="form.remember">
        </div>

        Зарегистрироваться ? <a :href="route('register')">тут</a>

        <button :disabled="form.processing" >Войти</button>
    </form>
</template>

