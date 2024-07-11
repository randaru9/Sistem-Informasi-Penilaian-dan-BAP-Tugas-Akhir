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
            <path
                d="M16.9046 7.78811C16.9046 6.03687 16.2525 4.35736 15.0915 3.11905C13.9306 1.88073 12.3561 1.18506 10.7143 1.18506C9.07248 1.18506 7.49793 1.88073 6.33701 3.11905C5.17609 4.35736 4.5239 6.03687 4.5239 7.78811C4.5239 15.4917 1.42871 17.6927 1.42871 17.6927H19.9998C19.9998 17.6927 16.9046 15.4917 16.9046 7.78811Z"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path
                d="M12.5029 20.7866C12.3215 21.0993 12.0612 21.3589 11.7479 21.5393C11.4346 21.7197 11.0795 21.8147 10.718 21.8147C10.3565 21.8147 10.0014 21.7197 9.68812 21.5393C9.37489 21.3589 9.11448 21.0993 8.93311 20.7866"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
                    <a href="/dosen/penilaian"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('penilaian*') ? 'bg-white ring-blue1 text-blue1' : 'hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 ring-white text-white' }}">
                        <svg width="16" height="18" viewBox="0 0 16 18" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.3503 15.9974C13.3503 16.1744 13.28 16.3442 13.1548 16.4694C13.0296 16.5946 12.8598 16.6649 12.6828 16.6649H2.00254C1.82551 16.6649 1.65572 16.5946 1.53054 16.4694C1.40536 16.3442 1.33503 16.1744 1.33503 15.9974V1.97956H8.01017V0.644531H0V15.9974C0 16.5285 0.210982 17.0378 0.586532 17.4134C0.962081 17.7889 1.47144 17.9999 2.00254 17.9999H12.6828C13.2139 17.9999 13.7232 17.7889 14.0988 17.4134C14.4743 17.0378 14.6853 16.5285 14.6853 15.9974V7.31968H13.3503V15.9974Z" />
                            <path
                                d="M14.7665 0.564532C14.3845 0.202066 13.878 0 13.3514 0C12.8248 0 12.3183 0.202066 11.9363 0.564532L8.01126 4.48284L7.34375 8.02067L10.8482 7.31978L14.7665 3.40147C14.9532 3.21543 15.1013 2.99436 15.2024 2.75095C15.3035 2.50753 15.3555 2.24656 15.3555 1.983C15.3555 1.71944 15.3035 1.45847 15.2024 1.21505C15.1013 0.971641 14.9532 0.750575 14.7665 0.564532ZM10.1874 6.08488L9.01254 6.31851L9.24617 5.14368L11.4623 2.92086L12.4102 3.86873L10.1874 6.08488ZM13.8253 2.4536L13.3514 2.92086L12.4102 1.97966L12.8774 1.50573C12.9395 1.44316 13.0133 1.3935 13.0947 1.35961C13.176 1.32573 13.2633 1.30828 13.3514 1.30828C13.4395 1.30828 13.5267 1.32573 13.6081 1.35961C13.6894 1.3935 13.7633 1.44316 13.8253 1.50573C13.8879 1.56778 13.9375 1.64161 13.9714 1.72295C14.0053 1.80429 14.0228 1.89154 14.0228 1.97966C14.0228 2.06778 14.0053 2.15503 13.9714 2.23637C13.9375 2.31772 13.8879 2.39154 13.8253 2.4536Z" />
                        </svg>
                        <span class="ms-3">Penilaian</span>
                    </a>
                </li>
                <li>
                    <a href="/dosen/bap"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('bap*') ? 'bg-white ring-blue1 text-blue1' : 'hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover: ring-white text-white' }}">
                        <svg width="15" height="18" viewBox="0 0 15 18" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.2143 1.28571H10.17C10.0374 0.910575 9.79195 0.585642 9.4674 0.35546C9.14284 0.125279 8.75503 0.00111826 8.35714 0H5.78571C5.38782 0.00111826 5.00001 0.125279 4.67546 0.35546C4.3509 0.585642 4.10549 0.910575 3.97286 1.28571H1.92857C1.41708 1.28571 0.926543 1.4889 0.564865 1.85058C0.203188 2.21226 0 2.7028 0 3.21429V16.0714C0 16.5829 0.203188 17.0735 0.564865 17.4351C0.926543 17.7968 1.41708 18 1.92857 18H12.2143C12.7258 18 13.2163 17.7968 13.578 17.4351C13.9397 17.0735 14.1429 16.5829 14.1429 16.0714V3.21429C14.1429 2.7028 13.9397 2.21226 13.578 1.85058C13.2163 1.4889 12.7258 1.28571 12.2143 1.28571ZM5.14286 1.92857C5.14286 1.75808 5.21059 1.59456 5.33115 1.474C5.4517 1.35344 5.61522 1.28571 5.78571 1.28571H8.35714C8.52764 1.28571 8.69115 1.35344 8.81171 1.474C8.93227 1.59456 9 1.75808 9 1.92857V2.57143H5.14286V1.92857ZM12.8571 16.0714C12.8571 16.2419 12.7894 16.4054 12.6689 16.526C12.5483 16.6466 12.3848 16.7143 12.2143 16.7143H1.92857C1.75807 16.7143 1.59456 16.6466 1.474 16.526C1.35344 16.4054 1.28571 16.2419 1.28571 16.0714V3.21429C1.28571 3.04379 1.35344 2.88028 1.474 2.75972C1.59456 2.63916 1.75807 2.57143 1.92857 2.57143H3.85714V3.85714H10.2857V2.57143H12.2143C12.3848 2.57143 12.5483 2.63916 12.6689 2.75972C12.7894 2.88028 12.8571 3.04379 12.8571 3.21429V16.0714Z" />
                            <path d="M10.286 9H3.85742V10.2857H10.286V9Z" />
                            <path d="M7.07171 11.5713H3.85742V12.857H7.07171V11.5713Z" />
                        </svg>

                        <span class="ms-3">BAP</span>
                    </a>
                </li>
                <li>
                    <a href="/dosen/profil"
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
