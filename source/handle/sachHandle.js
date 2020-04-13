import SachBus from '../bus/sachBus';

export const LoadSach = async (g, p)=>{
    const dsItem = document.querySelector('#listItem');
    dsItem.innerHTML = '';

    const sachBus = new SachBus();
    const options = {
        o: (p - 1) * 12,
        qa: 12,
        g: g
    };
    const result = await sachBus.LoadSach(options);

    for(let sach of result){
        const sachNode = document.createElement('li');
        sachNode.innerHTML = `
            <a href='/sach?id=${sach.id}'>
                <img src='${sach.hinhAnh}' class='img-fluid list-item-img'>
                <div class='font-weight-bold list-item-title'>${sach.tenSach}</div>
                <div class='list-item-author'>${sach.tacGia.tenTacGia}</div>
                <div class='text-danger'>${sach.donGia} đ</div>
                <div class='list-item-content d-flex flex-wrap align-items-center'>
                    <div class='list-item-des'>${sach.moTa}</div>
                    <div>
                        <span class='list-item-read'>Xem thêm...</span>
                    </div>
                </div>
            </a>
        `;
        dsItem.append(sachNode);
    }
}

export const PhanTrang = async (g)=>{

    const sachBus = new SachBus();
    const tongSoTrang = Math.ceil(await sachBus.TongSoTrang(g) / 12);
    const paging = document.querySelector('#paging');
    paging.innerHTML = '';

    for(let i = 1; i <= tongSoTrang; ++i){
        const li = document.createElement('li');
        li.classList.add('page-item');
        if(g){
            li.innerHTML = `<a class="page-link" href="/sach?page=${i}&g=${g}">${i}</a>`;    
        }else{
            li.innerHTML = `<a class="page-link" href="/sach?page=${i}">${i}</a>`;
        }
        paging.append(li);
    }
}

export const TimKiemSach = async (t, q, p)=>{
    const dsItem = document.querySelector('#listItem');
    dsItem.innerHTML = '';

    const sachBus = new SachBus();
    const options = {
        paging:{
            o: (p - 1) * 12,
            qa: 12
        },
        search:{
            t: t,
            q: q
        }
    };
    const result = await sachBus.TimKiemSach(options);

    for(let sach of result){
        const sachNode = document.createElement('li');
        sachNode.innerHTML = `
            <a href='/sach?id=${sach.id}'>
                <img src='${sach.hinhAnh}' class='img-fluid list-item-img'>
                <div class='font-weight-bold list-item-title'>${sach.tenSach}</div>
                <div class='list-item-author'>${sach.tacGia.tenTacGia}</div>
                <div class='text-danger'>${sach.donGia} đ</div>
                <div class='list-item-content d-flex flex-wrap align-items-center'>
                    <div class='list-item-des'>${sach.moTa}</div>
                    <div>
                        <span class='list-item-read'>Xem thêm...</span>
                    </div>
                </div>
            </a>
        `;
        dsItem.append(sachNode);
    }
}

export const PhanTrangTimKiem = async (t, q) => {

    const sachBus = new SachBus();
    const tongSoTrang = Math.ceil(await sachBus.PhanTrangTimKiem(t, q) / 12);
    const paging = document.querySelector('#paging');
    paging.innerHTML = '';

    for(let i = 1; i <= tongSoTrang; ++i){
        const li = document.createElement('li');
        li.classList.add('page-item');
        li.innerHTML = `<a class="page-link" href="/sach/tim-kiem?page=${i}&t=${t}&q=${q}">${i}</a>`;
        paging.append(li);
    }
}

export const LaySachId = async (id)=>{
    const sachBus = new SachBus();
    const sach = await sachBus.LaySachId(id);
    if(sach){
        return sach;
    }
    return null;
}