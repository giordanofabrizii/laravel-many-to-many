const deleteEl = document.getElementById('delete-form')

console.log(deleteEl)

deleteEl.addEventListener('submit',function(event){
    event.preventDefault();
    const name = this.getAttribute('project_title')

    if(window.confirm(`Sei sicuro di voler cancellare ${name}?` ) === true){
        this.submit();
    }
})
