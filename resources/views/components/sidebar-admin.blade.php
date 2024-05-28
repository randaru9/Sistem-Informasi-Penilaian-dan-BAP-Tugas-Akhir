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
                    <a href="/admin/bap"
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
                    <a href="/admin/yudisium"
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
                    <a href="/admin/dosen"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('dosen*') ? 'stroke-blue1 bg-white ring-blue1 text-blue1' : 'stroke-white hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover:stroke-blue1 ring-white text-white' }}">
                        <svg width="26" height="20" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.60556 9.14912C7.28778 9.14829 7.9418 8.87686 8.42413 8.39438C8.90645 7.91191 9.17768 7.2578 9.17831 6.57559C9.17768 5.89323 8.9065 5.23896 8.42422 4.75624C7.94194 4.27352 7.28792 4.00174 6.60556 4.00049C5.923 4.00153 5.2687 4.27319 4.78612 4.75591C4.30355 5.23864 4.03208 5.89302 4.03125 6.57559C4.03208 7.25801 4.3036 7.91224 4.78622 8.39471C5.26884 8.87718 5.92314 9.1485 6.60556 9.14912ZM6.60556 4.78654C7.07066 4.80033 7.51209 4.99478 7.8362 5.32864C8.1603 5.6625 8.34159 6.1095 8.34159 6.5748C8.34159 7.04011 8.1603 7.48711 7.8362 7.82096C7.51209 8.15482 7.07066 8.34928 6.60556 8.36307C6.13155 8.36265 5.67706 8.17422 5.34181 7.83912C5.00656 7.50401 4.81792 7.0496 4.8173 6.57559C4.81772 6.10137 5.00623 5.64668 5.34148 5.31128C5.67673 4.97588 6.13134 4.78716 6.60556 4.78654ZM16.8384 7.28068H20.0038C20.108 7.28068 20.208 7.23927 20.2817 7.16556C20.3554 7.09186 20.3968 6.99189 20.3968 6.88765C20.3968 6.78342 20.3554 6.68345 20.2817 6.60974C20.208 6.53603 20.108 6.49463 20.0038 6.49463H16.8384C16.7341 6.49463 16.6342 6.53603 16.5605 6.60974C16.4868 6.68345 16.4453 6.78342 16.4453 6.88765C16.4453 6.99189 16.4868 7.09186 16.5605 7.16556C16.6342 7.23927 16.7341 7.28068 16.8384 7.28068Z"/>
                            <path d="M24.8015 16.6641H24.3023V1.20797C24.3023 1.10373 24.2609 1.00376 24.1872 0.930056C24.1135 0.856349 24.0135 0.814941 23.9093 0.814941H1.28755C1.18331 0.814941 1.08335 0.856349 1.00964 0.930056C0.935933 1.00376 0.894525 1.10373 0.894525 1.20797V16.6641H0.393025C0.288788 16.6641 0.188821 16.7055 0.115114 16.7792C0.0414079 16.8529 0 16.9529 0 17.0571V18.7919C0 18.8962 0.0414079 18.9961 0.115114 19.0698C0.188821 19.1435 0.288788 19.1849 0.393025 19.1849H24.8022C24.9065 19.1849 25.0064 19.1435 25.0802 19.0698C25.1539 18.9961 25.1953 18.8962 25.1953 18.7919V17.0571C25.1953 17.0054 25.1851 16.9543 25.1653 16.9065C25.1455 16.8588 25.1165 16.8154 25.0799 16.7789C25.0433 16.7424 24.9999 16.7135 24.9521 16.6938C24.9043 16.6741 24.8531 16.664 24.8015 16.6641ZM1.68058 1.60099H23.5163V16.6641H9.95611V13.185L12.2427 13.9546C12.3086 13.9768 12.3791 13.9811 12.4472 13.9672C12.5153 13.9532 12.5784 13.9215 12.6303 13.8752L15.4286 11.37L16.3113 11.2144C16.408 11.1976 16.4948 11.1452 16.5546 11.0675C16.6145 10.9897 16.6429 10.8924 16.6344 10.7946L16.4591 8.72261C16.4508 8.62447 16.406 8.53301 16.3335 8.46634C16.261 8.39967 16.1661 8.36264 16.0677 8.3626H15.8468L16.1785 6.97915C16.2028 6.87773 16.1858 6.77081 16.1312 6.68192C16.0767 6.59303 15.9891 6.52945 15.8876 6.50516C15.7862 6.48087 15.6793 6.49787 15.5904 6.55241C15.5015 6.60696 15.4379 6.69458 15.4137 6.796L15.0977 8.11185L15.0033 8.04739C14.9506 8.01218 14.8902 7.99009 14.8271 7.98298C14.7641 7.97587 14.7003 7.98394 14.641 8.00652C14.5818 8.02962 14.5291 8.0666 14.4872 8.11435C14.4454 8.16209 14.4156 8.21919 14.4004 8.28085L14.1599 9.27992L11.9818 11.036L9.57488 9.3373C9.50871 9.29045 9.42957 9.26545 9.3485 9.26577H4.39559C3.98213 9.26577 3.73138 9.44656 3.59382 9.59827C3.23381 9.9968 3.28255 10.5871 3.28648 10.6138V16.6657H1.68058V1.60099ZM0.78605 17.4501H3.28883V18.3989H0.78605V17.4501ZM4.0741 18.3989V17.0555L4.07174 10.573C4.06388 10.4936 4.0741 10.2397 4.17864 10.1249C4.19672 10.1053 4.24467 10.0518 4.41996 10.0518H9.2243L11.7711 11.8495C11.841 11.8987 11.925 11.9237 12.0103 11.9209C12.0957 11.9181 12.1779 11.8875 12.2443 11.8338L14.7573 9.80815C14.8247 9.75357 14.8724 9.6785 14.8933 9.59434L15.0324 9.01659L15.1275 9.08105C15.1338 9.08498 15.1417 9.08341 15.1464 9.08734C15.181 9.10777 15.2156 9.12821 15.2564 9.13764C15.2863 9.14474 15.3169 9.14843 15.3476 9.14865H15.7061L15.8208 10.503L15.1818 10.6162C15.1096 10.629 15.0423 10.6617 14.9876 10.7105L12.2773 13.1379L9.68886 12.2669C9.62982 12.2469 9.56687 12.2413 9.50522 12.2505C9.44357 12.2597 9.38501 12.2834 9.33437 12.3198C9.28374 12.3561 9.24249 12.404 9.21405 12.4595C9.18562 12.5149 9.1708 12.5764 9.17085 12.6387V18.3997H4.0741V18.3989ZM24.4084 18.3989H9.95611V17.4501H24.4092L24.4084 18.3989Z"/>
                            </svg>
                        <span class="ms-3">Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/mahasiswa"
                        class="flex items-center px-4 py-3 ring-2 rounded-lg gro up  {{ Request::routeIs('mahasiswa*') ? 'stroke-blue1 bg-white ring-blue1 text-blue1' : 'stroke-white hover:ring-blue1 bg-blue1 hover:bg-white hover:text-blue1 hover:stroke-blue1 ring-white text-white' }}">
                        <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.741 13.036C14.7072 12.6351 14.5519 12.2539 14.2959 11.9435C14.0398 11.633 13.6953 11.408 13.3081 11.2983L9.10832 10.099V9.22812C9.70192 8.93362 10.2016 8.47938 10.5512 7.91648C10.9009 7.35358 11.0866 6.70431 11.0875 6.04167C11.4139 5.99181 11.7117 5.82665 11.9269 5.57613C12.1421 5.3256 12.2604 5.00629 12.2604 4.67604C12.2604 4.3458 12.1421 4.02648 11.9269 3.77595C11.7117 3.52543 11.4139 3.36027 11.0875 3.31042V1.29167H13.0667C13.1716 1.29167 13.2723 1.24996 13.3465 1.17573C13.4208 1.1015 13.4625 1.00081 13.4625 0.895833C13.4625 0.790852 13.4208 0.69017 13.3465 0.615937C13.2723 0.541704 13.1716 0.5 13.0667 0.5H1.98332C1.87834 0.5 1.77765 0.541704 1.70342 0.615937C1.62919 0.69017 1.58748 0.790852 1.58748 0.895833C1.58748 1.00081 1.62919 1.1015 1.70342 1.17573C1.77765 1.24996 1.87834 1.29167 1.98332 1.29167H2.37915V2.47917C2.37915 2.58415 2.42085 2.68483 2.49509 2.75906C2.56932 2.8333 2.67 2.875 2.77498 2.875C2.87997 2.875 2.98065 2.8333 3.05488 2.75906C3.12911 2.68483 3.17082 2.58415 3.17082 2.47917V1.29167H3.96248V3.29063C3.61973 3.32251 3.30122 3.48121 3.06936 3.73564C2.83749 3.99007 2.70897 4.32191 2.70897 4.66615C2.70897 5.01038 2.83749 5.34222 3.06936 5.59665C3.30122 5.85108 3.61973 6.00979 3.96248 6.04167C3.95969 6.70767 4.14366 7.36113 4.49349 7.92786C4.84333 8.4946 5.34503 8.95192 5.94165 9.24792V10.1187L1.7379 11.3062C1.35146 11.4166 1.00775 11.6419 0.7525 11.9523C0.497245 12.2627 0.342534 12.6435 0.308942 13.044C-0.0591827 17.4615 0.00415062 16.3333 0.00415062 17.9167C0.00415062 18.3366 0.170966 18.7393 0.467898 19.0363C0.764831 19.3332 1.16756 19.5 1.58748 19.5H13.4625C13.8824 19.5 14.2851 19.3332 14.5821 19.0363C14.879 18.7393 15.0458 18.3366 15.0458 17.9167C15.0458 16.3333 15.1131 17.5208 14.741 13.036ZM13.9494 13.0994L14.2185 16.3333H12.4729C12.7341 12.6679 13.225 13.1667 8.78373 13.1667C8.91832 12.3552 8.78373 12.8619 9.19936 12.7708C9.44082 12.7154 9.40915 12.6679 10.1573 11.231L13.0904 12.0702C13.3206 12.1353 13.5257 12.2684 13.679 12.452C13.8323 12.6356 13.9265 12.8613 13.9494 13.0994ZM3.19853 13.9583H11.8514L11.511 18.7083H3.53894L3.19853 13.9583ZM7.26373 11.9119C7.31694 11.9587 7.38174 11.9904 7.45137 12.0036C7.52099 12.0168 7.5929 12.0111 7.65957 11.9871C7.82978 11.9158 7.63978 11.8169 8.13061 12.1731L7.98019 13.1667H7.06978L6.90353 12.1731L7.26373 11.9119ZM9.38144 10.9975L8.98561 11.7892L8.36415 11.3419L8.84707 10.8431L9.38144 10.9975ZM11.0875 5.21438V4.09813C11.2021 4.13973 11.3011 4.21561 11.3711 4.31547C11.4411 4.41533 11.4787 4.53431 11.4787 4.65625C11.4787 4.77819 11.4411 4.89717 11.3711 4.99703C11.3011 5.09689 11.2021 5.17277 11.0875 5.21438ZM10.2958 1.29167V3.27083H4.75415V1.29167H10.2958ZM3.96248 4.09813V5.21438C3.84786 5.17277 3.74882 5.09689 3.67884 4.99703C3.60885 4.89717 3.57131 4.77819 3.57131 4.65625C3.57131 4.53431 3.60885 4.41533 3.67884 4.31547C3.74882 4.21561 3.84786 4.13973 3.96248 4.09813ZM4.75415 6.04167V4.0625H10.2958V6.04167C10.2958 6.77654 10.0039 7.48131 9.48426 8.00094C8.96463 8.52057 8.25985 8.8125 7.52498 8.8125C6.79011 8.8125 6.08534 8.52057 5.56571 8.00094C5.04608 7.48131 4.75415 6.77654 4.75415 6.04167ZM8.31665 9.51313V10.2335L7.52498 11.049L6.73332 10.2335V9.51313C7.25397 9.63581 7.796 9.63581 8.31665 9.51313ZM6.21873 10.8431L6.70165 11.3419L6.08019 11.7892L5.68436 10.9975L6.21873 10.8431ZM1.10061 13.0994C1.12118 12.8592 1.21438 12.6309 1.36781 12.445C1.52125 12.259 1.72764 12.1242 1.95957 12.0583L4.89269 11.2192C5.64478 12.66 5.61707 12.7035 5.85061 12.759C6.26623 12.8619 6.13165 12.3631 6.26623 13.1548C1.84873 13.1548 2.3079 12.6363 2.57707 16.3215H0.831442L1.10061 13.0994ZM0.795817 17.9167V17.125H2.63248L2.74728 18.7083H1.58748C1.37752 18.7083 1.17616 18.6249 1.02769 18.4765C0.879225 18.328 0.795817 18.1266 0.795817 17.9167ZM14.2542 17.9167C14.2542 18.1266 14.1707 18.328 14.0223 18.4765C13.8738 18.6249 13.6724 18.7083 13.4625 18.7083H12.3027L12.4175 17.125H14.2542V17.9167Z"/>
                            </svg>
                        <span class="ms-3">Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/profil"
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
                    <a href="#"
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