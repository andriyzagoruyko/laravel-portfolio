<header id="header" class="header {{ Route::current()->named('index') ? 'mobile-fullscreen mainpage fixed-bg' : '' }}">
    <div class="header__wrapper">
        <div class="header__nav-block">
            <div  id="navigation" class="header__navigation navigation">
                <div style="display: none;" class="navigation__overlay"></div>
                <div style="display: none;" class="navigation__logo logo">
                    <a href="{{ Route::current()->named('index') ? '#header' : '/' }}">
                        <svg viewBox="0 0 204 93" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                            <path d="M100.66 72.1334V22.044H111.611C117.335 22.044 121.975 26.684 121.975 32.4078V61.7696C121.975 67.4934 117.335 72.1334 111.611 72.1334H100.66Z" fill="#FC466B" stroke="#FC466B"/>
                            <path d="M3.50522 46.3689L3.50541 46.3574L3.50542 46.3459C3.52904 21.6599 25.1217 1.4724 51.9942 1.47208C65.1709 1.47208 77.1009 6.33672 85.8262 14.2123L86.8312 13.0988L85.8262 14.2123C90.9908 18.8737 95.4475 22.2524 102.5 22.8931V71.0911C99.4467 71.3705 96.8087 71.9015 94.3215 72.8965C91.4531 74.044 88.871 75.7739 86.1118 78.3029L86.1113 78.3033C77.3592 86.3321 65.3105 91.3026 51.9942 91.3026H51.9814L51.9686 91.3028C25.8596 91.7487 3.10498 70.894 3.50522 46.3689Z" stroke="url(#paint0_linear)" stroke-width="3"/>
                            <path d="M75.3561 72.4935C72.9132 72.4935 70.7365 71.9454 68.826 70.8492C66.9469 69.7217 65.4592 68.2184 64.363 66.3393C63.2982 64.4288 62.7657 62.2991 62.7657 59.9501C62.7657 57.6012 63.2982 55.4871 64.363 53.608C65.4592 51.6975 66.9469 50.1942 68.826 49.098C70.7365 47.9705 72.9132 47.4068 75.3561 47.4068C77.799 47.4068 79.96 47.9705 81.8391 49.098C83.7496 50.1942 85.2373 51.6975 86.3021 53.608C87.3983 55.4871 87.9464 57.6012 87.9464 59.9501C87.9464 62.2991 87.3983 64.4288 86.3021 66.3393C85.2373 68.2184 83.7496 69.7217 81.8391 70.8492C79.96 71.9454 77.799 72.4935 75.3561 72.4935ZM75.3561 68.7821C77.016 68.7821 78.4567 68.3907 79.6781 67.6077C80.8996 66.8247 81.8548 65.7755 82.5438 64.4601C83.2329 63.1134 83.5774 61.6101 83.5774 59.9501C83.5774 58.2902 83.2329 56.8025 82.5438 55.4871C81.8548 54.1404 80.8996 53.0756 79.6781 52.2926C78.4567 51.5096 77.016 51.1181 75.3561 51.1181C73.7275 51.1181 72.2868 51.5096 71.034 52.2926C69.8126 53.0756 68.8573 54.1404 68.1683 55.4871C67.4793 56.8025 67.1348 58.2902 67.1348 59.9501C67.1348 61.6101 67.4793 63.1134 68.1683 64.4601C68.8573 65.7755 69.8126 66.8247 71.034 67.6077C72.2868 68.3907 73.7275 68.7821 75.3561 68.7821Z" fill="white"/>
                            <path d="M91.1399 71.9297V37.6352H95.4619V71.9297H91.1399Z" fill="white"/>
                            <path d="M111.213 72.4935C109.021 72.4935 107.079 72.055 105.388 71.1781C103.728 70.2698 102.412 69.017 101.441 67.4198C100.471 65.8225 99.9851 63.959 99.9851 61.8293V47.9705H104.307V61.7823C104.307 63.223 104.62 64.4758 105.247 65.5406C105.904 66.5741 106.75 67.3728 107.784 67.9365C108.848 68.5003 109.976 68.7821 111.166 68.7821C112.387 68.7821 113.515 68.5003 114.549 67.9365C115.613 67.3728 116.459 66.5741 117.085 65.5406C117.743 64.4758 118.072 63.223 118.072 61.7823V47.9705H122.394V61.8293C122.394 63.959 121.909 65.8225 120.938 67.4198C119.998 69.017 118.683 70.2698 116.991 71.1781C115.3 72.055 113.374 72.4935 111.213 72.4935Z" fill="white"/>
                            <path d="M135.126 71.9297C132.997 71.9297 131.321 71.319 130.1 70.0976C128.909 68.8761 128.314 67.2162 128.314 65.1178V51.6819H124.18V47.9705H128.314V41.9572H132.636V47.9705H140.858V51.6819H132.636V64.8359C132.636 65.8695 132.918 66.6994 133.482 67.3258C134.077 67.9209 134.891 68.2184 135.925 68.2184H140.764V71.9297H135.126Z" fill="white"/>
                            <path d="M143.734 71.9297V47.9705H148.103V71.9297H143.734ZM145.942 44.1652C145.128 44.1652 144.439 43.8834 143.875 43.3196C143.311 42.7246 143.029 42.0355 143.029 41.2526C143.029 40.4696 143.311 39.7962 143.875 39.2325C144.439 38.6374 145.128 38.3399 145.942 38.3399C146.725 38.3399 147.398 38.6374 147.962 39.2325C148.557 39.7962 148.855 40.4696 148.855 41.2526C148.855 42.0355 148.557 42.7246 147.962 43.3196C147.398 43.8834 146.725 44.1652 145.942 44.1652Z" fill="white"/>
                            <path d="M163.854 72.4935C161.411 72.4935 159.235 71.9454 157.324 70.8492C155.445 69.7217 153.957 68.2184 152.861 66.3393C151.796 64.4288 151.264 62.2991 151.264 59.9501C151.264 57.6012 151.796 55.4871 152.861 53.608C153.957 51.6975 155.445 50.1942 157.324 49.098C159.235 47.9705 161.411 47.4068 163.854 47.4068C166.297 47.4068 168.458 47.9705 170.337 49.098C172.248 50.1942 173.735 51.6975 174.8 53.608C175.896 55.4871 176.445 57.6012 176.445 59.9501C176.445 62.2991 175.896 64.4288 174.8 66.3393C173.735 68.2184 172.248 69.7217 170.337 70.8492C168.458 71.9454 166.297 72.4935 163.854 72.4935ZM163.854 68.7821C165.514 68.7821 166.955 68.3907 168.176 67.6077C169.398 66.8247 170.353 65.7755 171.042 64.4601C171.731 63.1134 172.076 61.6101 172.076 59.9501C172.076 58.2902 171.731 56.8025 171.042 55.4871C170.353 54.1404 169.398 53.0756 168.176 52.2926C166.955 51.5096 165.514 51.1181 163.854 51.1181C162.226 51.1181 160.785 51.5096 159.532 52.2926C158.311 53.0756 157.356 54.1404 156.666 55.4871C155.977 56.8025 155.633 58.2902 155.633 59.9501C155.633 61.6101 155.977 63.1134 156.666 64.4601C157.356 65.7755 158.311 66.8247 159.532 67.6077C160.785 68.3907 162.226 68.7821 163.854 68.7821Z" fill="white"/>
                            <path d="M179.638 71.9297V58.071C179.638 55.9413 180.108 54.0778 181.047 52.4805C182.018 50.8832 183.349 49.6461 185.041 48.7692C186.732 47.8609 188.658 47.4068 190.819 47.4068C193.011 47.4068 194.937 47.8609 196.597 48.7692C198.289 49.6461 199.604 50.8832 200.544 52.4805C201.514 54.0778 202 55.9413 202 58.071V71.9297H197.678V58.118C197.678 56.6773 197.349 55.4402 196.691 54.4066C196.065 53.3418 195.219 52.5275 194.154 51.9637C193.121 51.4 192.009 51.1181 190.819 51.1181C189.629 51.1181 188.501 51.4 187.437 51.9637C186.403 52.5275 185.557 53.3418 184.9 54.4066C184.273 55.4402 183.96 56.6773 183.96 58.118V71.9297H179.638Z" fill="white"/>
                            <path d="M17.0546 44.4226C14.7369 44.4226 12.6542 43.9215 10.8064 42.9193C8.95855 41.9171 7.48654 40.4764 6.39037 38.5972C5.32552 36.6868 4.79309 34.4005 4.79309 31.7383V9.56433H9.11514V24.1747H9.2091C9.99208 22.7341 11.1509 21.5752 12.6855 20.6983C14.2202 19.7901 15.9114 19.3359 17.7592 19.3359C19.9516 19.3359 21.9247 19.837 23.6786 20.8392C25.4638 21.8415 26.8575 23.2665 27.8597 25.1143C28.8932 26.9308 29.41 29.0919 29.41 31.5974C29.41 34.2282 28.8776 36.5145 27.8127 38.4563C26.7792 40.3668 25.3228 41.8388 23.4437 42.8723C21.5958 43.9058 19.4661 44.4226 17.0546 44.4226ZM17.0546 40.7113C18.5266 40.7113 19.8576 40.3511 21.0478 39.6308C22.2692 38.9104 23.2401 37.8926 23.9604 36.5772C24.6808 35.2617 25.041 33.6958 25.041 31.8793C25.041 30.1254 24.6808 28.5908 23.9604 27.2753C23.2714 25.9599 22.3162 24.9264 21.0947 24.1747C19.9046 23.4231 18.5735 23.0473 17.1015 23.0473C15.6295 23.0473 14.2828 23.4074 13.0614 24.1278C11.8712 24.8481 10.916 25.8816 10.1957 27.2284C9.50663 28.5438 9.16212 30.1097 9.16212 31.9262C9.16212 33.7114 9.50663 35.2617 10.1957 36.5772C10.916 37.8926 11.8712 38.9104 13.0614 39.6308C14.2515 40.3511 15.5826 40.7113 17.0546 40.7113Z" fill="white"/>
                            <path d="M32.5891 43.8589V19.8997H36.9582V43.8589H32.5891ZM34.7971 16.0944C33.9828 16.0944 33.2938 15.8125 32.7301 15.2488C32.1663 14.6537 31.8845 13.9647 31.8845 13.1817C31.8845 12.3987 32.1663 11.7254 32.7301 11.1616C33.2938 10.5665 33.9828 10.269 34.7971 10.269C35.5801 10.269 36.2535 10.5665 36.8172 11.1616C37.4123 11.7254 37.7098 12.3987 37.7098 13.1817C37.7098 13.9647 37.4123 14.6537 36.8172 15.2488C36.2535 15.8125 35.5801 16.0944 34.7971 16.0944Z" fill="white"/>
                            <path d="M46.0701 43.8589C44.5963 43.8589 43.3576 43.3421 42.3542 42.3086C41.3507 41.275 40.849 40.0536 40.849 38.6442C40.849 36.7024 41.8054 35.1208 43.7182 33.8994L54.7719 26.8995C55.2422 26.6176 55.5401 26.3358 55.6656 26.0539C55.8223 25.772 55.9007 25.4745 55.9007 25.1613C55.9007 24.7541 55.7439 24.394 55.4304 24.0808C55.1168 23.7676 54.7091 23.611 54.2074 23.611H42.0249V19.8997H55.5244C56.9669 19.8997 58.1742 20.4164 59.1463 21.45C60.1497 22.4522 60.6514 23.6736 60.6514 25.1143C60.6514 27.0561 59.7107 28.6377 57.8292 29.8592L46.7756 36.859C46.3053 37.1409 45.9917 37.4228 45.8349 37.7046C45.7095 37.9865 45.6467 38.284 45.6467 38.5972C45.6467 39.0044 45.8035 39.3646 46.1171 39.6777C46.4307 39.9909 46.854 40.1475 47.3871 40.1475H60.2281V43.8589H46.0701Z" fill="#FC466B"/>
                            <path d="M46.0697 47.9705C44.596 47.9705 43.3575 48.4873 42.3541 49.5208C41.3507 50.5543 40.849 51.7758 40.849 53.1852C40.849 55.127 41.8053 56.7086 43.7181 57.93L54.771 64.9299C55.2413 65.2117 55.5392 65.4936 55.6646 65.7755C55.8214 66.0574 55.8998 66.3549 55.8998 66.6681C55.8998 67.0752 55.743 67.4354 55.4294 67.7486C55.1159 68.0618 54.7082 68.2184 54.2066 68.2184H42.0248V71.9297H55.5235C56.9659 71.9297 58.1731 71.4129 59.1451 70.3794C60.1485 69.3772 60.6502 68.1557 60.6502 66.7151C60.6502 64.7733 59.7095 63.1917 57.8281 61.9702L46.7752 54.9704C46.3049 54.6885 45.9913 54.4066 45.8346 54.1247C45.7091 53.8429 45.6464 53.5453 45.6464 53.2321C45.6464 52.825 45.8032 52.4648 46.1168 52.1516C46.4303 51.8384 46.8536 51.6818 47.3867 51.6818H60.2269V47.9705H46.0697Z" fill="#FC466B"/>
                            <g style="opacity: 0" class="light" filter="url(#filter0_d)">
                            <path d="M46.0719 43.8589C44.5981 43.8589 43.3595 43.3421 42.356 42.3086C41.3526 41.275 40.8508 40.0536 40.8508 38.6442C40.8508 36.7024 41.8072 35.1208 43.7201 33.8993L54.7737 26.8995C55.2441 26.6176 55.542 26.3358 55.6674 26.0539C55.8242 25.772 55.9026 25.4745 55.9026 25.1613C55.9026 24.7541 55.7458 24.394 55.4322 24.0808C55.1186 23.7676 54.711 23.611 54.2092 23.611H42.0267V19.8997H55.5263C56.9687 19.8997 58.176 20.4164 59.1481 21.45C60.1516 22.4522 60.6533 23.6736 60.6533 25.1143C60.6533 27.0561 59.7125 28.6377 57.8311 29.8592L46.7775 36.859C46.3071 37.1409 45.9935 37.4228 45.8367 37.7046C45.7113 37.9865 45.6486 38.284 45.6486 38.5972C45.6486 39.0044 45.8054 39.3646 46.1189 39.6777C46.4325 39.9909 46.8558 40.1475 47.3889 40.1475H60.2299V43.8589H46.0719Z" fill="#FFF500"/>
                            <path d="M46.0699 47.9706C44.5961 47.9706 43.3576 48.4873 42.3542 49.5209C41.3508 50.5544 40.8491 51.7759 40.8491 53.1852C40.8491 55.127 41.8055 56.7086 43.7182 57.9301L54.7711 64.9299C55.2414 65.2118 55.5393 65.4937 55.6647 65.7756C55.8215 66.0574 55.8999 66.355 55.8999 66.6682C55.8999 67.0753 55.7431 67.4355 55.4295 67.7487C55.116 68.0619 54.7084 68.2185 54.2067 68.2185H42.025V71.9298H55.5236C56.966 71.9298 58.1732 71.413 59.1452 70.3795C60.1486 69.3773 60.6503 68.1558 60.6503 66.7151C60.6503 64.7733 59.7096 63.1917 57.8283 61.9703L46.7754 54.9704C46.305 54.6886 45.9915 54.4067 45.8347 54.1248C45.7093 53.8429 45.6466 53.5454 45.6466 53.2322C45.6466 52.8251 45.8033 52.4649 46.1169 52.1517C46.4304 51.8385 46.8537 51.6819 47.3868 51.6819H60.227V47.9706H46.0699Z" fill="#FFF500"/>
                            </g>
                            </g>
                            <defs>
                            <filter id="filter0_d" x="-9.15088" y="-30.1003" width="119.804" height="152.03" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                            <feOffset/>
                            <feGaussianBlur stdDeviation="25"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 0.960784 0 0 0 0 0 0 0 0 1 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                            </filter>
                            <linearGradient id="paint0_linear" x1="2.00007" y1="46.391" x2="104" y2="46.391" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#16BFFD"/>
                            <stop offset="0.713853" stop-color="#FC466B"/>
                            </linearGradient>
                            <clipPath id="clip0">
                            <rect width="204" height="93" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <nav class="navigation__body">
                    <ul id="menu" class="navigation__list">
                        <li class="navigation__item">
                            <a href="{{ Route::current()->named('index') ? '#portfolio' : '/#portfolio' }}">
                                {{ __('main.nav_portfolio') }}
                            </a>
                        </li>
                        <li class="navigation__item">
                            <a href="{{ Route::current()->named('index') ? '#services' : '/#services' }}">
                                {{ __('main.nav_services') }}
                            </a>
                        </li>
                        <li class="navigation__item">
                            <a href="{{ Route::current()->named('index') ? '#about' : '/#about' }}">
                                {{ __('main.nav_about') }}
                            </a>
                        </li>
                        <li class="navigation__item">
                            <a href="{{ Route::current()->named('index') ? '#contact' : '/#contact' }}">
                                {{ __('main.nav_contact') }}
                            </a>
                        </li>
                    </ul>
                    <div class="navigation__dropdown dropdown">
                        <a href="#" class="dropdown__toggle" role="button" aria-label="language" aria-expanded="false">
                            <span class="icon">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.4855 0.916656C7.4355 0.916656 0.916748 7.44999 0.916748 15.5C0.916748 23.55 7.4355 30.0833 15.4855 30.0833C23.5501 30.0833 30.0834 23.55 30.0834 15.5C30.0834 7.44999 23.5501 0.916656 15.4855 0.916656ZM25.5917 9.66666H21.2897C20.8332 7.86045 20.1574 6.11692 19.2772 4.47499C21.9373 5.39083 24.1789 7.23375 25.5917 9.66666ZM15.5001 3.89166C16.7105 5.64166 17.6584 7.58124 18.2855 9.66666H12.7147C13.3417 7.58124 14.2897 5.64166 15.5001 3.89166ZM4.21258 18.4167C3.97925 17.4833 3.83341 16.5062 3.83341 15.5C3.83341 14.4937 3.97925 13.5167 4.21258 12.5833H9.14175C9.02508 13.5458 8.93758 14.5083 8.93758 15.5C8.93758 16.4917 9.02508 17.4542 9.14175 18.4167H4.21258ZM5.40841 21.3333H9.7105C10.1772 23.1562 10.848 24.9062 11.723 26.525C9.06003 25.6142 6.81692 23.7699 5.40841 21.3333ZM9.7105 9.66666H5.40841C6.81692 7.23004 9.06003 5.38582 11.723 4.47499C10.8428 6.11692 10.1669 7.86045 9.7105 9.66666ZM15.5001 27.1083C14.2897 25.3583 13.3417 23.4187 12.7147 21.3333H18.2855C17.6584 23.4187 16.7105 25.3583 15.5001 27.1083ZM18.9126 18.4167H12.0876C11.9563 17.4542 11.8542 16.4917 11.8542 15.5C11.8542 14.5083 11.9563 13.5312 12.0876 12.5833H18.9126C19.0438 13.5312 19.1459 14.5083 19.1459 15.5C19.1459 16.4917 19.0438 17.4542 18.9126 18.4167ZM19.2772 26.525C20.1522 24.9062 20.823 23.1562 21.2897 21.3333H25.5917C24.1789 23.7662 21.9373 25.6092 19.2772 26.525ZM21.8584 18.4167C21.9751 17.4542 22.0626 16.4917 22.0626 15.5C22.0626 14.5083 21.9751 13.5458 21.8584 12.5833H26.7876C27.0209 13.5167 27.1667 14.4937 27.1667 15.5C27.1667 16.5062 27.0209 17.4833 26.7876 18.4167H21.8584Z" fill="currentColor"/>
                                </svg>
                            </span> 
                            <span class="current-lang">{{  LaravelLocalization::getCurrentLocale() }}</span> 
                        </a>
                        <ul class="dropdown__list">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="dropdown__item">
                                <a 
                                    rel="alternate" 
                                    hreflang="{{ $localeCode }}" 
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    >
                                        {{ mb_strtoupper($localeCode) }} ({{ ucfirst($properties['native']) }})
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <button class="navigation__hamburger hamburger hamburger--spring" type="button" aria-label="menu" aria-controls="menu">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </nav>
            </div>
        </div>
        @yield('header-content')
    </div>
</header>