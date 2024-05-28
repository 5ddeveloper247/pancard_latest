<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh;">

    <div>
        <button onclick="share()">Share</button>
    </div>
    

    <script>
        async function share(){
            try {
                let response = await fetch('https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
                let blob = await response.blob();
                let file = new File([blob], 'image.jpg', {type : 'image/jpeg'});

                if(navigator.canShare && navigator.canShare({files: [file]})) {
                    await navigator.share({
                        title: 'Test Share',
                        text: 'vehicle101',
                        files: [file]
                    });
                    console.log('Share was successful.');
                } else {
                    console.log('Your system does not support sharing files.');
                }
            } catch (error) {
                console.error('Error sharing:', error);
            }
        }
    </script>
</body>
</html>
