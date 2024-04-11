const d = document;
const EventList = () => {
    const $button = d.getElementById("user_list");
    const $close = d.getElementById("close-modal");

    $button.addEventListener("click", (e) => {
        document.getElementById("modal-example").style.display = "block";
        document.getElementById("modal-overlay").style.display = "block";
    });

    $close.addEventListener("click", (e) => {
        document.getElementById("modal-example").style.display = "none";
        document.getElementById("modal-overlay").style.display = "none";
    });
};

d.addEventListener("DOMContentLoaded", (e) => {
    EventList();
});
