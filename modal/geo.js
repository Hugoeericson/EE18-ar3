// element vi använder
const eGeoModal = document.querySelector("#geoModal");

var myModal = new bootstrap.Modal(eGeoModal, {
    keyboard: false
});

// lyssan på när geomodal öppnas och byta ut texten
eGeoModal.addEventListener("show.bs.modal", function() {
    console.log("Yeah! Modal viasa nu!");

    //välj innehållet
    const eModalBody = eGeoModal.querySelector(".modal-body");

    // ändra innehållet
    eModalBody.innerHTML = 
    "<label for='exampleInputEmail1'>Email address</label>" + 
    "<input type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp'>" + 
    "<label for='exampleInputPassword1'>Password</label>" + 
    "<input type='password' class='form-control' id='exampleInputPassword1'>";
});