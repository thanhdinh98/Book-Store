import {Search} from './search';
import {User} from './user';
import {Categories} from './categories';

export const SideBar = ()=>{

    const brand = 'Book Store';

    return `
        <div class='sidebar pt-3'>
            <div class='text-center'>
                <h2><a href='/'>${brand}</a></h2>
            </div>
            <div class='full-height sidebar-categories'>
                <h4 class='text-center mb-3'>Thể Loại</h4>
                <div>${Categories()}</div>
            </div>
        </div>
    `;
}

export const Footer = ()=>{
    return `
        <div class='mt-5 mb-5 d-flex justify-content-center align-items-center footer'>
            <div>Book Store &copy; 2018</div>
        </div>
    `;
}

export const Main = (Content)=>{
    function Header(){
        return `
            <div class='row pb-2 header'>
                <div class='col-md'>${Search()}</div>
                <div class='col-md text-right'>${User()}</div>
            </div>
        `;
    }

    return `
        <div class='pt-3'>
            ${Header()}
            ${Content}
        </div>
    `;
}