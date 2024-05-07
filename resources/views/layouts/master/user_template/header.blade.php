 <!-- header -->
    <ul class="nav d-flex align-items-center justify-content-between justify-content-md-center px-4 gap-0 
        gap-md-5 pt-3 mb-3">
        <li class="nav-item" role="presentation">
            <a href="{{route('home')}}" class="nav-link d-flex flex-column align-items-center justify-content-center {{$page=='home' ? 'active' : ''}}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M0 11.9047C0 9.23417 0 7.8995 0.606667 6.7935C1.211 5.68633 2.31817 5.00033 4.53133 3.626L6.86467 2.17817C9.20383 0.725667 10.374 0 11.6667 0C12.9593 0 14.1283 0.725667 16.4687 2.17817L18.802 3.626C21.0152 5.00033 22.1223 5.68633 22.7278 6.7935C23.3333 7.8995 23.3333 9.23417 23.3333 11.9035V13.6792C23.3333 18.2292 23.3333 20.5053 21.966 21.9193C20.5998 23.3333 18.3995 23.3333 14 23.3333H9.33333C4.93383 23.3333 2.7335 23.3333 1.36733 21.9193C-1.39078e-07 20.5053 0 18.2303 0 13.6792V11.9047Z"
                        fill="#515C6F" />
                </svg>
                Home
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{route('order')}}" class="nav-link d-flex flex-column align-items-center justify-content-center {{$page=='order' ? 'active' : ''}}">
                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.60843 20.1602C7.08998 20.1602 7.55181 20.3624 7.89232 20.7225C8.23283 21.0826 8.42413 21.5709 8.42413 22.0801C8.42413 22.5893 8.23283 23.0777 7.89232 23.4377C7.55181 23.7978 7.08998 24.0001 6.60843 24.0001C6.12687 24.0001 5.66504 23.7978 5.32453 23.4377C4.98402 23.0777 4.79272 22.5893 4.79272 22.0801C4.79272 21.5709 4.98402 21.0826 5.32453 20.7225C5.66504 20.3624 6.12687 20.1602 6.60843 20.1602ZM17.5026 20.1602C17.9842 20.1602 18.446 20.3624 18.7865 20.7225C19.127 21.0826 19.3183 21.5709 19.3183 22.0801C19.3183 22.5893 19.127 23.0777 18.7865 23.4377C18.446 23.7978 17.9842 24.0001 17.5026 24.0001C17.0211 24.0001 16.5592 23.7978 16.2187 23.4377C15.8782 23.0777 15.6869 22.5893 15.6869 22.0801C15.6869 21.5709 15.8782 21.0826 16.2187 20.7225C16.5592 20.3624 17.0211 20.1602 17.5026 20.1602Z"
                        fill="#515C6F" />
                    <path opacity="0.5"
                        d="M0.0527046 0.641701C0.132517 0.401552 0.299259 0.204753 0.516266 0.094579C0.733273 -0.0155946 0.982777 -0.030122 1.20991 0.0541913L1.57426 0.189869C2.32112 0.467624 2.9542 0.703139 3.45412 0.961695C3.98672 1.23945 4.44428 1.57992 4.78805 2.11239C5.12941 2.63974 5.27103 3.21957 5.33518 3.85572C5.36424 4.13988 5.37997 4.45475 5.38844 4.80035H18.2654C20.305 4.80035 22.1413 4.80035 22.6788 5.53889C23.2162 6.27744 23.0056 7.39102 22.5856 9.6169L21.9803 12.7208C21.599 14.6766 21.409 15.6558 20.7408 16.2305C20.0726 16.8065 19.1285 16.8065 17.2389 16.8065H10.8198C7.44261 16.8065 5.75522 16.8065 4.70695 15.6366C3.65869 14.4667 3.58122 13.2252 3.58122 9.45946V6.12896C3.58122 5.18178 3.58122 4.54819 3.53038 4.0618C3.48196 3.59717 3.39844 3.36421 3.28828 3.19525C3.18297 3.03014 3.02198 2.87526 2.654 2.68582C2.26302 2.48359 1.73162 2.28391 0.92303 1.98312L0.608309 1.86664C0.495608 1.82499 0.391783 1.76024 0.302778 1.6761C0.213773 1.59196 0.141337 1.49008 0.089616 1.3763C0.037895 1.26252 0.00790538 1.13907 0.00136386 1.01301C-0.00517766 0.886962 0.0118574 0.760782 0.0514939 0.641701H0.0527046Z"
                        fill="#515C6F" />
                    <path
                        d="M14.1739 8.6404C14.1739 8.3858 14.0782 8.14162 13.908 7.96159C13.7377 7.78156 13.5068 7.68042 13.266 7.68042C13.0253 7.68042 12.7943 7.78156 12.6241 7.96159C12.4538 8.14162 12.3582 8.3858 12.3582 8.6404V10.2404H10.8451C10.6043 10.2404 10.3734 10.3415 10.2032 10.5215C10.0329 10.7016 9.93726 10.9458 9.93726 11.2004C9.93726 11.455 10.0329 11.6991 10.2032 11.8792C10.3734 12.0592 10.6043 12.1603 10.8451 12.1603H12.3582V13.7603C12.3582 14.0149 12.4538 14.2591 12.6241 14.4391C12.7943 14.6192 13.0253 14.7203 13.266 14.7203C13.5068 14.7203 13.7377 14.6192 13.908 14.4391C14.0782 14.2591 14.1739 14.0149 14.1739 13.7603V12.1603H15.687C15.9278 12.1603 16.1587 12.0592 16.3289 11.8792C16.4992 11.6991 16.5948 11.455 16.5948 11.2004C16.5948 10.9458 16.4992 10.7016 16.3289 10.5215C16.1587 10.3415 15.9278 10.2404 15.687 10.2404H14.1739V8.6404Z"
                        fill="#515C6F" />
                </svg>
                Order
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{route('wallet')}}" class="nav-link d-flex flex-column align-items-center justify-content-center {{$page=='wallet' ? 'active' : ''}}">
                <svg width="25" height="23" viewBox="0 0 25 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.46415 5.09717C4.22735 5.09717 4.00024 5.19786 3.8328 5.37709C3.66536 5.55632 3.57129 5.79941 3.57129 6.05288C3.57129 6.30635 3.66536 6.54944 3.8328 6.72867C4.00024 6.9079 4.22735 7.0086 4.46415 7.0086H9.22605C9.46285 7.0086 9.68995 6.9079 9.8574 6.72867C10.0248 6.54944 10.1189 6.30635 10.1189 6.05288C10.1189 5.79941 10.0248 5.55632 9.8574 5.37709C9.68995 5.19786 9.46285 5.09717 9.22605 5.09717H4.46415Z"
                        fill="#515C6F" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M22.8428 6.37643C22.769 6.37134 22.688 6.37134 22.6047 6.37134H19.3035C16.5999 6.37134 14.2856 8.5835 14.2856 11.4685C14.2856 14.3535 16.5999 16.5656 19.3035 16.5656H22.6047C22.688 16.5656 22.769 16.5656 22.8428 16.5605C23.9416 16.4892 24.913 15.5959 24.9952 14.3471C24.9999 14.2655 24.9999 14.1776 24.9999 14.0961V8.8409C24.9999 8.75935 24.9999 8.67142 24.9952 8.58987C24.913 7.34107 23.9416 6.44907 22.8428 6.37643ZM19.013 12.8281C19.7083 12.8281 20.2725 12.219 20.2725 11.4685C20.2725 10.7167 19.7083 10.1088 19.013 10.1088C18.3166 10.1088 17.7511 10.7179 17.7511 11.4685C17.7511 12.2203 18.3166 12.8281 19.013 12.8281Z"
                        fill="#515C6F" />
                    <path opacity="0.5"
                        d="M22.7857 6.37398C22.7857 4.86905 22.7333 3.25453 21.8357 2.09875C21.748 1.98552 21.6554 1.87667 21.5583 1.77253C20.6667 0.819365 19.5369 0.396303 18.1417 0.194966C16.7845 1.51907e-07 15.0524 0 12.8643 0H10.35C8.16191 0 6.42857 1.51907e-07 5.07143 0.194966C3.67619 0.396303 2.54643 0.819365 1.65476 1.77253C0.764286 2.72697 0.369048 3.93627 0.180952 5.42973C-5.32184e-08 6.88242 0 8.7365 0 11.0786V11.2214C0 13.5635 1.41916e-07 15.4189 0.182143 16.8703C0.370238 18.3637 0.765476 19.573 1.65595 20.5275C2.54762 21.4806 3.67738 21.9037 5.07262 22.105C6.42976 22.3 8.16191 22.3 10.35 22.3H12.8643C15.0524 22.3 16.7857 22.3 18.1417 22.105C19.5369 21.9037 20.6667 21.4806 21.5583 20.5275C21.7955 20.2728 22.0055 19.9907 22.1845 19.6864C22.7202 18.769 22.7845 17.645 22.7845 16.5644L22.606 16.5657H19.3036C16.6 16.5657 14.2857 14.3536 14.2857 11.4686C14.2857 8.58359 16.6 6.37143 19.3036 6.37143H22.6048C22.6667 6.37143 22.7286 6.37143 22.7857 6.37398Z"
                        fill="#515C6F" />
                </svg>
                Wallet
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="{{route('profile')}}" class="nav-link d-flex flex-column align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" viewBox="0 0 23 24">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0m0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5z"
                        clip-rule="evenodd" />
                </svg>
                Me
            </a>
        </li>
        <li class="nav-right d-none d-lg-block">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 25 23">
                <path fill="currentColor" d="M5.75 7a.75.75 0 0 0 0 1.5h4a.75.75 0 0 0 0-1.5z" />
                <path fill="#0066FF" fill-rule="evenodd"
                    d="M21.188 8.004C21.126 8 21.058 8 20.988 8h-2.773C15.944 8 14 9.736 14 12c0 2.264 1.944 4 4.215 4h2.773c.07 0 .138 0 .2-.004c.923-.056 1.739-.757 1.808-1.737c.004-.064.004-.133.004-.197V9.938c0-.064 0-.133-.004-.197c-.069-.98-.885-1.68-1.808-1.737m-3.217 5.063c.584 0 1.058-.478 1.058-1.067c0-.59-.474-1.067-1.058-1.067c-.585 0-1.06.478-1.06 1.067c0 .59.475 1.067 1.06 1.067"
                    clip-rule="evenodd" />
                <path fill="#0066FF"
                    d="M21.14 8.002c0-1.181-.044-2.448-.798-3.355a3.773 3.773 0 0 0-.233-.256c-.749-.748-1.698-1.08-2.87-1.238C16.099 3 14.644 3 12.806 3h-2.112C8.856 3 7.4 3 6.26 3.153c-1.172.158-2.121.49-2.87 1.238c-.748.749-1.08 1.698-1.238 2.87C2 8.401 2 9.856 2 11.694v.112c0 1.838 0 3.294.153 4.433c.158 1.172.49 2.121 1.238 2.87c.749.748 1.698 1.08 2.87 1.238c1.14.153 2.595.153 4.433.153h2.112c1.838 0 3.294 0 4.433-.153c1.172-.158 2.121-.49 2.87-1.238a3.81 3.81 0 0 0 .526-.66c.45-.72.504-1.602.504-2.45l-.15.001h-2.774C15.944 16 14 14.264 14 12c0-2.264 1.944-4 4.215-4h2.773c.052 0 .103 0 .151.002"
                    opacity="0.5" />
            </svg>
            <span class="py-2 px-3">
                ₹ 1000
            </span>
        </li>
    </ul>
 
