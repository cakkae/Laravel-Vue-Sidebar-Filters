<template>
    <nav class="bg-primary">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button @click="toggle" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
                        Heroicon name: menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                        Heroicon name: x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <span style="color: white; font-size: 20px; font-weight: bold;">PROXY SHOP</span>
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-secondary text-white", Default: "text-white hover:bg-secondary hover:text-white" -->
                        <a href="#" class="bg-secondary text-white px-3 py-2 rounded-md text-sm font-medium">WEBSHOP</a>
                        <a href="#" class="text-white hover:bg-secondary hover:text-white px-3 py-2 rounded-md text-sm font-medium">NOVO U PONUDI</a>
                        <a href="#" class="text-white hover:bg-secondary hover:text-white px-3 py-2 rounded-md text-sm font-medium">AKCIJA</a>
                        <a href="#" class="text-white hover:bg-secondary hover:text-white px-3 py-2 rounded-md text-sm font-medium">KONTAKT</a>
                    </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                    <div>
                        <div class="px-6 py-4 whitespace-no-wrap leading-5 text-black-500">
                            <a href="#" class="text-white hover:bg-secondary px-3 py-2 rounded-md text-sm font-medium">
                                <i class="fal fa-user align-middle" style="color: white;"></i>
                                    {{this.$userName}}
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
        </div>

        <div :class="open ? 'block sm:block': 'hidden sm:hidden'">
            <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-secondary text-white", Default: "text-white hover:bg-secondary hover:text-white" -->
            <a href="#" class="bg-secondary text-white block px-3 py-2 rounded-md text-base font-medium">WEBSHOP</a>
            <a href="#" class="text-white hover:bg-secondary hover:text-white block px-3 py-2 rounded-md text-base font-medium">NOVO U PONUDI</a>
            <a href="#" class="text-white hover:bg-secondary hover:text-white block px-3 py-2 rounded-md text-base font-medium">AKCIJA</a>
            <a href="#" class="text-white hover:bg-secondary hover:text-white block px-3 py-2 rounded-md text-base font-medium">KONTAKT</a>
            </div>
        </div>
        <notificationGroup group="top">
      <div class="fixed inset-0 flex px-4 py-6 pointer-events-none p-6 items-start justify-end">
        <div class="max-w-sm w-full">
          <notification v-slot="{notifications}">
            <div
              class="flex max-w-sm w-full mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-4"
              v-for="notification in notifications"
              :key="notification.id"
            >
              <div class="flex justify-center items-center w-12 bg-green-500">
                <svg
                  class="h-6 w-6 fill-current text-white"
                  viewBox="0 0 40 40"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"
                  ></path>
                </svg>
              </div>

              <div class="-mx-3 py-2 px-4">
                <div class="mx-3">
                  <span class="text-green-500 font-semibold">{{notification.title}}</span>
                  <p class="text-gray-600 text-sm">{{notification.text}}</p>
                </div>
              </div>
            </div>
          </notification>
        </div>
      </div>
    </notificationGroup>
    <notificationGroup group="bottom" position="bottom">
      <div
        class="fixed inset-x-0 bottom-0 flex px-4 py-6 pointer-events-none p-6 items-start justify-end"
      >
        <div class="max-w-sm w-full">
          <notification v-slot="{notifications}">
            <div
              class="flex max-w-sm w-full mx-auto bg-white shadow-md rounded-lg overflow-hidden mt-4"
              v-for="notification in notifications"
              :key="notification.id"
            >
              <div class="flex justify-center items-center w-12 bg-red-500">
                <svg
                  class="h-6 w-6 fill-current text-white"
                  viewBox="0 0 40 40"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"
                  ></path>
                </svg>
              </div>

              <div class="-mx-3 py-2 px-4">
                <div class="mx-3">
                  <span class="text-red-500 font-semibold">{{notification.title}}</span>
                  <p class="text-gray-600 text-sm">{{notification.text}}</p>
                </div>
              </div>
            </div>
          </notification>
        </div>
      </div>
    </notificationGroup>
    </nav>
</template>

<script>
    export default {
        data: function () {
            return {
                open: false,
            }
        },

        methods: {
            toggle() {
                this.open = !this.open
            }
        }
    }
</script>
