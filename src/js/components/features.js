import { convertNodesToArray } from '../helpers/helpers';
const features = () => {

    const btn        = document.getElementById('realty-loader');
    const selects = document.querySelectorAll('.realty-select');

    const location = document.getElementById('location-coordinates');
    const number   = document.getElementById('number-of-floors');
    const type     = document.getElementById('type-of-structure');
    const block = document.getElementById('realty-block-content');

    selects.forEach(box => {
        box.addEventListener('change', function handleClick(event) {
            handle(false);
        });
    });

    btn.addEventListener('click', function(e){
        handle(true);
    });

    function handle(trigger){

        let pagination = 1;
        if(trigger === true){
            pagination = btn.getAttribute('data-pagination');
            pagination++;
        }

        jQuery.ajax({
            type: 'post',
            url: tbcAjax.ajaxUrl,
            data: {
                action: 'load_more_realty',
                pagination: (pagination),
                locationCoordinates: location.value,
                numberOfFloors: number.value,
                typeOfStructure: type.value,
            },
            success: function success(data) {
                btn.setAttribute('data-pagination', data.paged);
                if(data.paged >= data.max_num_pages){
                    btn.style.display='none';
                }else{
                    btn.style.display='block';
                }
                if(trigger === true){
                    block.insertAdjacentHTML('beforeend', data.content);
                }else{
                    block.innerHTML = data.content;
                }

            }
        });
    }
};

export default features;