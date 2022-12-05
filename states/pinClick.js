window.onload = function () {
    let pin = document.querySelector("#pin2");
    let state = document.querySelector("#map");
    let pinIsClicked = false;

    function placedPin() {
        const inputForm = document.querySelector("#input-menu");

        inputForm.classList.remove("form-hidden");

        document.querySelector("#submit-file").addEventListener("click", (e) => {
        });
    }

    pin.addEventListener('click', function () {
        let hoverPin = document.querySelector("#pinHover");
        hoverPin.classList.remove("form-hidden");
        pinIsClicked = true;
    }, false);

    state.addEventListener('click', function (event) {
        if (pinIsClicked) {
            let newDiv = document.createElement('div');
            newDiv.innerHTML += '<img id="pinPlaced" src="pin.svg">';
            newDiv.style.position = "absolute";
            newDiv.style.display = "block";
            let x = event.pageX - 30;
            let y = event.pageY - 17;
            newDiv.style.top = y + "px";
            newDiv.style.left = x + "px";

            document.body.appendChild(newDiv);
            let hoverPin = document.querySelector("#pinHover");
            hoverPin.classList.add("form-hidden");
            pinIsClicked = false;
            console.log("placed"); // this is where I will call another function to open a div
            placedPin();
        }
    }, false);


    document.addEventListener('mousemove', function (ev) {
        document.getElementById('pin').style.transform = 'translateY(' + (ev.clientY - 220) + 'px)';
        document.getElementById('pin').style.transform += 'translateX(' + (ev.clientX - 30) + 'px)';
    }, false);
}
