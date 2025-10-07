<script setup>
</script>

<template>
    <Head>

    </Head>
    <div>
        <header class="bg-light py-2 mb-3">
            <nav class="container d-flex justify-content-start">
                <span class="fw-semibold me-5">{{ $page.props.auth }}</span>

                <div v-if="$page.props.auth.user">
                    <Link :href="route('logout')" method="post" as="button" type="button"
                          class="text-decoration-none me-2 text-dark">Logout
                    </Link>
                    <Link :href="route('home')"  class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Home'}">Home
                    </Link>
                    <Link :href="route('dashboard')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Dashboard'}">Dashboard
                    </Link>
                    <Link :href="route('about')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'About'}">About
                    </Link>
                </div>
                <div v-else>
                    <Link :href="route('register')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Auth/Register'}">Register</Link>
                    <Link :href="route('login')" class="text-decoration-none me-2 text-dark"
                          :class="{'fw-bold' : $page.component === 'Auth/Login'}">Login</Link>
                </div>
            </nav>
        </header>

        <main class="container">
            <slot />
        </main>
    </div>
</template>



