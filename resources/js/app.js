import "./bootstrap";
addEventListener("DOMContentLoaded", () => {
    let likes = document.querySelectorAll(".fa-thumbs-up");
    let status = true;
    likes.forEach((element) => {
        element.addEventListener("click", (event) => {
            if (status) {
                event.target.style.color = "#1A76F2";
                status = false;
            }else{
                event.target.style.color = "grey";
                status = true
            }
        });
    });
});
