const addModal = new bootstrap.Modal("#createDataModal");
const editModal = new bootstrap.Modal("#updateDataModal");
window.addEventListener("closeModal", () => {
    addModal.hide();
    editModal.hide();
});
