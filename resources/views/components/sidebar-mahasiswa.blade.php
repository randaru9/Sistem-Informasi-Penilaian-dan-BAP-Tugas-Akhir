<div class="flex justify-between">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 my-2 ms-3 text-sm text-white hover:text-blue1 rounded-lg sm:hidden hover:bg-white">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>
    <button data-modal-target={{ $modal }} data-modal-toggle={{ $modal }} type="button"
        class="inline-flex items-center p-2 my-2 mx-3 text-sm text-black hover:text-blue1 rounded-lg sm:hidden hover:bg-white stroke-white hover:stroke-blue1">
        <span class="sr-only">Open sidebar</span>
        <svg width="21" height="23" viewBox="0 0 21 23" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.9046 7.78811C16.9046 6.03687 16.2525 4.35736 15.0915 3.11905C13.9306 1.88073 12.3561 1.18506 10.7143 1.18506C9.07248 1.18506 7.49793 1.88073 6.33701 3.11905C5.17609 4.35736 4.5239 6.03687 4.5239 7.78811C4.5239 15.4917 1.42871 17.6927 1.42871 17.6927H19.9998C19.9998 17.6927 16.9046 15.4917 16.9046 7.78811Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12.5029 20.7866C12.3215 21.0993 12.0612 21.3589 11.7479 21.5393C11.4346 21.7197 11.0795 21.8147 10.718 21.8147C10.3565 21.8147 10.0014 21.7197 9.68812 21.5393C9.37489 21.3589 9.11448 21.0993 8.93311 20.7866" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-blue1 ">
            <ul class="mt-7 space-y-6 font-medium">
                <li class=" w-[97%]">
                    <p class="font-poppins font-bold text-3xl text-white">Sistem Informasi Penilaian dan BAP Tugas Akhir
                    </p>
                </li>
                <li>
                    <a href="/mahasiswa/seminar"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('seminar*') ? 'stroke-blue1 bg-white ring-blue1 text-blue1' : 'stroke-white hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover:stroke-blue1 ring-white text-white' }}">
                        <svg width="18" height="20" viewBox="0 0 18 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.45788 4.84619C4.88474 4.84619 4.32448 5.01615 3.84794 5.33456C3.37139 5.65298 2.99997 6.10556 2.78064 6.63506C2.56131 7.16457 2.50393 7.74722 2.61574 8.30935C2.72755 8.87147 3.00354 9.38781 3.40881 9.79308C3.81408 10.1983 4.33042 10.4743 4.89254 10.5861C5.45466 10.698 6.03732 10.6406 6.56682 10.4212C7.09633 10.2019 7.54891 9.83049 7.86733 9.35395C8.18574 8.87741 8.3557 8.31714 8.3557 7.74401C8.3557 6.97546 8.05039 6.23839 7.50694 5.69494C6.9635 5.1515 6.22643 4.84619 5.45788 4.84619ZM5.45788 9.99787C4.89109 9.9935 4.34675 9.77574 3.93334 9.38798C3.51992 9.00022 3.26779 8.47093 3.22717 7.90557C3.18656 7.34022 3.36045 6.78033 3.71419 6.33745C4.06793 5.89458 4.57555 5.60125 5.1359 5.51591V7.74401C5.1359 7.8294 5.16982 7.9113 5.2302 7.97168C5.29059 8.03207 5.37248 8.06599 5.45788 8.06599H7.68598C7.60862 8.60196 7.34087 9.09215 6.93173 9.4469C6.52259 9.80165 5.9994 9.99723 5.45788 9.99787ZM9.64361 5.49015H11.8975C11.9829 5.49015 12.0648 5.45623 12.1251 5.39585C12.1855 5.33546 12.2195 5.25357 12.2195 5.16817C12.2195 5.08278 12.1855 5.00088 12.1251 4.9405C12.0648 4.88011 11.9829 4.84619 11.8975 4.84619H9.64361C9.55822 4.84619 9.47632 4.88011 9.41594 4.9405C9.35556 5.00088 9.32163 5.08278 9.32163 5.16817C9.32163 5.25357 9.35556 5.33546 9.41594 5.39585C9.47632 5.45623 9.55822 5.49015 9.64361 5.49015ZM9.64361 8.06599H15.1173C15.2027 8.06599 15.2846 8.03207 15.3449 7.97168C15.4053 7.9113 15.4392 7.8294 15.4392 7.74401C15.4392 7.65861 15.4053 7.57672 15.3449 7.51633C15.2846 7.45595 15.2027 7.42203 15.1173 7.42203H9.64361C9.55822 7.42203 9.47632 7.45595 9.41594 7.51633C9.35556 7.57672 9.32163 7.65861 9.32163 7.74401C9.32163 7.8294 9.35556 7.9113 9.41594 7.97168C9.47632 8.03207 9.55822 8.06599 9.64361 8.06599ZM9.64361 10.6418H15.1173C15.2027 10.6418 15.2846 10.6079 15.3449 10.5475C15.4053 10.4871 15.4392 10.4052 15.4392 10.3198C15.4392 10.2345 15.4053 10.1526 15.3449 10.0922C15.2846 10.0318 15.2027 9.99787 15.1173 9.99787H9.64361C9.55822 9.99787 9.47632 10.0318 9.41594 10.0922C9.35556 10.1526 9.32163 10.2345 9.32163 10.3198C9.32163 10.4052 9.35556 10.4871 9.41594 10.5475C9.47632 10.6079 9.55822 10.6418 9.64361 10.6418Z"
                                fill="#2392EC" />
                            <path
                                d="M17.0495 12.6187V2.86914C17.3494 2.78772 17.6098 2.60061 17.7826 2.34231C17.9554 2.08401 18.0289 1.77194 17.9897 1.46366C17.9505 1.15538 17.8011 0.871671 17.5691 0.664866C17.3372 0.458061 17.0383 0.342104 16.7275 0.338379H1.27249C0.961741 0.342104 0.662822 0.458061 0.430856 0.664866C0.19889 0.871671 0.0495233 1.15538 0.0103016 1.46366C-0.0289201 1.77194 0.0446489 2.08401 0.217441 2.34231C0.390233 2.60061 0.650593 2.78772 0.950506 2.86914V12.6187C0.650593 12.7001 0.390233 12.8872 0.217441 13.1455C0.0446489 13.4038 -0.0289201 13.7159 0.0103016 14.0242C0.0495233 14.3324 0.19889 14.6162 0.430856 14.823C0.662822 15.0298 0.961741 15.1457 1.27249 15.1494H8.67802V17.1264C8.3745 17.2048 8.10999 17.3911 7.93405 17.6506C7.75812 17.91 7.68285 18.2247 7.72235 18.5357C7.76185 18.8467 7.9134 19.1326 8.14861 19.3398C8.38382 19.547 8.68653 19.6613 9 19.6613C9.31347 19.6613 9.61618 19.547 9.85139 19.3398C10.0866 19.1326 10.2382 18.8467 10.2777 18.5357C10.3172 18.2247 10.2419 17.91 10.0659 17.6506C9.89001 17.3911 9.6255 17.2048 9.32198 17.1264V15.1494H16.7275C17.0383 15.1457 17.3372 15.0298 17.5691 14.823C17.8011 14.6162 17.9505 14.3324 17.9897 14.0242C18.0289 13.7159 17.9554 13.4038 17.7826 13.1455C17.6098 12.8872 17.3494 12.7001 17.0495 12.6187ZM9.64396 18.3692C9.64396 18.4966 9.60619 18.6211 9.53543 18.727C9.46467 18.8329 9.3641 18.9154 9.24643 18.9642C9.12876 19.0129 8.99929 19.0257 8.87437 19.0008C8.74945 18.976 8.63471 18.9147 8.54465 18.8246C8.45459 18.7345 8.39326 18.6198 8.36841 18.4949C8.34357 18.37 8.35632 18.2405 8.40506 18.1228C8.4538 18.0051 8.53634 17.9046 8.64224 17.8338C8.74813 17.7631 8.87264 17.7253 9 17.7253C9.17079 17.7253 9.33458 17.7931 9.45535 17.9139C9.57611 18.0347 9.64396 18.1985 9.64396 18.3692ZM16.4055 12.5736H1.59447V2.91422H16.4055V12.5736Z"
                                fill="#2392EC" />
                        </svg>
                        <span class="ms-3">Seminar</span>
                    </a>
                </li>
                <li>
                    <a href="/mahasiswa/yudisium"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('yudisium*') ? 'stroke-blue1 bg-white ring-blue1 text-blue1' : 'stroke-white hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover:stroke-blue1 ring-white text-white' }}">
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 6.68269L10.9519 1.375L20.9038 6.68269L10.9519 11.9904L1 6.68269Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15.9281 18.6249V9.33646L10.9521 6.68262" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M18.5819 7.9209V12.4425C18.5822 12.5856 18.5359 12.7249 18.4501 12.8394C17.8914 13.5829 15.5343 16.3026 10.9521 16.3026C6.3698 16.3026 4.01278 13.5829 3.45409 12.8394C3.36826 12.7249 3.32199 12.5856 3.32227 12.4425V7.9209"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ms-3">Yudisium</span>
                    </a>
                </li>
                <li>
                    <a href="/mahasiswa/profil"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('profil*') ? 'stroke-blue1 bg-white ring-blue1 text-blue1' : 'stroke-white hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover:stroke-blue1 ring-white text-white' }}">
                        <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1 16.9257V15.935C1 12.1049 4.10491 9 7.935 9C11.7651 9 14.87 12.1049 14.87 15.935V16.9257"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M7.93503 8.99993C10.1236 8.99993 11.8979 7.22566 11.8979 5.03708C11.8979 2.84845 10.1236 1.07422 7.93503 1.07422C5.7464 1.07422 3.97217 2.84845 3.97217 5.03708C3.97217 7.22566 5.7464 8.99993 7.93503 8.99993Z"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ms-3">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('keluar*') ? 'stroke-blue1 bg-white ring-blue1 text-blue1' : 'stroke-white hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover:stroke-blue1 ring-white text-white' }}">
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.4375 18.5H3.125C2.56141 18.5 2.02091 18.2761 1.6224 17.8776C1.22388 17.4791 1 16.9386 1 16.375V3.625C1 3.06141 1.22388 2.52091 1.6224 2.1224C2.02091 1.72388 2.56141 1.5 3.125 1.5H8.4375M18 10L13.75 5.75M18 10L13.75 14.25M18 10H7.375"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="ms-3">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
