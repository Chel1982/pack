function menu(openButton, closeButton, divDisplay) {
    var openButton = document.getElementsByClassName(openButton)[0];
    var closeButton = document.getElementsByClassName(closeButton)[0];
    var divDisplay = document.getElementsByClassName(divDisplay)[0];
    openButton.onclick = function () {
        var right = -100;
        var timer = setInterval(function () {
            if (right == 0) {
                clearInterval(timer);
            }
            else {
                right++;
                divDisplay.style.right = right + "%";
            }
        }, 1);
    }
    closeButton.onclick = function () {
        var right = 0;
        var timer = setInterval(function () {
            if (right == -100) {
                clearInterval(timer);
            }
            else {
                right--;
                divDisplay.style.right = right + "%";
            }
        }, 5);
    }
}
menu("hidden-menu", "close-button", "hidden-menu-content");
