import avt from '../../public/img/avt.jpg';

export const User = ()=>{

    return `
        <div id='user'>
            <div class='user-status'>
                <ul class='list d-flex'>
                    <li><i class="fas fa-sign-in-alt"></i><a href='/auth/login'>Đăng nhập</a></li>
                    <li><i class="far fa-address-book"></i><a href='/auth/register'>Đăng ký</a></li>
                </ul>
            </div>
            <div class='user'>
                <img class='img-fluid' src='${avt}'>
                <span>
                    <i class="fas fa-angle-down"></i>
                </span>
            </div>
        </div>
    `;
}