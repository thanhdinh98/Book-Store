import {MainPage} from '../gui/pages/MainPage';
import {DetailPage} from '../gui/pages/DetailPage';

import {mainUtils} from '../utils/mainUtils';
import {searchUtils} from '../utils/searchUtils';
import {detailUtils} from '../utils/detailUtils';

import {ErrorPage} from '../gui/pages/404';

export const sachRoutes = (parentPath, pathName)=>{

    if(pathName === parentPath){

        const urlParams = new URLSearchParams(location.search);

        if(urlParams.get('id')){
            detailUtils(urlParams.get('id'), DetailPage);
        }else{
            document.querySelector('#main').innerHTML = MainPage();
            mainUtils(urlParams.get('g'), urlParams.get('page'));
        }
        
    }else if(pathName === `${parentPath}/tim-kiem`){

        const urlParams = new URLSearchParams(location.search);

        document.querySelector('#main').innerHTML = MainPage(urlParams.get('q'));
        searchUtils(urlParams.get('t'), urlParams.get('q'), urlParams.get('page'));
    }else{
        document.querySelector('#main').innerHTML = ErrorPage();
    }
}