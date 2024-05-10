const showSort = document.querySelector('.sort');
const SortBlock = document.querySelector('.sort-block');
showSort.addEventListener("click",function(e){
    SortBlock.classList.toggle('none-sort');
});