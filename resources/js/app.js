import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const buttons = document.querySelectorAll('.delete-button');
buttons.forEach((button) =>{
    button.addEventListener("click",(event) =>{
        event.preventDefault();
        const titleData = button.getAttribute('data-item');
        const modal = document.getElementById('delete-modal');
        const myModal = new bootstrap.Modal(modal);
        const title = document.querySelector('#title');
        title.textContent = titleData;
        myModal.show();
        const deleteButton = modal.querySelector('.btn-primary');
        deleteButton.addEventListener('click',()=>{
            button.parentElement.submit();
        })
    });
})

const previwImage =document.getElementById('image');
previwImage.addEventListener('change',(event)=>{
    var oFReader = new FileReader();
    oFReader.readAsDataURL(previwImage.files[0]);
    oFReader.onload = function (oFREvent){
        document.getElementById('uploadPreview').src = oFREvent.target.result;
    }
})