import {CommonPage} from './CommonPage';
import {Detail} from '../components/detail';

export const DetailPage = (sach)=>{

    const content = `
        <div class='container mt-5 mb-5'>
            <div class='row'>
                <div class='col-md text-center'>
                    <div>
                        <img src='${sach.hinhAnh}' class='img-fluid detail-img'>
                    </div>
                </div>
                <div class='col-md d-flex flex-wrap align-items-center justify-content-center'>${Detail(sach)}</div>
            </div>
        </div>
    `;

    return CommonPage(content);
}