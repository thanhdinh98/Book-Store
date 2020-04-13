import {CommonPage} from './CommonPage';
import {Filter} from '../components/filter';
import {Paging} from '../components/paging';

export const MainPage = (search = '')=>{

    const content = `
        <div>
            <div>
                ${Filter()}
            </div>
            <div class='mt-5'>
                <h2 id='title'>${search === '' ? 'Sách' : 'Tìm kiếm: ' + search.toUpperCase()}</h2>
                <ul class='nav justify-content-center mt-5 list-item' id='listItem'>
                </ul>
            </div>
            <div>
                ${Paging()}
            </div>
        </div>
    `;

    return CommonPage(content);
}