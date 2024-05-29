<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fonts/fonts.google.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_user/css/style.css') }}" />
</head>


<body>
    <div class="container py-4">
        <div class="payment-top text-center">
            <svg width="86" height="86" viewBox="0 0 86 86" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M43.0001 7.16675L52.4122 14.0325L64.0624 14.0103L67.6414 25.0972L77.0795 31.927L73.4584 43.0001L77.0795 54.0731L67.6414 60.9029L64.0624 71.9898L52.4122 71.9677L43.0001 78.8334L33.5879 71.9677L21.9378 71.9898L18.3587 60.9029L8.92053 54.0731L12.5417 43.0001L8.92053 31.927L18.3587 25.0972L21.9378 14.0103L33.5879 14.0325L43.0001 7.16675Z"
                    fill="#04CB00" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M30.4584 43.0001L39.4167 51.9584L57.3334 34.0417" stroke="white" stroke-width="4"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <h1>Payment Successful</h1>
            @if(@$transaction->transaction_remarks == 'User Register')
                <p class="px-3">Thank you for registeration. Upon verification, if all details are accurate, our
                    administration will approve your account. Additionally, you will receive a notification via the provided
                    email.</p>
            @else
            <p class="px-3">Thank you for submitting your data successfully. Upon verification, if all details are accurate, our
                administration will approve your account. Additionally, you will receive a notification via the provided
                email.</p>
            @endif
            
        </div>

        <div class="payment-bottom d-flex justify-content-between mt-5 p-4">
            <div class="your-detail d-flex flex-column">
                <h4>
                    Your Details
                </h4>

                <span>{{@$transaction->createdByUser->name}}</span>

                <span>{{@$transaction->createdByUser->phone_number}}</span>

                <span>{{@$transaction->createdByUser->email}}</span>

                <span>{{@$transaction->createdByUser->pin_code}}</span>

                <span>{{@$transaction->createdByUser->state->name}}</span>

                <span>{{@$transaction->createdByUser->city->name}}</span>

                <span>{{@$transaction->createdByUser->area->name}}</span>
            </div>

            <div class="payment-detail d-flex flex-column text-center">
                <h4>Payment Details</h4>

                <span>
                    Total Ammount <br> ₹<span>{{@$transaction->amount}}</span>
                </span>
            </div>
        </div>
        <div class="pt-4 text-center">
            @if(@$transaction->transaction_remarks == 'User Register')
                <a href="{{route('login')}}" class="btn btn-success">Go to login</a>
            @else
                <a href="{{route('wallet')}}" class="btn btn-success">Go to wallet</a>
            @endif
            
        </div>
    </div>

    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    
</body>

</html>