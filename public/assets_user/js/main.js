function showPassword() {
    let myPass = document.getElementById("floatingUserPassword");

    if (myPass.type === "password") {
        myPass.type = "text";
    } else {
        myPass.type = "password";
    }
}

function distributePageCode() {
    const currentPage = window.location.pathname;
    const pathParts = currentPage.split('/');
    const lastPartWithExtension = pathParts[pathParts.length - 1];
    const lastPartWithoutExtension = lastPartWithExtension.split('.')[0];

    if (lastPartWithoutExtension === 'index') {
        showPassword();
        document.querySelector(".showPassword").addEventListener("click", () => {
            showPassword();
        });
    } else {

    }
}

window.onload = function () {
    distributePageCode();
}



// let editVehicleDetail = document.querySelector('#edit-vehicle-details');
let showVehicleDetailsContainer = document.querySelector('.vehicle-details-container');
let hideMainHomePage = document.querySelector('.main-home-page');
// editVehicleDetail.addEventListener("click", () => {
//     hideMainHomePage.style.display = "none";
//     showVehicleDetailsContainer.style.display = 'block';
// })





let hideProfile = document.querySelector('.profile-tab');
let tutorialVideos = document.querySelector('.tutorial');
let clickToHide = document.querySelector('.hide-tutorial');
clickToHide.addEventListener("click", () => {
    hideProfile.style.display = "none";
    tutorialVideos.style.display = 'block';
})


// function loadSVGs() {
//     fetch('svgs.html')
//         .then(response => response.text())
//         .then(data => {
//             const tempElement = document.createElement('div');
//             tempElement.innerHTML = data;

//             const homeSVG = tempElement.querySelector('#home-svg');
//             const orderSVG = tempElement.querySelector('#order-svg');
//             const walletSVG = tempElement.querySelector('#wallet-svg');
//             // const meSVG = tempElement.querySelector('#me-svg'); // Check if the element is selected correctly
//             // const makeNewBtnSVG = tempElement.querySelector('#make-new-button-svg');

//             if (homeSVG) document.getElementById('home-svg').innerHTML = homeSVG.innerHTML;
//             if (orderSVG) document.getElementById('order-svg').innerHTML = orderSVG.innerHTML;
//             if (walletSVG) document.getElementById('wallet-svg').innerHTML = walletSVG.innerHTML;
//             // if (meSVG) document.getElementById('me-svg').innerHTML = meSVG.innerHTML;
//             // if (makeNewBtnSVG) document.getElementById('make-new-button-svg').innerHTML = makeNewBtnSVG.innerHTML;
//         })
//         .catch(error => console.error('Error fetching SVGs:', error));
// }

// document.addEventListener("DOMContentLoaded", loadSVGs);







