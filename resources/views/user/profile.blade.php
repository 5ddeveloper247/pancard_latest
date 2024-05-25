@extends('layouts.master.user_template.master')

@push('css')
@endpush

@section('content')
<section>

    <div class="container-fluid user-profile-tab">
        <div class="profile-tab" id="profile_section">
            <div class="d-flex gap-3">
                <img src="{{$user->profile_picture != null ? $user->profile_picture : asset('assets_user/images/Rectangle 214.png') }}" alt="" style="width: 6rem;height: 5rem;border-radius: 10px;">
                <div class="d-flex flex-column">
                    <h6 class="m-0">
                        {{$user->name}}
                    </h6>
                    <small>
                        {{$user->email}}
                    </small>
                    <a href="javascript:;" class="btn btn-danger" onclick="confirmLogout();">
                        Log Out
                    </a>
                </div>
            </div>


            <div class="border rounded-2 d-flex align-items-center justify-content-between p-3 mt-3" onclick="getUserProfilePageData();"><!-- data-bs-toggle="modal" data-bs-target="#profileDetailModal" -->
                <div class="d-flex gap-2 align-items-center">
                    <svg class="svg-bg-color" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <g fill="none" stroke="#515C6F">
                            <path stroke-linejoin="round" d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2z" />
                            <circle cx="12" cy="7" r="3" />
                        </g>
                    </svg>
                    <div>
                        <h6 class="m-0">Profile Details</h6>
                        <small style=" display: inline-block;max-width: 19rem;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;">
                            {{$user->name}}, {{$user->company_name}}, {{$user->phone_number}}, {{$user->email}}, etc...
                        </small>
                    </div>
                </div>
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M9.40298 18.5207C14.5961 18.5207 18.806 14.3747 18.806 9.26033C18.806 4.14599 14.5961 0 9.40298 0C4.20986 0 0 4.14599 0 9.26033C0 14.3747 4.20986 18.5207 9.40298 18.5207Z" fill="#D7D7D7" />
                    <path d="M11.3135 9.26021L11.3135 9.26037L8.35747 6.3503L10.5736 8.53276L11.3123 9.26032L10.5736 9.98788L8.35804 12.1708L11.3135 9.26021ZM12.0522 9.98777L9.09681 12.8984C8.68919 13.2998 8.02701 13.2997 7.61943 12.8983C7.21119 12.4963 7.21113 11.8442 7.61875 11.4427L9.83479 9.26032L7.6187 7.07786C7.21046 6.67581 7.21116 6.02424 7.61941 5.62219C8.02703 5.22075 8.68854 5.22015 9.09678 5.6222L12.0522 8.53281C12.4598 8.9342 12.4599 9.58633 12.0522 9.98777Z" fill="#D7D7D7" />
                </svg>
            </div>


            <div class="border rounded-2 d-flex align-items-center justify-content-between p-3 mt-3" data-bs-toggle="modal" data-bs-target="#userpassword">
                <div class="d-flex gap-2 align-items-center">
                    <svg class="svg-bg-color" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor">
                            <path stroke-width="1.5" d="M2 16c0-2.828 0-4.243.879-5.121C3.757 10 5.172 10 8 10h8c2.828 0 4.243 0 5.121.879C22 11.757 22 13.172 22 16c0 2.828 0 4.243-.879 5.121C20.243 22 18.828 22 16 22H8c-2.828 0-4.243 0-5.121-.879C2 20.243 2 18.828 2 16Z" />
                            <path stroke-linecap="round" stroke-width="1.5" d="M6 10V8a6 6 0 1 1 12 0v2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h.009m3.982 0H12m3.991 0H16" />
                        </g>
                    </svg>
                    <div>
                        <h6 class="m-0">Password</h6>
                        <small>
                            **************
                        </small>
                    </div>
                </div>
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M9.40298 18.5207C14.5961 18.5207 18.806 14.3747 18.806 9.26033C18.806 4.14599 14.5961 0 9.40298 0C4.20986 0 0 4.14599 0 9.26033C0 14.3747 4.20986 18.5207 9.40298 18.5207Z" fill="#D7D7D7" />
                    <path d="M11.3135 9.26021L11.3135 9.26037L8.35747 6.3503L10.5736 8.53276L11.3123 9.26032L10.5736 9.98788L8.35804 12.1708L11.3135 9.26021ZM12.0522 9.98777L9.09681 12.8984C8.68919 13.2998 8.02701 13.2997 7.61943 12.8983C7.21119 12.4963 7.21113 11.8442 7.61875 11.4427L9.83479 9.26032L7.6187 7.07786C7.21046 6.67581 7.21116 6.02424 7.61941 5.62219C8.02703 5.22075 8.68854 5.22015 9.09678 5.6222L12.0522 8.53281C12.4598 8.9342 12.4599 9.58633 12.0522 9.98777Z" fill="#D7D7D7" />
                </svg>
            </div>


            <div class="border rounded-2 d-flex align-items-center justify-content-between p-3 mt-3" data-bs-toggle="modal" data-bs-target="#support">
                <div class="d-flex gap-2 align-items-center">
                    <svg class="svg-bg-color" width="25" height="25" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 0C4.0374 0 0 4.0374 0 9V12.7287C0 13.6503 0.8073 14.4 1.8 14.4H2.7C2.93869 14.4 3.16761 14.3052 3.3364 14.1364C3.50518 13.9676 3.6 13.7387 3.6 13.5V8.8713C3.6 8.63261 3.50518 8.40369 3.3364 8.2349C3.16761 8.06612 2.93869 7.9713 2.7 7.9713H1.8828C2.3832 4.4883 5.3802 1.8 9 1.8C12.6198 1.8 15.6168 4.4883 16.1172 7.9713H15.3C15.0613 7.9713 14.8324 8.06612 14.6636 8.2349C14.4948 8.40369 14.4 8.63261 14.4 8.8713V14.4C14.4 15.3927 13.5927 16.2 12.6 16.2H10.8V15.3H7.2V18H12.6C14.5854 18 16.2 16.3854 16.2 14.4C17.1927 14.4 18 13.6503 18 12.7287V9C18 4.0374 13.9626 0 9 0Z" fill="#515C6F" />
                    </svg>
                    <div>
                        <h6 class="m-0">Support</h6>
                        <small>
                            Email & Whatsapp
                        </small>
                    </div>
                </div>
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M9.40298 18.5207C14.5961 18.5207 18.806 14.3747 18.806 9.26033C18.806 4.14599 14.5961 0 9.40298 0C4.20986 0 0 4.14599 0 9.26033C0 14.3747 4.20986 18.5207 9.40298 18.5207Z" fill="#D7D7D7" />
                    <path d="M11.3135 9.26021L11.3135 9.26037L8.35747 6.3503L10.5736 8.53276L11.3123 9.26032L10.5736 9.98788L8.35804 12.1708L11.3135 9.26021ZM12.0522 9.98777L9.09681 12.8984C8.68919 13.2998 8.02701 13.2997 7.61943 12.8983C7.21119 12.4963 7.21113 11.8442 7.61875 11.4427L9.83479 9.26032L7.6187 7.07786C7.21046 6.67581 7.21116 6.02424 7.61941 5.62219C8.02703 5.22075 8.68854 5.22015 9.09678 5.6222L12.0522 8.53281C12.4598 8.9342 12.4599 9.58633 12.0522 9.98777Z" fill="#D7D7D7" />
                </svg>
            </div>


            <div class="hide-tutorial border rounded-2 d-flex align-items-center justify-content-between p-3 mt-3" id="tutorials_btn">
                <div class="d-flex gap-2 align-items-center">
                    <svg width="25" height="25" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2336 1.08835C10.6712 0.819192 8.08871 0.799238 5.52244 1.02877L3.80861 1.18152C3.1209 1.24319 2.47403 1.53481 1.97242 2.0093C1.47081 2.48378 1.14372 3.11346 1.04394 3.79668C0.636393 6.58409 0.636393 9.41595 1.04394 12.2034C1.14395 12.8867 1.47126 13.5164 1.97305 13.9908C2.47484 14.4653 3.12186 14.7569 3.8097 14.8185L5.52353 14.9702C8.08976 15.2001 10.6722 15.1805 13.2347 14.9117L13.8934 14.8424C14.5472 14.7738 15.1619 14.4979 15.6478 14.0551C16.1337 13.6123 16.4653 13.0257 16.5941 12.381L19.895 14.1339C20.0135 14.1968 20.1458 14.2294 20.28 14.2288C20.4142 14.2282 20.5461 14.1943 20.664 14.1303C20.782 14.0662 20.8822 13.9739 20.9557 13.8617C21.0293 13.7495 21.0739 13.6208 21.0856 13.4871L21.1127 13.1794C21.4148 9.73274 21.4148 6.26621 21.1127 2.81952L21.0856 2.51185C21.0738 2.37811 21.0291 2.24937 20.9554 2.13714C20.8817 2.02492 20.7814 1.9327 20.6633 1.86874C20.5453 1.80478 20.4132 1.77107 20.2789 1.77063C20.1447 1.77018 20.0124 1.80301 19.8939 1.86618L16.5941 3.61902C16.4653 2.97435 16.1337 2.38777 15.6478 1.94495C15.1619 1.50213 14.5472 1.22628 13.8934 1.15768L13.2336 1.08835ZM5.66761 2.64727C8.12897 2.42723 10.6059 2.44646 13.0635 2.70468L13.7222 2.77402C14.044 2.80809 14.3454 2.94826 14.5788 3.17244C14.8122 3.39662 14.9644 3.69208 15.0114 4.01227C15.3992 6.65668 15.3992 9.34227 15.0114 11.9878C14.9644 12.308 14.8122 12.6034 14.5788 12.8276C14.3454 13.0518 14.044 13.1919 13.7222 13.226L13.0635 13.2954C10.6059 13.5536 8.12897 13.5728 5.66761 13.3528L3.95378 13.1989C3.62988 13.17 3.32514 13.0329 3.08871 12.8096C2.85228 12.5864 2.69792 12.29 2.65053 11.9683C2.26577 9.33676 2.26577 6.66328 2.65053 4.03177C2.69752 3.70978 2.85172 3.41304 3.08821 3.18952C3.3247 2.96601 3.62965 2.82878 3.95378 2.80002L5.66761 2.64727ZM16.8064 5.34585C16.9679 7.11168 16.9679 8.88835 16.8064 10.6542L19.5657 12.1199C19.7621 9.37683 19.7621 6.6232 19.5657 3.8801L16.8064 5.34585Z" fill="#515C6F" />
                    </svg>

                    <div>
                        <h6 class="m-0">Tutorials</h6>
                        <small>
                            Videos
                        </small>
                    </div>
                </div>
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M9.40298 18.5207C14.5961 18.5207 18.806 14.3747 18.806 9.26033C18.806 4.14599 14.5961 0 9.40298 0C4.20986 0 0 4.14599 0 9.26033C0 14.3747 4.20986 18.5207 9.40298 18.5207Z" fill="#D7D7D7" />
                    <path d="M11.3135 9.26021L11.3135 9.26037L8.35747 6.3503L10.5736 8.53276L11.3123 9.26032L10.5736 9.98788L8.35804 12.1708L11.3135 9.26021ZM12.0522 9.98777L9.09681 12.8984C8.68919 13.2998 8.02701 13.2997 7.61943 12.8983C7.21119 12.4963 7.21113 11.8442 7.61875 11.4427L9.83479 9.26032L7.6187 7.07786C7.21046 6.67581 7.21116 6.02424 7.61941 5.62219C8.02703 5.22075 8.68854 5.22015 9.09678 5.6222L12.0522 8.53281C12.4598 8.9342 12.4599 9.58633 12.0522 9.98777Z" fill="#D7D7D7" />
                </svg>
            </div>

            <div class="hide-tutorial border rounded-2 d-flex align-items-center justify-content-between p-3 mt-3" id="notifications_btn">
                <div class="d-flex gap-2 align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727" />
                        <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727" />
                    </svg>

                    <div>
                        <h6 class="m-0">Notifications</h6>
                        <small>
                            Information
                        </small>
                    </div>
                </div>
                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M9.40298 18.5207C14.5961 18.5207 18.806 14.3747 18.806 9.26033C18.806 4.14599 14.5961 0 9.40298 0C4.20986 0 0 4.14599 0 9.26033C0 14.3747 4.20986 18.5207 9.40298 18.5207Z" fill="#D7D7D7" />
                    <path d="M11.3135 9.26021L11.3135 9.26037L8.35747 6.3503L10.5736 8.53276L11.3123 9.26032L10.5736 9.98788L8.35804 12.1708L11.3135 9.26021ZM12.0522 9.98777L9.09681 12.8984C8.68919 13.2998 8.02701 13.2997 7.61943 12.8983C7.21119 12.4963 7.21113 11.8442 7.61875 11.4427L9.83479 9.26032L7.6187 7.07786C7.21046 6.67581 7.21116 6.02424 7.61941 5.62219C8.02703 5.22075 8.68854 5.22015 9.09678 5.6222L12.0522 8.53281C12.4598 8.9342 12.4599 9.58633 12.0522 9.98777Z" fill="#D7D7D7" />
                </svg>
            </div>
        </div>

        <div class="tutorial" id="tutorials_section">
            <div class="diff-bg d-flex align-items-center justify-content-between py-3 px-3 mb-4 px-md-5">
                <span class="fw-bold">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.25 7.20833C17.7688 7.20833 19 5.87452 19 4.22917C19 2.58382 17.7688 1.25 16.25 1.25C14.7312 1.25 13.5 2.58382 13.5 4.22917C13.5 5.87452 14.7312 7.20833 16.25 7.20833Z" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.5 1.25H7.4C5.16 1.25 4.04 1.25 3.184 1.72233C2.43139 2.13778 1.81949 2.80067 1.436 3.616C1 4.54333 1 5.75667 1 8.18333V13.8167C1 16.2433 1 17.4567 1.436 18.384C1.81949 19.1993 2.43139 19.8622 3.184 20.2777C4.04 20.75 5.16 20.75 7.4 20.75H12.6C14.84 20.75 15.96 20.75 16.816 20.2777C17.5686 19.8622 18.1805 19.1993 18.564 18.384C19 17.4567 19 16.2433 19 13.8167V11.5417" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Tutorials
                </span>
                <button type="button" class="view-btn py-1 px-3" id="backToMainPage">
                    Back to profile
                </button>
            </div>
            @foreach($tutorials as $value)
            <div class="d-flex justify-content-between border rounded-2 my-2">
                <div class="d-flex align-items-center py-2 edit_tutorial" data-id="2">
                    <a href="{{ $value->url}}" target="_blank" style="height: 70px;width: 110px;">
                        <img src="{{ $value->thumbnail != null ? $value->thumbnail : asset('assets_user/images/Rectangle 443.png') }}" alt="" style="height: 100%; width: 100%; border-radius: 6px;">
                    </a>
                    <div class="d-flex flex-column ps-2">
                        <h6 class="m-0">
                            {{ $value->title}}
                        </h6>
                        <small>{{ \Carbon\Carbon::parse($value->date)->format('d-M-Y') }}</small>
                        <span class="notifications-list-date px-2">{{ \Carbon\Carbon::parse($value->date)->format('h:i A') }}</span>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <div class="notifications" id="notifications_section" style="display:none;">
            <div class="diff-bg d-flex align-items-center justify-content-between py-3 px-3 mb-4 px-md-5">
                <span class="fw-bold">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.25 7.20833C17.7688 7.20833 19 5.87452 19 4.22917C19 2.58382 17.7688 1.25 16.25 1.25C14.7312 1.25 13.5 2.58382 13.5 4.22917C13.5 5.87452 14.7312 7.20833 16.25 7.20833Z" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.5 1.25H7.4C5.16 1.25 4.04 1.25 3.184 1.72233C2.43139 2.13778 1.81949 2.80067 1.436 3.616C1 4.54333 1 5.75667 1 8.18333V13.8167C1 16.2433 1 17.4567 1.436 18.384C1.81949 19.1993 2.43139 19.8622 3.184 20.2777C4.04 20.75 5.16 20.75 7.4 20.75H12.6C14.84 20.75 15.96 20.75 16.816 20.2777C17.5686 19.8622 18.1805 19.1993 18.564 18.384C19 17.4567 19 16.2433 19 13.8167V11.5417" stroke="#515C6F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Notifications
                </span>
                <button type="button" class="view-btn py-1 px-3" id="backToMainPage">
                    Back to profile
                </button>
            </div>
            @foreach($notifications as $value)
            <div class="home-card py-3 px-3 mb-4 mx-3 mx-md-5 px-md-4">
                @if($value->url != null)
                <h5><a href="{{$value->url}}" target="_blank">{{$value->title}}</a></h5>
                @else
                <h5>{{$value->title}}</h5>
                @endif
                <p>
                    {{$value->message}}
                </p>
            </div>
            @endforeach


        </div>
    </div>
