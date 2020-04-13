export const Search = ()=>{
    return `
        <div class='d-flex' id='search'>
            <select>
                <option value='ts' seleceted>Tên sách: </option>
                <option value='tg'>Tác giả: </option>
                <option value='nsx'>Nhà sản xuất: </option>
            </select>
            <input type='text' class='form-control hide-border' placeholder='Search...'>
            <span class='search-btn'><i class="fas fa-search"></i></span>
        </div>
    `;
}
