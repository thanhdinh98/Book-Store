import TheLoaiBus from '../bus/theLoaiBus'; 

export const LoadTheLoai = async (g)=>{

    const dsTheLoaiNode = document.querySelector('#theLoai');
    dsTheLoaiNode.innerHTML = '';

    const theLoaiBus = new TheLoaiBus();
    const result = await theLoaiBus.LoadTheLoai();

    for(let theLoai of result){
        const theLoaiNode = document.createElement('li');
        theLoaiNode.innerHTML = `<a href='/sach?page=1&g=${theLoai.idTheLoai}'><li>Sách ${theLoai.tenTheLoai}</li></a>`;
        if(theLoai.idTheLoai === g) theLoaiNode.classList.add('active');
        dsTheLoaiNode.append(theLoaiNode);
    }
}

export const LoadTheLoaiId = async (g)=>{
    const theLoai = document.querySelector('#title');
    theLoai.innerHTML = '';

    const theLoaiBus = new TheLoaiBus();
    const result = await theLoaiBus.LoadTheLoaiId(g);
    theLoai.innerHTML = `Sách ${result.tenTheLoai}`;
}