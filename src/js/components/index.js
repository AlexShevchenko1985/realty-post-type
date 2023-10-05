export { default as features } from './features';

const btn = document.getElementById('realty-loader');
btn.addEventListener('click', function(e){

     let pagination = this.getAttribute('data-pagination');
     let block = document.getElementById('realty-block-content');

    jQuery.ajax({
        type: 'post',
        url: tbcAjax.ajaxUrl,
        data: {
            action: 'load_more_realty',
             pagination: pagination
        },
        success: function success(data) {
            let maxPages = btn.getAttribute('data-max-pagination');
            btn.setAttribute('data-pagination', data.paged);
            if(data.paged >= maxPages){
                btn.style.display='none';
            }
            block.insertAdjacentHTML('beforeend', data.content);

        }
    });
});
console.log(111)