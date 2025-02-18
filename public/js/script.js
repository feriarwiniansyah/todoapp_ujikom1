document.addEventListener("DOMContentLoaded", () => {
    const content = document.getElementById("content"); // mengambil id content
    // const navbarHeight = document.querySelector(".navbar").offsetHeight;
    // content.style.paddingTop = `${navbarHeight}px`;

    const addTaskModal = document.getElementById("addTaskModal"); // mengambil id addTaskModal
    addTaskModal.addEventListener("show.bs.modal", (e) => {
        const btn = e.relatedTarget; // mengambil id button
        const taskId = btn.getAttribute("data-list"); // mengambil data list
        document.getElementById("taskListId").value = taskId; // mengambil id taskListId
    }); // menambahkan event
});