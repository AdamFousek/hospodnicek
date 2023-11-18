<script setup>
import { ref } from 'vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { NConfigProvider } from 'naive-ui'
import NaiveThemeConfig from '../NaiveThemeConfig.ts'

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
  <div>
    <n-config-provider :theme-overrides="NaiveThemeConfig">
      <Head :title="title"/>

      <Banner/>

      <div
        class="min-h-screen bg-gray-100 dark:from-gray-900 dark:via-gray-900 dark:to-emerald-900 ">
        <nav class="border-b bg-gray-50">
          <!-- Primary Navigation Menu -->
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
              <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                  <Link :href="route('welcome')">
                    <ApplicationMark class="block h-9 w-auto"/>
                  </Link>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                  <NavLink :href="route('inns.index')" :active="route().current('inns.*')">
                    {{ $t('Inns') }}
                  </NavLink>
                </div>
              </div>

              <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div v-if="!$page.props.auth.user" class="flex">
                  <NavLink :href="route('login')" class="m-4">
                    {{ $t('Log in') }}
                  </NavLink>

                  <NavLink :href="route('register')" class="m-4">
                    {{ $t('Register') }}
                  </NavLink>
                </div>

                <!-- Settings Dropdown -->
                <div v-else class="ml-3 relative">
                  <Dropdown align="right" width="48">
                    <template #trigger>
                      <button class="flex items-center gap-2 text-sm border-2 border-transparent rounded-full hover:border-gray-300 focus:outline-none focus:border-sea-pink-300 transition px-4">
                        <span>{{ $page.props.auth.user.username }}</span>
                        <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url"
                             :alt="$page.props.auth.user.username">
                      </button>
                    </template>

                    <template #content>
                      <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ $t('Administration') }}
                      </div>

                      <DropdownLink :href="route('admin.inns.index')">
                        {{ $t('Inns administration') }}
                      </DropdownLink>

                      <!-- Account Management -->
                      <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ $t('Manage Account') }}
                      </div>

                      <DropdownLink :href="route('profile.show')">
                        {{ $t('Profile') }}
                      </DropdownLink>

                      <div class="border-t border-gray-200"/>

                      <!-- Authentication -->
                      <form @submit.prevent="logout">
                        <DropdownLink as="button">
                          Log Out
                        </DropdownLink>
                      </form>
                    </template>
                  </Dropdown>
                </div>
              </div>

              <!-- Hamburger -->
              <div class="-mr-2 flex items-center sm:hidden">
                <button
                  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                  @click="showingNavigationDropdown = ! showingNavigationDropdown">
                  <svg
                    class="h-6 w-6"
                    stroke="currentColor"
                    fill="none"
                    viewBox="0 0 24 24"
                  >
                    <path
                      :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"
                    />
                    <path
                      :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <!-- Responsive Navigation Menu -->
          <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
              <div class="space-y-1">
                <ResponsiveNavLink :href="route('inns.index')" :active="route().current('inns.*')">
                  {{ $t('Inns') }}
                </ResponsiveNavLink>
              </div>

              <div v-if="$page.props.auth.user" class="flex items-center px-4 mt-3">
                <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3">
                  <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url"
                       :alt="$page.props.auth.user.username">
                </div>

                <div>
                  <div class="font-medium text-base text-gray-800">
                    {{ $page.props.auth.user.username }}
                  </div>
                  <div class="font-medium text-sm text-gray-500">
                    {{ $page.props.auth.user.email }}
                  </div>
                </div>
              </div>

              <div v-if="!$page.props.auth.user" class="mt-3 space-y-1">
                <ResponsiveNavLink :href="route('login')" :active="route().current('login')">
                  {{ $t('Log in') }}
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('register')" :active="route().current('register')">
                  {{ $t('Register') }}
                </ResponsiveNavLink>
              </div>
              <div v-else class="mt-3 space-y-1">
                <div class="block px-4 py-2 text-sm text-gray-400">
                  {{ $t('Administration') }}
                </div>
                <ResponsiveNavLink :href="route('admin.inns.index')" :active="route().current('admin.inns.*')">
                  {{ $t('Inns administration') }}
                </ResponsiveNavLink>

                <div class="block px-4 py-2 text-xs text-gray-400">
                  {{ $t('Manage Account') }}
                </div>
                <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                  {{ $t('Profile') }}
                </ResponsiveNavLink>

                <!-- Authentication -->
                <form method="POST" @submit.prevent="logout">
                  <ResponsiveNavLink as="button">
                    Log Out
                  </ResponsiveNavLink>
                </form>
              </div>
            </div>
          </div>
        </nav>

        <!-- Page Heading -->
        <header v-if="$slots.header" class="bg-white shadow">
          <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <slot name="header"/>
          </div>
        </header>

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 md:py-12">
            <slot/>
        </main>
      </div>
    </n-config-provider>
  </div>
</template>
