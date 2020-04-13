import {SideBar, Main, Footer} from '../components/template';

export const CommonPage = (content)=>{
    return `
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-2 p-0'>${SideBar()}</div>
                <div class='col-md-10'>
                    <div>${Main(content)}</div>
                    <hr>
                    <div>${Footer()}</div>
                </div>
            </div>
        </div>
    `;
}