</section>


<!-- ===================================USER-PROFILE-EDIT-POPUP=============================== -->
<div class="modal fade bottom-to-top" id="profileDetailModal" tabindex="-1" aria-labelledby="profileDetailModalLabel" aria-hidden="true">
    <div id="profile-modal" class="modal-dialog modal-md modal-lg modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <svg width="90" height="6" viewBox="0 0 90 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3L87 2.99999" stroke="#D7D7D7" stroke-width="5" stroke-linecap="round" />
                </svg>
            </div>
            <div class="modal-body">
                <form class="row g-3 register pt-4" id="registration_form" novalidate>
                    <div class="form-floating col-6 col-md-4">
                        <input type="email" class="form-control" id="user_name" name="user_name" placeholder="Name" maxlength="50" />
                        <label class="ms-2" for="user_name">Name</label>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <input type="text" class="form-control" id="username_auto" name="username_auto" readonly placeholder="DG5S8FU" />
                        <label class="ms-2" for="username_auto">Username (Auto generated)</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <input type="email" class="form-control" id="company_name" name="company_name" placeholder="name@example.com" maxlength="50" />
                        <label class="ms-2" for="company_name">Shop/Center Name</label>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <input type="number" class="form-control" id="user_phone" name="user_phone" placeholder="123" maxlength="15" />
                        <label class="ms-2" for="user_phone">Mobile No</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <input type="email" class="form-control" id="user_email" name="user_email" placeholder="name@example.com" maxlength="50" />
                        <label class="ms-2" for="user_email">Email</label>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <input type="text" class="form-control" id="user_pin" name="user_pin" placeholder="Password" maxlength="10" />
                        <label class="ms-2" for="user_pin">Shop Pin Code</label>
                    </div>

                    <div class="form-floating col-6 col-md-4">
                        <label class="visually-hidden" for="user_state"></label>
                        <select class="form-select" id="user_state" name="user_state" onchange="getCitiesLovData();">
                            <option value="">Choose State</option>
                            @foreach($states as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <label class="visually-hidden" for="user_city"></label>
                        <select class="form-select" id="user_city" name="user_city" onchange="getAreasLovData();">
                            <option selected>Choose City</option>
                        </select>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <label class="visually-hidden" for="user_area"></label>
                        <select class="form-select" id="user_area" name="user_area">
                            <option selected>Area</option>
                        </select>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <input type="text" class="form-control" id="user_landmark" name="user_landmark" placeholder="123" maxlength="50" />
                        <label class="ms-2" for="user_landmark">Landmark</label>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <div id="" class="upload px-4 d-flex align-items-center justify-content-between"><!-- cameraIcon -->
                            <span id="picturename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Picture</span>
                            <input type="file" accept="image/*" capture="camera" id="upload_picture" name="upload_picture" multiple="false" style="display: none;">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 14C12.6569 14 14 12.6569 14 11C14 9.34315 12.6569 8 11 8C9.34315 8 8 9.34315 8 11C8 12.6569 9.34315 14 11 14Z" stroke="#727C8E" stroke-width="1.5" />
                                <path d="M1 11.364C1 8.29905 1 6.76705 1.749 5.66705C2.07416 5.1887 2.49085 4.77949 2.975 4.46305C3.695 3.99005 4.597 3.82105 5.978 3.76105C6.637 3.76105 7.204 3.27105 7.333 2.63605C7.43158 2.17092 7.68773 1.75408 8.05815 1.456C8.42857 1.15791 8.89055 0.996855 9.366 1.00005H12.634C13.622 1.00005 14.473 1.68505 14.667 2.63605C14.796 3.27105 15.363 3.76105 16.022 3.76105C17.402 3.82105 18.304 3.99105 19.025 4.46305C19.51 4.78105 19.927 5.19005 20.251 5.66705C21 6.76705 21 8.29905 21 11.364C21 14.428 21 15.96 20.251 17.061C19.9253 17.5389 19.5087 17.948 19.025 18.265C17.904 19 16.343 19 13.222 19H8.778C5.657 19 4.096 19 2.975 18.265C2.49154 17.9477 2.07529 17.5382 1.75 17.06C1.53326 16.7361 1.3733 16.3777 1.277 16M18 8.00005H17" stroke="#727C8E" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>


                    <div class="form-floating col-6 col-md-4">
                        <div id="" class="upload px-4 d-flex align-items-center justify-content-between"><!-- aadharUploadIcon -->
                            <span id="filename" style="max-width: 88% !important; overflow: hidden; text-overflow: ellipsis;">Upload Aadhar</span>
                            <input type="file" id="upload_aadhar" name="upload_aadhar" multiple="false" style="display: none;">
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 14C12.6569 14 14 12.6569 14 11C14 9.34315 12.6569 8 11 8C9.34315 8 8 9.34315 8 11C8 12.6569 9.34315 14 11 14Z" stroke="#727C8E" stroke-width="1.5" />
                                <path d="M1 11.364C1 8.29905 1 6.76705 1.749 5.66705C2.07416 5.1887 2.49085 4.77949 2.975 4.46305C3.695 3.99005 4.597 3.82105 5.978 3.76105C6.637 3.76105 7.204 3.27105 7.333 2.63605C7.43158 2.17092 7.68773 1.75408 8.05815 1.456C8.42857 1.15791 8.89055 0.996855 9.366 1.00005H12.634C13.622 1.00005 14.473 1.68505 14.667 2.63605C14.796 3.27105 15.363 3.76105 16.022 3.76105C17.402 3.82105 18.304 3.99105 19.025 4.46305C19.51 4.78105 19.927 5.19005 20.251 5.66705C21 6.76705 21 8.29905 21 11.364C21 14.428 21 15.96 20.251 17.061C19.9253 17.5389 19.5087 17.948 19.025 18.265C17.904 19 16.343 19 13.222 19H8.778C5.657 19 4.096 19 2.975 18.265C2.49154 17.9477 2.07529 17.5382 1.75 17.06C1.53326 16.7361 1.3733 16.3777 1.277 16M18 8.00005H17" stroke="#727C8E" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>


                    <div class="row g-0 gap-3 px-2">
                        <div id="" class="form-floating col-12 mt-3">
                            <input type="text" class="form-control-plaintext fw-bolder" id="user_type" readonly value="">
                            <label class="ms-2" for="floatingPlaintextInput">User Type</label>
                        </div>

                        <div class="col">
                            <button type="button" class="payment-btn w-100 py-3 update_form_submit">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ================================USER-PASSWORD-POPUP========================== -->
<div class="modal fade bottom-to-top" id="userpassword" tabindex="-1" aria-labelledby="userpasswordLabel" aria-hidden="true">
    <div id="userPassword" class="modal-dialog">
        <div class="modal-content px-1 px-md-5">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <svg width="90" height="6" viewBox="0 0 90 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3L87 2.99999" stroke="#D7D7D7" stroke-width="5" stroke-linecap="round" />
                </svg>
            </div>
            <div class="modal-body">
                <form id="reset_password_form">
                    <input type="hidden" class="" id="username" name="username" value="{{$user->username}}" readonly />
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Old Password" />
                        <label class="ms-2" for="password">Old Password</label>
                        <svg class="showPassword" id="showPassword1" width="20" height="16" viewBox="0 0 20 16" zfill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z" fill="#515C6F" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z" fill="#515C6F" />
                        </svg>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" />
                        <label class="ms-2" for="new_password">New Password</label>
                        <svg class="showPassword" id="showPassword2" width="20" height="16" viewBox="0 0 20 16" zfill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z" fill="#515C6F" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z" fill="#515C6F" />
                        </svg>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm New Password" />
                        <label class="ms-2" for="confirm_password">Confirm New Password</label>
                        <svg class="showPassword" id="showPassword3" width="20" height="16" viewBox="0 0 20 16" zfill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" d="M0 8C0 9.64 0.425 10.191 1.275 11.296C2.972 13.5 5.818 16 10 16C14.182 16 17.028 13.5 18.725 11.296C19.575 10.192 20 9.639 20 8C20 6.36 19.575 5.809 18.725 4.704C17.028 2.5 14.182 0 10 0C5.818 0 2.972 2.5 1.275 4.704C0.425 5.81 0 6.361 0 8Z" fill="#515C6F" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 7.75C6.25 6.75544 6.64509 5.80161 7.34835 5.09835C8.05161 4.39509 9.00544 4 10 4C10.9946 4 11.9484 4.39509 12.6517 5.09835C13.3549 5.80161 13.75 6.75544 13.75 7.75C13.75 8.74456 13.3549 9.69839 12.6517 10.4017C11.9484 11.1049 10.9946 11.5 10 11.5C9.00544 11.5 8.05161 11.1049 7.34835 10.4017C6.64509 9.69839 6.25 8.74456 6.25 7.75ZM7.75 7.75C7.75 7.15326 7.98705 6.58097 8.40901 6.15901C8.83097 5.73705 9.40326 5.5 10 5.5C10.5967 5.5 11.169 5.73705 11.591 6.15901C12.0129 6.58097 12.25 7.15326 12.25 7.75C12.25 8.34674 12.0129 8.91903 11.591 9.34099C11.169 9.76295 10.5967 10 10 10C9.40326 10 8.83097 9.76295 8.40901 9.34099C7.98705 8.91903 7.75 8.34674 7.75 7.75Z" fill="#515C6F" />
                        </svg>
                    </div>

                    <div class="py-3">
                        <button type="button" class="payment-btn w-100 py-3" id="reset_pass_submit">
                            Reset Now
                        </button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>


<!-- ================================SUPPORT-POPUP========================== -->
<div class="modal fade bottom-to-top" id="support" tabindex="-1" aria-labelledby="supportLabel" aria-hidden="true">
    <div id="supportPopup" class="modal-dialog">
        <div class="modal-content px-1 px-md-5">
            <div class="modal-header d-flex align-items-center justify-content-center">
                <svg width="90" height="6" viewBox="0 0 90 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 3L87 2.99999" stroke="#D7D7D7" stroke-width="5" stroke-linecap="round" />
                </svg>
            </div>
            <div class="modal-body">
                <div class="py-2">
                    <a href="mailto:{{@$settings->helpline_email}}" type="button" class="payment-btn w-100 py-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_791_447)">
                                <path d="M21.3335 4H2.66683C2.31321 4 1.97407 4.14048 1.72402 4.39052C1.47397 4.64057 1.3335 4.97971 1.3335 5.33333V18.6667C1.3335 19.0203 1.47397 19.3594 1.72402 19.6095C1.97407 19.8595 2.31321 20 2.66683 20H21.3335C21.6871 20 22.0263 19.8595 22.2763 19.6095C22.5264 19.3594 22.6668 19.0203 22.6668 18.6667V5.33333C22.6668 4.97971 22.5264 4.64057 22.2763 4.39052C22.0263 4.14048 21.6871 4 21.3335 4ZM20.3068 18.6667H3.7735L8.44016 13.84L7.48016 12.9133L2.66683 17.8933V6.34667L10.9535 14.5933C11.2033 14.8417 11.5412 14.9811 11.8935 14.9811C12.2457 14.9811 12.5837 14.8417 12.8335 14.5933L21.3335 6.14V17.8067L16.4268 12.9L15.4868 13.84L20.3068 18.6667ZM3.54016 5.33333H20.2535L11.8935 13.6467L3.54016 5.33333Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_791_447">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        Email Us
                    </a>
                </div>

                <div class="py-2">
                    <a href="https://wa.me/{{@$settings->helpline_phone}}" target="_blank" class="btn btn-success w-100 py-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 21L4.65 17.2C3.38766 15.408 2.82267 13.217 3.06104 11.0381C3.29942 8.85915 4.32479 6.84211 5.94471 5.36549C7.56463 3.88887 9.66775 3.05418 11.8594 3.01807C14.051 2.98195 16.1805 3.7469 17.8482 5.16934C19.5159 6.59179 20.6071 8.57395 20.9172 10.7438C21.2272 12.9137 20.7347 15.1222 19.5321 16.9547C18.3295 18.7873 16.4994 20.118 14.3854 20.6971C12.2713 21.2762 10.0186 21.0639 8.05 20.1L3 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 10C9 10.1326 9.05268 10.2598 9.14645 10.3536C9.24021 10.4473 9.36739 10.5 9.5 10.5C9.63261 10.5 9.75979 10.4473 9.85355 10.3536C9.94732 10.2598 10 10.1326 10 10V9C10 8.86739 9.94732 8.74021 9.85355 8.64645C9.75979 8.55268 9.63261 8.5 9.5 8.5C9.36739 8.5 9.24021 8.55268 9.14645 8.64645C9.05268 8.74021 9 8.86739 9 9V10ZM9 10C9 11.3261 9.52678 12.5979 10.4645 13.5355C11.4021 14.4732 12.6739 15 14 15M14 15H15C15.1326 15 15.2598 14.9473 15.3536 14.8536C15.4473 14.7598 15.5 14.6326 15.5 14.5C15.5 14.3674 15.4473 14.2402 15.3536 14.1464C15.2598 14.0527 15.1326 14 15 14H14C13.8674 14 13.7402 14.0527 13.6464 14.1464C13.5527 14.2402 13.5 14.3674 13.5 14.5C13.5 14.6326 13.5527 14.7598 13.6464 14.8536C13.7402 14.9473 13.8674 15 14 15Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

<script src="{{ asset('assets_user/customjs/script_profile.js') }}"></script>

<script>
    function confirmLogout() {
        if (confirm("Are you sure you want to log out?")) {
            // If user confirms, proceed with logout
            window.location.href = "{{route('logout')}}";
        } else {
            // If user cancels, do nothing
            return false;
        }
    }
</script>

<script>
    document.getElementById('showPassword1').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const passwordFieldType = passwordField.getAttribute('type');
        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });
    document.getElementById('showPassword2').addEventListener('click', function() {
        const passwordField = document.getElementById('new_password');
        const passwordFieldType = passwordField.getAttribute('type');
        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });
    document.getElementById('showPassword3').addEventListener('click', function() {
        const passwordField = document.getElementById('confirm_password');
        const passwordFieldType = passwordField.getAttribute('type');
        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });
</script>

@endpush