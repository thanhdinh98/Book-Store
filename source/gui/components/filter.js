export const Filter = ()=>{
    return `
        <div class='row mt-4'>
            <div class='col'>
                <span><i class="fas fa-bars"></i></span>
            </div>
            <div class='col d-flex flex-wrap filter' id='filter'>
                <div>
                    <span choose='mn'>Mua nhiều nhất</span>
                </div>
                <div>
                    <span choose='xn'>Xem nhiều nhất</span>
                </div>
                <div>
                    <select>
                        <option value='default' selected>Chọn...</option>
                        <option>Giá từ cao tới thấp</option>
                        <option>Giá từ thấp tới cao</option>
                    </select>
                </div>
            </div>
        </div>
        <hr>
    `;
}