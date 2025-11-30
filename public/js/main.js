const editButton = document.getElementById('edit-button');
const deleteButton = document.getElementById('delete-button')
const editForm = document.getElementById('edit-form');
const deleteForm = document.getElementById('delete-form');

deleteForm.addEventListener('submit', function(e) {
    const result = confirm('本当に削除しますか？');
    if (!result) {
        e.preventDefault();
    }
});
